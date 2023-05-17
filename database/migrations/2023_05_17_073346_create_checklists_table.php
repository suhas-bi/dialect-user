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
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->integer('company_name')->default(0);
            $table->integer('mobile')->default(0);
            $table->integer('landline')->default(0);
            $table->integer('fax')->default(0);
            $table->integer('email')->default(0);
            $table->integer('website')->default(0);
            $table->integer('address')->default(0);
            $table->integer('building')->default(0);
            $table->integer('pobox')->default(0);
            $table->integer('country')->default(0);
            $table->integer('street')->default(0);
            $table->integer('unit')->default(0);
            $table->integer('operating_regions')->default(0);
            $table->integer('business_categories')->default(0);
            $table->integer('document_type')->default(0);
            $table->integer('document_no')->default(0);
            $table->integer('document')->default(0);
            $table->datetime('document_updated_at');
            $table->integer('declaration')->default(0);
            $table->integer('declaration_seal')->default(0);
            $table->integer('declaration_signature')->default(0);
            $table->datetime('declaration_updated_at');
            $table->integer('account_verification')->default(0);
            $table->integer('remarks')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklists');
    }
};
