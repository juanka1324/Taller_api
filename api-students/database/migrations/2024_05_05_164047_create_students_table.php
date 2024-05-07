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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname'); 
            $table->integer('age');
            $table->string('email');
            $table->string('city');
            $table->string('address');
            $table->date('birthdate');
            $table->boolean('status')->default(1); 
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
