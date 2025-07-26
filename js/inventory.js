
// Tab navigation
document.querySelectorAll('.tab').forEach(tab => {
  tab.addEventListener('click', function (e) {
    e.preventDefault();

    // Remove active class from all tabs
    document.querySelectorAll('.tab').forEach(t => {
      t.classList.remove('active');
    });

    // Add active class to clicked tab
    this.classList.add('active');

    // Hide all tab content
    document.querySelectorAll('.tab-content').forEach(content => {
      content.classList.add('hidden');
    });

    // Show the corresponding tab content
    const tabId = this.getAttribute('data-tab');
    document.getElementById(`${tabId}-tab`).classList.remove('hidden');
  });
});