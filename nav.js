// Load the sidebar from an external file

document.addEventListener("DOMContentLoaded", function() {
    fetch('navigation.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('sidebar').innerHTML = data;
        })
        .catch(error => console.error('Error loading sidebar:', error));
});
// This script should also be included in sidebar.js
const currentPage = window.location.pathname.split('/').pop(); // Get current page name

// Add 'active' class to the corresponding sidebar link
document.querySelectorAll('.sidebar ul li a').forEach(link => {
    if (link.getAttribute('href') === currentPage) {
        link.classList.add('active');
    }
});


