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