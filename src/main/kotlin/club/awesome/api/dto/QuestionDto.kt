package club.awesome.api.dto

data class QuestionRequest(
    val sourceId: Long,
    val question: String
)

data class QuestionResponse(
    val answer: Any, // Can be a list, a single number, or a text
    val chartType: String? = "bar" // Suggestion for the frontend (bar, line, pie)
)