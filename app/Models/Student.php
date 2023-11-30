<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    /**
     * App\Models\Student
     *
     * @property int $id
     * @property int $user_id
     * @property \Illuminate\Support\Carbon|null $date_of_birth
     * @property string|null $address
     * @property string $phone_number
     * @property string $gender
     * @property string $nationality
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Course> $courses
     * @property-read int|null $courses_count
     * @property-read \App\Models\User $user
     * @method static \Database\Factories\StudentFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Student query()
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereAddress($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereDateOfBirth($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereGender($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereNationality($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student wherePhoneNumber($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Student whereUserId($value)
     */
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
