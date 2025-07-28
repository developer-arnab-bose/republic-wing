<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Finance Flow Technology</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="min-h-screen flex flex-col">
    <div class="animated-bg">
        <div class="animated-shape shape-1"></div>
        <div class="animated-shape shape-2"></div>
        <div class="animated-shape shape-3"></div>
    </div>

    <div class="flex-1 flex items-center justify-center p-4">
        <div class="w-full max-w-5xl flex rounded-3xl overflow-hidden login-card">
            <!-- Left Side - Login Form -->
            <div class="w-full md:w-1/2 p-8 md:p-12">
                <div class="mb-8">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="h-10 w-10 rounded-lg gradient-bg flex items-center justify-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Finance Flow Technology</h1>
                            <p class="text-xs text-gray-500">by Republic Wing</p>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Welcome back!</h2>
                    <p class="text-gray-600">Please sign in to access your account</p>
                </div>

                <form id="login-form" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email or Username</label>
                        <div class="relative">
                            <div class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input type="text" class="form-input input-with-icon" placeholder="Enter your username" id="username" required >
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label class="block text-sm font-medium text-gray-700">Password</label>
                            <a href="#" class="text-xs text-indigo-600 hover:text-indigo-800">Forgot password?</a>
                        </div>
                        <div class="relative">
                            <div class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" class="form-input input-with-icon" placeholder="Enter your password" id="password" required>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>

                    <div>
                        <button type="submit" class="btn-primary">
                            Sign In
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-600">Don't have an account? <a href="#" class="text-indigo-600 font-medium hover:text-indigo-800">Contact administrator</a></p>
                </div>
            </div>

            <!-- Right Side - Features -->
            <div class="hidden md:block md:w-1/2 gradient-bg p-12 text-white">
                <div class="h-full flex flex-col">
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold mb-2">Streamline Your Business</h2>
                        <p class="opacity-80">Finance Flow Technology helps you manage your business finances with ease</p>
                    </div>

                    <div class="flex-1 flex flex-col justify-center">
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="feature-icon bg-white bg-opacity-20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg">Invoice Management</h3>
                                    <p class="opacity-80 text-sm">Create, send, and track invoices effortlessly</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="feature-icon bg-white bg-opacity-20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg">Inventory Control</h3>
                                    <p class="opacity-80 text-sm">Track stock levels and manage products</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="feature-icon bg-white bg-opacity-20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg">Client Management</h3>
                                    <p class="opacity-80 text-sm">Maintain client records and track interactions</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="feature-icon bg-white bg-opacity-20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg">Financial Reports</h3>
                                    <p class="opacity-80 text-sm">Generate insights with detailed analytics</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 glass-effect rounded-lg p-4 text-center">
                        <p class="text-sm opacity-90">New features available! Check out our latest update with enhanced credit management and bulk operations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="credit-footer p-4">
        <p>© 2023 Finance Flow Technology by Republic Wing. All rights reserved.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/login.js"></script>
</body>

</html>