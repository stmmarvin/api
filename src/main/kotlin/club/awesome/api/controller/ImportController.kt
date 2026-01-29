package club.awesome.api.controller

import club.awesome.api.service.ImportService
import org.springframework.http.ResponseEntity
import org.springframework.web.bind.annotation.*
import org.springframework.web.multipart.MultipartFile

@RestController
@RequestMapping("/import")
@CrossOrigin(origins = ["http://localhost:8000"])
class ImportController(private val importService: ImportService) {
    @PostMapping("/preview")
    fun previewFile(@RequestParam("file") file: MultipartFile): ResponseEntity<List<Map<String, String>>> {
        val data = importService.parseFile(file.inputStream, file.originalFilename ?: "file")
        return ResponseEntity.ok(data)
    }

    @PostMapping("/confirm")
    fun confirm(
        @RequestParam filename: String,
        @RequestParam ownerId: String,
        @RequestBody rows: List<Map<String, String>>
    ): ResponseEntity<Map<String, String>> {
        val token = importService.saveImportedData(filename, ownerId, rows)
        return ResponseEntity.ok(mapOf("token" to token))
    }
}