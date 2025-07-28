let debounceTimer;
let sortData = "";
let searchData = "";

viewer("", "null");

function viewer(search, sort) {
  $.ajax({
    url: "../inc/product-list.php",
    type: "POST",
    data: { search: search, sort: sort },
    success: function (res) {
      document.getElementById("product-list").innerHTML = res;
    }
  });
}

document.getElementById('product-search').addEventListener('input', function () {
  clearTimeout(debounceTimer);
  searchData = this.value;

  debounceTimer = setTimeout(function () {
    viewer(searchData, sortData);
  }, 400); // 500 ms delay (adjust as needed)
});

document.getElementById("sort-input").addEventListener("change", function () {
  sortData = this.value;
  viewer(searchData, sortData);
});

function prDelete(id) {
  let calrify = confirm("This product will be deleted");
  if (calrify) {
    $.ajax({
      url: "../inc/delete.php",
      type: "POST",
      data: { id: id },
      success: function (res) {
        viewer(searchData, sortData);
        console.log(res);
      }
    });
  }
}