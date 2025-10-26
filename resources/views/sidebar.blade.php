<aside x-data="{ open: true }"
    class="fixed left-0 top-0 z-50 flex flex-col items-center h-screen bg-gray-900 text-white border-r border-gray-800 shadow-sm transform transition-all duration-300"
    :class="open ? 'w-64' : 'w-20'">

    {{-- Header / Logo --}}
    <div class="flex items-center justify-between w-full px-4 h-16 border-b border-gray-800">
        <a href="#" class="text-2xl font-bold text-green-400">🧩</a>
        <button @click="open = !open" class="text-gray-300 text-xl focus:outline-none">
            <i :class="open ? 'ri-arrow-left-s-line' : 'ri-arrow-right-s-line'"></i>
        </button>
    </div>

    {{-- Menu --}}
    <nav class="flex-1 mt-6 space-y-3 w-full">
        {{-- Dashboard --}}
        <div class="group relative">
            <a href="{{ route('Dashboard') }}"
                class="flex items-center w-full gap-4 px-4 py-3 rounded-lg hover:bg-white/5 transition-all">
                <i class="bi bi-house text-lg"></i>
                <span x-show="open" x-transition>Dashboard</span>
            </a>

            {{-- Tooltip (hanya saat sidebar tertutup) --}}
            <span x-show="!open"
                class="absolute left-20 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 bg-gray-800 text-white text-xs rounded-md px-2 py-1 whitespace-nowrap transition">
                Dashboard
            </span>
        </div>

        {{-- Jadwal Mapel --}}
        <div class="group relative">
            <a href="{{ route('jadwal.index') }}"
                class="flex items-center w-full gap-4 px-4 py-3 rounded-lg hover:bg-white/5 transition-all">
                <i class="bi bi-calendar3 text-lg"></i>
                <span x-show="open" x-transition>Jadwal Mapel</span>
            </a>

            <span x-show="!open"
                class="absolute left-20 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 bg-gray-800 text-white text-xs rounded-md px-2 py-1 whitespace-nowrap transition">
                Jadwal Mapel
            </span>
        </div>

        {{-- Pemakaian Ruangan --}}
        <div class="group relative">
            <a href="#"
                class="flex items-center w-full gap-4 px-4 py-3 rounded-lg hover:bg-white/5 transition-all">
                <i class="bi bi-door-open text-lg"></i>
                <span x-show="open" x-transition>Pemakaian Ruangan</span>
            </a>
            <span x-show="!open"
                class="absolute left-20 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 bg-gray-800 text-white text-xs rounded-md px-2 py-1 whitespace-nowrap transition">
                Pemakaian Ruangan
            </span>
        </div>

        {{-- Data Guru --}}
        <div class="group relative">
            <a href="#"
                class="flex items-center w-full gap-4 px-4 py-3 rounded-lg hover:bg-white/5 transition-all">
                <i class="bi bi-person-lines-fill text-lg"></i>
                <span x-show="open" x-transition>Data Guru</span>
            </a>
            <span x-show="!open"
                class="absolute left-20 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 bg-gray-800 text-white text-xs rounded-md px-2 py-1 whitespace-nowrap transition">
                Data Guru
            </span>
        </div>

        {{-- Laporan --}}
        <div class="group relative">
            <a href="#"
                class="flex items-center w-full gap-4 px-4 py-3 rounded-lg hover:bg-white/5 transition-all">
                <i class="bi bi-bar-chart text-lg"></i>
                <span x-show="open" x-transition>Laporan</span>
            </a>
            <span x-show="!open"
                class="absolute left-20 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 bg-gray-800 text-white text-xs rounded-md px-2 py-1 whitespace-nowrap transition">
                Laporan
            </span>
        </div>
    </nav>

    {{-- Footer --}}
    {{-- Footer --}}
    <div class="w-full border-t border-gray-800 pt-4 pb-4 flex flex-col items-center transition-all duration-300"
        :class="open ? 'px-4 items-start' : 'px-0 items-center'">

        {{-- Tombol Pengaturan --}}
        <button
            class="flex items-center gap-3 w-full justify-center hover:bg-white/5 px-3 py-2 rounded-lg transition-all duration-300"
            :class="open ? 'justify-start' : 'justify-center'">
            <i class="bi bi-gear text-lg"></i>
            <span x-show="open" x-transition.opacity class="whitespace-nowrap">Pengaturan</span>
        </button>

        {{-- Avatar User --}}
        <div class="flex items-center w-full gap-3 mt-3 transition-all duration-300"
            :class="open ? 'justify-start px-2' : 'justify-center px-0'">

            {{-- Foto profil --}}
            <img src="https://ui-avatars.com/api/?name=User&background=0D8ABC&color=fff"
                class="w-10 h-10 rounded-full border-2 border-gray-700 transition-all duration-300" alt="User">

            {{-- Info user (tampil saat sidebar terbuka) --}}
            <div x-show="open" x-transition.opacity class="flex flex-col">
                <span class="text-sm font-semibold leading-tight">User</span>
                <span class="text-xs text-gray-400 leading-tight">Admin</span>
            </div>
        </div>
    </div>


</aside>
