<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_role',
        'username',
        'password',
        'name',
        'email',
        'telepon',
        'alamat',
        'gender'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function physicalActivities()
    {
        return $this->hasMany(PhysicalActivity::class, 'users_id');
    }

    public function healthDatas()
    {
        return $this->hasMany(HealthData::class, 'users_id');
    }

    public function patientResults()
    {
        return $this->hasMany(Result::class, 'patient_id');
    }

    public function doctorResults()
    {
        return $this->hasMany(Result::class, 'doctor_id');
    }
}
