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
            $table->string('hospital_name');
            $table->string('registration_number');
            $table->string('name');
            $table->string('email');
            $table->string('contact_number');
            $table->string('education');
            $table->string('specialization');
            $table->text('address')->nullable();
            $table->string('open_days');
            $table->string('open_time');
            $table->date('date_of_birth');
            $table->date('marriage_anniversary')->nullable();
            $table->enum('status', ['Active', 'InActive', 'Suspend', 'Block'])->default('Active');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
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
