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
            $table->string('name');  // Cột tên người dùng
            $table->string('email')->unique();  // Cột email, unique để không trùng lặp
            $table->timestamp('email_verified_at')->nullable();  // Cột xác nhận email
            $table->string('password');  // Cột mật khẩu
            $table->rememberToken();  // Cột để nhớ người dùng
            $table->timestamps();  // Thêm thời gian tạo và cập nhật
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
