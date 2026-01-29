package club.awesome.api.service

import club.awesome.api.domain.RawData
import club.awesome.api.domain.Source
import club.awesome.api.repo.RawDataRepository
import club.awesome.api.repo.SourceRepository
import com.fasterxml.jackson.dataformat.csv.CsvMapper
import com.fasterxml.jackson.dataformat.csv.CsvSchema
import org.apache.poi.ss.usermodel.DataFormatter
import org.apache.poi.ss.usermodel.WorkbookFactory
import org.springframework.stereotype.Service
import org.springframework.transaction.annotation.Transactional
import java.io.InputStream

@Service
class ImportService(
    private val sourceRepository: SourceRepository,
    private val rawDataRepository: RawDataRepository
) {
    fun parseFile(inputStream: InputStream, filename: String): List<Map<String, String>> {
        val rawData = when {
            filename.endsWith(".xlsx", ignoreCase = true) -> readXlsx(inputStream)
            filename.endsWith(".csv", ignoreCase = true) -> readCsv(inputStream)
            else -> throw RuntimeException("Onbekend formaat")
        }

        return rawData.mapIndexed { index, row ->
            val linkedRow = mutableMapOf<String, String>()
            linkedRow["id"] = (index + 1).toString()
            linkedRow.putAll(row)
            linkedRow
        }
    }

    // Saves the imported data and returns the secret token of the source
    @Transactional
    fun saveImportedData(filename: String, ownerId: String, rows: List<Map<String, String>>): String {
        if (rows.isEmpty()) return ""
        val source = sourceRepository.save(Source(name = filename, ownerId = ownerId))
        val dataToSave = rows.flatMapIndexed { rowIndex, row ->
            row.filterKeys { it != "id" }.map { (column, value) ->
                RawData(source = source, rowIndex = rowIndex, columnName = column, dataValue = value)
            }
        }
        rawDataRepository.saveAll(dataToSave)
        return source.secretToken
    }

    // Ensures headers are unique by appending suffixes to duplicates
    private fun makeHeadersUnique(headers: List<String>): List<String> {
        val counts = mutableMapOf<String, Int>()
        return headers.map { header ->
            val clean = header.ifBlank { "Kolom" }
            val count = counts.getOrDefault(clean, 0)
            counts[clean] = count + 1
            if (count > 0) "${clean}_$count" else clean
        }
    }

    private fun isRowEmpty(row: Map<String, String>) = row.values.all { it.isBlank() }
   // Reads CSV file and returns list of rows as maps
    private fun readCsv(inputStream: InputStream): List<Map<String, String>> {
        val mapper = CsvMapper()
        val schema = CsvSchema.emptySchema().withHeader().withColumnSeparator(',')
        val rows = mapper.readerFor(Map::class.java).with(schema).readValues<Map<String, String>>(inputStream).readAll()
        val filtered = rows.filterNot { isRowEmpty(it as Map<String, String>) }
        return if (filtered.size > 1) filtered.dropLast(1) else filtered
    }

    private fun readXlsx(inputStream: InputStream): List<Map<String, String>> {
        val workbook = WorkbookFactory.create(inputStream)
        val sheet = workbook.getSheetAt(0)
        val rows = mutableListOf<Map<String, String>>()
        val formatter = DataFormatter()
        val headerRow = sheet.getRow(0) ?: return emptyList()
        val headers = makeHeadersUnique(headerRow.map { formatter.formatCellValue(it).trim() })

        for (i in 1 until sheet.lastRowNum) {
            val row = sheet.getRow(i) ?: continue
            val rowMap = headers.indices.associate { j ->
                headers[j] to formatter.formatCellValue(row.getCell(j)).trim()
            }
            if (!isRowEmpty(rowMap)) rows.add(rowMap)
        }
        return rows
    }
}