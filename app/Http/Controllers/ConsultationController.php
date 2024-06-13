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
        $validatedData = $request->validate([
            'birthdate' => 'required|date',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'sleeptime' => 'required|integer',
            'disease' => 'required|string',
            'food' => 'required|string',
            'alergi_makanan' => 'required|string',
        ]);
    
        $user = auth()->user();
    
        $data = HealthData::create(
            [
                'users_id' => $user->id,
                'birthdate' => Carbon::parse($validatedData['birthdate'])->format('Y-m-d'),
                'weight' => $validatedData['weight'],
                'height' => $validatedData['height'],
                'sleeptime' => $validatedData['sleeptime'],
                'disease' => $validatedData['disease'],
                'food' => $validatedData['food'],
                'alergi_makanan' => $validatedData['alergi_makanan'],
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

    // ConsultationController.php
    public function storeConsultation(Request $request)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'consultation_date' => 'required|date',
            'consultation_time' => 'required',
            'location' => 'required|string',
        ]);

        $user = auth()->user();

        $data = Consultation::create([
            'patient_id' => $user->id,
            'doctor_id' => $validatedData['doctor_id'],
            'consultation_date' => Carbon::parse($validatedData['consultation_date'])->format('Y-m-d'),
            'consultation_time' => $validatedData['consultation_time'],
            'location' => $validatedData['location'],
            'consultation_status' => 'pending',
        ]);

        return redirect()->route('dashboard');
    }
    
}   