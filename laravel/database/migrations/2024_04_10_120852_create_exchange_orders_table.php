<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exchange_orders', function (Blueprint $table) {
            $table->id();

            $table->string('email');
            $table->string('source_currency');
            $table->string('target_currency');
            $table->decimal('amount', 16, 2);
            $table->string('tracking_code')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_orders');
    }
};
