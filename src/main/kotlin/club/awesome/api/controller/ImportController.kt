package club.awesome.api.controller

import club.awesome.api.domain.Source
import club.awesome.api.repo.RawDataRepository
import club.awesome.api.repo.SourceRepository
import club.awesome.api.service.ImportService
import org.springframework.http.ResponseEntity
import org.springframework.web.bind.annotation.*
import org.springframework.web.multipart.MultipartFile

@RestController
@RequestMapping("/import")
class ImportController(
    private val importService: ImportService,
    private val rawDataRepository: RawDataRepository,
    private val sourceRepository: SourceRepository
) {
    @PostMapping("/auto")
    fun uploadFile(@RequestParam("file") file: MultipartFile): ResponseEntity<String> {
        importService.importFile(file.inputStream, file.originalFilename ?: "file")
        return ResponseEntity.ok("Bestand succesvol verwerkt.")
    }

    @GetMapping("/sources")
    fun getAllSources(): ResponseEntity<List<Source>> {
        return ResponseEntity.ok(sourceRepository.findAll())
    }

    @GetMapping("/data/{sourceId}")
    fun getData(@PathVariable sourceId: Long): ResponseEntity<List<Map<String, String?>>> {
        val rawData = rawDataRepository.findBySourceId(sourceId)

        val headers = rawData.map { it.columnName }.distinct().sorted()

        val result = rawData.groupBy { it.rowIndex }
            .toSortedMap()
            .map { (_, cells) ->
                val rowMap = cells.associate { it.columnName to it.dataValue }

                headers.associateWith { header ->
                    rowMap[header]
                }
            }

        return ResponseEntity.ok(result)
    }
}