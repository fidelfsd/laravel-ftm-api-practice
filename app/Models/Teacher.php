<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    use HasFactory;

    // 1:1 inversa con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
