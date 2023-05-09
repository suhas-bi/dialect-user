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
        Schema::create('company_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->integer('role');  /* 1 => Admin, 2 => Procurement, 3 => Sales, 4 => Member */
            $table->string('designation')->nullable();
            $table->string('email');
            $table->string('country_code');
            $table->string('mobile');
            $table->string('country_code_landline')->nullable();
            $table->string('landline')->nullable();
            $table->string('extension')->nullable();
            $table->string('password')->nullable();
            $table->integer('status')->default(0); /* 0 => In Active, 1 => Active */
            $table->integer('approval_status')->default(0); /* 0 => Approval Pending , 1 => Active */
            $table->string('token')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_users');
    }
};
