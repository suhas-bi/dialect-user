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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('country_code');
            $table->string('phone');
            $table->string('pobox');
            $table->string('fax')->nullable();
            $table->string('address')->nullable();
            $table->string('zone')->nullable();
            $table->string('street')->nullable();
            $table->string('building')->nullable();
            $table->string('unit')->nullable();
            $table->string('country_id');
            $table->string('logo')->nullable();
            $table->string('domain')->nullable();
            $table->string('decleration')->nullable();
            $table->string('declaration_updated_at')->nullable();
            $table->string('status')->nullable();
            $table->string('is_approved')->nullable();
            $table->string('is_overlap')->nullable();
            $table->string('is_superseded')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
