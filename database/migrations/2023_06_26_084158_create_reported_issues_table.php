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
        Schema::create('reported_issues', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->unsignedBigInteger('enquiry_id');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->unsignedBigInteger('reported_by')->nullable();
            $table->datetime('reported_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reported_issues');
    }
};
