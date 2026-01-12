package club.awesome.api.repo

import club.awesome.api.domain.RawData
import org.springframework.data.jpa.repository.JpaRepository
import org.springframework.data.jpa.repository.Query
import org.springframework.stereotype.Repository

@Repository
interface RawDataRepository : JpaRepository<RawData, Long> {
    fun findBySourceId(sourceId: Long): List<RawData>

    // Retrieve distinct column names for a source to give context to the interpreter
    @Query("SELECT DISTINCT r.columnName FROM RawData r WHERE r.source.id = :sourceId")
    fun findHeadersBySourceId(sourceId: Long): List<String>
}