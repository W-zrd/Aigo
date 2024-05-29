<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Notification;

class DoctorController extends Controller
{
    public function dashboard(){
        return view('dashboardDoctor');
    }

    public function notifications()
    {
        $doctor = auth()->user();
        $notifications = Notification::where('user_id', $doctor->id)->orderBy('created_at', 'desc')->get();

        return view('doctor-notifications', compact('notifications'));
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
    
        // Create notification for the patient
        $patientNotification = new Notification();
        $patientNotification->user_id = $consultation->patient_id;
        $patientNotification->consultation_id = $consultation->id;
        $patientNotification->message = 'Your consultation request has been approved by Dr. ' . $consultation->doctor->name . '.';
        $patientNotification->save();
    
        // Create notification for the doctor
        $doctorNotification = new Notification();
        $doctorNotification->user_id = $consultation->doctor_id;
        $doctorNotification->consultation_id = $consultation->id;
        $doctorNotification->message = 'You have approved the consultation request from ' . $consultation->patient->name . '.';
        $doctorNotification->save();
    
        return redirect()->back()->with('success', 'Consultation approved successfully.');
    }

    public function declineConsultation($consultationId)
    {
        $consultation = Consultation::findOrFail($consultationId);
        $consultation->consultation_status = 'declined';
        $consultation->save();
    
        // Create notification for the patient
        $patientNotification = new Notification();
        $patientNotification->user_id = $consultation->patient_id;
        $patientNotification->consultation_id = $consultation->id;
        $patientNotification->message = 'Your consultation request has been declined by Dr. ' . $consultation->doctor->name . '.';
        $patientNotification->save();
    
        // Create notification for the doctor
        $doctorNotification = new Notification();
        $doctorNotification->user_id = $consultation->doctor_id;
        $doctorNotification->consultation_id = $consultation->id;
        $doctorNotification->message = 'You have declined the consultation request from ' . $consultation->patient->name . '.';
        $doctorNotification->save();
    
        return redirect()->back()->with('success', 'Consultation declined successfully.');
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
