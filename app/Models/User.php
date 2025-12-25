<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
        // داخل Models/User.php

// البحث بالاسم أو البريد الإلكتروني (Keyword)
    public function scopeSearchKeyword($query, $keyword)
    {
    return $query->where(function ($q) use ($keyword) {
        $q->where('name', 'like', "%$keyword%")
          ->orWhere('email', 'like', "%$keyword%");
    });
    }

// المستخدمين لا يملكون سعراً، لذا يمكننا ترك هذا الـ Scope فارغاً أو البحث بحسب العمر/الرصيد
    public function scopePriceBetween($query, $min, $max)
    {
    return $query; // كود آمن للتعامل مع القيم الفارغة
    }
    
// public function scopePriceBetween($query, $min, $max) {
//     return $query; // لا يفعل شيئاً للمستخدمين، فقط يمنع الخطأ
// }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
