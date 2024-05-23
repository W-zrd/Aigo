<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;

class DoctorController extends Controller
{
    public function dashboard(){
        return view('dashboardDoctor');
    }

    public function patientAcceptance()
    {
        $doctor = auth()->user();
        $consultations = Consultation::with('patient')
            ->where('doctor_id', $doctor->id)
            ->where('consultation_status', 'pending')
            ->get();

        return view('acceptance-patients', compact('consultations'));
    }

    public function approveConsultation($consultationId)
    {
        $consultation = Consultation::findOrFail($consultationId);
        $consultation->consultation_status = 'approved';
        $consultation->save();

        return redirect()->back()->with('success', 'Consultation approved successfully.');
    }

    public function schedule()
    {
        $doctor = auth()->user();
        $approvedConsultations = Consultation::where('doctor_id', $doctor->id)
            ->where('consultation_status', 'approved')
            ->with('patient.healthDatas')
            ->get();

        return view('doctor-schedule', compact('approvedConsultations'));
    }
}
