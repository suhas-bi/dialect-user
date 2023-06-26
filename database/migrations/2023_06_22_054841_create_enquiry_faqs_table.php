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
        Schema::create('enquiry_faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiry_id');
            $table->unsignedBigInteger('reference_no')->nullable();
            $table->text('question')->nullable();
            $table->text('answer')->nullable();
            $table->datetime('answered_at')->nullable();
            $table->integer('status')->default(0); /* 0 => pending, 1 => answered, 2 => skipped */
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiry_faqs');
    }
};
