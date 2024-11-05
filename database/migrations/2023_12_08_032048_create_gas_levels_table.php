<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gas_levels', function (Blueprint $table) {
            $table->id(); // Ini akan membuat kolom id dengan tipe data integer
            $table->integer('gas_level');
            $table->timestamps();

            // Menghapus unique constraint pada kolom gas_level
            // $table->unique('gas_level');

            // Menambahkan index pada kolom created_at
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('gas_levels');
    }
};
