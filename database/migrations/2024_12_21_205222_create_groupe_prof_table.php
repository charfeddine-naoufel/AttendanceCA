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
        Schema::create('groupe_prof', function (Blueprint $table) {
            $table->id();
            $table->foreignId('groupe_id');
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');

            $table->foreignId('prof_id');
            $table->foreign('prof_id')->references('id')->on('profs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupe_prof');
    }
};
