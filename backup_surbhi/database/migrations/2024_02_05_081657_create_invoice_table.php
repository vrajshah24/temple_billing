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
        Schema::create('invoice_master', function (Blueprint $table) {
            $table->id('invoice_master_id');
            $table->string('master_date');
            $table->string('bill_no');
            $table->string('invoice_client_name');
            $table->decimal('total_amount', 10, 2);
            $table->string('invoice_client_address');
            $table->integer('trust_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_master');
    }
};
