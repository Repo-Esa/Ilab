<nav class="flex justify-between items-center bg-white dark:bg-slate-800 shadow px-6 py-3 text-gray-800 dark:text-gray-100">
    <div class="flex items-center gap-3">
        <h1 class="text-xl font-bold text-gray-800 dark:text-gray-100">iLab Monitoring</h1>
    </div>

    <div class="flex items-center gap-4">
        {{-- Tombol Toggle Dark/Light Mode --}}
        <button @click="darkMode = !darkMode"
            class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition">
            <template x-if="darkMode">
                <i class="ri-sun-fill text-yellow-400 text-xl"></i>
            </template>
            <template x-if="!darkMode">
                <i class="ri-moon-fill text-gray-800 dark:text-gray-200 text-xl"></i>
            </template>
        </button>

        {{-- (opsional) nama admin / dropdown user --}}
        <div class="flex items-center gap-2">
            <i class="ri-user-3-fill text-gray-500 dark:text-gray-300"></i>
            <span class="text-sm font-medium">Admin</span>
        </div>
    </div>
</nav>
