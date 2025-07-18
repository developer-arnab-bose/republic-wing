// Sidebar navigation
document.querySelectorAll('.sidebar-item').forEach(item => {
  item.addEventListener('click', function () {
    // Remove active class from all sidebar items
    document.querySelectorAll('.sidebar-item').forEach(i => {
      i.classList.remove('active');
    });

    // Add active class to clicked item
    this.classList.add('active');

    // Update page title
    const pageTitle = document.getElementById('page-title');
    pageTitle.textContent = this.textContent.trim();
  });
});

// Create Invoice button
document.getElementById('create-invoice-btn').addEventListener('click', function () {
  window.location.href = window.location.origin + "/invoice";
});