@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="position-relative mb-4">
        <h3 class="fw-bold">📚 Jadwal Mata Pelajaran</h3>
        <button class="btn btn-primary position-absolute top-0 end-0" data-bs-toggle="modal" data-bs-target="#modalAdd">+ Tambah Jadwal</button>
        {{-- <div class="fw-bold text-secondary" id="clock"></div> --}}
    </div>

    {{-- Filter Hari --}}
    <div class="btn-group mb-4" role="group">
        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $d)
            <a href="{{ route('jadwal.index', ['day' => $d]) }}"
                class="btn btn-sm {{ (isset($day) && $day == $d) ? 'btn-primary' : 'btn-outline-primary' }}">
                {{ $d }}
            </a>
        @endforeach
    </div>

    {{-- List Jadwal --}}
    <div class="row">
        @forelse ($jadwals as $item)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="mb-2">{{ $item->subject->nama }}</h5>
                        <p class="mb-1"><b>Guru:</b> {{ $item->guru->nama }}</p>
                        <p class="mb-1"><b>Ruangan:</b> {{ $item->ruangan->nama }}</p>
                        <p class="mb-1"><b>Hari:</b> {{ $item->hari }}</p>
                        <p class="mb-2"><b>Waktu:</b> {{ $item->jam_mulai }} - {{ $item->jam_selesai }}</p>
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">Edit</button>
                            <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada jadwal.</p>
        @endforelse
    </div>
</div>

{{-- Modal Tambah Jadwal --}}
@include('jadwal.create')

{{-- Modal Edit Jadwal --}}
@foreach ($jadwals as $item)
    @include('jadwal.edit', ['item' => $item])
@endforeach

{{-- <script>
    function updateClock() {
        const now = new Date();
        const h = String(now.getHours()).padStart(2, '0');
        const m = String(now.getMinutes()).padStart(2, '0');
        const s = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('clock').textContent = `${h}:${m}:${s}`;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script> --}}
@endsection