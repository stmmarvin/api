package club.awesome.api.domain

import jakarta.persistence.*
import java.sql.Timestamp
import java.util.*

@Entity
@Table(name = "sources")
data class Source(
    @Id @GeneratedValue(strategy = GenerationType.IDENTITY)
    val id: Long? = null,
    val name: String,
    val ownerId: String,
    @Column(unique = true)
    val secretToken: String = UUID.randomUUID().toString(),
    @Column(name = "uploaded_at", insertable = false, updatable = false)
    val updatedAt: Timestamp? = null
)

@Entity
@Table(name = "raw_data")
data class RawData(
    @Id @GeneratedValue(strategy = GenerationType.IDENTITY)
    val id: Long? = null,

    @ManyToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "source_id")
    val source: Source,

    @Column(name = "row_index")
    val rowIndex: Int,

    @Column(name = "column_name")
    val columnName: String,

    @Column(name = "data_value")
    val dataValue: String?
)