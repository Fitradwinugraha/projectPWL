<nav class="bg-gray-800 p-6 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <!-- <div class="text-white text-3xl font-bold tracking-wider">
            PW<span class="text-yellow-400">L</span>
        </div> -->
        <div class="">
            <img src="{{ asset('assets/img/logos.png') }}" alt="logo" class="h-10 w-auto">
        </div>
        <div class="md:hidden">
            <button onclick="toggleMenu()" class="text-white focus:outline-none transition-transform transform hover:scale-105 duration-300 ease-in-out">
                <i id="toggle-icon" class="fas fa-bars h-7 w-7"></i>
            </button>
        </div>
        <div class="hidden md:flex items-center space-x-8">
            <a href="/" class="text-white hover:text-yellow-400 transition duration-300 text-lg">Home</a>
            <a href="/#about" class="text-white hover:text-yellow-400 transition duration-300 text-lg">About</a>
            <div class="relative">
                <button onclick="toggleDropdown()" class="flex items-center text-white hover:text-yellow-400 transition duration-300 text-lg">
                    Brands <i class="fas fa-chevron-down ml-2 h-4 w-2"></i>
                </button>
                <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-md py-2 z-50 hidden transition-all duration-300 ease-in-out">
                    <a href="/#bikes" class="block px-4 py-2 text-gray-900 hover:bg-yellow-400 transition">Yamaha</a>
                    <a href="/#bikes" class="block px-4 py-2 text-gray-900 hover:bg-yellow-400 transition">Honda</a>
                </div>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">Login</button>
        </div>
        <!-- Responsif Sidebar -->
        <div id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-gray-900 p-6 z-50 transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden flex flex-col">
            <button onclick="toggleMenu()" class="absolute top-4 right-4 text-white text-2xl focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
            <div class="flex flex-col flex-grow space-y-4 mt-10 overflow-y-auto">
                <!-- <img src="https://via.placeholder.com/150" alt="logo" class="h-20 w-20 mb-4"> -->
                <img src="{{ asset('assets/img/logos.png') }}" alt="logo" class="h-15 w-auto mb-4">
                <a href="/" class="text-white hover:text-yellow-400 transition duration-300 text-lg">Home</a>
                <a href="/#about" class="text-white hover:text-yellow-400 transition duration-300 text-lg">About</a>
                <div class="">
                    <button onclick="toggleDropdown()" class="flex items-center text-white hover:text-yellow-400 transition duration-300 text-lg">
                        Brands <i class="fas fa-chevron-down ml-2 h-4 w-2"></i>
                    </button>
                    <div id="dropdown-sidebar" class="mt-2 bg-gray-700 rounded-lg py-2 hidden">
                        <a href="/#bikes" class="block px-4 py-2 text-white hover:bg-yellow-400 transition">Yamaha</a>
                        <a href="/#bikes" class="block px-4 py-2 text-white hover:bg-yellow-400 transition">Honda</a>
                    </div>
                </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">Login</button>
            </div>
            <footer class="p-6 text-white">
                <div class="text-center">
                    <i class="text-sm font-semibold">&copy; 2024 PWL. All rights reserved.</i>
                </div>
            </footer>
        </div>
    </div>
</nav>
<script>
    function toggleMenu() {
        const sidebar = document.getElementById('sidebar');
        const icon = document.getElementById('toggle-icon');
        const body = document.body;
        sidebar.classList.toggle('-translate-x-full');
        if (sidebar.classList.contains('-translate-x-full')) {
            body.classList.remove('overflow-hidden');
        } else {
            body.classList.add('overflow-hidden');
        }
    }
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        const dropdownSidebar = document.getElementById('dropdown-sidebar');
        
        dropdown.classList.toggle('hidden');
        dropdownSidebar.classList.toggle('hidden');
    }
</script>