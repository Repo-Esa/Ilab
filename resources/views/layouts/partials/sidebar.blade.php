<aside
    class="fixed left-0 top-0 z-50 flex flex-col items-center h-screen 
           bg-white dark:bg-gray-900 text-gray-900 dark:text-white 
           border-r border-gray-200 dark:border-gray-800 shadow-sm 
           transition-all duration-500 ease-in-out"
    :class="open ? 'w-64' : 'w-20'">

    {{-- Header --}}
    <div
        class="flex items-center justify-between w-full px-4 h-16 
                border-b border-gray-200 dark:border-gray-800">
        <div class="flex items-center gap-2">
            <span class="text-2xl text-center font-bold text-green-500 dark:text-green-400">🧩</span>
            <span x-show="open" x-transition.opacity
                class="text-xl font-bold text-green-600 dark:text-green-400">iLab</span>
        </div>

        {{-- Tombol toggle --}}
        <button @click="$dispatch('toggle-sidebar')"
            class="text-gray-600 dark:text-gray-300 text-xl focus:outline-none 
                   hover:text-green-500 dark:hover:text-green-400 
                   transition-transform duration-200 hover:scale-110">
            <i :class="open ? 'ri-arrow-left-s-line' : 'ri-arrow-right-s-line'"></i>
        </button>
    </div>

    {{-- Menu --}}
    <nav class="flex-1 mt-6 space-y-3 w-full">
        @php
            $menus = [
                ['route' => 'dashboard', 'icon' => 'ri-dashboard-line', 'label' => 'Dashboard'],
                ['route' => 'jadwal.index', 'icon' => 'ri-calendar-line', 'label' => 'Jadwal Mapel'],
                // ['route' => 'admin.pemakaianruangan', 'icon' => 'ri-door-open-line', 'label' => 'Pemakaian Ruangan'],
                // ['route' => 'admin.dataguru', 'icon' => 'ri-user-3-line', 'label' => 'Data Guru'],
                ['route' => 'laporan', 'icon' => 'ri-bar-chart-2-line', 'label' => 'Laporan'],
            ];
        @endphp

        @foreach ($menus as $menu)
            <div class="group relative">
                <a href="{{ route('admin.' . $menu['route']) }}"
                    class="flex items-center w-full gap-4 px-4 py-3 rounded-lg
                           text-gray-700 dark:text-gray-200 
                           hover:bg-gray-100 dark:hover:bg-white/5 transition-all">
                    <i class="{{ $menu['icon'] }} text-xl"></i>
                    <span x-show="open" x-transition>{{ $menu['label'] }}</span>
                </a>
                <span x-show="!open"
                    class="absolute left-20 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 
                           bg-gray-800 text-white text-xs rounded-md px-2 py-1 whitespace-nowrap transition">
                    {{ $menu['label'] }}
                </span>
            </div>
        @endforeach
    </nav>

    {{-- Footer --}}
    <div class="w-full border-t border-gray-200 dark:border-gray-800 pt-4 pb-4 
                flex flex-col items-center transition-all duration-300"
        :class="open ? 'px-4 items-start' : 'px-0 items-center'">

        {{-- Tombol Pengaturan --}}
        <button
            class="flex items-center gap-3 w-full hover:bg-gray-100 dark:hover:bg-white/5 
                       px-3 py-2 rounded-lg transition-all duration-300"
            :class="open ? 'justify-start' : 'justify-center'">
            <i class="ri-settings-3-line text-xl"></i>
            <span x-show="open" x-transition.opacity class="whitespace-nowrap">Pengaturan</span>
        </button>

        {{-- Avatar User --}}
        <div class="flex items-center w-full gap-3 mt-3 transition-all duration-300"
            :class="open ? 'justify-start px-2' : 'justify-center px-0'">
            <img src="https://ui-avatars.com/api/?name=User&background=0D8ABC&color=fff"
                class="w-10 h-10 rounded-full border-2 border-gray-300 dark:border-gray-700 transition-all duration-300"
                alt="User">
            <div x-show="open" x-transition.opacity class="flex flex-col">
                <span class="text-sm font-semibold leading-tight">User</span>
                <span class="text-xs text-gray-500 dark:text-gray-400 leading-tight">Admin</span>
            </div>
        </div>
    </div>
</aside>
