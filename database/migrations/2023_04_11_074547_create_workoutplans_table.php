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
        Schema::create('workoutplans', function (Blueprint $table) {
            $table->increments('plan_id');
            $table->string('name');
            $table->string('description');
            $table->timestamp('work_time');
            $table->date('work_date');
            $table->unsignedInteger('trainer_id');
            $table->unsignedInteger('workout_id');
            $table->unsignedInteger('member_id');
            $table->timestamps();
            $table->foreign('trainer_id')->references('trainer_id')->on('trainers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('workout_id')->references('workout_id')->on('workouts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('member_id')->references('member_id')->on('members')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workoutplans');
    }
};
