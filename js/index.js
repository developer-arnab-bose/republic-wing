// Sidebar navigation

// const creatInv = ; // create inv
document.getElementById('sidebar-full-section').innerHTML = invoiceSec;

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

    switch (this.id) {
      case "sidebar-invoice":
        document.getElementById('sidebar-full-section').innerHTML = invoiceSec;
        break;
      case "sidebar-product-add":
        document.getElementById('sidebar-full-section').innerHTML = "<iframe src='./inc/product.php' frameborder='0' id='inv-sectin'></iframe>";
        break;
      case "sidebar-inventory":
        document.getElementById('sidebar-full-section').innerHTML = "<iframe src='./inc/inventory.php' frameborder='0' id='inv-sectin'></iframe>";
        break;
      case "sidebar-clients":
        document.getElementById('sidebar-full-section').innerHTML = "clients";
        break;
      case "sidebar-settings":
        document.getElementById('sidebar-full-section').innerHTML = "settings";
        break;

      default:
        break;
    }

  });
});

// Create Invoice button
function createInv(){

  document.getElementById('sidebar-full-section').innerHTML = "<iframe src='./inc/invoice.php' frameborder='0' id='inv-sectin'></iframe>";
  document.getElementById('page-title').textContent = "Create Invoice";
  
}

function home() {
  document.getElementById('sidebar-full-section').innerHTML = invoiceSec;
}

document.getElementById("sidebar-logout").addEventListener("click", () => {
  $.ajax({
    url: window.location.origin + "/inc/logout.php",
    type: "POST",
    success: function (res) {
      res == "OK" ? alert("You have logout successfully") : alert("Some error occoured try again");
      window.location.href = window.location.origin;
    }
  });
})