<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    /**
     * App\Models\Teacher
     *
     * @property int $id
     * @property int $user_id
     * @property string $specialization
     * @property string $academic_degree
     * @property int $work_experience
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \App\Models\User $user
     * @method static \Database\Factories\TeacherFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher query()
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereAcademicDegree($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereSpecialization($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUserId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereWorkExperience($value)
     */

    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    // 1:1 inversa con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
