package club.awesome.api.controller

import club.awesome.api.service.FilterService
import org.springframework.http.ResponseEntity
import org.springframework.web.bind.annotation.GetMapping
import org.springframework.web.bind.annotation.RequestMapping
import org.springframework.web.bind.annotation.RequestParam
import org.springframework.web.bind.annotation.RestController

@RestController
@RequestMapping("/filter")
class FilterController(private val filterService: FilterService) {

    @GetMapping
    fun filter(
        @RequestParam sourceId: Long,
        @RequestParam allParams: Map<String, String>
    ): ResponseEntity<List<Map<String, String>>> {
        val result = filterService.filterData(sourceId, allParams)
        return ResponseEntity.ok(result)
    }
}