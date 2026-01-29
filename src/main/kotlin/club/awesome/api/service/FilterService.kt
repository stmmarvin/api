package club.awesome.api.service

import club.awesome.api.repo.RawDataRepository
import club.awesome.api.repo.SourceRepository
import org.springframework.stereotype.Service
import java.math.BigDecimal

@Service
class FilterService(
    private val rawDataRepository: RawDataRepository,
    private val sourceRepository: SourceRepository
) {
    fun getSecureFormattedData(secretToken: String, ownerId: String): List<Map<String, String>> {
        val source = sourceRepository.findBySecretToken(secretToken) ?: throw RuntimeException("Niet gevonden")
        if (source.ownerId != ownerId) throw RuntimeException("Geen toegang")

        val rawData = rawDataRepository.findBySourceId(source.id!!)
        return rawData.groupBy { it.rowIndex }
            .toSortedMap()
            .map { (rowIndex, cells) ->
                val rowMap = cells.associate { it.columnName to (it.dataValue ?: "") }.toMutableMap()
                rowMap["id"] = rowIndex.toString()
                rowMap
            }
    }

    fun filterData(secretToken: String, ownerId: String, params: Map<String, String>): List<Map<String, String>> {
        val rows = getSecureFormattedData(secretToken, ownerId)

        return rows.filter { row ->
            params.filterKeys {
                it != "secretToken" && it != "ownerId" && !it.endsWith("to") && !it.startsWith("tot")
            }.all { (key, value) ->
                checkCondition(row, key, value, params)
            }
        }
    }

    private fun checkCondition(row: Map<String, String>, key: String, value: String, allParams: Map<String, String>): Boolean {
        val column = row.keys.find { it.equals(key, ignoreCase = true) } ?: return false
        val cellValue = row[column] ?: return false

        val toValue = allParams["${key}to"] ?: allParams["tot${key}"]

        if (toValue != null) {
            val v = parse(cellValue)
            val min = parse(value)
            val max = parse(toValue)
            return v in min..max
        }

        return cellValue.equals(value, ignoreCase = true)
    }

    private fun parse(v: String) = v.replace(",", ".").trim().toBigDecimalOrNull() ?: BigDecimal.ZERO
}