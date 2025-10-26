<x-app-layout>
    <div class="bg-white dark:bg-slate-900 text-gray-800 dark:text-gray-100 p-4 rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">📊 Monitoring Ruangan & Aktivitas Guru</h1>
            <span x-data="{ time: '' }" x-init="setInterval(() => time = new Date().toLocaleTimeString(), 1000)" x-text="time" class="text-lg font-semibold"></span>
        </div>

        {{-- Statistik Card --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-green-600 rounded-2xl p-5 shadow-lg">
                <p class="text-sm opacity-80">Ruangan Kosong / Tersedia</p>
                <h2 class="text-3xl font-bold mt-2">{{ $ruanganKosong ?? 0 }}</h2>
            </div>

            <div class="bg-blue-600 rounded-2xl p-5 shadow-lg">
                <p class="text-sm opacity-80">Ruangan Sedang Digunakan</p>
                <h2 class="text-3xl font-bold mt-2">{{ $ruanganDigunakan ?? 0 }}</h2>
            </div>

            <div class="bg-yellow-500 rounded-2xl p-5 shadow-lg">
                <p class="text-sm opacity-80">Total Jadwal Hari Ini</p>
                <h2 class="text-3xl font-bold mt-2">{{ $totalJadwal ?? 0 }}</h2>
            </div>

            <div class="bg-orange-500 rounded-2xl p-5 shadow-lg">
                <p class="text-sm opacity-80">Kehadiran Guru</p>
                <h2 class="text-3xl font-bold mt-2">
                    {{ $guruHadir ?? 0 }}
                    <span class="text-base opacity-80">/ {{ $totalGuru ?? 0 }}</span>
                </h2>
                <p class="text-xs opacity-70 mt-1">Guru hadir dari total guru hari ini</p>
            </div>
        </div>

        {{-- Tabel Monitoring Jadwal Hari Ini --}}
        <div class="bg-[#1e293b] rounded-2xl shadow-lg p-6 mt-8">
            <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
                <i class="ri-calendar-line text-yellow-400 text-2xl"></i>
                Jadwal Hari {{ $hari ?? now()->translatedFormat('l') }}
            </h2>

            <div x-data="{
                selectedDay: '{{ now()->translatedFormat('l') }}',
                days: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
                filterDay(day) {
                    window.location.href = `?hari=${day}`;
                }
            }" class="mb-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <label for="hari" class="font-semibold text-gray-200">Pilih Hari:</label>
                    <select id="hari" x-model="selectedDay" @change="filterDay(selectedDay)"
                        class="bg-slate-800 text-gray-200 border border-gray-600 rounded-lg px-3 py-2">
                        <template x-for="day in days" :key="day">
                            <option x-text="day"></option>
                        </template>
                    </select>
                </div>

                <p class="text-gray-400 text-sm italic">
                    Menampilkan jadwal untuk <span class="text-blue-400 font-semibold" x-text="selectedDay"></span>
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-gray-200">
                    <thead class="bg-[#334155] text-gray-300 uppercase">
                        <tr>
                            <th class="px-4 py-3 text-left">Waktu</th>
                            <th class="px-4 py-3 text-left">Ruangan</th>
                            <th class="px-4 py-3 text-left">Guru</th>
                            <th class="px-4 py-3 text-left">Mata Pelajaran</th>
                            <th class="px-4 py-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse ($jadwals as $jadwal)
                            @php
                                $now = now();
                                $start = \Carbon\Carbon::parse($jadwal->start_time);
                                $end = \Carbon\Carbon::parse($jadwal->end_time);
                                if ($now->between($start, $end)) {
                                    $status = 'Berlangsung';
                                    $color = 'bg-yellow-400 text-black';
                                } elseif ($now->lt($start)) {
                                    $status = 'Belum Dimulai';
                                    $color = 'bg-cyan-400 text-black';
                                } else {
                                    $status = 'Selesai';
                                    $color = 'bg-green-500 text-black';
                                }
                            @endphp
                            <tr>
                                <td class="px-4 py-3">{{ $start->format('H:i') }} - {{ $end->format('H:i') }}</td>
                                <td class="px-4 py-3">{{ $jadwal->ruangan->nama }}</td>
                                <td class="px-4 py-3">{{ $jadwal->guru->nama }}</td>
                                <td class="px-4 py-3">{{ $jadwal->subject->nama }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $color }}">
                                        {{ $status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-400 italic">
                                    Tidak ada jadwal untuk hari ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Grafik --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-5">
            <div class="bg-gray-800 rounded-xl shadow p-5">
                <h3 class="text-white text-lg mb-3">Pemakaian Ruangan Minggu Ini</h3>
                <canvas id="roomUsageChart" class="w-full h-64"></canvas>
            </div>

            <div class="bg-gray-800 rounded-xl shadow p-5">
                <h3 class="text-white text-lg mb-3">Kehadiran Guru Minggu Ini</h3>
                <canvas id="teacherAttendanceChart" class="w-full h-64"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/dashboard-charts.js') }}"></script>
</x-app-layout>
