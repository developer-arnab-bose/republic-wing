// Tags functionality
const tagInput = document.getElementById('tag-input');
const addTagBtn = document.getElementById('add-tag-btn');
const tagsContainer = document.getElementById('tags-container');

function addTag(tagText) {
  if (!tagText.trim()) return;

  // Check if tag already exists
  const existingTags = Array.from(tagsContainer.querySelectorAll('.tag')).map(tag =>
    tag.textContent.trim().slice(0, -1) // Remove the "×" character
  );

  if (existingTags.includes(tagText.trim())) return;

  const tag = document.createElement('div');
  tag.className = 'tag';
  tag.innerHTML = `
                ${tagText}
                <button type="button" class="remove-tag">&times;</button>
            `;

  tag.querySelector('.remove-tag').addEventListener('click', function () {
    tag.remove();
  });

  tagsContainer.appendChild(tag);
  tagInput.value = '';
}

addTagBtn.addEventListener('click', function () {
  addTag(tagInput.value);
});

tagInput.addEventListener('keydown', function (e) {
  if (e.key === 'Enter') {
    e.preventDefault();
    addTag(this.value);
  }
});

// Image upload preview
const productImagesInput = document.getElementById('product-images');
const imagePreviewContainer = document.getElementById('image-preview-container');

productImagesInput.addEventListener('change', function () {
  for (const file of this.files) {
    if (file.type.startsWith('image/')) {
      const reader = new FileReader();

      reader.onload = function (e) {
        const previewItem = document.createElement('div');
        previewItem.className = 'preview-item';
        previewItem.innerHTML = `
                            <img src="${e.target.result}" alt="Product image" class="product-image-preview">
                            <div class="preview-remove">&times;</div>
                        `;

        previewItem.querySelector('.preview-remove').addEventListener('click', function () {
          previewItem.remove();
        });

        imagePreviewContainer.appendChild(previewItem);
      };

      reader.readAsDataURL(file);
    }
  }
});

// Form submission
const addProductForm = document.getElementById('add-product-form');
const successMessage = document.getElementById('success-message');
const errorMessage = document.getElementById('error-message');
const resetFormBtn = document.getElementById('reset-form-btn');

addProductForm.addEventListener('submit', function (e) {
  e.preventDefault();

  // Validate form
  const requiredFields = addProductForm.querySelectorAll('[required]');
  let isValid = true;

  requiredFields.forEach(field => {
    if (!field.value.trim()) {
      isValid = false;
      field.classList.add('border-red-500');
    } else {
      field.classList.remove('border-red-500');
    }
  });

  if (!isValid) {
    errorMessage.style.display = 'block';
    document.getElementById('error-text').textContent = 'Please fill in all required fields.';

    // Hide error message after 3 seconds
    setTimeout(() => {
      errorMessage.style.display = 'none';
    }, 3000);

    return;
  }

  // Collect form data
  const createProductData = {
    name: document.getElementById('product-name').value,
    brand: document.getElementById('brand').value,
    tags: Array.from(tagsContainer.querySelectorAll('.tag')).map(tag =>
      tag.textContent.trim().slice(0, -1)
    ),
    mrp: document.getElementById('mrp').value,
    sellingPrice: document.getElementById('selling-price').value,
    costPrice: document.getElementById('cost-price').value,
    unit: document.getElementById('unit').value,
    stockQuantity: document.getElementById('stock-quantity').value,
    lowStockAlert: document.getElementById('low-stock-alert').value,
    shortDescription: document.getElementById('short-description').value,
    image: document.getElementById('product-images').files[0]
  };

  // console.log('Product Data:', createProductData);
  let createProduct = new FormData();
  createProduct.append("name", createProductData.name);
  createProduct.append("brand", createProductData.brand);
  createProduct.append("mrp", createProductData.mrp);
  createProduct.append("sell", createProductData.sellingPrice);
  createProduct.append("cost", createProductData.costPrice);
  createProduct.append("unit", createProductData.unit);
  createProduct.append("qty", createProductData.stockQuantity);
  createProduct.append("low", createProductData.lowStockAlert);
  createProduct.append("description", createProductData.shortDescription);
  if (createProductData.image) {
    createProduct.append("image", createProductData.image);
    $.ajax({
      url: "../inc/cr-product.php",
      type: "POST",
      data: createProduct,
      contentType: false,
      processData: false,
      success: function (res) {

        // if (res == "OK") {

        // }
        // Show success message
        successMessage.style.display = 'block';

        // Hide success message after 3 seconds
        setTimeout(() => {
          successMessage.style.display = 'none';
        }, 5000);

        // Reset form
        addProductForm.reset();
        tagsContainer.innerHTML = '';
        imagePreviewContainer.innerHTML = '';
      }
    });
  } else {
    alert("Please choose an image");
  }
});

// Reset form button
resetFormBtn.addEventListener('click', function () {
  addProductForm.reset();
  tagsContainer.innerHTML = '';
  imagePreviewContainer.innerHTML = '';
});