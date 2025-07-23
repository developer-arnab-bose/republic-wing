<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Invoice - Finance Flow</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/invoice.css">
</head>

<body>
    <div class="min-h-screen bg-gray-50 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Create New Invoice</h1>
                    <p class="mt-1 text-sm text-gray-500">Fill in the details below to create a new invoice</p>
                </div>
                <div class="flex space-x-3">
                    <button id="cancel-invoice"
                        class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button id="save-draft"
                        class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save as Draft
                    </button>
                    <button id="save-invoice"
                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save & Send
                    </button>
                </div>
            </div>

            <!-- Invoice Form -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <!-- Shop Details Section -->
                    <div class="mb-8 border-b border-gray-200 pb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Shop Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <div class="input-group">
                                    <label for="shop-name">Shop Name</label>
                                    <input type="text" id="shop-name" value="Finance Flow"
                                        placeholder="Enter your shop name">
                                </div>

                                <!-- Logo Upload Section -->
                                <div class="mb-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-700">Business Logo</label>
                                    <div class="flex items-start space-x-4">
                                        <div class="logo-preview" id="logo-preview">
                                            <!-- Default logo SVG -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <label class="logo-upload-btn" for="logo-upload">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                </svg>
                                                Upload Logo
                                            </label>
                                            <input type="file" id="logo-upload" accept="image/*" class="hidden"
                                                onchange="previewLogo(event)">
                                            <div class="logo-actions">
                                                <button id="remove-logo" class="text-sm text-red-600 hover:text-red-800"
                                                    onclick="removeLogo()">Remove</button>
                                                <button id="default-logo"
                                                    class="text-sm text-blue-600 hover:text-blue-800"
                                                    onclick="useDefaultLogo()">Use Default</button>
                                            </div>
                                            <p class="mt-1 text-xs text-gray-500">Recommended size: 100x100px</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="shop-phone">Phone Number</label>
                                <input type="tel" id="shop-phone" value="(+91) 9876543210"
                                    placeholder="Enter phone number">
                            </div>
                            <div class="input-group">
                                <label for="shop-gstin">GSTIN</label>
                                <input type="text" id="shop-gstin" value="27AABCT1234Z1ZA" placeholder="Enter GSTIN">
                            </div>
                            <div class="input-group md:col-span-3">
                                <label for="shop-address">Address</label>
                                <textarea id="shop-address" rows="2" placeholder="Enter shop address"
                                    class="resize-none">123 Business Street, City, State 400001</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Left Column -->
                        <div>
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="bg-blue-600 text-white p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="font-bold text-lg text-gray-800">Finance Flow</h2>
                                    <p class="text-xs text-gray-500">Invoice Management System</p>
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="invoice-number">Invoice Number</label>
                                <input type="text" id="invoice-number" value="INV-0013" readonly class="bg-gray-50">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="input-group">
                                    <label for="invoice-date">Invoice Date</label>
                                    <input type="date" id="invoice-date" value="2023-05-15">
                                </div>
                                <div class="input-group">
                                    <label for="due-date">Due Date</label>
                                    <input type="date" id="due-date" value="2023-05-29">
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="reference">Reference/PO Number (Optional)</label>
                                <input type="text" id="reference" placeholder="Enter reference or PO number">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="input-group">
                                    <label for="invoice-type">Invoice Type</label>
                                    <select id="invoice-type">
                                        <option value="standard">Standard Invoice</option>
                                        <option value="retail" selected>Retail Invoice</option>
                                        <option value="wholesale">Wholesale Invoice</option>
                                        <option value="tax">Tax Invoice</option>
                                        <option value="gst">GST Invoice</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label for="payment-status">Payment Status</label>
                                    <select id="payment-status" onchange="updatePaymentStatus()">
                                        <option value="due" selected>Due</option>
                                        <option value="paid">Paid</option>
                                        <option value="partly">Partly Paid</option>
                                    </select>
                                </div>
                            </div>

                            <div id="partly-paid-section" class="input-group hidden">
                                <label for="amount-paid">Amount Paid</label>
                                <div class="flex items-center">
                                    <span class="text-gray-500 mr-1">₹</span>
                                    <input type="number" id="amount-paid" class="w-full" step="0.01" min="0"
                                        value="0.00" onchange="updatePartlyPaid()">
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div>
                            <div class="input-group">
                                <label for="client">Select Client</label>
                                <div class="relative">
                                    <select id="client" class="appearance-none">
                                        <option value="">Select a client</option>
                                        <option value="1">Fresh Mart (john@freshmart.com)</option>
                                        <option value="2">City Grocers (sarah@citygrocers.com)</option>
                                        <option value="3">Sunshine Foods (mike@sunshinefoods.com)</option>
                                        <option value="4">Metro Supermarket (lisa@metrosuper.com)</option>
                                        <option value="5">Green Valley (alex@greenvalley.com)</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div id="client-details" class="border border-gray-200 rounded-lg p-4 mb-4 hidden">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-medium text-gray-900" id="client-name">Fresh Mart</h3>
                                        <p class="text-sm text-gray-500" id="client-email">john@freshmart.com</p>
                                        <p class="text-sm text-gray-500" id="client-address">123 Market St, San
                                            Francisco, CA 94103</p>
                                        <p class="text-sm text-gray-500" id="client-phone">(415) 555-1234</p>
                                    </div>
                                    <button class="text-blue-600 text-sm hover:text-blue-800">Edit</button>
                                </div>
                            </div>

                            <button id="add-new-client"
                                class="w-full flex items-center justify-center px-4 py-2 border border-dashed border-gray-300 rounded-md text-sm font-medium text-blue-600 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Add New Client
                            </button>

                            <div class="input-group">
                                <label for="payment-terms">Payment Terms</label>
                                <select id="payment-terms">
                                    <option value="14">Net 14 days</option>
                                    <option value="30" selected>Net 30 days</option>
                                    <option value="60">Net 60 days</option>
                                    <option value="0">Due on receipt</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <label for="print-format">Print Format</label>
                                <select id="print-format">
                                    <option value="standard">Standard (A4/Letter)</option>
                                    <option value="thermal" selected>Thermal Printer (80mm)</option>
                                    <option value="compact">Compact (Half Page)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Items -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Invoice Items</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Item</th>
                                        <th scope="col"
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description</th>
                                        <th scope="col"
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            MRP</th>
                                        <th scope="col"
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Quantity</th>
                                        <th scope="col"
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Unit Price</th>
                                        <th scope="col"
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tax</th>
                                        <th scope="col"
                                            class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Total</th>
                                        <th scope="col" class="relative px-4 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="invoice-items" class="bg-white divide-y divide-gray-200">
                                    <tr class="item-row">
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <input type="text" class="item-name border-0 focus:ring-0 w-full"
                                                placeholder="Item name" value="Fresh Milk">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="text" class="item-desc border-0 focus:ring-0 w-full"
                                                placeholder="Description" value="Organic whole milk, 1 liter">
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="text-gray-500 mr-1">₹</span>
                                                <input type="number"
                                                    class="item-mrp border-0 focus:ring-0 w-20 mrp-field" step="0.01"
                                                    min="0" value="80.00" readonly>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <input type="number" class="item-qty border-0 focus:ring-0 w-20" min="1"
                                                value="10" onchange="updateItemTotal(this)">
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="text-gray-500 mr-1">₹</span>
                                                <input type="number" class="item-price border-0 focus:ring-0 w-20"
                                                    step="0.01" min="0" value="75.00" onchange="updateItemTotal(this)">
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <select class="item-tax border-0 focus:ring-0 bg-transparent"
                                                onchange="updateItemTotal(this)">
                                                <option value="0">0%</option>
                                                <option value="5" selected>5%</option>
                                                <option value="12">12%</option>
                                                <option value="18">18%</option>
                                                <option value="28">28%</option>
                                            </select>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap font-medium text-gray-900">
                                            ₹<span class="item-total">787.50</span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="delete-btn text-red-600 hover:text-red-900"
                                                onclick="removeItem(this)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="item-row">
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <input type="text" class="item-name border-0 focus:ring-0 w-full"
                                                placeholder="Item name" value="Whole Wheat Bread">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input type="text" class="item-desc border-0 focus:ring-0 w-full"
                                                placeholder="Description" value="Organic whole wheat bread, 400g loaf">
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="text-gray-500 mr-1">₹</span>
                                                <input type="number"
                                                    class="item-mrp border-0 focus:ring-0 w-20 mrp-field" step="0.01"
                                                    min="0" value="65.00" readonly>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <input type="number" class="item-qty border-0 focus:ring-0 w-20" min="1"
                                                value="15" onchange="updateItemTotal(this)">
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <span class="text-gray-500 mr-1">₹</span>
                                                <input type="number" class="item-price border-0 focus:ring-0 w-20"
                                                    step="0.01" min="0" value="60.00" onchange="updateItemTotal(this)">
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <select class="item-tax border-0 focus:ring-0 bg-transparent"
                                                onchange="updateItemTotal(this)">
                                                <option value="0">0%</option>
                                                <option value="5" selected>5%</option>
                                                <option value="12">12%</option>
                                                <option value="18">18%</option>
                                                <option value="28">28%</option>
                                            </select>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap font-medium text-gray-900">
                                            ₹<span class="item-total">945.00</span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="delete-btn text-red-600 hover:text-red-900"
                                                onclick="removeItem(this)">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            <button id="add-item" class="flex items-center text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Add Item
                            </button>
                        </div>
                    </div>

                    <!-- Invoice Summary -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="input-group">
                                <label for="notes">Notes</label>
                                <textarea id="notes" rows="3" placeholder="Enter any notes for the client"
                                    class="resize-none">Thank you for your business. Payment is due within 30 days of invoice date.</textarea>
                            </div>

                            <div class="input-group">
                                <label for="terms">Terms & Conditions</label>
                                <textarea id="terms" rows="3" placeholder="Enter terms and conditions"
                                    class="resize-none">Late payments are subject to a 1.5% monthly finance charge. All goods remain the property of Finance Flow until paid in full.</textarea>
                            </div>

                            <div class="input-group">
                                <label for="footer-text">Receipt Footer Text</label>
                                <textarea id="footer-text" rows="2"
                                    placeholder="Enter text to appear at the bottom of receipts"
                                    class="resize-none">Thank you for shopping with us! Visit us again soon.</textarea>
                            </div>
                        </div>

                        <div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between py-2 text-sm">
                                    <span class="text-gray-600">Subtotal:</span>
                                    <span class="font-medium text-gray-900">₹<span id="subtotal">1,950.00</span></span>
                                </div>
                                <div class="flex justify-between py-2 text-sm">
                                    <span class="text-gray-600">Tax:</span>
                                    <span class="font-medium text-gray-900">₹<span id="tax-total">97.50</span></span>
                                </div>
                                <div class="flex justify-between py-2 text-sm">
                                    <span class="text-gray-600">Discount:</span>
                                    <div class="flex items-center">
                                        <input type="number" id="discount"
                                            class="w-16 p-1 border border-gray-300 rounded mr-2" value="0" min="0"
                                            max="100">
                                        <select id="discount-type" class="p-1 border border-gray-300 rounded">
                                            <option value="percentage">%</option>
                                            <option value="fixed">₹</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-between py-2 text-sm">
                                    <span class="text-gray-600">Shipping:</span>
                                    <div class="flex items-center">
                                        <span class="text-gray-500 mr-1">₹</span>
                                        <input type="number" id="shipping"
                                            class="w-20 p-1 border border-gray-300 rounded" value="0" min="0"
                                            step="0.01">
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 mt-2 pt-2 flex justify-between items-center">
                                    <span class="font-medium text-gray-900">Total:</span>
                                    <span class="text-xl font-bold text-blue-600">₹<span
                                            id="grand-total">2,047.50</span></span>
                                </div>

                                <!-- Payment Status Summary -->
                                <div id="payment-status-summary" class="mt-4 pt-2 border-t border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <div id="status-indicator" class="w-3 h-3 rounded-full bg-red-500 mr-2">
                                            </div>
                                            <span id="status-text" class="font-medium">Due</span>
                                        </div>
                                        <div id="payment-badge"
                                            class="px-2 py-1 rounded-full text-xs font-medium status-due">
                                            Payment Due
                                        </div>
                                    </div>

                                    <div id="payment-details" class="mt-2 hidden">
                                        <div class="flex justify-between py-1 text-sm">
                                            <span class="text-gray-600">Amount Paid:</span>
                                            <span class="font-medium text-gray-900">₹<span
                                                    id="amount-paid-display">0.00</span></span>
                                        </div>
                                        <div class="flex justify-between py-1 text-sm">
                                            <span class="text-gray-600">Balance Due:</span>
                                            <span class="font-medium text-gray-900">₹<span
                                                    id="balance-due">2,047.50</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <div class="input-group">
                                    <label for="payment-method">Accepted Payment Methods</label>
                                    <div class="flex flex-wrap gap-2">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600" checked>
                                            <span class="ml-2 text-sm text-gray-700">Bank Transfer</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600" checked>
                                            <span class="ml-2 text-sm text-gray-700">UPI</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                                            <span class="ml-2 text-sm text-gray-700">PayTM</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600">
                                            <span class="ml-2 text-sm text-gray-700">Credit Card</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600" checked>
                                            <span class="ml-2 text-sm text-gray-700">Cash</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <button id="preview-thermal"
                                    class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                    </svg>
                                    Preview Thermal Receipt
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between">
                    <div class="text-xs text-gray-500">
                        Powered by Finance Flow Technology | Designed by Republic Wing
                    </div>
                    <div class="flex space-x-3">
                        <button id="cancel-invoice-bottom"
                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </button>
                        <button id="save-draft-bottom"
                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save as Draft
                        </button>
                        <button id="save-invoice-bottom"
                            class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save & Send
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Client Modal -->
    <div id="add-client-modal" class="modal">
        <div class="modal-content">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-medium text-gray-900">Add New Client</h3>
                    <button id="close-client-modal" class="text-gray-400 hover:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="input-group">
                        <label for="new-client-name">Client Name *</label>
                        <input type="text" id="new-client-name" required placeholder="Enter client name">
                    </div>

                    <div class="input-group">
                        <label for="new-client-email">Email Address *</label>
                        <input type="email" id="new-client-email" required placeholder="Enter email address">
                    </div>

                    <div class="input-group">
                        <label for="new-client-phone">Phone Number</label>
                        <input type="tel" id="new-client-phone" placeholder="Enter phone number">
                    </div>

                    <div class="input-group">
                        <label for="new-client-company">Company Name</label>
                        <input type="text" id="new-client-company" placeholder="Enter company name">
                    </div>

                    <div class="input-group md:col-span-2">
                        <label for="new-client-address">Address</label>
                        <textarea id="new-client-address" rows="3" placeholder="Enter address"
                            class="resize-none"></textarea>
                    </div>

                    <div class="input-group">
                        <label for="new-client-city">City</label>
                        <input type="text" id="new-client-city" placeholder="Enter city">
                    </div>

                    <div class="input-group">
                        <label for="new-client-state">State/Province</label>
                        <input type="text" id="new-client-state" placeholder="Enter state or province">
                    </div>

                    <div class="input-group">
                        <label for="new-client-zip">PIN Code</label>
                        <input type="text" id="new-client-zip" placeholder="Enter PIN code">
                    </div>

                    <div class="input-group">
                        <label for="new-client-gstin">GSTIN (Optional)</label>
                        <input type="text" id="new-client-gstin" placeholder="Enter GSTIN">
                    </div>

                    <div class="input-group md:col-span-2">
                        <label for="new-client-notes">Notes</label>
                        <textarea id="new-client-notes" rows="3" placeholder="Enter any notes about this client"
                            class="resize-none"></textarea>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button id="cancel-add-client"
                        class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button id="save-new-client"
                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save Client
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="success-modal" class="modal">
        <div class="modal-content max-w-md">
            <div class="p-6 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Invoice Created Successfully!</h3>
                <p class="text-sm text-gray-500 mb-6">Your invoice has been created and sent to the client.</p>
                <div class="flex justify-center space-x-3">
                    <button id="view-invoice"
                        class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        View Invoice
                    </button>
                    <button id="back-to-invoices"
                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Back to Invoices
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Thermal Print Preview Modal -->
    <div id="thermal-print-modal" class="modal thermal-print-modal">
        <div class="modal-content max-w-md">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-medium text-gray-900">Thermal Receipt Preview</h3>
                    <button id="close-thermal-modal" class="text-gray-400 hover:text-gray-500 no-print">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="thermal-preview" id="thermal-preview">
                    <!-- This will be populated by JavaScript -->
                </div>

                <div class="mt-6 flex justify-center space-x-3 no-print">
                    <button id="print-thermal"
                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Print Receipt
                    </button>
                    <button id="close-thermal-preview"
                        class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Close Preview
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Default Business Logo SVG (Finance Flow) -->
    <div class="hidden">
        <svg id="default-business-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
            <rect width="100" height="100" rx="10" fill="#3b82f6" />
            <path d="M30 30h40v10H30z" fill="white" />
            <path d="M30 45h25v10H30z" fill="white" />
            <path d="M30 60h40v10H30z" fill="white" />
            <circle cx="75" cy="50" r="15" fill="#1e40af" />
            <path d="M75 42v16M67 50h16" stroke="white" stroke-width="4" />
        </svg>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../js/invoice.js"></script>
</body>

</html>