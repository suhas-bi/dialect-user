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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('from_id');
            $table->string('reference_no')->nullable();
            $table->string('parent_reference_no')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->integer('mail_type')->nullable();
            $table->integer('sender_type')->nullable(); /* 2 => Procurement, 3 => Sales, 4 => Member */
            $table->integer('is_limited')->default(0); /* 1 => Limited Participant Enquiry , 0 => Normal Enquiry */
            $table->integer('limited_status')->default(0); /* 0 => Pending, 1 => Approved , 2 => Rejected */
            $table->integer('is_draft')->default(1); /* 1 => Draft , 0 => Send */
            $table->integer('approve_status')->default(0); /* 0 => Pending, 1=> Approved, 2 => Rejected */ 
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->datetime('verified_at')->nullable();
            $table->string('subject')->nullable();
            $table->longText('body')->nullable();
            $table->date('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
