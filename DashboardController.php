<?php

namespace App\Http\Controllers;

// use App\Models\Schedule;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now('Asia/Jakarta');

        // $schedules = Schedule::with(['room', 'teacher', 'subject'])
        //     ->orderBy('start_time', 'asc')
        //     ->get()
        //     ->map(function ($item) use ($now) {
        //         $startFormat = strlen($item->start_time) === 5 ? 'H:i' : 'H:i:s';
        //         $endFormat   = strlen($item->end_time) === 5 ? 'H:i' : 'H:i:s';

        //         // Normalisasi format dulu (ganti titik jadi :)
        //         $startRaw = str_replace('.', ':', $item->start_time);
        //         $endRaw = str_replace('.', ':', $item->end_time);

        //         $startFormat = strlen($startRaw) === 5 ? 'H:i' : 'H:i:s';
        //         $endFormat   = strlen($endRaw) === 5 ? 'H:i' : 'H:i:s';

        //         $start = Carbon::createFromFormat($startFormat, $startRaw, 'Asia/Jakarta')->setDateFrom($now);
        //         $end   = Carbon::createFromFormat($endFormat, $endRaw, 'Asia/Jakarta')->setDateFrom($now);

        //         if ($now->between($start, $end)) {
        //             $item->status = 'Sedang Berlangsung';
        //             $item->badge = 'warning';
        //         } elseif ($now->lt($start)) {
        //             $item->status = 'Belum Dimulai';
        //             $item->badge = 'primary';
        //         } else {
        //             $item->status = 'Selesai / Kosong';
        //             $item->badge = 'success';
        //         }

        //         return $item;
        // });

        return view('Dashboard');
    }
}
