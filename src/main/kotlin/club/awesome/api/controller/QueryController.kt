package club.awesome.api.controller

import club.awesome.api.dto.QueryResponse
import club.awesome.api.service.QueryService
import org.springframework.http.ResponseEntity
import org.springframework.web.bind.annotation.*

@RestController
@RequestMapping("/query")
class QueryController(private val queryService: QueryService) {
    @GetMapping("/{secretToken}")
    fun ask(
        @PathVariable secretToken: String,
        @RequestParam ownerId: String
    ): ResponseEntity<QueryResponse> {
        val response = queryService.processQuestion(secretToken, ownerId)
        return ResponseEntity.ok(response)
    }
}