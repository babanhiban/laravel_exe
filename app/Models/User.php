<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tên bảng nếu cần custom (Laravel mặc định là "users")
    // protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        // 'phone', // thêm sau nếu có
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
}
