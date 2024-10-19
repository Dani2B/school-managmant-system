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
        Schema::table('users', function (Blueprint $table) {
           $table->string('street')->after('date_of_birth')->nullable(); 
           $table->string('house number')->after('street ')->nullable(); 
           $table->string('zip-code')->after('house number')->nullable(); 
           $table->string('city')->after('zip-code')->nullable(); 
           $table->string('country')->after('city')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
