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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // Relasi dengan table user menggunakan aturan laravel, maka user + _id
            $table->foreignId('user_id')->constrained();
            
            $table->unsignedBigInteger('paid_with')->nullable(); // membuat kolom
            $table->foreign('paid_with')->references('id')->on('app_settings'); // 

            $table->string('code_transaction');
            $table->dateTime('date');
            $table->enum('status', ['success', 'cancel', 'pending', 'delivery']);
            $table->integer('total_amount');
            $table->enum('payment_type', ['cash', 'cashless']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
