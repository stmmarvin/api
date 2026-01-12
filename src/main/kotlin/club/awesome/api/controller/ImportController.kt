package club.awesome.api.controller

import club.awesome.api.repo.RawDataRepository
import club.awesome.api.service.ImportService
import org.springframework.http.ResponseEntity
import org.springframework.web.bind.annotation.*
import org.springframework.web.multipart.MultipartFile

@RestController
@RequestMapping("/import")
class ImportController(
    private val importService: ImportService,
    private val rawDataRepository: RawDataRepository
) {
    @PostMapping("/auto")
    fun uploadFile(@RequestParam("file") file: MultipartFile): ResponseEntity<String> {
        importService.importFile(file.inputStream, file.originalFilename ?: "file")
        return ResponseEntity.ok("Bestand succesvol verwerkt.")
    }

    @GetMapping("/data/{sourceId}")
    fun getData(@PathVariable sourceId: Long): ResponseEntity<List<Map<String, String?>>> {
        val rawData = rawDataRepository.findBySourceId(sourceId)


        val result = rawData.groupBy { it.rowIndex }
            .map { (_, cells) ->
                cells.associate { it.columnName to it.dataValue }
            }

        return ResponseEntity.ok(result)
    }
}