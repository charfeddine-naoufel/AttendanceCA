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
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->time('heure_deb');
			$table->time('heure_fin');
            $table->date('date')->useCurrent();
            $table->string('salle')->nullable();
            $table->json('eleves_presents');
            $table->json('eleves_absentss');

            $table->foreignId('matiere_id');
            $table->foreignId('groupe_id');
            $table->foreignId('prof_id');
            $table->foreignId('user_id');

            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');
            $table->foreign('prof_id')->references('id')->on('profs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
