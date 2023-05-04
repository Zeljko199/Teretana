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
        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('trainer_id')->nullable();
            $table->unsignedInteger('member_id')->nullable();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('phone', 20)->nullable();
            $table->decimal('age',3)->nullable();
            $table->string('gender', 6)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('trainer_id')->references('trainer_id')->on('trainers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('member_id')->references('member_id')->on('members')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info');
    }
};
