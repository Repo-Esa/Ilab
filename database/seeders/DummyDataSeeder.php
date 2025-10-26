<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru;
use App\Models\Ruangan;
use App\Models\Subject;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        Guru::create(['nama' => 'Pak Budi']);
        Guru::create(['nama' => 'Bu Siti']);

        Ruangan::create(['nama' => 'Lab 1']);
        Ruangan::create(['nama' => 'Lab 2']);

        Subject::create(['nama' => 'Matematika']);
        Subject::create(['nama' => 'Pemrograman']);
    }
}
