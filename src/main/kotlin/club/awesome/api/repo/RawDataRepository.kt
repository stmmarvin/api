package club.awesome.api.repo

import club.awesome.api.domain.RawData
import org.springframework.data.jpa.repository.JpaRepository
import org.springframework.stereotype.Repository

@Repository
interface RawDataRepository : JpaRepository<RawData, Long> {
    fun findBySourceId(sourceId: Long): List<RawData>

    // Retrieve specific columns to reduce data load
    fun findBySourceIdAndColumnNameIn(sourceId: Long, columnNames: List<String>): List<RawData>

}