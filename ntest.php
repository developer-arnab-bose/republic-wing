
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management | Finance Flow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f0f4f8;
            overflow-x: hidden;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        }
        .form-input {
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            width: 100%;
            transition: all 0.2s;
        }
        .form-input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
            outline: none;
        }
        .form-select {
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            width: 100%;
            transition: all 0.2s;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
        }
        .form-select:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
            outline: none;
        }
        .btn-primary {
            background-color: #6366f1;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        .btn-primary:hover {
            background-color: #4f46e5;
            box-shadow: 0 4px 6px -1px rgba(99, 102, 241, 0.4);
        }
        .btn-secondary {
            background-color: #f3f4f6;
            color: #4b5563;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        .btn-secondary:hover {
            background-color: #e5e7eb;
        }
        .card {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .credit-footer {
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            margin-top: 20px;
        }
        .bubble {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.3) 0%, rgba(139, 92, 246, 0.3) 100%);
            animation: float 15s infinite ease-in-out;
            z-index: -1;
        }
        @keyframes float {
            0% {
                transform: translateY(0) translateX(0) rotate(0deg);
            }
            33% {
                transform: translateY(-10px) translateX(10px) rotate(5deg);
            }
            66% {
                transform: translateY(10px) translateX(-10px) rotate(-5deg);
            }
            100% {
                transform: translateY(0) translateX(0) rotate(0deg);
            }
        }
        .tab {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s;
            cursor: pointer;
        }
        .tab.active {
            background-color: #f5f7ff;
            color: #6366f1;
            font-weight: 600;
        }
        .tab:hover:not(.active) {
            background-color: #f3f4f6;
        }
        .success-message {
            display: none;
            background-color: #d1fae5;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            color: #059669;
        }
        .error-message {
            display: none;
            background-color: #fee2e2;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            color: #dc2626;
        }
        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .badge-success {
            background-color: #d1fae5;
            color: #059669;
        }
        .badge-warning {
            background-color: #fef3c7;
            color: #d97706;
        }
        .badge-danger {
            background-color: #fee2e2;
            color: #dc2626;
        }
        .tag-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }
        .tag {
            display: flex;
            align-items: center;
            background-color: #f3f4f6;
            border-radius: 0.25rem;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            color: #4b5563;
        }
        .tag button {
            margin-left: 0.25rem;
            color: #9ca3af;
            font-size: 1rem;
            line-height: 0.5;
        }
        .tag button:hover {
            color: #ef4444;
        }
        .product-image-preview {
            width: 100px;
            height: 100px;
            border-radius: 0.5rem;
            object-fit: cover;
            border: 1px solid #e5e7eb;
        }
        .image-upload-container {
            border: 2px dashed #e5e7eb;
            border-radius: 0.5rem;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
        }
        .image-upload-container:hover {
            border-color: #6366f1;
            background-color: #f5f7ff;
        }
        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }
        .preview-item {
            position: relative;
        }
        .preview-remove {
            position: absolute;
            top: -0.5rem;
            right: -0.5rem;
            background-color: #ef4444;
            color: white;
            border-radius: 50%;
            width: 1.25rem;
            height: 1.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            cursor: pointer;
        }
        .recent-products-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 1rem 0;
        }
        .recent-product-card {
            width: calc(25% - 1rem);
            transition: transform 0.2s;
            margin-bottom: 1rem;
        }
        @media (max-width: 1200px) {
            .recent-product-card {
                width: calc(33.333% - 1rem);
            }
        }
        @media (max-width: 768px) {
            .recent-product-card {
                width: calc(50% - 1rem);
            }
        }
        @media (max-width: 480px) {
            .recent-product-card {
                width: 100%;
            }
        }
        .recent-product-card:hover {
            transform: translateY(-5px);
        }
        .recent-product-image {
            width: 100%;
            height: 120px;
            background-color: #f3f4f6;
            border-radius: 0.5rem 0.5rem 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .recent-product-details {
            padding: 0.75rem;
            background-color: white;
            border-radius: 0 0 0.5rem 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .products-line {
            width: 100%;
            overflow-x: auto;
            white-space: nowrap;
            padding: 1rem 0;
            border-top: 1px solid #e5e7eb;
            margin-top: 1rem;
        }
        .product-line-item {
            display: inline-flex;
            align-items: center;
            background-color: white;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            margin-right: 0.75rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .product-line-image {
            width: 2.5rem;
            height: 2.5rem;
            background-color: #f3f4f6;
            border-radius: 0.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <div id="bubbles-container" class="fixed inset-0 overflow-hidden pointer-events-none"></div>

    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-lg gradient-bg flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-lg font-bold text-gray-800">Finance Flow</h1>
                        <p class="text-xs text-gray-500">by Republic Wing</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="hidden md:flex space-x-4 mr-4">
                        <a href="#" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Dashboard</a>
                        <a href="#" class="text-indigo-600 font-medium text-sm">Inventory</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Orders</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Reports</a>
                        <a href="#" class="text-gray-600 hover:text-gray-900 text-sm font-medium">Account</a>
                    </div>
                    <div class="flex items-center">
                        <div class="relative">
                            <button class="flex items-center space-x-2 focus:outline-none">
                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="hidden md:block text-sm font-medium text-gray-700">John Doe</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="flex-1 flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-64 bg-white shadow-sm md:border-r border-gray-200">
            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Inventory Management</h2>
                <nav class="space-y-1">
                    <a href="#" class="tab active flex items-center" data-tab="add-product">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Product
                    </a>
                    <a href="#" class="tab flex items-center" data-tab="product-list">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Product List
                    </a>
                    <a href="#" class="tab flex items-center" data-tab="categories">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Categories
                    </a>
                    <a href="#" class="tab flex items-center" data-tab="inventory-settings">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Settings
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4 md:p-6 lg:p-8">
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
                                    <input type="text" class="form-input rounded-r-none" id="tag-input" placeholder="Add tags and press Enter">
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
                                        <input type="file" id="product-images" class="hidden" accept="image/*" multiple>
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
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Cost Price (₹)</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">₹</span>
                                            </div>
                                            <input type="number" class="form-input pl-7" id="cost-price" step="0.01" min="0">
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-2 gap-4">
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
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Unit Price (₹)*</label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500 sm:text-sm">₹</span>
                                                </div>
                                                <input type="number" class="form-input pl-7" id="unit-price" step="0.01" min="0" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section 3: Low Stock Alert, Add Product, Reset Form -->
                        <div class="card p-4 bg-gray-50">
                            <h3 class="text-base font-medium text-gray-800 mb-4">Inventory Settings</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Quantity in Stock*</label>
                                    <input type="number" class="form-input" id="stock-quantity" min="0" required>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Low Stock Alert</label>
                                    <input type="number" class="form-input" id="low-stock-alert" min="0" placeholder="Notify when stock reaches this level">
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-end space-x-3">
                                <button type="button" class="btn-secondary" id="reset-form-btn">
                                    Reset Form
                                </button>
                                <button type="submit" class="btn-primary">
                                    Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Section 4: Recently Added Products (Larger) -->
                <div class="mt-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-800">Recently Added Products</h3>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium" data-tab="product-list">View All</a>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100" style="min-height: 50vh;">
                        <div class="recent-products-container" id="recent-products-container">
                            <div class="flex items-center text-gray-500 text-sm" id="no-products-message">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                No products added yet. Add your first product above.
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Previous Products Line Display -->
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-700 mb-2">Previously Added Products</h3>
                    <div class="products-line" id="products-line-container">
                        <!-- Products will be added here -->
                    </div>
                </div>
            </div>

            <!-- Product List Tab -->
            <div id="product-list-tab" class="tab-content hidden">
                <div class="card p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Product List</h2>
                    <p class="text-sm text-gray-600 mb-6">Manage your inventory products.</p>
                    
                    <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-3 md:space-y-0">
                        <div class="relative w-full md:w-64">
                            <input type="text" class="form-input pl-10" placeholder="Search products...">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                        
                        <div class="flex space-x-2 w-full md:w-auto">
                            <select class="form-select w-full md:w-auto">
                                <option value="">All Categories</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="home">Home & Kitchen</option>
                                <option value="books">Books</option>
                            </select>
                            
                            <select class="form-select w-full md:w-auto">
                                <option value="">Sort By</option>
                                <option value="name-asc">Name (A-Z)</option>
                                <option value="name-desc">Name (Z-A)</option>
                                <option value="price-asc">Price (Low to High)</option>
                                <option value="price-desc">Price (High to Low)</option>
                                <option value="stock-asc">Stock (Low to High)</option>
                                <option value="stock-desc">Stock (High to Low)</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" id="product-list">
                                <tr>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <div class="h-10 w-10 rounded-md bg-gray-200"></div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Wireless Headphones</div>
                                                <div class="text-xs text-gray-500">Sony</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">SKU-001</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">Electronics</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">₹2,499.00</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">24</td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="badge badge-success">In Stock</span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                        <button class="text-red-600 hover:text-red-900">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <div class="h-10 w-10 rounded-md bg-gray-200"></div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Cotton T-Shirt</div>
                                                <div class="text-xs text-gray-500">Levi's</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">SKU-002</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">Clothing</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">₹799.00</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">56</td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="badge badge-success">In Stock</span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                        <button class="text-red-600 hover:text-red-900">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <div class="h-10 w-10 rounded-md bg-gray-200"></div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Coffee Maker</div>
                                                <div class="text-xs text-gray-500">Philips</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">SKU-003</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">Home & Kitchen</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">₹3,999.00</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="badge badge-warning">Low Stock</span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                        <button class="text-red-600 hover:text-red-900">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <div class="h-10 w-10 rounded-md bg-gray-200"></div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Yoga Mat</div>
                                                <div class="text-xs text-gray-500">Fitness Pro</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">SKU-004</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">Sports & Outdoors</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">₹1,299.00</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">0</td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="badge badge-danger">Out of Stock</span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                        <button class="text-red-600 hover:text-red-900">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="flex justify-between items-center mt-6">
                        <p class="text-sm text-gray-700">
                            Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">4</span> results
                        </p>
                        <div class="flex space-x-1">
                            <button class="btn-secondary px-3 py-2 text-sm">Previous</button>
                            <button class="btn-primary px-3 py-2 text-sm">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other tabs would go here -->
        </div>
    </div>

    <div class="credit-footer p-4">
        <p>© 2023 Finance Flow by Republic Wing. All rights reserved.</p>
    </div>

    <script>
        // Create responsive bubbles
        function createBubbles() {
            const container = document.getElementById('bubbles-container');
            container.innerHTML = ''; // Clear existing bubbles
            
            const viewportWidth = window.innerWidth;
            const viewportHeight = window.innerHeight;
            
            // Calculate number of bubbles based on viewport size
            const bubbleCount = Math.min(Math.floor((viewportWidth * viewportHeight) / 40000), 8);
            
            for (let i = 0; i < bubbleCount; i++) {
                const bubble = document.createElement('div');
                bubble.className = 'bubble';
                
                // Size based on viewport (responsive)
                const size = Math.max(Math.min(viewportWidth, viewportHeight) * (0.1 + Math.random() * 0.15), 50);
                bubble.style.width = `${size}px`;
                bubble.style.height = `${size}px`;
                
                // Position randomly but within viewport
                const posX = Math.random() * (viewportWidth - size);
                const posY = Math.random() * (viewportHeight - size);
                bubble.style.left = `${posX}px`;
                bubble.style.top = `${posY}px`;
                
                // Animation delay
                bubble.style.animationDelay = `${Math.random() * 5}s`;
                
                // Opacity variation
                bubble.style.opacity = 0.3 + Math.random() * 0.3;
                
                container.appendChild(bubble);
            }
        }
        
        // Create bubbles on load and resize
        window.addEventListener('load', createBubbles);
        window.addEventListener('resize', createBubbles);
        
        // Tab navigation
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', function(e) {
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
            
            tag.querySelector('.remove-tag').addEventListener('click', function() {
                tag.remove();
            });
            
            tagsContainer.appendChild(tag);
            tagInput.value = '';
        }
        
        addTagBtn.addEventListener('click', function() {
            addTag(tagInput.value);
        });
        
        tagInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addTag(this.value);
            }
        });
        
        // Image upload preview
        const productImagesInput = document.getElementById('product-images');
        const imagePreviewContainer = document.getElementById('image-preview-container');
        
        productImagesInput.addEventListener('change', function() {
            for (const file of this.files) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const previewItem = document.createElement('div');
                        previewItem.className = 'preview-item';
                        previewItem.innerHTML = `
                            <img src="${e.target.result}" alt="Product image" class="product-image-preview">
                            <div class="preview-remove">&times;</div>
                        `;
                        
                        previewItem.querySelector('.preview-remove').addEventListener('click', function() {
                            previewItem.remove();
                        });
                        
                        imagePreviewContainer.appendChild(previewItem);
                    };
                    
                    reader.readAsDataURL(file);
                }
            }
        });
        
        // Store for recently added products
        let recentProducts = [];
        
        // Function to create a product card for the recent products section
        function createRecentProductCard(product) {
            const card = document.createElement('div');
            card.className = 'recent-product-card';
            
            // Determine badge class based on stock
            let badgeClass = 'badge-success';
            let stockStatus = 'In Stock';
            
            if (product.stockQuantity <= 0) {
                badgeClass = 'badge-danger';
                stockStatus = 'Out of Stock';
            } else if (product.lowStockAlert && product.stockQuantity <= product.lowStockAlert) {
                badgeClass = 'badge-warning';
                stockStatus = 'Low Stock';
            }
            
            card.innerHTML = `
                <div class="recent-product-image">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="recent-product-details">
                    <h4 class="text-sm font-medium text-gray-800 truncate">${product.name}</h4>
                    <div class="flex items-center justify-between mt-1">
                        <span class="text-xs text-gray-500">${product.brand || 'No Brand'}</span>
                        <span class="badge ${badgeClass} text-xs">${stockStatus}</span>
                    </div>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-sm font-medium text-gray-900">₹${parseFloat(product.sellingPrice).toFixed(2)}</span>
                        <span class="text-xs text-gray-500">${product.stockQuantity} in stock</span>
                    </div>
                </div>
            `;
            
            return card;
        }
        
        // Function to create a product line item for the bottom display
        function createProductLineItem(product) {
            const item = document.createElement('div');
            item.className = 'product-line-item';
            
            item.innerHTML = `
                <div class="product-line-image">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-medium text-gray-800">${product.name}</div>
                    <div class="text-xs text-gray-500">₹${parseFloat(product.sellingPrice).toFixed(2)}</div>
                </div>
            `;
            
            return item;
        }
        
        // Function to update the recent products section
        function updateRecentProducts() {
            const container = document.getElementById('recent-products-container');
            const noProductsMessage = document.getElementById('no-products-message');
            
            if (recentProducts.length > 0) {
                // Hide the "no products" message
                if (noProductsMessage) {
                    noProductsMessage.style.display = 'none';
                }
                
                // Clear container except for the message
                while (container.firstChild && container.firstChild !== noProductsMessage) {
                    container.removeChild(container.firstChild);
                }
                
                // Add product cards
                recentProducts.forEach(product => {
                    container.appendChild(createRecentProductCard(product));
                });
            } else {
                // Show the "no products" message
                if (noProductsMessage) {
                    noProductsMessage.style.display = 'flex';
                }
            }
            
            // Update the products line display
            const lineContainer = document.getElementById('products-line-container');
            lineContainer.innerHTML = '';
            
            recentProducts.forEach(product => {
                lineContainer.appendChild(createProductLineItem(product));
            });
        }
        
        // Form submission
        const addProductForm = document.getElementById('add-product-form');
        const successMessage = document.getElementById('success-message');
        const errorMessage = document.getElementById('error-message');
        const resetFormBtn = document.getElementById('reset-form-btn');
        
        addProductForm.addEventListener('submit', function(e) {
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
            const formData = {
                name: document.getElementById('product-name').value,
                brand: document.getElementById('brand').value,
                tags: Array.from(tagsContainer.querySelectorAll('.tag')).map(tag => 
                    tag.textContent.trim().slice(0, -1)
                ),
                mrp: document.getElementById('mrp').value,
                sellingPrice: document.getElementById('selling-price').value,
                costPrice: document.getElementById('cost-price').value,
                unit: document.getElementById('unit').value,
                unitPrice: document.getElementById('unit-price').value,
                stockQuantity: document.getElementById('stock-quantity').value,
                lowStockAlert: document.getElementById('low-stock-alert').value,
                shortDescription: document.getElementById('short-description').value
            };
            
            console.log('Product Data:', formData);
            
            // Show success message
            successMessage.style.display = 'block';
            
            // Hide success message after 3 seconds
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000);
            
            // Add to recent products (limit to 10)
            recentProducts.unshift(formData);
            if (recentProducts.length > 10) {
                recentProducts.pop();
            }
            
            // Update the recent products display
            updateRecentProducts();
            
            // Reset form
            addProductForm.reset();
            tagsContainer.innerHTML = '';
            imagePreviewContainer.innerHTML = '';
        });
        
        // Reset form button
        resetFormBtn.addEventListener('click', function() {
            addProductForm.reset();
            tagsContainer.innerHTML = '';
            imagePreviewContainer.innerHTML = '';
        });
        
        // Initialize with sample data for recent products
        const sampleProducts = [
            {
                name: "Wireless Headphones",
                brand: "Sony",
                sellingPrice: "2499.00",
                stockQuantity: "24",
                lowStockAlert: "5"
            },
            {
                name: "Cotton T-Shirt",
                brand: "Levi's",
                sellingPrice: "799.00",
                stockQuantity: "56",
                lowStockAlert: "10"
            },
            {
                name: "Coffee Maker",
                brand: "Philips",
                sellingPrice: "3999.00",
                stockQuantity: "3",
                lowStockAlert: "5"
            },
            {
                name: "Yoga Mat",
                brand: "Fitness Pro",
                sellingPrice: "1299.00",
                stockQuantity: "0",
                lowStockAlert: "5"
            }
        ];
        
        // Add sample products to recent products
        recentProducts = [...sampleProducts];
        
        // Update the recent products display on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateRecentProducts();
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9638b5946145470a',t:'MTc1MzI0NzgyNC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
