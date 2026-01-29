let currentPreviewData = [];
let currentFileName = "";
let rowsToShow = 5;
let excludedColumns = new Set();

let lastToken = null;
let lastUrl = null;
const ownerId = "test-user-123";
async function uploadFile() {
    const fileInput = document.getElementById('fileInput');
    if (!fileInput.files[0]) return alert("Selecteer een bestand.");

    currentFileName = fileInput.files[0].name;
    const formData = new FormData();
    formData.append('file', fileInput.files[0]);

    try {
        const response = await fetch('/api/import/preview', {method: 'POST', body: formData});
        currentPreviewData = await response.json();
        rowsToShow = 5;
        excludedColumns.clear();
        renderPreview();
    } catch (error) {
        alert("Fout bij het laden van preview.");
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
            <th style="...">
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
            bodyHtml += `<td style="...">${row[h] || ''}</td>`;
        });
        bodyHtml += '</tr>';
    });
    bodyHtml += '</tbody>';

    table.innerHTML = headerHtml + bodyHtml;

    document.getElementById('previewCard').style.display = 'block';
    document.getElementById('tableControls').style.display = currentPreviewData.length > rowsToShow ? 'block' : 'none';
    document.getElementById('jsonPreview').textContent = JSON.stringify(getFilteredData(), null, 2);
}

function switchView(view) {
    const tableView = document.getElementById('tableView');
    const jsonView = document.getElementById('jsonView');

    if (view === 'table') {
        tableView.style.display = 'block';
        jsonView.style.display = 'none';
    } else {
        tableView.style.display = 'none';
        jsonView.style.display = 'block';
    }
}

function toggleColumn(columnName) {
    if (excludedColumns.has(columnName)) excludedColumns.delete(columnName);
    else excludedColumns.add(columnName);
    renderPreview();
}

function showMoreRows() {
    rowsToShow += 10;
    renderPreview();
}

function getFilteredData() {
    return currentPreviewData.map(row => {
        const newRow = { ...row };
        delete newRow.id;
        excludedColumns.forEach(col => delete newRow[col]);
        return newRow;
    });
}


function setTokenUI(token) {
    lastToken = token;
    lastUrl = token ? `${location.origin}/api/query/${encodeURIComponent(token)}?ownerId=${encodeURIComponent(ownerId)}` : null;

    let tokenBox = document.getElementById('urlTokenBox');
    if (!tokenBox) {
        const previewCard = document.getElementById('previewCard');
        tokenBox = document.createElement('div');
        tokenBox.id = 'urlTokenBox';
        tokenBox.style.marginTop = '12px';
        tokenBox.innerHTML = `
            <div style="...">
                <div style="...">
                    <strong>Token:</strong>
                    <code id="urlToken" style="..."></code>
                </div>

                <div style="...">
                    <strong>Query URL:</strong>
                    <code id="apiUrlText" style="..."></code>
                    <button onclick="copyApiUrl()">Kopieer URL</button>
                    <a id="tokenUrlLink" href="#" target="_blank" style="..."> Open in browser</a>
                </div>
            </div>
        `;
        previewCard.appendChild(tokenBox);
    }
    document.getElementById('urlToken').innerText = token || "";
    document.getElementById('apiUrlText').innerText = lastUrl || "";
    document.getElementById('tokenUrlLink').href = lastUrl || "#";

    const link = document.getElementById('tokenUrlLink');
    link.href = lastUrl || "#";
}

async function confirmUpload() {
    const filteredData = getFilteredData();

    const response = await fetch(`/api/import/confirm?filename=${encodeURIComponent(currentFileName)}&ownerId=${encodeURIComponent(ownerId)}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(filteredData)
    });

    if (response.ok) {
        const result = await response.json();
        const token = result.token;
        setTokenUI(token);
        alert("Opgeslagen! token gegenereerd. Jouw token is: " + token);
    } else {
        alert("Fout bij het opslaan van gegevens.");

    }
}
async function copyApiUrl() {
    if (!lastUrl) return alert("Geen URL om te kopiëren.");

    try {
        await navigator.clipboard.writeText(lastUrl);
        alert("URL gekopieerd naar klembord.");
    } catch (e) {
        alert("Kon URL niet kopiëren. Probeer een modernere browser.");
    }

}