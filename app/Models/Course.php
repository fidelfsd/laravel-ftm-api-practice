<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    // N:N con Student
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'course_id', 'student_id')->withPivot('enrollment_date', 'status');
    }
}
