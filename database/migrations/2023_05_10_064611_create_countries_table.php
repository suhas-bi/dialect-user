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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');	
            $table->string('iso3')->nullable();		
            $table->string('numeric_code')->nullable();		
            $table->string('iso2')->nullable();		
            $table->string('phonecode');		
            $table->string('capital')->nullable();		
            $table->string('currency')->nullable();		
            $table->string('currency_name')->nullable();		
            $table->string('currency_symbol')->nullable();		
            $table->string('tld')->nullable();		
            $table->string('native')->nullable();		
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
