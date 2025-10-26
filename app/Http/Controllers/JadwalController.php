<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Guru;
use App\Models\Subject;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::with(['guru', 'ruangan', 'subject'])->get();
        return view('jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gurus = Guru::all();
        $ruangans = Ruangan::all();
        $subjects = Subject::all();
        return view('jadwal.create', compact('gurus', 'ruangans', 'subjects'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'ruangan_id' => 'required',
            'subject_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        $gurus = Guru::all();
        $ruangans = Ruangan::all();
        $subjects = Subject::all();
        return view('jadwal.edit', compact('jadwal', 'gurus', 'ruangans', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'day' => 'required',
            'subject_id' => 'required',
            'guru_id' => 'required',
            'ruangan_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $jadwals = Jadwal::findOrFail($id);
        $jadwals->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
