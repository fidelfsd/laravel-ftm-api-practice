<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'user_id',
    //     'date_of_birth',
    //     'address',
    //     'phone_number',
    //     'gender',
    //     'nationality'
    // ];

    protected $hidden = ['created_at', 'updated_at'];

    // https://laravel.com/docs/10.x/eloquent-mutators#date-casting
    protected $casts = [
        'date_of_birth' => 'datetime:Y-m-d',
    ];

    // 1:1 inversa con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // N:N con Course
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id')->withPivot('enrollment_date', 'status');
    }
}
