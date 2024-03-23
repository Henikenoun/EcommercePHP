const searchInput = document.querySelector('#searchInput');
const table = document.querySelector('#mytable');
const rows = table.querySelectorAll('tbody tr')
let currentPage = 1;
let rowsPerPage = 10;
const tbody = table.querySelector('tbody');
const rowsPerPageSelect = document.querySelector('#rowsPerPageSelect');
const prevBtn = document.querySelector('#prevBtn');
const nextBtn = document.querySelector('#nextBtn');
const currentPageSpan = document.querySelector('#currentPage');
const numPagesSpan = document.querySelector('#numPages');
const pagination = document.querySelector('.pagination');
function updateTable() {
// Calculate start and end index of rows to show
const startIndex = (currentPage - 1) * rowsPerPage;
const endIndex = startIndex + rowsPerPage;
// Show/hide table rows based on index
const rows = tbody.querySelectorAll('tr');
for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    if (i >= startIndex && i < endIndex) {
    row.style.display = '';
    } else {
    row.style.display = 'none';
    }
}
// Update current page and number of pages
currentPageSpan.textContent = currentPage;
numPagesSpan.textContent = Math.ceil(rows.length / rowsPerPage);
// Create pagination buttons
pagination.innerHTML = '';
const numPages = Math.ceil(rows.length / rowsPerPage);
if (numPages > 1) {
    // Add "Previous" button
    const prevLi = document.createElement('li');
    const prevA = document.createElement('a');
    prevLi.style.border= "#dddddd 1px solid";      
    prevLi.style.padding= "10px";  
    prevA.style.textDecoration= "none";  
    prevA.href = '#';
    prevA.textContent = 'Previous';
    prevLi.appendChild(prevA);
    pagination.appendChild(prevLi);
    // Add page buttons
    let startPage = Math.max(1, currentPage - 1);
    let endPage = Math.min(numPages, startPage + 2);
    if (currentPage === numPages) {
    startPage = Math.max(1, currentPage - 2);
    endPage = currentPage;
    }
    for (let i = startPage; i <= endPage; i++) {
    const li = document.createElement('li');
    const a = document.createElement('a');
    a.href = '#';
    a.textContent = i;
    li.style.border= "#dddddd 1px solid";      
    li.style.padding= "10px";    
    a.style.textDecoration= "none";  
    if (i === currentPage) {
        li.classList.add('active');
    }
    li.appendChild(a);
    pagination.appendChild(li);
    }
    // Add "Next" button
    const nextLi = document.createElement('li');
    const nextA = document.createElement('a');
    nextLi.style.border= "#dddddd 1px solid";      
    nextLi.style.padding= "10px";  
    nextA.style.textDecoration= "none";  
    nextA.href = '#';
    nextA.textContent = 'Next';
    nextLi.appendChild(nextA);
    pagination.appendChild(nextLi);
}
}
function prevPage() {
if (currentPage > 1) {
    currentPage--;
    updateTable();
}
}
function nextPage() {
if (currentPage < Math.ceil(tbody.querySelectorAll('tr').length / rowsPerPage)) {
    currentPage++;
    updateTable();
}
}
rowsPerPageSelect.addEventListener('change', () => {
rowsPerPage = Number(rowsPerPageSelect.value);
currentPage = 1;
updateTable();
});
pagination.addEventListener('click', (event) => {
const target = event.target;
if (target.tagName === 'A') {
    event.preventDefault();
    if (target.textContent === 'Previous') {
    prevPage();
    } else if (target.textContent === 'Next') {
    nextPage();
    } else {
    currentPage = Number(target.textContent);
    updateTable();
    }
}
});
updateTable();
if(table){
    searchInput.addEventListener('keyup', function() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].querySelectorAll('td');
            let found = false;

            for (let j = 0; j < cells.length; j++) {
                const cellText = cells[j].textContent.toLowerCase();
                if (cellText.startsWith(searchTerm)) {
                    found = true;
                    break;
                }
            }
            if(searchTerm==''){

                updateTable();

            }
            if (found) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
}