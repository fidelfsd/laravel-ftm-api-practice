<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory, HasApiTokens;

    // protected $fillable = [
    //     'username',
    //     'first_name',
    //     'last_name',
    //     'email',
    //     'password_hash'
    // ];

    protected $table = 'users'; // especificar la tabla en caso que no cumpla la convension de Laravel

    // https://laravel.com/docs/10.x/eloquent-serialization#hiding-attributes-from-json
    protected $hidden = ['password_hash'];

    // N:N con Role
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }

    // 1:1 con Student
    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'user_id');
    }

    // 1:1 con Teacher
    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class, 'user_id');
    }
}
