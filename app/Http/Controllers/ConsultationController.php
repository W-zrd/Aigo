<?php

namespace App\Http\Controllers;

use App\Models\HealthData;
use App\Models\User;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConsultationController extends Controller
{
    public function showHealthDataForm()
    {
        $user = auth()->user();
        $healthData = HealthData::where('users_id', $user->id)->get()->last();
        return view('health-data', compact('healthData'));
    }

    public function storeHealthDataForm(Request $request)
    {
        $user = auth()->user();
        
        $data = HealthData::create(
            [
                'users_id' => $user->id,
                'birthdate' => Carbon::parse($request->input('birthdate'))->format('Y-m-d'),
                'weight' => $request->input('weight'),
                'height' => $request->input('height'),
                'sleeptime' => $request->input('sleeptime'),
                'disease' => $request->input('disease'),
                'food' => $request->input('food'),
                'alergi_makanan' => $request->input('alergi_makanan'),
            ]
        );
        return redirect()->route('jadwal.show');
    }


    public function showJadwalForm()
    {
        $user = auth()->user();
        $doctors = User::where('user_role', 'doctor')->get();
        return view('jadwal-konsultasi', compact('doctors'));
    }

    public function storeConsultation(Request $request)
    {
        $user = auth()->user();
    
        $data = Consultation::create([
            'patient_id' => $user->id,
            'doctor_id' => $request->input('doctor_id'),
            'consultation_date' => Carbon::parse($request->input('consultation_date'))->format('Y-m-d'),
            'consultation_time' => $request->input('consultation_time'),
            'location' => $request->input('location'),
            'consultation_status' => 'pending',
        ]);
        return redirect()->route('dashboard');
        //return redirect()->route('consultation.success');
    }
    
}   