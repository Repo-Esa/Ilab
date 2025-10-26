<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Guru;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class AdminJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::with(['guru', 'ruangan'])->orderBy('hari')->orderBy('jam_mulai')->get();
        $gurus = Guru::all();
        $ruangans = Ruangan::all();
        return view('admin.jadwal.index', compact('jadwals', 'gurus', 'ruangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gurus = Guru::all();
        $ruangans = Ruangan::all();
        return view('admin.jadwal.create', compact('gurus', 'ruangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ruangan_id' => 'required|exists:ruangans,id',
            'guru_id' => 'required|exists:gurus,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'mapel' => 'required',
        ]);

        Jadwal::create($request->only([
            'guru_id','ruangan_id','hari','jam_mulai','jam_selesai','mapel'
        ]));
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
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
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $gurus = Guru::all();
        $ruangans = Ruangan::all();
        return view('admin.jadwal.edit', compact('jadwal', 'gurus', 'ruangans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ruangan_id' => 'required|exists:ruangans,id',
            'guru_id' => 'required|exists:gurus,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'mapel' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->only(['guru_id', 'ruangan_id', 'hari', 'jam_mulai', 'jam_selesai', 'mapel']));

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
