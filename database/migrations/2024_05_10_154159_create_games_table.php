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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->datetime('match_date');
            $table->string('reports', 1600)->default('Sin incidencias');
            $table->unsignedBigInteger('local_team_id');
            $table->unsignedBigInteger('visit_team_id');
            $table->unsignedBigInteger('league_id');
            $table->unsignedBigInteger('ubication_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
