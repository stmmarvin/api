package club.awesome.api.controller

import club.awesome.api.dto.Observation
import club.awesome.api.service.QueryService
import org.springframework.http.ResponseEntity
import org.springframework.web.bind.annotation.*

@RestController
@RequestMapping("/analytics")
class AnalyticsController(private val queryService: QueryService) {
    @GetMapping("/{secretToken}/query")
    fun queryData(
        @PathVariable secretToken: String,
        @RequestParam ownerId: String,
        @RequestParam groupBy: String,
        @RequestParam value: String,
        @RequestParam operation: String
    ): ResponseEntity<List<Map<String, Any>>> {
        val obs = Observation(groupBy, value, operation)
        val result = queryService.executeCalculation(secretToken, ownerId, obs)
        return ResponseEntity.ok(result)
    }
}