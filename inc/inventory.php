<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management | Finance Flow Technology</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/inventory.css">
</head>
<div class="flex-1">
    <!-- Product List Tab -->
    <div id="product-list-tab" class="tab-content">
        <div class="card p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Product List</h2>
            <p class="text-sm text-gray-600 mb-6">Manage your inventory products.</p>

            <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-3 md:space-y-0">
                <div class="relative w-full md:w-64">
                    <input type="text" class="form-input pl-10" placeholder="Search products..." id="product-search">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <div class="flex space-x-2 w-full md:w-auto">

                    <select class="form-select w-full md:w-auto" id="sort-input">
                        <option value="name_asc" selected>Name (A-Z)</option>
                        <option value="name_desc">Name (Z-A)</option>
                        <option value="sell_asc">Price (Low to High)</option>
                        <option value="sell_desc">Price (High to Low)</option>
                        <option value="qty_asc">Stock (Low to High)</option>
                        <option value="qty_desc">Stock (High to Low)</option>
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
                    </tbody>
                </table>
            </div>

            <!-- <div class="flex justify-between items-center mt-6">
                <p class="text-sm text-gray-700">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">4</span> results
                </p>
                <div class="flex space-x-1">
                    <button class="btn-secondary px-3 py-2 text-sm">Previous</button>
                    <button class="btn-primary px-3 py-2 text-sm">Next</button>
                </div>
            </div> -->
        </div>
    </div>

    <div class="credit-footer p-4">
        <p>© 2023 Finance Flow Technology by Republic Wing. All rights reserved.</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../js/inventory.js"></script>
    </body>

</html>