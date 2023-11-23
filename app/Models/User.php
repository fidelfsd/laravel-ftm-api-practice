<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

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
