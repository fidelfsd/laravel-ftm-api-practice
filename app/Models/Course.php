<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    /**
     * App\Models\Course
     *
     * @property int $id
     * @property string $title
     * @property string $description
     * @property string $start_date
     * @property string $end_date
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Student> $students
     * @property-read int|null $students_count
     * @method static \Database\Factories\CourseFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Course query()
     * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Course whereEndDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Course whereStartDate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Course whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
     */

    use HasFactory;

    // N:N con Student
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'course_id', 'student_id')->withPivot('enrollment_date', 'status');
    }
}
