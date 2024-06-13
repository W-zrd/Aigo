<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\StravaController;
use App\Http\Controllers\ConsultationController;
use App\Models\PhysicalActivity;
use App\Models\HealthData;
use App\Models\Result;
use App\Models\Notification;
use App\Models\Consultation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    public function dashboardClient()
    {
        $user = auth()->user();

        $activities = PhysicalActivity::where('users_id', $user->id)->get();
        $healthData = HealthData::where('users_id', $user->id)->get()->last();

        $activities->transform(function ($activity) {
            $activity->date = Carbon::parse($activity->date)->format('d M Y');
            $activity->calories_burned = $activity->calculateCaloriesBurned();
            return $activity;
        });
        
        // Loop through activities and print out the values
        
        $totalDistance = $activities->sum('distance');

        if ($healthData) {
            // Check if obesity_status is null
            if (!$healthData->obesity_status) {
                // Call prediction method only if obesity_status is null
                $obesityPrediction = $this->predictObesity($healthData, $user);
                $healthData->obesity_status = $obesityPrediction;
                $healthData->save();
            }
    
            // Check if calorie_recommendation is null
            if (!$healthData->calorie_recommendation) {
                // Call calorie prediction method only if calorie_recommendation is null
                $calorieRecommendation = $this->predictCalories($healthData, $user);
                $healthData->calorie_recommendation = $calorieRecommendation;
                $healthData->save();
            }
        }
    
        return view('dashboardClient', compact('activities', 'healthData', 'totalDistance'));
    }
    
    private function predictObesity($healthData, $user)
    {
        $data = [
            'height' => $healthData->height ?? 0,
            'weight' => $healthData->weight ?? 0,
            'age' => now()->diffInYears($healthData->birthdate ?? '2000-03-25'),
            'gender' => ($user->gender === 'male') ? 'M' : 'F',
            'activity_level' => 1,
        ];

        $obesityPrediction = Http::post('https://aigo-api.w333zard.my.id/api/predict/obesity', $data)->json();
        $predictedCategory = $obesityPrediction['predicted_category'] ?? null;
        return $predictedCategory;
    }

    private function predictCalories($healthData, $user)
    {
        $data = [
            'height' => $healthData->height ?? 0,
            'weight' => $healthData->weight ?? 0,
            'age' => now()->diffInYears($healthData->birthdate ?? '2000-03-25'),
            'gender' => ($user->gender === 'male') ? 'M' : 'F',
        ];
    
        $response = Http::post('https://aigo-api.w333zard.my.id/api/predict/calorie', $data);
        $predictedCalories = ceil($response->json()['predicted_calories']);
    
        return $predictedCalories;
    }

    public function activityReport()
    {
        $currentMonth = now()->format('m');
        $currentYear = now()->format('Y');
    
        $user = auth()->user();
        $healthData = HealthData::where('users_id', $user->id)
        ->orderBy('updated_at', 'desc')
        ->get();

        $healthData->transform(function ($item) {
            $item->formatted_created_at = Carbon::parse($item->created_at)->format('d F Y');
            $item->time = Carbon::parse($item->created_at)->format('h:i A');
            return $item;
        });
    
        $activities = PhysicalActivity::whereYear('date', $currentYear)
            ->whereMonth('date', $currentMonth)
            ->where('users_id', $user->id)
            ->get();
    
        $totalSteps = $activities->sum('avg_steps');
        $totalDistance = $activities->sum('distance');
        $totalDuration = $activities->sum('duration');

        if ($totalDuration < 60) {
            $durationValue = $totalDuration;
            $durationUnit = 'seconds';
        } elseif ($totalDuration < 3600) {
            $durationValue = floor($totalDuration / 60);
            $durationUnit = 'minutes';
        } else {
            $durationValue = floor($totalDuration / 3600);
            $durationUnit = 'hours';
        }

        $filteredHealthData = collect();
        foreach ($healthData as $index => $data) {
            if ($index < $healthData->count() - 1) {
                $nextWeight = $healthData[$index + 1]->weight;
                $data->weight_difference = $data->weight - $nextWeight;
                if ($data->weight_difference != 0) {
                    $filteredHealthData->push($data);
                }
            } else {
                $data->weight_difference = 0;
                $filteredHealthData->push($data);
            }
        }
    
        $totalSleepTime = $healthData->sum('sleeptime');
        if ($healthData->count() > 0) {
            $averageSleepTime = number_format($totalSleepTime / $healthData->count(), 2);
        } else {
            $averageSleepTime = 0; 
        }
    
        $latestHealthData = $healthData->last();
        if ($latestHealthData) {
            $predictedCalories = $this->predictCalories($latestHealthData, $user);
        } else {
            $predictedCalories = 0;
        }

        $recommended_distance = Result::where('patient_id', $user->id)->get()->last()->jarak_lari ?? 0;
        
        
        $chartData = PhysicalActivity::whereYear('date', $currentYear)
        ->whereMonth('date', $currentMonth)
        ->where('users_id', $user->id)
        ->orderBy('date')
        ->get();

        $labels = $chartData->map(function ($activity) {
            return Carbon::parse($activity->date)->format('d F');
        });

        $distances = $chartData->map(function ($activity) {
            return intval($activity->distance);
        });

        $durations = $chartData->map(function ($activity) {
            return intval($activity->duration);
        });

        return view('activity-report', compact(
            'totalSteps', 'totalDistance', 'durationValue', 'durationUnit',
            'averageSleepTime', 'filteredHealthData', 'activities', 'predictedCalories',
            'recommended_distance', 'labels', 'distances', 'durations'
        ));
    }
    
    public function schedule()
    {
        $user = auth()->user();
    
        $approvedConsultations = Consultation::where('patient_id', $user->id)
        ->where('consultation_status', 'approved')
        ->with('doctor')
        ->get();
    
        return view('customer-schedule', compact('approvedConsultations'));
    }

    public function notifications()
    {
        $patient = auth()->user();
        $notifications = Notification::where('user_id', $patient->id)->orderBy('created_at', 'desc')->get();

        return view('patient-notifications', compact('notifications'));
    }

    public function consultation()
    {
        return view('health-data');
    }


    public function consultationResults()
    {
        $patient = auth()->user();
        $consultations = Consultation::where('patient_id', $patient->id)
            ->where('consultation_status', 'finished')
            ->with('doctor', 'result')
            ->orderBy('consultation_date', 'desc')
            ->get();
        
        return view('customer-result', compact('consultations'));
    }

}