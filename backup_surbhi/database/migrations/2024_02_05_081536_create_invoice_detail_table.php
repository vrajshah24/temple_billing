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
        Schema::create('invoice_master_detail', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('invoice_master_id');
            $table->foreign('invoice_master_id')->references('invoice_master_id')->on('invoice_master');
            $table->string('pancard_no');
            $table->string('splitBill_no');
            $table->string('date');
            $table->string('donor_address');
            $table->string('amount_in_words')->nullable();
            $table->decimal('building_funds', 10, 2)->nullable();
            $table->decimal('youth_activities', 10, 2)->nullable();
            $table->decimal('cultural_programs', 10, 2)->nullable();
            $table->decimal('social_awareness', 10, 2)->nullable();
            $table->decimal('medical_aid', 10, 2)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('cheque_number')->nullable();
            $table->string('cheque_date')->nullable();
            $table->string('drawn_on')->nullable();
            $table->decimal('cheque_amount', 10, 2)->nullable();
            $table->decimal('cash_amount', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_master_detail');
    }
};
