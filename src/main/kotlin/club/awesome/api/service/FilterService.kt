package club.awesome.api.service

import club.awesome.api.repo.RawDataRepository
import org.springframework.stereotype.Service
import java.math.BigDecimal

@Service
class FilterService(private val rawDataRepository: RawDataRepository) {

    fun filterData(sourceId: Long, params: Map<String, String>): List<Map<String, String>> {
        // 1. Fetch data
        val rawData = rawDataRepository.findBySourceId(sourceId)
        val rows = rawData.groupBy { it.rowIndex }
            .map { (_, cells) -> cells.associate { it.columnName to (it.dataValue ?: "") } }

        // 2. Filter rows
        return rows.filter { row ->
            // Filter strictly on relevant parameters (exclude sourceId and range indicators)
            params.filterKeys { it != "sourceId" && !it.endsWith("to") && !it.startsWith("tot") }.all { (key, value) ->
                checkCondition(row, key, value, params)
            }
        }
    }

    private fun checkCondition(row: Map<String, String>, key: String, value: String, allParams: Map<String, String>): Boolean {
        // Find column ignoring case
        val column = row.keys.find { it.equals(key, ignoreCase = true) } ?: return false
        val cellValue = row[column] ?: return false

        // Check for range parameter (e.g. Value & Valueto)
        val toValue = allParams["${key}to"] ?: allParams["tot${key}"]

        if (toValue != null) {
            // Numeric range check
            val v = parse(cellValue)
            val min = parse(value)
            val max = parse(toValue)
            return v in min..max
        }

        // Exact match
        return cellValue.equals(value, ignoreCase = true)
    }

    private fun parse(v: String) = v.replace(",", ".").trim().toBigDecimalOrNull() ?: BigDecimal.ZERO
}