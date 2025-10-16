<nav class="bg-white shadow-lg">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between items-center">
            <!-- Logo & Mobile Menu Button (Left side) -->
            <div class="flex items-center">
                <!-- Mobile menu button (Hamburger) - Only shows on small screens -->
                <div class="flex-shrink-0 md:hidden">
                    <button type="button" id="mobile-menu-button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Hamburger Icon -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <!-- Website Logo -->
                <div class="ml-4 md:ml-0">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-gray-900">URBANWOOD f</a>
                </div>
            </div>

            <!-- Navigation Links (Center) - Hidden on mobile, shown on medium screens and up -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Home</a>
                <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Shop</a>
                <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">About</a>
                <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium">Contact</a>
            </div>

            <!-- Action Buttons (Right side) -->
            <div class="flex items-center space-x-4">
                <!-- Search Icon -->
                <a href="#" class="text-gray-700 hover:text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
                <!-- Cart Icon -->
                <a href="#" class="text-gray-700 hover:text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </a>
                <!-- User Account / Login -->
                <a href="#" class="text-gray-700 hover:text-indigo-600 text-sm font-medium">Login</a>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. Hidden by default -->
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="space-y-1 pb-3 pt-2">
            <a href="#" class="block rounded-md bg-indigo-50 px-3 py-2 text-base font-medium text-indigo-600">Home</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900">Shop</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900">About</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900">Contact</a>
        </div>
    </div>
</nav>