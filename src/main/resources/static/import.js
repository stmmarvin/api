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

/**
 * Sends the question to the QueryController and displays JSON.
 */
async function askQuestion() {
    const sourceId = document.getElementById('sourceIdInput').value;
    const question = document.getElementById('questionInput').value;
    const outputPre = document.getElementById('jsonOutput');

    if (!sourceId || !question) {
        alert("Vul een ID en een vraag in.");
        return;
    }

    outputPre.textContent = "Laden...";

    try {
        const url = `${API_BASE}/query?sourceId=${sourceId}&q=${encodeURIComponent(question)}`;

        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        });

        if (response.ok) {
            const data = await response.json();
            outputPre.textContent = JSON.stringify(data, null, 2);
        } else {
            outputPre.textContent = `Error: ${response.status} ${response.statusText}`;
        }
    } catch (error) {
        console.error("Query error:", error);
        outputPre.textContent = "Er ging iets mis met het ophalen van het antwoord.";
    }
}