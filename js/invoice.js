// Logo handling
let currentLogo = null;
let defaultLogoSvg = document.getElementById('default-business-logo').outerHTML;

function previewLogo(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const logoPreview = document.getElementById('logo-preview');
      logoPreview.innerHTML = `<img src="${e.target.result}" alt="Business Logo">`;
      currentLogo = e.target.result;
    };
    reader.readAsDataURL(file);
  }
}

function removeLogo() {
  const logoPreview = document.getElementById('logo-preview');
  logoPreview.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            `;
  currentLogo = null;
  document.getElementById('logo-upload').value = '';
}

function useDefaultLogo() {
  const logoPreview = document.getElementById('logo-preview');
  logoPreview.innerHTML = defaultLogoSvg;
  currentLogo = 'default';
}

// Client selection
document.getElementById('client').addEventListener('change', function () {
  const clientDetails = document.getElementById('client-details');
  if (this.value) {
    clientDetails.classList.remove('hidden');
    // In a real app, you would fetch client details from the server
    // For demo purposes, we'll just show some sample data
    const clientName = document.getElementById('client-name');
    const clientEmail = document.getElementById('client-email');
    const clientAddress = document.getElementById('client-address');
    const clientPhone = document.getElementById('client-phone');

    if (this.value === '1') {
      clientName.textContent = 'Fresh Mart';
      clientEmail.textContent = 'john@freshmart.com';
      clientAddress.textContent = '123 Market St, Mumbai, Maharashtra 400001';
      clientPhone.textContent = '(+91) 9876543210';
    } else if (this.value === '2') {
      clientName.textContent = 'City Grocers';
      clientEmail.textContent = 'sarah@citygrocers.com';
      clientAddress.textContent = '456 Main Ave, Delhi, 110001';
      clientPhone.textContent = '(+91) 8765432109';
    } else if (this.value === '3') {
      clientName.textContent = 'Sunshine Foods';
      clientEmail.textContent = 'mike@sunshinefoods.com';
      clientAddress.textContent = '789 Sunny Blvd, Bangalore, Karnataka 560001';
      clientPhone.textContent = '(+91) 7654321098';
    } else if (this.value === '4') {
      clientName.textContent = 'Metro Supermarket';
      clientEmail.textContent = 'lisa@metrosuper.com';
      clientAddress.textContent = '321 Urban St, Chennai, Tamil Nadu 600001';
      clientPhone.textContent = '(+91) 6543210987';
    } else if (this.value === '5') {
      clientName.textContent = 'Green Valley';
      clientEmail.textContent = 'alex@greenvalley.com';
      clientAddress.textContent = '654 Valley Rd, Kolkata, West Bengal 700001';
      clientPhone.textContent = '(+91) 5432109876';
    }
  } else {
    clientDetails.classList.add('hidden');
  }
});

// Add new client modal
const addClientModal = document.getElementById('add-client-modal');
document.getElementById('add-new-client').addEventListener('click', function () {
  addClientModal.style.display = 'block';
});

document.getElementById('close-client-modal').addEventListener('click', function () {
  addClientModal.style.display = 'none';
});

document.getElementById('cancel-add-client').addEventListener('click', function () {
  addClientModal.style.display = 'none';
});

document.getElementById('save-new-client').addEventListener('click', function () {
  // In a real app, you would save the client data to the server
  // For demo purposes, we'll just close the modal and show a success message
  const clientName = document.getElementById('new-client-name').value;
  if (clientName) {
    addClientModal.style.display = 'none';
    alert('Client "' + clientName + '" has been added successfully!');

    // Add the new client to the dropdown
    const clientSelect = document.getElementById('client');
    const newOption = document.createElement('option');
    newOption.value = '6'; // In a real app, this would be the new client ID
    newOption.text = clientName + ' (' + document.getElementById('new-client-email').value + ')';
    clientSelect.add(newOption);
    clientSelect.value = '6';

    // Trigger the change event to show client details
    const event = new Event('change');
    clientSelect.dispatchEvent(event);
  } else {
    alert('Please enter a client name');
  }
});

// Invoice item management
function updateItemTotal(element) {
  const row = element.closest('tr');
  const qty = parseFloat(row.querySelector('.item-qty').value) || 0;
  const price = parseFloat(row.querySelector('.item-price').value) || 0;
  const taxRate = parseFloat(row.querySelector('.item-tax').value) || 0;

  const subtotal = qty * price;
  const tax = subtotal * (taxRate / 100);
  const total = subtotal + tax;

  row.querySelector('.item-total').textContent = formatNumber(total);

  updateInvoiceTotal();
}

function removeItem(button) {
  const row = button.closest('tr');
  row.remove();
  updateInvoiceTotal();
}

document.getElementById('add-item').addEventListener('click', function () {
  const tbody = document.getElementById('invoice-items');
  const newRow = document.createElement('tr');
  newRow.className = 'item-row';
  newRow.innerHTML = `
                <td class="px-4 py-3 whitespace-nowrap">
                    <input type="text" class="item-name border-0 focus:ring-0 w-full" placeholder="Item name">
                </td>
                <td class="px-4 py-3">
                    <input type="text" class="item-desc border-0 focus:ring-0 w-full" placeholder="Description">
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="text-gray-500 mr-1">₹</span>
                        <input type="number" class="item-mrp border-0 focus:ring-0 w-20 mrp-field" step="0.01" min="0" value="0.00" readonly>
                    </div>
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <input type="number" class="item-qty border-0 focus:ring-0 w-20" min="1" value="1" onchange="updateItemTotal(this)">
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="text-gray-500 mr-1">₹</span>
                        <input type="number" class="item-price border-0 focus:ring-0 w-20" step="0.01" min="0" value="0.00" onchange="updateItemTotal(this)">
                    </div>
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <select class="item-tax border-0 focus:ring-0 bg-transparent" onchange="updateItemTotal(this)">
                        <option value="0">0%</option>
                        <option value="5" selected>5%</option>
                        <option value="12">12%</option>
                        <option value="18">18%</option>
                        <option value="28">28%</option>
                    </select>
                </td>
                <td class="px-4 py-3 whitespace-nowrap font-medium text-gray-900">
                    ₹<span class="item-total">0.00</span>
                </td>
                <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                    <button class="delete-btn text-red-600 hover:text-red-900" onclick="removeItem(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </td>
            `;
  tbody.appendChild(newRow);

  // Focus on the new item name field
  newRow.querySelector('.item-name').focus();

  // Add event listener to update MRP when item name changes
  const itemNameInput = newRow.querySelector('.item-name');
  itemNameInput.addEventListener('change', function () {
    // In a real app, you would fetch the MRP from a database
    // For demo purposes, we'll just set a random MRP
    const mrpInput = newRow.querySelector('.item-mrp');
    const randomMrp = Math.floor(Math.random() * 500) + 50; // Random MRP between 50 and 550
    mrpInput.value = randomMrp.toFixed(2);

    // Set the selling price slightly lower than MRP
    const priceInput = newRow.querySelector('.item-price');
    const sellingPrice = randomMrp * 0.95; // 5% discount from MRP
    priceInput.value = sellingPrice.toFixed(2);

    // Update the total
    updateItemTotal(priceInput);
  });
});

// Format number with commas for Indian numbering system
function formatNumber(num) {
  return new Intl.NumberFormat('en-IN', {
    maximumFractionDigits: 2,
    minimumFractionDigits: 2
  }).format(num);
}

function updateInvoiceTotal() {
  let subtotal = 0;
  let taxTotal = 0;

  document.querySelectorAll('.item-row').forEach(row => {
    const qty = parseFloat(row.querySelector('.item-qty').value) || 0;
    const price = parseFloat(row.querySelector('.item-price').value) || 0;
    const taxRate = parseFloat(row.querySelector('.item-tax').value) || 0;

    const itemSubtotal = qty * price;
    const itemTax = itemSubtotal * (taxRate / 100);

    subtotal += itemSubtotal;
    taxTotal += itemTax;
  });

  document.getElementById('subtotal').textContent = formatNumber(subtotal);
  document.getElementById('tax-total').textContent = formatNumber(taxTotal);

  // Calculate discount
  const discountValue = parseFloat(document.getElementById('discount').value) || 0;
  const discountType = document.getElementById('discount-type').value;
  let discountAmount = 0;

  if (discountType === 'percentage') {
    discountAmount = subtotal * (discountValue / 100);
  } else {
    discountAmount = discountValue;
  }

  // Calculate shipping
  const shipping = parseFloat(document.getElementById('shipping').value) || 0;

  // Calculate grand total
  const grandTotal = subtotal + taxTotal - discountAmount + shipping;
  document.getElementById('grand-total').textContent = formatNumber(grandTotal);

  // Update payment status details if partly paid
  updatePartlyPaid();
}

// Update payment status
function updatePaymentStatus() {
  const status = document.getElementById('payment-status').value;
  const partlyPaidSection = document.getElementById('partly-paid-section');
  const paymentDetails = document.getElementById('payment-details');
  const statusIndicator = document.getElementById('status-indicator');
  const statusText = document.getElementById('status-text');
  const paymentBadge = document.getElementById('payment-badge');

  // Reset classes
  paymentBadge.classList.remove('status-paid', 'status-due', 'status-partly');

  if (status === 'paid') {
    partlyPaidSection.classList.add('hidden');
    paymentDetails.classList.add('hidden');
    statusIndicator.className = 'w-3 h-3 rounded-full bg-green-500 mr-2';
    statusText.textContent = 'Paid';
    paymentBadge.textContent = 'Payment Received';
    paymentBadge.classList.add('status-paid');

    // Set amount paid to full amount
    const grandTotal = parseFloat(document.getElementById('grand-total').textContent.replace(/,/g, '')) || 0;
    document.getElementById('amount-paid').value = grandTotal.toFixed(2);
  }
  else if (status === 'due') {
    partlyPaidSection.classList.add('hidden');
    paymentDetails.classList.add('hidden');
    statusIndicator.className = 'w-3 h-3 rounded-full bg-red-500 mr-2';
    statusText.textContent = 'Due';
    paymentBadge.textContent = 'Payment Due';
    paymentBadge.classList.add('status-due');

    // Reset amount paid
    document.getElementById('amount-paid').value = '0.00';
  }
  else if (status === 'partly') {
    partlyPaidSection.classList.remove('hidden');
    paymentDetails.classList.remove('hidden');
    statusIndicator.className = 'w-3 h-3 rounded-full bg-yellow-500 mr-2';
    statusText.textContent = 'Partly Paid';
    paymentBadge.textContent = 'Partly Paid';
    paymentBadge.classList.add('status-partly');

    // Update the payment details
    updatePartlyPaid();
  }
}

// Update partly paid details
function updatePartlyPaid() {
  const status = document.getElementById('payment-status').value;
  if (status === 'partly') {
    const grandTotal = parseFloat(document.getElementById('grand-total').textContent.replace(/,/g, '')) || 0;
    const amountPaid = parseFloat(document.getElementById('amount-paid').value) || 0;
    const balanceDue = grandTotal - amountPaid;

    document.getElementById('amount-paid-display').textContent = formatNumber(amountPaid);
    document.getElementById('balance-due').textContent = formatNumber(balanceDue);

    // Ensure amount paid doesn't exceed grand total
    if (amountPaid > grandTotal) {
      document.getElementById('amount-paid').value = grandTotal.toFixed(2);
      updatePartlyPaid(); // Recalculate
    }

    // If amount paid equals grand total, switch to paid status
    if (amountPaid >= grandTotal && amountPaid > 0) {
      document.getElementById('payment-status').value = 'paid';
      updatePaymentStatus();
    }

    // If amount paid is zero, switch to due status
    if (amountPaid <= 0) {
      document.getElementById('payment-status').value = 'due';
      updatePaymentStatus();
    }
  }
}

// Payment terms change
document.getElementById('payment-terms').addEventListener('change', function () {
  const dueDate = document.getElementById('due-date');
  const invoiceDate = new Date(document.getElementById('invoice-date').value);

  if (invoiceDate) {
    const days = parseInt(this.value);
    const newDueDate = new Date(invoiceDate);
    newDueDate.setDate(newDueDate.getDate() + days);

    // Format the date as YYYY-MM-DD for the input
    const year = newDueDate.getFullYear();
    const month = String(newDueDate.getMonth() + 1).padStart(2, '0');
    const day = String(newDueDate.getDate()).padStart(2, '0');
    dueDate.value = `${year}-${month}-${day}`;
  }
});

// Invoice date change
document.getElementById('invoice-date').addEventListener('change', function () {
  const paymentTerms = document.getElementById('payment-terms');
  const event = new Event('change');
  paymentTerms.dispatchEvent(event);
});

// Success modal
const successModal = document.getElementById('success-modal');

function showSuccessModal() {
  successModal.style.display = 'block';
}

document.getElementById('view-invoice').addEventListener('click', function () {
  successModal.style.display = 'none';
  // In a real app, this would redirect to the invoice view page
  alert('This would navigate to the invoice view page');
});

document.getElementById('back-to-invoices').addEventListener('click', function () {
  successModal.style.display = 'none';
  // In a real app, this would redirect to the invoices list page
  window.top.location.href = window.location.origin;
});

// Save invoice buttons
document.getElementById('save-invoice').addEventListener('click', function () {
  // Validate form
  if (!document.getElementById('client').value) {
    alert('Please select a client');
    return;
  }

  // In a real app, you would save the invoice data to the server
  // For demo purposes, we'll just show the success modal
  showSuccessModal();
});

document.getElementById('save-invoice-bottom').addEventListener('click', function () {
  // Trigger the same action as the top button
  document.getElementById('save-invoice').click();
});

document.getElementById('save-draft').addEventListener('click', function () {
  // In a real app, you would save the invoice as a draft
  alert('Invoice saved as draft');
});

document.getElementById('save-draft-bottom').addEventListener('click', function () {
  // Trigger the same action as the top button
  document.getElementById('save-draft').click();
});

// Cancel buttons
document.getElementById('cancel-invoice').addEventListener('click', function () {
  // In a real app, this would redirect to the invoices list page
  if (confirm('Are you sure you want to cancel? Any unsaved changes will be lost.')) {
    window.top.location.href = window.location.origin;
  }
});

document.getElementById('cancel-invoice-bottom').addEventListener('click', function () {
  // Trigger the same action as the top button
  document.getElementById('cancel-invoice').click();
});

// Thermal Print Preview
const thermalPrintModal = document.getElementById('thermal-print-modal');

document.getElementById('preview-thermal').addEventListener('click', function () {
  generateThermalReceipt();
  thermalPrintModal.style.display = 'block';
});

document.getElementById('close-thermal-modal').addEventListener('click', function () {
  thermalPrintModal.style.display = 'none';
});

document.getElementById('close-thermal-preview').addEventListener('click', function () {
  thermalPrintModal.style.display = 'none';
});

document.getElementById('print-thermal').addEventListener('click', function () {
  window.print();
});

function generateThermalReceipt() {
  const preview = document.getElementById('thermal-preview');
  const invoiceNumber = document.getElementById('invoice-number').value;
  const invoiceDate = new Date(document.getElementById('invoice-date').value);
  const formattedDate = invoiceDate.toLocaleDateString('en-IN', {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  });

  // Get shop details
  const shopName = document.getElementById('shop-name').value;
  const shopAddress = document.getElementById('shop-address').value;
  const shopPhone = document.getElementById('shop-phone').value;
  const shopGstin = document.getElementById('shop-gstin').value;

  // Get client info
  let clientName = "Walk-in Customer";
  let clientAddress = "";
  let clientPhone = "";

  const clientSelect = document.getElementById('client');
  if (clientSelect.value) {
    clientName = document.getElementById('client-name').textContent;
    clientAddress = document.getElementById('client-address').textContent;
    clientPhone = document.getElementById('client-phone').textContent;
  }

  // Get items
  let itemsHtml = '';
  let itemCount = 0;

  document.querySelectorAll('.item-row').forEach(row => {
    const name = row.querySelector('.item-name').value;
    const desc = row.querySelector('.item-desc').value;
    const mrp = parseFloat(row.querySelector('.item-mrp').value) || 0;
    const qty = parseFloat(row.querySelector('.item-qty').value) || 0;
    const price = parseFloat(row.querySelector('.item-price').value) || 0;
    const total = parseFloat(row.querySelector('.item-total').textContent.replace(/,/g, '')) || 0;

    if (name && qty > 0) {
      itemCount++;
      itemsHtml += `
                        <tr>
                            <td colspan="3">${name}</td>
                        </tr>
                        <tr>
                            <td>${qty} x ₹${price.toFixed(2)}</td>
                            <td class="text-right">MRP: ₹${mrp.toFixed(2)}</td>
                            <td class="text-right">₹${total.toFixed(2)}</td>
                        </tr>
                    `;
    }
  });

  // Get totals
  const subtotal = parseFloat(document.getElementById('subtotal').textContent.replace(/,/g, '')) || 0;
  const taxTotal = parseFloat(document.getElementById('tax-total').textContent.replace(/,/g, '')) || 0;
  const discountValue = parseFloat(document.getElementById('discount').value) || 0;
  const discountType = document.getElementById('discount-type').value;
  let discountText = discountType === 'percentage' ? `${discountValue}%` : `₹${discountValue.toFixed(2)}`;
  let discountAmount = 0;

  if (discountType === 'percentage') {
    discountAmount = subtotal * (discountValue / 100);
  } else {
    discountAmount = discountValue;
  }

  const shipping = parseFloat(document.getElementById('shipping').value) || 0;
  const grandTotal = parseFloat(document.getElementById('grand-total').textContent.replace(/,/g, '')) || 0;

  // Get payment status
  const paymentStatus = document.getElementById('payment-status').value;
  let paymentStatusText = '';
  let paymentDetailsHtml = '';

  if (paymentStatus === 'paid') {
    paymentStatusText = 'PAID';
  } else if (paymentStatus === 'due') {
    paymentStatusText = 'DUE';
  } else if (paymentStatus === 'partly') {
    paymentStatusText = 'PARTLY PAID';
    const amountPaid = parseFloat(document.getElementById('amount-paid').value) || 0;
    const balanceDue = grandTotal - amountPaid;

    paymentDetailsHtml = `
                    <tr>
                        <td>Amount Paid:</td>
                        <td class="text-right">₹${amountPaid.toFixed(2)}</td>
                    </tr>
                    <tr>
                        <td>Balance Due:</td>
                        <td class="text-right">₹${balanceDue.toFixed(2)}</td>
                    </tr>
                `;
  }

  // Get footer text
  const footerText = document.getElementById('footer-text').value;

  // Get invoice type
  const invoiceType = document.getElementById('invoice-type').options[document.getElementById('invoice-type').selectedIndex].text;

  // Logo HTML
  let logoHtml = '';
  if (currentLogo === 'default') {
    logoHtml = `<div class="thermal-logo">${defaultLogoSvg}</div>`;
  } else if (currentLogo) {
    logoHtml = `<img src="${currentLogo}" alt="${shopName}" class="thermal-logo">`;
  }

  // Generate receipt HTML
  preview.innerHTML = `
                ${logoHtml}
                <h2>${shopName}</h2>
                <p class="text-center">${shopAddress}<br>${shopPhone}</p>
                <p class="text-center">GSTIN: ${shopGstin}</p>
                <hr>
                <p class="text-center bold">${invoiceType}</p>
                <p>
                    <strong>Receipt #:</strong> ${invoiceNumber}<br>
                    <strong>Date:</strong> ${formattedDate}<br>
                    <strong>Customer:</strong> ${clientName}
                </p>
                ${clientAddress ? `<p>${clientAddress}</p>` : ''}
                ${clientPhone ? `<p>${clientPhone}</p>` : ''}
                <hr>
                <table>
                    <tr class="bold">
                        <td colspan="2">ITEM</td>
                        <td class="text-right">AMOUNT</td>
                    </tr>
                    ${itemsHtml}
                </table>
                <hr>
                <table>
                    <tr>
                        <td>Subtotal:</td>
                        <td class="text-right">₹${subtotal.toFixed(2)}</td>
                    </tr>
                    <tr>
                        <td>Tax:</td>
                        <td class="text-right">₹${taxTotal.toFixed(2)}</td>
                    </tr>
                    ${discountValue > 0 ? `
                    <tr>
                        <td>Discount (${discountText}):</td>
                        <td class="text-right">-₹${discountAmount.toFixed(2)}</td>
                    </tr>
                    ` : ''}
                    ${shipping > 0 ? `
                    <tr>
                        <td>Shipping:</td>
                        <td class="text-right">₹${shipping.toFixed(2)}</td>
                    </tr>
                    ` : ''}
                    <tr class="bold">
                        <td>TOTAL:</td>
                        <td class="text-right">₹${grandTotal.toFixed(2)}</td>
                    </tr>
                    ${paymentDetailsHtml}
                </table>
                <hr>
                <p class="text-center">
                    <strong>Payment Status:</strong> ${paymentStatusText}<br>
                    <strong>Payment Method:</strong> Cash<br>
                    <strong>Items Count:</strong> ${itemCount}
                </p>
                <hr>
                <p class="text-center">${footerText}</p>
                <p class="text-center">Thank you for your business!</p>
                <div class="credit">Powered by Finance Flow Technology<br>Designed by Republic Wing</div>
            `;
}

// Initialize the page
document.addEventListener('DOMContentLoaded', function () {
  // Set today's date as the default invoice date
  const today = new Date();
  const year = today.getFullYear();
  const month = String(today.getMonth() + 1).padStart(2, '0');
  const day = String(today.getDate()).padStart(2, '0');
  document.getElementById('invoice-date').value = `${year}-${month}-${day}`;

  // Set the due date based on payment terms
  const paymentTerms = document.getElementById('payment-terms');
  const event = new Event('change');
  paymentTerms.dispatchEvent(event);

  // Initialize payment status
  updatePaymentStatus();

  // Calculate initial totals
  updateInvoiceTotal();

  // Use default logo
  useDefaultLogo();

  // Close modals when clicking outside
  window.addEventListener('click', function (event) {
    if (event.target === addClientModal) {
      addClientModal.style.display = 'none';
    }
    if (event.target === successModal) {
      successModal.style.display = 'none';
    }
    if (event.target === thermalPrintModal) {
      thermalPrintModal.style.display = 'none';
    }
  });

  // Add event listeners to update MRP when item name changes for existing items
  document.querySelectorAll('.item-name').forEach(itemNameInput => {
    itemNameInput.addEventListener('change', function () {
      const row = this.closest('tr');
      const mrpInput = row.querySelector('.item-mrp');
      const priceInput = row.querySelector('.item-price');

      // Update the total
      updateItemTotal(priceInput);
    });
  });
});