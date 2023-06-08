<?php

use App\Models\User;
use App\Models\UserInfo;
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
        Schema::create(UserInfo::TABLE, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('first_name', 30)->nullable();
            $table->string('last_name', 30)->nullable();
            $table->string('phone', 20)->nullable();
            $table->integer('age')->nullable();
            $table->string('gender', 6)->nullable();
            $table->string('address', 50)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(User::TABLE)->onUpdate('cascade')->onDelete('cascade');
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
