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
    @Transactional
    fun importFile(inputStream: InputStream, originalFilename: String) {
        val rows = when {
            originalFilename.endsWith(".xlsx", ignoreCase = true) -> readXlsx(inputStream)
            originalFilename.endsWith(".csv", ignoreCase = true) -> readCsv(inputStream)
            else -> throw RuntimeException("Alleen .xlsx en .csv bestanden toegestaan.")
        }

        if (rows.isEmpty()) return

        val source = sourceRepository.save(Source(name = originalFilename))

        val dataToSave = rows.flatMapIndexed { rowIndex, row ->
            row.map { (column, value) ->
                RawData(
                    source = source,
                    rowIndex = rowIndex,
                    columnName = column,
                    dataValue = value
                )
            }
        }
        rawDataRepository.saveAll(dataToSave)
    }

    private fun readCsv(inputStream: InputStream): List<Map<String, String>> {
        val mapper = CsvMapper()
        // withQuoteChar('"') zorgt dat "95,6" in CSV goed wordt gelezen
        val schema = CsvSchema.emptySchema().withHeader().withColumnSeparator(',')

        val iterator = mapper.readerFor(Map::class.java)
            .with(schema)
            .readValues<Map<String, String>>(inputStream)

        return iterator.readAll()
    }

    private fun readXlsx(inputStream: InputStream): List<Map<String, String>> {
        val workbook = WorkbookFactory.create(inputStream)
        val sheet = workbook.getSheetAt(0)
        val rows = mutableListOf<Map<String, String>>()

        // DataFormatter zorgt dat '95,6' als '95,6' wordt gelezen en '2020' als '2020' (zonder .0)
        val formatter = DataFormatter()

        val headerRow = sheet.getRow(0) ?: return emptyList()
        val headers = headerRow.map { formatter.formatCellValue(it).trim() }

        for (i in 1..sheet.lastRowNum) {
            val row = sheet.getRow(i) ?: continue
            val rowMap = mutableMapOf<String, String>()
            var hasData = false
            for (j in headers.indices) {
                val cell = row.getCell(j)
                // Dit is de fix: gebruik formatter in plaats van toString()
                val cellValue = formatter.formatCellValue(cell).trim()

                if (cellValue.isNotBlank()) hasData = true
                rowMap[headers[j]] = cellValue
            }
            if (hasData) rows.add(rowMap)
        }
        return rows
    }
}