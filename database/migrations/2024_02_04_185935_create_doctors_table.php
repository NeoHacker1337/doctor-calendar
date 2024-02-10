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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_of_birth');
            $table->date('marriage_anniversary')->nullable();             
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->string('april_photo')->nullable();
            $table->string('may_photo')->nullable();
            $table->string('june_photo')->nullable();
            $table->string('july_photo')->nullable();
            $table->string('august_photo')->nullable();
            $table->string('september_photo')->nullable();
            $table->string('october_photo')->nullable();
            $table->string('november_photo')->nullable();
            $table->string('december_photo')->nullable();
            $table->string('january_photo')->nullable();
            $table->string('february_photo')->nullable();
            $table->string('march_photo')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
