package club.awesome.api.service

import club.awesome.api.dto.Observation
import club.awesome.api.dto.QueryResponse
import club.awesome.api.repo.RawDataRepository
import org.springframework.stereotype.Service
import java.math.BigDecimal

@Service
class QueryService(
    private val rawDataRepository: RawDataRepository
) {

    fun processQuestion(sourceId: Long, question: String): QueryResponse {
        val headers = rawDataRepository.findHeadersBySourceId(sourceId)


        val observation = interpret(headers, question)


        val rawData = rawDataRepository.findBySourceId(sourceId)


        val rows = rawData.groupBy { it.rowIndex }
            .map { (_, cells) ->
                cells.associate { it.columnName.lowercase() to (it.dataValue ?: "") }
            }

        val groupCol = observation.usedGroupBy.lowercase()
        val valCol = observation.usedValueColumn.lowercase()


        val result = rows
            .filter { it.containsKey(groupCol) && it.containsKey(valCol) }
            .groupBy { it[groupCol] ?: "Overig" }
            .map { (group, groupRows) ->
                val value = when (observation.operation) {
                    "SUM" -> groupRows.sumOf { parse(it[valCol]) }
                    "MAX" -> groupRows.maxOfOrNull { parse(it[valCol]) } ?: BigDecimal.ZERO
                    "COUNT" -> BigDecimal(groupRows.size)
                    else -> BigDecimal.ZERO
                }
                mapOf("group" to group, "value" to value)
            }
            .sortedByDescending { (it["value"] as BigDecimal) }

        return QueryResponse(
            answer = result,
            observation = observation
        )
    }

    private fun interpret(headers: List<String>, question: String): Observation {
        val lowerQ = question.lowercase()


        val op = when {
            "gemiddeld" in lowerQ -> "AVERAGE"
            "max" in lowerQ || "hoogste" in lowerQ -> "MAX"
            else -> "SUM"
        }


        val groupBy = headers.find {
            val h = it.lowercase()
            h in lowerQ || (h.contains("period") && (lowerQ.contains("maand") || lowerQ.contains("jaar")))
        } ?: headers.firstOrNull() ?: "?"

        val valCol = headers.find {
            val h = it.lowercase()
            h != groupBy.lowercase() && (h.contains("aantal") || h.contains("waarde"))
        } ?: headers.lastOrNull() ?: "?"

        return Observation(groupBy, valCol, op)
    }

    private fun parse(v: String?) = v?.replace(",", ".")?.toBigDecimalOrNull() ?: BigDecimal.ZERO
}