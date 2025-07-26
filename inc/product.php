<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management | Finance Flow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/product.css">
</head>

<body class="min-h-screen flex flex-col">
    <!-- <div id="bubbles-container" class="fixed inset-0 overflow-hidden pointer-events-none"></div> -->

    <div class="flex-1 flex flex-col md:flex-row">

        <!-- Main Content -->
        <div class="flex-1">
            <div id="success-message" class="success-message">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Product has been added successfully!</span>
                </div>
            </div>

            <div id="error-message" class="error-message">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span id="error-text">Something went wrong. Please try again.</span>
                </div>
            </div>

            <!-- Add Product Tab -->
            <div id="add-product-tab" class="tab-content">
                <div class="card p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Product</h2>
                    <p class="text-sm text-gray-600 mb-6">Fill in the details below to add a new product to your inventory.</p>

                    <form id="add-product-form" class="space-y-6">
                        <!-- Section 1: Product Name, Description, Brand, Tags -->
                        <div class="card p-4 bg-gray-50">
                            <h3 class="text-base font-medium text-gray-800 mb-4">Basic Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Product Name*</label>
                                    <input type="text" class="form-input" id="product-name" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                                    <input type="text" class="form-input" id="brand">
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <input type="text" class="form-input" id="short-description" placeholder="Brief summary of the product">
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                                <div class="flex">
                                    <input type="text" class="form-input rounded-r-none" id="tag-input" placeholder="Add tags and press Enter" disabled>
                                    <button type="button" class="bg-gray-100 px-3 rounded-r-lg border border-l-0 border-gray-300" id="add-tag-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="tag-container" id="tags-container"></div>
                            </div>
                        </div>

                        <!-- Section 2: Image, MRP, Selling Price, Cost Price, Unit, Unit Price -->
                        <div class="card p-4 bg-gray-50">
                            <h3 class="text-base font-medium text-gray-800 mb-4">Product Details</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <!-- Product Images -->
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                                    <div class="image-upload-container" id="image-upload-container">
                                        <input type="file" id="product-images" class="hidden" accept="image/*">
                                        <label for="product-images" class="cursor-pointer">
                                            <div class="flex flex-col items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <p class="text-sm font-medium text-gray-700">Click to upload images</p>
                                                <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF up to 5MB</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="preview-container" id="image-preview-container"></div>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">MRP (₹)*</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">₹</span>
                                            </div>
                                            <input type="number" class="form-input pl-7" id="mrp" step="0.01" min="0" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Selling Price (₹)*</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">₹</span>
                                            </div>
                                            <input type="number" class="form-input pl-7" id="selling-price" step="0.01" min="0" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Cost Price (₹)*</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">₹</span>
                                            </div>
                                            <input type="number" class="form-input pl-7" id="cost-price" step="0.01" min="0" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Unit*</label>
                                        <select class="form-select" id="unit" required>
                                            <option value="">Select unit</option>
                                            <option value="piece">Piece</option>
                                            <option value="kg">Kilogram (kg)</option>
                                            <option value="g">Gram (g)</option>
                                            <option value="l">Liter (l)</option>
                                            <option value="ml">Milliliter (ml)</option>
                                            <option value="m">Meter (m)</option>
                                            <option value="cm">Centimeter (cm)</option>
                                            <option value="box">Box</option>
                                            <option value="pair">Pair</option>
                                            <option value="dozen">Dozen</option>
                                            <option value="pack">Pack</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card p-4 bg-gray-50">
                            <h3 class="text-base font-medium text-gray-800 mb-4">Inventory Settings</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Quantity in Stock*</label>
                                    <input type="number" class="form-input" id="stock-quantity" min="0" required>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Low Stock Alert*</label>
                                    <input type="number" class="form-input" id="low-stock-alert" min="0" placeholder="Notify when stock reaches this level" required>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end space-x-3">
                                <button type="reset" class="btn-secondary" id="reset-form-btn">
                                    Reset Form
                                </button>
                                <button type="submit" class="btn-primary">
                                    Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="credit-footer p-4">
        <p>© 2023 Finance Flow by Republic Wing. All rights reserved.</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../js/product.js"></script>
</body>

</html>