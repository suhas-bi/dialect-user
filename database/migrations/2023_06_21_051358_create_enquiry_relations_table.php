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
        Schema::create('enquiry_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiry_id');
            $table->unsignedBigInteger('recipient_company_id')->nullable();
            $table->unsignedBigInteger('to_id')->nullable();
            $table->integer('is_read')->default(0); /* 1 => Read , 0 => Not Read */
            $table->integer('is_replied')->default(0); /* 1 => Replied , 0 => Not Replied */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiry_relations');
    }
};
