<?php

namespace App\Http\Controllers;

// use App\Models\Schedule;

use App\Models\Ruangan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $day = $request->get('day', ucfirst(Carbon::now('Asia/Jakarta')->locale('id')->dayName)); // default hari ini
        $now = Carbon::now('Asia/Jakarta');

        $ruangans = Ruangan::with(['ruangan', 'guru', 'subject'])
            ->where('day', ucfirst($day))
            ->orderBy('start_time', 'asc')
            ->get()
            ->map(function ($item) use ($now) {
                $start = Carbon::createFromFormat('H:i:s', $item->start_time);
                $end   = Carbon::createFromFormat('H:i:s', $item->end_time);

                // Hitung progress (%) dari durasi total
                $duration = $start->diffInSeconds($end);
                $elapsed  = max(0, min($duration, $start->diffInSeconds($now, false)));
                $item->progress = ($now->between($start, $end))
                 ? round(($elapsed / $duration) * 100)
                    : ($now->lt($start) ? 0 : 100);

                // Tentukan status dan warna badge
                if ($now->between($start, $end)) {
                    $item->status = 'Sedang Berlangsung';
                    $item->badge = 'warning';
                    $item->is_active = true;

                    // Hitung sisa waktu
                    $item->remaining = $now->diff($end)->format('%H jam %I menit');
                } elseif ($now->lt($start)) {
                    $item->status = 'Belum Dimulai';
                    $item->badge = 'primary';
                    $item->is_active = false;
                    $item->remaining = 'Belum mulai';
                } else {
                    $item->status = 'Selesai';
                    $item->badge = 'success';
                    $item->is_active = false;
                    $item->remaining = 'Sudah selesai';
                }

                return $item;
            });

        return view('layouts.jadwalmapel');
    }
}
