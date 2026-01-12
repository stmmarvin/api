package club.awesome.api.controller

import club.awesome.api.repo.RawDataRepository
import org.springframework.http.ResponseEntity
import org.springframework.web.bind.annotation.GetMapping
import org.springframework.web.bind.annotation.RequestMapping
import org.springframework.web.bind.annotation.RequestParam
import org.springframework.web.bind.annotation.RestController
import java.math.BigDecimal

@RestController
@RequestMapping("/analytics")
class AnalyticsController(
    private val rawDataRepository: RawDataRepository
) {

    @GetMapping("/query")
    fun queryData(
        @RequestParam sourceId: Long,
        @RequestParam groupBy: String,
        @RequestParam value: String,
        @RequestParam operation: String      ): ResponseEntity<List<Map<String, Any>>> {

        val rawData = rawDataRepository.findBySourceId(sourceId)

        val rows = rawData.groupBy { it.rowIndex }
            .map { (_, cells) ->
                cells.associate { it.columnName.lowercase() to (it.dataValue ?: "") }
            }

        val groupCol = groupBy.lowercase()
        val valCol = value.lowercase()

        val result = rows
            .filter { it.containsKey(groupCol) && it.containsKey(valCol) }
            .groupBy { it[groupCol] ?: "Onbekend" }
            .map { (group, groupRows) ->
                val calculatedValue = when (operation.uppercase()) {
                    "SUM" -> groupRows.sumOf { it[valCol]?.toBigDecimalOrNull() ?: BigDecimal.ZERO }
                    "MAX" -> groupRows.maxOfOrNull { it[valCol]?.toBigDecimalOrNull() ?: BigDecimal.ZERO } ?: BigDecimal.ZERO
                    "COUNT" -> groupRows.size
                    else -> 0
                }

                mapOf(
                    "group" to group,
                    "value" to calculatedValue
                )
            }
            .sortedByDescending { (it["value"] as Number).toDouble() }

        return ResponseEntity.ok(result)
    }
}