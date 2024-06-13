<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        //'id',
        'date',
        'type',
        'distance',
        'duration',
        'avg_speed',
        'avg_steps',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function calculateCaloriesBurned()
    {
        $user = $this->user;
        $healthData = $user->healthDatas()->latest()->first();
        $weight = $healthData ? $healthData->weight : 0;

        $duration = $this->duration / 3600; // Convert duration from seconds to minutes
        $caloriesBurned = 0;

        switch ($this->type) {
            case 'bicycle':
                $caloriesBurned = 0.061 * $weight * $duration;
                break;
            case 'Run':
                $caloriesBurned = 9.8 * $weight * $duration;
                break;
            case 'walk':
                $caloriesBurned = 0.035 * $weight * $duration;
                break;
            default:
                break;
        }

        return round($caloriesBurned, 2);
    }
}
