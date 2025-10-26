<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Schedule;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // }

    // public function run(): void
    // {
    //     $rooms = ['Lab 1', 'Lab 2', 'Lab 3'];
    //     $teacher = [
    //         ['nama' => 'Ibu Indri', 'photo' => 'logo1.png'],
    //         ['nama' => 'Ibu Dhian', 'photo' => 'logo2.png'],
    //         ['nama' => 'Pak Jum', 'photo' => 'logo3.png'],
    //     ];
    //     $subjects = ['BSD', 'PBT', 'PWB'];

    //     foreach ($rooms as $r) \App\Models\Ruangan::create(['nama' => $r]);
    //     foreach ($teacher as $t) \App\Models\Guru::create($t);
    //     foreach ($subjects as $s) \App\Models\Subject::create(['nama' => $s]);

    //     $schedules = [
    //         ['room_id' => 1, 'teacher_id' => 1, 'subject_id' => 1, 'day' => 'Senin', 'start_time' => '18:00:00', 'end_time' => '19:00:00'],
    //         ['room_id' => 2, 'teacher_id' => 2, 'subject_id' => 2, 'day' => 'Senin', 'start_time' => '20:00:00', 'end_time' => '21:00:00'],
    //         ['room_id' => 3, 'teacher_id' => 3, 'subject_id' => 3, 'day' => 'Senin', 'start_time' => '19:00:00', 'end_time' => '20:00:00'],
    //     ];

    //     foreach ($schedules as $sc) \App\Models\Jadwal  ::create($sc);
    // }

    public function run(): void
    {
        $this->call(DummyDataSeeder::class);

        $this->call(UserSeeder::class);
    }
    
}

