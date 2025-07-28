<?php
session_start();
$name = $_SESSION['name'];
if (empty($_SESSION['name'])) {
  $host = $_SERVER['HTTP_HOST'];             // e.g., billing.republicwing.com
  $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); // current directory
  header("Location: https://$host$uri/login");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Finance Flow Technology by Republic Wing</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <div class="flex h-screen bg-gray-50">
    <!-- Sidebar -->
    <div class="w-72 bg-white shadow-lg p-4">
      <div class="p-4 gradient-card rounded-xl text-white mb-6">
        <div class="flex items-center space-x-3 mb-3">
          <div class="h-10 w-10 rounded-lg bg-white bg-opacity-30 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <h1 class="text-xl font-bold">Finance Flow Technology</h1>
            <p class="text-xs opacity-80">by Republic Wing</p>
          </div>
        </div>
        <div class="glass-effect rounded-lg p-3 flex items-center justify-between">
          <div>
            <p class="text-xs opacity-80">Total Revenue</p>
            <p class="text-lg font-bold">₹5,24,750</p>
          </div>
          <div class="h-8 w-8 rounded-full bg-white bg-opacity-20 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 px-4">Main Menu</p>
        <div id="sidebar-invoice" class="sidebar-item active flex items-center px-4 py-3 mb-2 cursor-pointer transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          <span>Invoice</span>
        </div>
        <div id="sidebar-product-add" class="sidebar-item flex items-center px-4 py-3 mb-2 cursor-pointer transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
          </svg>
          <span>Add Product</span>
        </div>
        <div id="sidebar-inventory" class="sidebar-item flex items-center px-4 py-3 mb-2 cursor-pointer transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
          </svg>
          <span>Inventory</span>
        </div>
        <div id="sidebar-clients" class="sidebar-item flex items-center px-4 py-3 mb-2 cursor-pointer transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span>Client Management</span>
        </div>
        <div id="sidebar-settings" class="sidebar-item flex items-center px-4 py-3 mb-2 cursor-pointer transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span>Settings</span>
        </div>
      </div>

      <div class="mt-auto pt-6 border-t border-gray-100">
        <div id="sidebar-logout" class="sidebar-item flex items-center px-4 py-3 text-red-500 cursor-pointer transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
          </svg>
          <span>Logout</span>
        </div>
        <div class="flex items-center px-4 py-3 mt-2">
          <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-semibold">
            <?php
            $parts = explode(" ", $name); // Split the name into parts
            $initials = "";

            foreach ($parts as $part) {
              $initials .= strtoupper($part[0]); // Take the first letter of each part
            }

            echo $initials; // Output: AB
            ?>
          </div>
          <div class="ml-3">
            <p class="text-sm font-medium" style="text-transform: uppercase;"><?php echo $name ?></p>
            <p class="text-xs text-gray-500">Administrator</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <!-- Top Navigation -->
      <header class="bg-white shadow-sm">
        <div class="flex items-center justify-between px-6 py-4">
          <div class="flex items-center">
            <h2 id="page-title" class="text-2xl font-bold text-gray-800">Invoice</h2>
          </div>
          <div class="flex items-center space-x-4">
            <div class="relative">
              <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-64">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <button class="p-2 rounded-full bg-gray-100 text-gray-500 hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
            </button>
            <button class="p-2 rounded-full bg-gray-100 text-gray-500 hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </button>
          </div>
        </div>
      </header>

      <!-- Content Sections -->
      <main class="flex-1 overflow-y-auto bg-gray-50 p-6" id="sidebar-full-section"></main>
    </div>
  </div>
  <main class="flex-1 overflow-y-auto bg-gray-50 p-6" id="full-invoice-section" style="display: none;">
    <!-- Invoice Section -->
    <div data-id="invoice-section" class="section active">
      <!-- Stats Cards -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-sm p-6 transition-all duration-200 card-hover custom-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="h-12 w-12 rounded-lg bg-indigo-100 flex items-center justify-center text-indigo-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
              </svg>
            </div>
            <div class="bg-green-100 rounded-full px-3 py-1 text-xs font-medium text-green-800">+12.5%</div>
          </div>
          <h3 class="text-sm font-medium text-gray-500">Total Invoices</h3>
          <p class="text-2xl font-bold text-gray-800">248</p>
          <div class="mt-2 text-xs text-gray-500">Compared to 220 last month</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 transition-all duration-200 card-hover custom-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="h-12 w-12 rounded-lg bg-purple-100 flex items-center justify-center text-purple-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <div class="bg-green-100 rounded-full px-3 py-1 text-xs font-medium text-green-800">+8.3%</div>
          </div>
          <h3 class="text-sm font-medium text-gray-500">Total Revenue</h3>
          <p class="text-2xl font-bold text-gray-800">₹5,24,750</p>
          <div class="mt-2 text-xs text-gray-500">Compared to ₹4,84,500 last month</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 transition-all duration-200 card-hover custom-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="h-12 w-12 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div class="bg-green-100 rounded-full px-3 py-1 text-xs font-medium text-green-800">+15.2%</div>
          </div>
          <h3 class="text-sm font-medium text-gray-500">Total Sale Amount</h3>
          <p class="text-2xl font-bold text-gray-800">₹6,82,500</p>
          <div class="mt-2 text-xs text-gray-500">Compared to ₹5,92,000 last month</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 transition-all duration-200 card-hover custom-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="h-12 w-12 rounded-lg bg-red-100 flex items-center justify-center text-red-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div class="bg-yellow-100 rounded-full px-3 py-1 text-xs font-medium text-yellow-800">+0.8%</div>
          </div>
          <h3 class="text-sm font-medium text-gray-500">Pending Payments</h3>
          <p class="text-2xl font-bold text-gray-800">₹42,250</p>
          <div class="mt-2 text-xs text-gray-500">From 8 different clients</div>
        </div>
      </div>

      <div class="flex justify-end mb-6">
        <button data-id="create-invoice-btn"
          class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg text-sm font-medium flex items-center transition-all duration-200 shadow-md hover:shadow-lg" onclick="createInv()">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          Create New Invoice
        </button>
      </div>

      <!-- Dashboard Graphs Section -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Revenue Trend Chart -->
        <div class="bg-white rounded-xl shadow-sm p-6 lg:col-span-2">
          <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold">Revenue Trends</h3>
            <div class="flex items-center space-x-2">
              <div class="flex items-center">
                <span class="h-3 w-3 rounded-full bg-indigo-500 mr-1"></span>
                <span class="text-xs text-gray-600">Revenue</span>
              </div>
              <div class="flex items-center">
                <span class="h-3 w-3 rounded-full bg-emerald-500 mr-1"></span>
                <span class="text-xs text-gray-600">Profit</span>
              </div>
              <select class="ml-4 text-xs border border-gray-300 rounded-md px-2 py-1">
                <option>Last 12 Months</option>
                <option>Last 6 Months</option>
                <option>Last 30 Days</option>
              </select>
            </div>
          </div>

          <div class="h-64 relative">
            <svg class="w-full h-full" viewBox="0 0 800 300">
              <!-- Grid Lines -->
              <g class="chart-grid">
                <line x1="50" y1="250" x2="750" y2="250" stroke="#e5e7eb" />
                <line x1="50" y1="200" x2="750" y2="200" stroke="#e5e7eb" />
                <line x1="50" y1="150" x2="750" y2="150" stroke="#e5e7eb" />
                <line x1="50" y1="100" x2="750" y2="100" stroke="#e5e7eb" />
                <line x1="50" y1="50" x2="750" y2="50" stroke="#e5e7eb" />
              </g>

              <!-- Y-axis labels -->
              <text x="40" y="250" text-anchor="end" class="text-xs fill-gray-500">₹0</text>
              <text x="40" y="200" text-anchor="end" class="text-xs fill-gray-500">₹1L</text>
              <text x="40" y="150" text-anchor="end" class="text-xs fill-gray-500">₹2L</text>
              <text x="40" y="100" text-anchor="end" class="text-xs fill-gray-500">₹3L</text>
              <text x="40" y="50" text-anchor="end" class="text-xs fill-gray-500">₹4L</text>

              <!-- X-axis labels -->
              <text x="108" y="270" text-anchor="middle" class="text-xs fill-gray-500">Jan</text>
              <text x="166" y="270" text-anchor="middle" class="text-xs fill-gray-500">Feb</text>
              <text x="224" y="270" text-anchor="middle" class="text-xs fill-gray-500">Mar</text>
              <text x="282" y="270" text-anchor="middle" class="text-xs fill-gray-500">Apr</text>
              <text x="340" y="270" text-anchor="middle" class="text-xs fill-gray-500">May</text>
              <text x="398" y="270" text-anchor="middle" class="text-xs fill-gray-500">Jun</text>
              <text x="456" y="270" text-anchor="middle" class="text-xs fill-gray-500">Jul</text>
              <text x="514" y="270" text-anchor="middle" class="text-xs fill-gray-500">Aug</text>
              <text x="572" y="270" text-anchor="middle" class="text-xs fill-gray-500">Sep</text>
              <text x="630" y="270" text-anchor="middle" class="text-xs fill-gray-500">Oct</text>
              <text x="688" y="270" text-anchor="middle" class="text-xs fill-gray-500">Nov</text>
              <text x="746" y="270" text-anchor="middle" class="text-xs fill-gray-500">Dec</text>

              <!-- Revenue Line -->
              <path
                d="M108,180 L166,160 L224,170 L282,140 L340,150 L398,120 L456,130 L514,160 L572,130 L630,110 L688,100 L746,80"
                class="chart-line" stroke="#6366f1" />

              <!-- Revenue Area -->
              <path
                d="M108,180 L166,160 L224,170 L282,140 L340,150 L398,120 L456,130 L514,160 L572,130 L630,110 L688,100 L746,80 L746,250 L108,250 Z"
                class="chart-area" fill="#6366f1" />

              <!-- Profit Line -->
              <path
                d="M108,210 L166,190 L224,200 L282,180 L340,190 L398,160 L456,170 L514,200 L572,170 L630,150 L688,140 L746,120"
                class="chart-line" stroke="#10b981" />

              <!-- Profit Area -->
              <path
                d="M108,210 L166,190 L224,200 L282,180 L340,190 L398,160 L456,170 L514,200 L572,170 L630,150 L688,140 L746,120 L746,250 L108,250 Z"
                class="chart-area" fill="#10b981" />

              <!-- Data Points - Revenue -->
              <circle cx="108" cy="180" r="4" class="chart-point" stroke="#6366f1" />
              <circle cx="166" cy="160" r="4" class="chart-point" stroke="#6366f1" />
              <circle cx="224" cy="170" r="4" class="chart-point" stroke="#6366f1" />
              <circle cx="282" cy="140" r="4" class="chart-point" stroke="#6366f1" />
              <circle cx="340" cy="150" r="4" class="chart-point" stroke="#6366f1" />
              <circle cx="398" cy="120" r="4" class="chart-point" stroke="#6366f1" />
              <circle cx="456" cy="130" r="4" class="chart-point" stroke="#6366f1" />
              <circle cx="514" cy="160" r="4" class="chart-point" stroke="#6366f1" />
              <circle cx="572" cy="130" r="4" class="chart-point" stroke="#6366f1" />
              <circle cx="630" cy="110" r="4" class="chart-point" stroke="#6366f1" />
              <circle cx="688" cy="100" r="4" class="chart-point" stroke="#6366f1" />
              <circle cx="746" cy="80" r="4" class="chart-point" stroke="#6366f1" />

              <!-- Data Points - Profit -->
              <circle cx="108" cy="210" r="4" class="chart-point" stroke="#10b981" />
              <circle cx="166" cy="190" r="4" class="chart-point" stroke="#10b981" />
              <circle cx="224" cy="200" r="4" class="chart-point" stroke="#10b981" />
              <circle cx="282" cy="180" r="4" class="chart-point" stroke="#10b981" />
              <circle cx="340" cy="190" r="4" class="chart-point" stroke="#10b981" />
              <circle cx="398" cy="160" r="4" class="chart-point" stroke="#10b981" />
              <circle cx="456" cy="170" r="4" class="chart-point" stroke="#10b981" />
              <circle cx="514" cy="200" r="4" class="chart-point" stroke="#10b981" />
              <circle cx="572" cy="170" r="4" class="chart-point" stroke="#10b981" />
              <circle cx="630" cy="150" r="4" class="chart-point" stroke="#10b981" />
              <circle cx="688" cy="140" r="4" class="chart-point" stroke="#10b981" />
              <circle cx="746" cy="120" r="4" class="chart-point" stroke="#10b981" />
            </svg>
          </div>
        </div>

        <!-- Invoice Status Chart -->
        <div class="bg-white rounded-xl shadow-sm p-6">
          <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold">Invoice Status</h3>
            <select class="text-xs border border-gray-300 rounded-md px-2 py-1">
              <option>This Month</option>
              <option>Last Month</option>
              <option>Last Quarter</option>
            </select>
          </div>

          <div class="flex justify-center">
            <div class="relative w-48 h-48">
              <svg class="w-full h-full" viewBox="0 0 100 100">
                <!-- Donut Chart -->
                <circle cx="50" cy="50" r="40" fill="none" stroke="#e5e7eb" stroke-width="10" />

                <!-- Paid Segment (65%) -->
                <circle cx="50" cy="50" r="40" fill="none" stroke="#10b981" stroke-width="10" stroke-dasharray="251.2 400"
                  class="donut-chart" />

                <!-- Pending Segment (25%) -->
                <circle cx="50" cy="50" r="40" fill="none" stroke="#f59e0b" stroke-width="10" stroke-dasharray="96.6 400"
                  stroke-dashoffset="-251.2" class="donut-chart" />

                <!-- Overdue Segment (10%) -->
                <circle cx="50" cy="50" r="40" fill="none" stroke="#ef4444" stroke-width="10" stroke-dasharray="38.6 400"
                  stroke-dashoffset="-347.8" class="donut-chart" />
              </svg>

              <div class="absolute inset-0 flex flex-col items-center justify-center">
                <span class="text-3xl font-bold">248</span>
                <span class="text-xs text-gray-500">Total Invoices</span>
              </div>
            </div>
          </div>

          <div class="mt-6 space-y-3">
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <span class="h-3 w-3 rounded-full bg-emerald-500 mr-2"></span>
                <span class="text-sm">Paid</span>
              </div>
              <div class="flex items-center">
                <span class="text-sm font-medium">161</span>
                <span class="text-xs text-gray-500 ml-1">(65%)</span>
              </div>
            </div>

            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <span class="h-3 w-3 rounded-full bg-amber-500 mr-2"></span>
                <span class="text-sm">Pending</span>
              </div>
              <div class="flex items-center">
                <span class="text-sm font-medium">62</span>
                <span class="text-xs text-gray-500 ml-1">(25%)</span>
              </div>
            </div>

            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <span class="h-3 w-3 rounded-full bg-red-500 mr-2"></span>
                <span class="text-sm">Overdue</span>
              </div>
              <div class="flex items-center">
                <span class="text-sm font-medium">25</span>
                <span class="text-xs text-gray-500 ml-1">(10%)</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Top Clients and Recent Activity -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Top Clients -->
        <div class="bg-white rounded-xl shadow-sm p-6">
          <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold">Top Clients</h3>
            <button class="text-xs text-indigo-600 hover:text-indigo-800">View All</button>
          </div>

          <div class="space-y-4">
            <div class="flex items-center">
              <div
                class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-semibold text-xs mr-3">
                SR
              </div>
              <div class="flex-1">
                <div class="flex justify-between">
                  <p class="text-sm font-medium">Singh Retail Shop</p>
                  <p class="text-sm font-bold">₹1,25,450</p>
                </div>
                <div class="flex justify-between mt-1">
                  <p class="text-xs text-gray-500">Chandigarh</p>
                  <p class="text-xs text-green-600">12 invoices</p>
                </div>
              </div>
            </div>

            <div class="flex items-center">
              <div
                class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-semibold text-xs mr-3">
                PS
              </div>
              <div class="flex-1">
                <div class="flex justify-between">
                  <p class="text-sm font-medium">Patel Supermarket</p>
                  <p class="text-sm font-bold">₹98,250</p>
                </div>
                <div class="flex justify-between mt-1">
                  <p class="text-xs text-gray-500">Mumbai</p>
                  <p class="text-xs text-green-600">9 invoices</p>
                </div>
              </div>
            </div>

            <div class="flex items-center">
              <div
                class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-700 font-semibold text-xs mr-3">
                SG
              </div>
              <div class="flex-1">
                <div class="flex justify-between">
                  <p class="text-sm font-medium">Sharma Grocery Store</p>
                  <p class="text-sm font-bold">₹85,620</p>
                </div>
                <div class="flex justify-between mt-1">
                  <p class="text-xs text-gray-500">Delhi</p>
                  <p class="text-xs text-green-600">8 invoices</p>
                </div>
              </div>
            </div>

            <div class="flex items-center">
              <div
                class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-700 font-semibold text-xs mr-3">
                GS
              </div>
              <div class="flex-1">
                <div class="flex justify-between">
                  <p class="text-sm font-medium">Gupta Stores</p>
                  <p class="text-sm font-bold">₹72,180</p>
                </div>
                <div class="flex justify-between mt-1">
                  <p class="text-xs text-gray-500">Jaipur</p>
                  <p class="text-xs text-green-600">7 invoices</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow-sm p-6 lg:col-span-2">
          <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold">Recent Invoices</h3>
            <div class="flex space-x-2">
              <button
                class="px-3 py-1 border border-gray-300 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                Filter
              </button>
              <button
                class="px-3 py-1 border border-gray-300 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                Export
              </button>
            </div>
          </div>

          <div class="table-container">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Invoice #
                  </th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount (₹)
                  </th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-indigo-600">INV-2023-001</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div
                        class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-semibold text-xs">
                        SG
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">Sharma Grocery Store</div>
                        <div class="text-xs text-gray-500">Delhi</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">15 Jun 2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">₹11,477.00</td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Paid</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="flex space-x-2">
                      <button class="p-1 rounded-md hover:bg-indigo-100 text-indigo-600" title="View">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </button>
                      <button class="p-1 rounded-md hover:bg-indigo-100 text-indigo-600" title="Print">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                      </button>
                      <button class="p-1 rounded-md hover:bg-indigo-100 text-indigo-600" title="Download">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-indigo-600">INV-2023-002</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div
                        class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-semibold text-xs">
                        PS
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">Patel Supermarket</div>
                        <div class="text-xs text-gray-500">Mumbai</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">12 Jun 2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">₹8,250.00</td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="flex space-x-2">
                      <button class="p-1 rounded-md hover:bg-indigo-100 text-indigo-600" title="View">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </button>
                      <button class="p-1 rounded-md hover:bg-indigo-100 text-indigo-600" title="Print">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                      </button>
                      <button class="p-1 rounded-md hover:bg-indigo-100 text-indigo-600" title="Download">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-indigo-600">INV-2023-003</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div
                        class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-700 font-semibold text-xs">
                        SR
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">Singh Retail Shop</div>
                        <div class="text-xs text-gray-500">Chandigarh</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">10 Jun 2023</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">₹15,620.00</td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Paid</span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="flex space-x-2">
                      <button class="p-1 rounded-md hover:bg-indigo-100 text-indigo-600" title="View">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                      </button>
                      <button class="p-1 rounded-md hover:bg-indigo-100 text-indigo-600" title="Print">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                      </button>
                      <button class="p-1 rounded-md hover:bg-indigo-100 text-indigo-600" title="Download">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="mt-6 flex items-center justify-between">
            <div class="text-sm text-gray-700">
              Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span
                class="font-medium">42</span> invoices
            </div>
            <div class="flex space-x-1">
              <button class="px-3 py-1 border border-gray-300 rounded-md text-sm disabled:opacity-50 hover:bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
              </button>
              <button class="px-3 py-1 border rounded-md bg-indigo-600 text-white text-sm">1</button>
              <button class="px-3 py-1 border border-gray-300 rounded-md text-sm hover:bg-gray-50">2</button>
              <button class="px-3 py-1 border border-gray-300 rounded-md text-sm hover:bg-gray-50">3</button>
              <button class="px-3 py-1 border border-gray-300 rounded-md text-sm hover:bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="./js/sidebar.js"></script>
  <script src="./js/index.js"></script>
</body>

</html>