<x-app-layout>
    <div x-data="{ open: false }" class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">📅 Jadwal Mapel</h1>
            <a href="{{ route('admin.jadwal.create') }}"
               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                + Tambah Jadwal
            </a>
        </div>

        {{-- Tabel Jadwal --}}
        <div class="overflow-x-auto bg-white dark:bg-gray-900 shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Hari</th>
                        <th class="px-6 py-3">Jam</th>
                        <th class="px-6 py-3">Mapel</th>
                        <th class="px-6 py-3">Guru</th>
                        <th class="px-6 py-3">Ruangan</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals as $jadwal)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="px-6 py-3">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3">{{ $jadwal->hari }}</td>
                            <td class="px-6 py-3">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                            <td class="px-6 py-3">{{ $jadwal->mapel }}</td>
                            <td class="px-6 py-3">{{ $jadwal->guru->nama ?? '-' }}</td>
                            <td class="px-6 py-3">{{ $jadwal->ruangan->nama ?? '-' }}</td>
                            <td class="px-6 py-3 text-right">
                                <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}"
                                   class="text-blue-500 hover:underline mr-3">Edit</a>
                                <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-500 hover:underline"
                                            onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
