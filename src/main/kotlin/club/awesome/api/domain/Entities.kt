package club.awesome.api.domain

import jakarta.persistence.*
import java.sql.Timestamp

@Entity
@Table(name = "sources")
data class Source(
    @Id @GeneratedValue(strategy = GenerationType.IDENTITY)
    val id: Long? = null,
    val name: String,
    @Column(name = "uploaded_at", insertable = false, updatable = false)
    val uploadedAt: Timestamp? = null
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