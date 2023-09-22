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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nim');
            // $table->string('nama_mhs');
            // $table->string('email');
            // $table->string('katasandi');
            $table->enum('jurusan', ['Teknik Informatika', 'Teknik Mesin', 'Teknik Pendingin dan Tata Udara', 'Keperawatan']);
            $table->string('kelas');
            // $table->string('role');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
