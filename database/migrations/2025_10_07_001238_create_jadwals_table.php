<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->foreignId('ruangan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('guru_id')->constrained()->cascadeOnDelete();
            $table->string('mapel');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('kelas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
