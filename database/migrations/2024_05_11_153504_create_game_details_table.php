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
        Schema::create('game_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');


            $table->unsignedInteger('local_first_cuarter');
            $table->unsignedInteger('visit_first_cuarter');

            $table->unsignedInteger('local_second_cuarter');
            $table->unsignedInteger('visit_second_cuarter');

            $table->unsignedInteger('local_third_cuarter');
            $table->unsignedInteger('visit_third_cuarter');

            $table->unsignedInteger('local_fourth_cuarter');
            $table->unsignedInteger('visit_fourth_cuarter');

            $table->unsignedInteger('mvp');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_details');
    }
};
