package club.awesome.api.repo

import club.awesome.api.domain.Source
import org.springframework.data.jpa.repository.JpaRepository
import org.springframework.stereotype.Repository

@Repository
interface SourceRepository : JpaRepository<Source, Long> {
    fun findBySecretToken(secretToken: String): Source?
    fun findByOwnerId(ownerId: String): List<Source>
}