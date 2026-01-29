package club.awesome.api.controller

import club.awesome.api.service.FilterService
import org.springframework.http.ResponseEntity
import org.springframework.web.bind.annotation.*

@RestController
@RequestMapping("/filter")
class FilterController(private val filterService: FilterService) {

    @GetMapping("/{secretToken}")
    fun filter(
        @PathVariable secretToken: String,
        @RequestParam ownerId: String,
        @RequestParam allParams: Map<String, String>
    ): ResponseEntity<List<Map<String, String>>> {
        val result = filterService.filterData(secretToken, ownerId, allParams)
        return ResponseEntity.ok(result)
    }
}