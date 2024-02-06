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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable()->unique();
            $table->bigInteger('phone')->nullable()->uniqid();
            $table->string('password');
            $table->unsignedInteger('doctor_create_limit')->default(10);
            $table->unsignedInteger('used_limit')->default(0);
            $table->enum('role', ['admin', 'mr'])->default('mr'); 
            $table->enum('status', ['Active', 'InActive', 'Suspend', 'Block'])->default('Active');
            $table->date('date_of_birth')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
