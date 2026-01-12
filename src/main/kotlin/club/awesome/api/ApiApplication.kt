package club.awesome.api

import org.springframework.boot.autoconfigure.SpringBootApplication
import org.springframework.boot.runApplication

// Spring Boot application entry point
@SpringBootApplication
class ApiApplication

// Main function to run the Spring Boot application
fun main(args: Array<String>) {
    runApplication<ApiApplication>(*args)
}