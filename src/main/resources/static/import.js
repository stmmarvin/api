let currentPreviewData = [];
let currentFileName = "";
let rowsToShow = 5;
let excludedColumns = new Set();
const ownerId = "test-user-123";

// Laad datasets direct bij het openen van de pagina
document.addEventListener('DOMContentLoaded', loadDatasets);

async function uploadFile() {
    const fileInput = document.getElementById('fileInput');
    if (!fileInput.files[0]) {
        toonStatus("Selecteer een bestand om te uploaden.", false);
        return;
    }

    currentFileName = fileInput.files[0].name;
    const formData = new FormData();
    formData.append('file', fileInput.files[0]);

    try {
        const response = await fetch('/api/import/preview', {method: 'POST', body: formData});
        if (response.ok) {
            currentPreviewData = await response.json();
            rowsToShow = 5;
            excludedColumns.clear();
            renderPreview();
            toonStatus("Preview succesvol geladen.");
        } else {
            toonStatus("Fout bij laden van preview.", false);
        }
    } catch (error) {
        toonStatus("Kan geen verbinding maken met de server.", false);
    }
}

function renderPreview() {
    if (currentPreviewData.length === 0) return;

    const table = document.getElementById('previewTable');
    const headers = Object.keys(currentPreviewData[0]);

    let headerHtml = '<thead><tr>';
    headers.forEach(h => {
        const isChecked = !excludedColumns.has(h);
        headerHtml += `
            <th style="background: ${isChecked ? '#f8f9fa' : '#e9ecef'}; padding: 8px; border: 1px solid #dee2e6;">
                <input type="checkbox" ${isChecked ? 'checked' : ''} onchange="toggleColumn('${h}')">
                <br>${h}
            </th>`;
    });
    headerHtml += '</tr></thead>';

    const visibleRows = currentPreviewData.slice(0, rowsToShow);
    let bodyHtml = '<tbody>';
    visibleRows.forEach(row => {
        bodyHtml += '<tr>';
        headers.forEach(h => {
            const isExcluded = excludedColumns.has(h);
            bodyHtml += `<td style="padding: 8px; border: 1px solid #dee2e6; color: ${isExcluded ? '#adb5bd' : 'inherit'}; text-decoration: ${isExcluded ? 'line-through' : 'none'};">
                            ${row[h] || ''}
                         </td>`;
        });
        bodyHtml += '</tr>';
    });
    bodyHtml += '</tbody>';

    table.innerHTML = headerHtml + bodyHtml;

    const jsonEl = document.getElementById('jsonPreview');
    if (jsonEl) {
        jsonEl.textContent = JSON.stringify(getFilteredData(), null, 2);
    }
    document.getElementById('previewCard').style.display = 'block';
    // Verberg succes kaart als we een nieuwe preview laden
    document.getElementById('successCard').style.display = 'none';

    document.getElementById('tableControls').style.display = currentPreviewData.length > rowsToShow ? 'block' : 'none';
    document.getElementById('jsonPreview').textContent = JSON.stringify(getFilteredData(), null, 2);
}

function toggleColumn(columnName) {
    if (excludedColumns.has(columnName)) {
        excludedColumns.delete(columnName);
    } else {
        excludedColumns.add(columnName);
    }
    renderPreview();
}

function showMoreRows() {
    rowsToShow += 10;
    renderPreview();
}

function showLessRows() {
    rowsToShow = 5;
    renderPreview();
}

function showAllRows() {
    rowsToShow = currentPreviewData.length;
    renderPreview();
}


function getFilteredData() {
    return currentPreviewData.map(row => {
        const newRow = { ...row };
        excludedColumns.forEach(col => delete newRow[col]);
        return newRow;
    });
}

async function confirmUpload() {
    const filteredData = getFilteredData();
    const url = `/api/import/confirm?filename=${encodeURIComponent(currentFileName)}&ownerId=${encodeURIComponent(ownerId)}`;

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(filteredData)
        });

        if (response.status === 409) {
            toonStatus("Fout: Dit bestand is al eerder geïmporteerd.", false);
            return;
        }

        if (response.ok) {
            const result = await response.json();

            // 1. Verberg preview
            document.getElementById('previewCard').style.display = 'none';

            // 2. Toon succes kaart
            document.getElementById('successCard').style.display = 'block';

            // Gebruik de variabelen uit het resultaat object (result.fileName, result.rowCount)
            document.getElementById('importSummary').innerText =
                `Bestand: ${result.fileName}\nAantal rijen: ${result.rowCount}`;

            // Stel de URL samen
            const apiUrl = `${location.origin}/api/query/${result.token}?ownerId=${ownerId}`;
            document.getElementById('finalApiUrl').innerText = apiUrl;

            // 3. Ververs de lijst met datasets en toon succesmelding
            toonStatus("Dataset succesvol opgeslagen!");
            await loadDatasets();
        } else {
            toonStatus("Fout bij het opslaan van de gegevens.", false);
        }
    } catch (error) {
        console.error(error);
        toonStatus("Er is een netwerkfout opgetreden.", false);
    }
}

async function loadDatasets() {
    try {
        const list = document.getElementById('datasetList');
        if (!list) return; // Veiligheidscheck: stopt als de lijst niet op de pagina staat

        const response = await fetch(`/api/import/sources?ownerId=${ownerId}`);
        if (response.ok) {
            const sources = await response.json();

            if (sources.length === 0) {
                list.innerHTML = '<li class="list-group-item">Geen datasets gevonden.</li>';
                return;
            }

            // Nu met de volledige HTML zodat de knoppen weer verschijnen
            list.innerHTML = sources.map(s => `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>${s.name}</strong><br>
                        <small class="text-muted">Token: ${s.secretToken}</small>
                    </div>
                    <button class="btn btn-danger btn-sm" onclick="deleteDataset(${s.id})">Verwijderen</button>
                </li>
            `).join('');
        }
    } catch (error) {
        console.error("Fout bij laden datasets:", error);
    }
}

async function deleteDataset(id) {
    if (!confirm("Weet je zeker dat je deze dataset wilt verwijderen?")) return;

    try {
        const response = await fetch(`/api/import/sources/${id}`, { method: 'DELETE' });
        if (response.ok) {
            await loadDatasets(); // Wacht tot de lijst ververst is
            toonStatus("Dataset verwijderd.");
        } else {
            toonStatus("Kon dataset niet verwijderen.", false);
        }
    } catch (error) {
        toonStatus("Fout bij verwijderen.", false);
    }
}

function toonStatus(tekst, isSucces = true) {
    const el = document.getElementById('statusBericht');
    if (el) {
        el.style.display = 'block';
        el.innerText = tekst;
        el.className = isSucces ? 'alert alert-success' : 'alert alert-danger';
    }
}

async function copyApiUrl() {
    const urlText = document.getElementById('finalApiUrl').innerText;
    if (!urlText) return;

    try {
        await navigator.clipboard.writeText(urlText);
        const btn = document.querySelector('#successCard button.btn-secondary');
        if(btn) {
            const originalText = btn.innerText;
            btn.innerText = "Gekopieerd!";
            setTimeout(() => btn.innerText = originalText, 2000);
        } else {
            alert("URL gekopieerd!");
        }
    } catch (e) {
        alert("Kon URL niet kopiëren.");
    }
}

function dataOverview() {
    window.location.href = 'datasetoverzicht.html';
}