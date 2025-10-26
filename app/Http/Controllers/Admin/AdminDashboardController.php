<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use App\Models\Jadwal;
use App\Models\Guru;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $selectedDay = request('hari') ?? Carbon::now()->format('l');
        $now = Carbon::now();

        // Jadwal hari ini
        $jadwals = Jadwal::with(['ruangan', 'guru', 'subject'])
        ->where('hari', $selectedDay)
        ->orderBy('jam_mulai')
        ->get();

        // Hitung ruangan yang sedang digunakan (ada jadwal di jam sekarang)
        $ruanganDigunakan = Jadwal::where('hari', $selectedDay)
            ->when($selectedDay === $now->format('l'), function ($query) use ($now) {
                $query->whereTime('jam_mulai', '<=', $now)
                    ->whereTime('jam_selesai', '>=', $now);
            })
            ->count();

        // Hitung total ruangan
        $totalRuangan = Ruangan::count();

        // Ruangan kosong = total ruangan - ruangan digunakan
        $ruanganKosong = max(0, $totalRuangan - $ruanganDigunakan);

        // Total jadwal hari ini
        $totalJadwal = Jadwal::where('hari', $now->format('l'))->count();

        // Total guru dan simulasi guru hadir (sementara random dulu)
        $totalGuru = Guru::count();
        $guruHadir = $totalGuru > 0 ? rand(0, $totalGuru) : 0;

        return view('admin.dashboard', compact(
            'jadwals',
            'ruanganKosong',
            'ruanganDigunakan',
            'totalJadwal',
            'guruHadir',
            'totalGuru'
        ));
    }
}
