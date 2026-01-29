package club.awesome.api.controller

import club.awesome.api.domain.Source
import club.awesome.api.repo.SourceRepository
import club.awesome.api.service.ImportService
import org.springframework.http.ResponseEntity
import org.springframework.web.bind.annotation.*
import org.springframework.web.multipart.MultipartFile


@RestController
@RequestMapping("/import")
@CrossOrigin(origins = ["http://localhost:8000"])
class ImportController(private val importService: ImportService, private val sourceRepository: SourceRepository) {
    @PostMapping("/preview")
    fun previewFile(@RequestParam("file") file: MultipartFile): ResponseEntity<List<Map<String, String>>> {
        val data = importService.parseFile(file.inputStream, file.originalFilename ?: "file")
        return ResponseEntity.ok(data)
    }

    @PostMapping("/confirm")
    fun confirm(
        @RequestParam filename: String,
        @RequestParam ownerId: String,
        @RequestBody data: List<Map<String, String>>
    ): ResponseEntity<Any> {

        if (importService.isDuplicate(filename, ownerId)) {
            return ResponseEntity.status(409).body(mapOf("error" to "Dit bestand is al eerder geïmporteerd."))
        }

        val token = importService.confirmImport(filename, ownerId, data)

        return ResponseEntity.ok(mapOf(
            "token" to token,
            "rowCount" to data.size,
            "fileName" to filename

        ))
    }

    @GetMapping("/sources")
    fun listSources(@RequestParam ownerId: String): ResponseEntity<List<Source>> {
        return ResponseEntity.ok(sourceRepository.findByOwnerId(ownerId))
    }

    @DeleteMapping("/sources/{id}")
    fun deleteSource(@PathVariable id: Long): ResponseEntity<Void> {
        importService.deleteSource(id)
        return ResponseEntity.noContent().build()
    }
}