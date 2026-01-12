// Base URL for API calls
const API_BASE = '/api';

/**
 * Uploads the selected file to the ImportController.
 */
async function uploadFile() {
    const fileInput = document.getElementById('fileInput');
    const statusDiv = document.getElementById('uploadStatus');

    if (!fileInput.files[0]) {
        alert("Selecteer eerst een bestand!");
        return;
    }

    const formData = new FormData();
    formData.append("file", fileInput.files[0]);

    statusDiv.textContent = "Bezig met uploaden...";

    try {
        const response = await fetch(`${API_BASE}/import/auto`, {
            method: 'POST',
            body: formData
        });

        if (response.ok) {

            const message = await response.text();
            statusDiv.textContent = `✅ ${message}`;
            statusDiv.className = "text-success fw-bold";
        } else {
            const errorText = await response.text();
            statusDiv.textContent = `❌ Fout: ${errorText}`;
            statusDiv.className = "text-danger";
        }
    } catch (error) {
        console.error("Upload error:", error);
        statusDiv.textContent = "❌ Er ging iets mis met de verbinding.";
        statusDiv.className = "text-danger";
    }
}

