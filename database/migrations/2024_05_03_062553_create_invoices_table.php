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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number',length:50);
            $table->timestamp('invoice_date', precision: 0);
            $table->float('invoice_amount', 53,3);
            $table->binary('invoice_image');
            $table->binary('invoice_coverLetter_image');      
            $table->string('status',length:50);
            $table->string('invoice_status',length:50);
            $table->string('all_invoices',length:50);           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
