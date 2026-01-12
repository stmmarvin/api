package club.awesome.api.controller

import club.awesome.api.dto.QueryResponse
import club.awesome.api.service.QueryService
import org.springframework.http.ResponseEntity
import org.springframework.web.bind.annotation.GetMapping
import org.springframework.web.bind.annotation.RequestMapping
import org.springframework.web.bind.annotation.RequestParam
import org.springframework.web.bind.annotation.RestController

@RestController
@RequestMapping("/query")
class QueryController(
    private val queryService: QueryService
) {


    @GetMapping
    fun ask(
        @RequestParam sourceId: Long,
        @RequestParam q: String
    ): ResponseEntity<QueryResponse> {
        val response = queryService.processQuestion(sourceId, q)
        return ResponseEntity.ok(response)
    }
}