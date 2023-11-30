<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    /**
     * App\Models\Enrollment
     *
     * @property int $id
     * @property int $student_id
     * @property int $course_id
     * @property string $enrollment_date
     * @property string $status
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Database\Factories\EnrollmentFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Enrollment query()
     * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereCourseId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereEnrollmentDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereStatus($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereStudentId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereUpdatedAt($value)
     */

    use HasFactory;
}
