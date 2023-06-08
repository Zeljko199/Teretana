<?php

use App\Models\Category;
use App\Models\Trainer;
use App\Models\User;
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
        Schema::create(Trainer::TABLE, function (Blueprint $table) {
            $table->increments('trainer_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('description')->nullable();
            $table->date('join_date');
            $table->boolean('is_active')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(User::TABLE)->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('category_id')->constrained(Category::TABLE);
            $table->foreign('category_id')->references('id')->on(Category::TABLE)->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
