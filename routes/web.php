<?php


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Consultation;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\StravaController;
use App\Http\Controllers\Api\HealthDataAPIController;
use App\Http\Controllers\Api\UserAPIController;
use App\Http\Middleware\RedirectBasedOnRole;



Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/customer-transaction', function () {
    return view('customer-transaction');
});

Route::get('/customer-profile', function () {
    return view('customer-profile');
});

Route::get('/doctor-profile', function () {
    return view('doctor-profile');
});


Route::post('/strava/authorize', [StravaController::class, 'authorize'])->name('strava.authorize');
Route::get('/strava/callback', [StravaController::class, 'handleCallback'])->name('strava.callback');



// 1. CLIENT PAGES
Route::group(['prefix' => 'client', 'middleware' => ['auth', 'verified']], function () {
    // DASHBOARD CONTROLLER
    Route::get('/dashboard', [DashboardController::class, 'dashboardClient'])->name('dashboard')->middleware('role');
    Route::get('/activity-report', [DashboardController::class, 'activityReport'])->name('activity-report');
    Route::get('/result', [DashboardController::class, 'result'])->name('result');
    Route::get('/schedule', [DashboardController::class, 'schedule'])->name('customer.schedule');
    Route::get('/notifications', [DashboardController::class, 'notifications'])->name('client.notifications');

    // CONSULTATION CONTROLLER
    Route::get('/health-data', [ConsultationController::class, 'showHealthDataForm'])->name('health-data.show');
    Route::post('/health-data', [ConsultationController::class, 'storeHealthDataForm'])->name('health-data.store');
    Route::get('/jadwal', [ConsultationController::class, 'showJadwalForm'])->name('jadwal.show');
    Route::post('/consultation', [ConsultationController::class, 'storeConsultation'])->name('consultation.store');
    Route::get('/profile', function () {return view('customer-profile');})->name('customer.profile');
    Route::get('/transaction', function () {return view('customer-transaction');})->name('customer.transaction');
    Route::get('/priv-policy', function () {return view('privacy-policy-client');})->name('customer.priv-policy');
    Route::get('/terms-con', function () {return view('terms-con-client');})->name('customer.terms-con');
});


// 2. ADMIN PAGES
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('role');
    Route::get('/admin/doctor-info', [AdminController::class, 'showDoctor'])->name('showDoctor');
    Route::get('/admin/patient-info', [AdminController::class, 'showPatient'])->name('showPatient');
    Route::get('/delete/user/{id}', [AdminController::class, 'delete'])->name('delete-user');
    Route::get('/user/{id}', [AdminController::class, 'showUserDetail'])->name('show-user');
    Route::post('/update/user/{id}', [AdminController::class, 'updateData'])->name('update-user');
    Route::get('/admin/profile', function () {return view('admin-profile');})->name('admin.profile');
    Route::get('/admin/priv-policy', function () {return view('privacy-policy-admin');})->name('admin.priv-policy');
    Route::get('/admin/terms-con', function () {return view('terms-con-admin');})->name('admin.terms-con');
    
});

// 3. DOCTOR PAGES
Route::group(['prefix' => 'doctor', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard')->middleware('role');
    Route::post('/decline-consultation/{consultationId}', [DoctorController::class, 'declineConsultation'])->name('doctor.decline-consultation');
    Route::get('/patient-acceptance', [DoctorController::class, 'patientAcceptance'])->name('doctor.patient-acceptance');
    Route::get('/notifications', [DoctorController::class, 'notifications'])->name('doctor.notifications');

    Route::get('/schedule', function () {
        return view('doctor-schedule');
    })->name('doctor.schedule');

    Route::get('/transaction', function () {return view('doctor-transaction');})->name('doctor.transaction');

    Route::get('/profile', function () {return view('doctor-profile');})->name('doctor.profile');
    Route::get('/doctor/priv-policy', function () {return view('privacy-policy-doctor');})->name('doctor.priv-policy');
    Route::get('/doctor/terms-con', function () {return view('terms-con-doctor');})->name('doctor.terms-con');

    Route::post('/approve-consultation/{consultationId}', [DoctorController::class, 'approveConsultation'])->name('doctor.approve-consultation');
    Route::get('/schedule', [DoctorController::class, 'schedule'])->name('doctor.schedule');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->get('/api/current-user-id', function () {
    return response()->json(['user_id' => Auth::id()]);
});

Route::get('/user/{id}', [UserAPIController::class, 'getUser']);
Route::get('/health-data/{userId}', [HealthDataAPIController::class, 'getHealthData']);

require __DIR__.'/auth.php';
