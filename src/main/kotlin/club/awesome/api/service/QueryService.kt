package club.awesome.api.service

import club.awesome.api.dto.Observation
import club.awesome.api.dto.QueryResponse
import club.awesome.api.repo.RawDataRepository
import club.awesome.api.repo.SourceRepository
import org.springframework.stereotype.Service
import java.math.BigDecimal

@Service
class QueryService(
    private val rawDataRepository: RawDataRepository,
    private val sourceRepository: SourceRepository
) {
    fun processQuestion(secretToken: String, ownerId: String): QueryResponse {
        val observation = interpret()
        val result = executeCalculation(secretToken, ownerId, observation)
        return QueryResponse(result, observation)
    }

    fun executeCalculation(secretToken: String, ownerId: String, obs: Observation): List<Map<String, Any>> {
        val source = sourceRepository.findBySecretToken(secretToken) ?: throw RuntimeException("Niet gevonden")
        if (source.ownerId != ownerId) throw RuntimeException("Geen toegang")

        val relevantColumns = listOf(obs.usedGroupBy, obs.usedValueColumn)
        val rawData = rawDataRepository.findBySourceIdAndColumnNameIn(source.id!!, relevantColumns)

        val rows = rawData.groupBy { it.rowIndex }
            .map { (_, cells) ->
                cells.associate { it.columnName.lowercase() to (it.dataValue ?: "") }
            }

        val groupCol = obs.usedGroupBy.lowercase()
        val valCol = obs.usedValueColumn.lowercase()

        return rows
            .filter { it.containsKey(groupCol) && it.containsKey(valCol) }
            .groupBy { it[groupCol] ?: "Overig" }
            .map { (group, groupRows) ->
                val value = when (obs.operation.uppercase()) {
                    "SUM" -> groupRows.sumOf { parse(it[valCol]) }
                    "MAX" -> groupRows.maxOfOrNull { parse(it[valCol]) } ?: BigDecimal.ZERO
                    "COUNT" -> BigDecimal(groupRows.size)
                    else -> BigDecimal.ZERO
                }
                mapOf("group" to group, "value" to value)
            }
            .sortedByDescending { (it["value"] as BigDecimal) }
    }

    private fun interpret(): Observation {
        return Observation("categorie", "bedrag", "SUM")
    }

    private fun parse(v: String?) = v?.replace(",", ".")?.toBigDecimalOrNull() ?: BigDecimal.ZERO
}