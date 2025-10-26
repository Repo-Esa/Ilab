<header
    class="flex justify-between items-center bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-4">
    <div class="flex items-center gap-3">
        <button @click="open = !open" class="md:hidden text-2xl text-gray-800 dark:text-gray-100 focus:outline-none">
            <!-- pakai SVG (paling aman) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">iLab Monitoring</h2>
    </div>

    <div class="flex items-center gap-4">
        <button @click="darkMode = !darkMode" class="p-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
            <span x-show="!darkMode">🌙</span><span x-show="darkMode">☀️</span>
        </button>
        <div id="clock" class="font-semibold text-gray-700 dark:text-gray-200"></div>
    </div>
</header>
