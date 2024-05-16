<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthData extends Model
{
    use HasFactory;
    protected $table = 'health_datas';
    
    protected $fillable = [
        'users_id',
        'birthdate',
        'weight',
        'height',
        'sleeptime',
        'disease',
        'food',
        'alergi_makanan',
        'obesity_status',
        'calorie_recommendation',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
