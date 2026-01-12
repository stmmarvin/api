package club.awesome.api.service

import club.awesome.api.domain.RawData
import club.awesome.api.domain.Source
import club.awesome.api.repo.RawDataRepository
import club.awesome.api.repo.SourceRepository
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
        // 1. Check strikt op extensie en kies de juiste leesfunctie
        val rows = when {
            originalFilename.endsWith(".xlsx", ignoreCase = true) -> readXlsx(inputStream)
            originalFilename.endsWith(".csv", ignoreCase = true) -> readCsv(inputStream)
            else -> throw RuntimeException("Alleen Excel (.xlsx) en CSV (.csv) bestanden zijn toegestaan.")
        }

        if (rows.isEmpty()) return

        val source = sourceRepository.save(Source(name = originalFilename))

        // 2. Sla de data generiek op
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

    // Leest CSV regel voor regel
    private fun readCsv(inputStream: InputStream): List<Map<String, String>> {
        val reader = inputStream.bufferedReader()
        val headerLine = reader.readLine() ?: return emptyList()
        val headers = headerLine.split(",").map { it.trim() }

        return reader.lineSequence()
            .filter { it.isNotBlank() }
            .map { line ->
                val values = line.split(",").map { it.trim() }
                // Zorg dat waarden veilig aan headers gekoppeld worden
                headers.zip(values + List(headers.size - values.size) { "" }).toMap()
            }.toList()
    }

    // Leest Excel via Apache POI
    private fun readXlsx(inputStream: InputStream): List<Map<String, String>> {
        val workbook = WorkbookFactory.create(inputStream)
        val sheet = workbook.getSheetAt(0) // Pakt altijd het eerste tabblad
        val rows = mutableListOf<Map<String, String>>()

        val headerRow = sheet.getRow(0) ?: return emptyList()
        val headers = headerRow.map { it.toString().trim() }

        for (i in 1..sheet.lastRowNum) {
            val row = sheet.getRow(i) ?: continue
            val rowMap = mutableMapOf<String, String>()
            var hasData = false

            for (j in headers.indices) {
                val cellValue = row.getCell(j)?.toString()?.trim() ?: ""
                if (cellValue.isNotBlank()) hasData = true
                rowMap[headers[j]] = cellValue
            }
            // Sla alleen op als de rij niet volledig leeg is
            if (hasData) rows.add(rowMap)
        }
        return rows
    }
}