<?php

use App\Models\Member;
use App\Models\Payment;
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
        Schema::create(Payment::TABLE, function (Blueprint $table) {
            $table->increments('payment_id');
            $table->unsignedInteger('member_id');
            $table->date('payment_date');
            $table->float('amount');
            $table->timestamps();
            $table->foreign('member_id')->references('member_id')->on(Member::TABLE)->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
