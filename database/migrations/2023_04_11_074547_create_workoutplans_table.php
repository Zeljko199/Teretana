<?php

use App\Models\Member;
use App\Models\Trainer;
use App\Models\Workout;
use App\Models\Workoutplan;
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
        Schema::create(Workoutplan::TABLE, function (Blueprint $table) {
            $table->increments('plan_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamp('work_time');
            $table->date('work_date');
            $table->unsignedInteger('trainer_id')->nullable();
            $table->unsignedInteger('workout_id')->nullable();
            $table->unsignedInteger('member_id')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->foreign('trainer_id')->references('trainer_id')->on(Trainer::TABLE)->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('workout_id')->references('workout_id')->on(Workout::TABLE)->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('member_id')->references('member_id')->on(Member::TABLE)->onUpdate('cascade')->onDelete('cascade');
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
