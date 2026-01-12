package club.awesome.api.dto

data class QueryRequest(
    val sourceId: Long,
    val question: String
)

data class QueryResponse(
    val answer: Any,
    val observation: Observation
)

data class Observation(
    val usedGroupBy: String,
    val usedValueColumn: String,
    val operation: String
)