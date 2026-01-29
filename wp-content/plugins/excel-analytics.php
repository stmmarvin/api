<?php
/*
Plugin Name: Excel Analytics Plugin
Description: Toont grafieken op basis van Excel data via een Kotlin API.
*/

function excel_analytics_shortcode($atts) {
    $a = shortcode_atts(array(
        'token' => '',
        'group' => 'categorie',
        'value' => 'bedrag',
        'op' => 'SUM'
    ), $atts);

    $ownerId = "test-user-123";
    $url = "http://api-service:8080/api/analytics/" . $a['token'] . "/query?ownerId=" . $ownerId . "&groupBy=" . $a['group'] . "&value=" . $a['value'] . "&operation=" . $a['op'];

    $response = wp_remote_get($url);
    if (is_wp_error($response)) {
        return "API niet bereikbaar.";
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if (empty($data)) {
        return "Geen data gevonden.";
    }

    ob_start();
    ?>
    <canvas id="excelChart" width="400" height="200"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        (function() {
            const ctx = document.getElementById('excelChart').getContext('2d');
            const apiData = <?php echo json_encode($data); ?>;

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: apiData.map(d => d.group),
                    datasets: [{
                        label: '<?php echo $a['group']; ?>',
                        data: apiData.map(d => d.value),
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        })();
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('excel_grafiek', 'excel_analytics_shortcode');