<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    /**
     * App\Models\User
     *
     * @property int $id
     * @property string $username
     * @property string $first_name
     * @property string $last_name
     * @property string $password_hash
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
     * @property-read int|null $roles_count
     * @property-read \App\Models\Student|null $student
     * @property-read \App\Models\Teacher|null $teacher
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
     * @property-read int|null $tokens_count
     * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|User query()
     * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswordHash($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
     */

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
