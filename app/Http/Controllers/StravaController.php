<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\PhysicalActivity;


class StravaController extends Controller
{

    public function authorize(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            if (Auth::user()->user_role == 'user') {
                $clientId = "124405";
                $redirectUri = route('strava.callback');
                $authUrl = "https://www.strava.com/oauth/authorize?client_id={$clientId}&redirect_uri={$redirectUri}&response_type=code&scope=activity:read_all";
    
                return redirect()->away($authUrl);
            } elseif (Auth::user()->user_role == 'doctor') {
                return redirect()->route('doctor.dashboard');
            } else {
                return redirect()->route('admin.dashboard');
            }
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function handleCallback(Request $request)
    {
        $authorizationCode = $request->input('code');
        if ($authorizationCode) {
            $tokenEndpoint = "https://www.strava.com/oauth/token";
            $clientId = "124405";
            $clientSecret = "2df5d622c326215c290841fb0ffcdd894274803e";

            $response = Http::post($tokenEndpoint, [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'code' => $authorizationCode,
                'grant_type' => 'authorization_code',
            ]);

            $data = $response->json();
            //dd($data);
            $accessToken = $data['access_token'];
            

            // Store the access token in the session or database for future API requests
            session(['strava_access_token' => $accessToken]);
            // Redirect the user to the desired page after successful authorization
            
            if (auth()->user()->user_role == 'user') {
                $this->fetchAthleteActivities($data['access_token']);
                return redirect()->intended(route('dashboard'));
            } else if (auth()->user()->user_role == 'doctor') {
                return redirect()->intended(route('doctor.dashboard'));
            } else {
                return redirect()->intended(route('admin.dashboard'));
            }
        }

        // Handle the case when the authorization code is missing
        return view('auth.login');
    }

    public function fetchAthleteActivities($accessToken)
    {
        $accessToken = session('strava_access_token');
    
        if ($accessToken) {
            $activitiesEndpoint = "https://www.strava.com/api/v3/athlete/activities";
    
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($activitiesEndpoint);
    
            $activities = $response->json();
            //dd($activities);
            foreach ($activities as $activity) {
                $existingActivity = PhysicalActivity::where('id', $activity['id'])->first();
    
                if (!$existingActivity) {
                    $startDate = new \DateTime($activity['start_date_local']);
                    $formattedDate = $startDate->format('Y-m-d H:i:s');
    
                    PhysicalActivity::create([
                        'users_id' => auth()->user()->id,
                        'id' => $activity['id'],
                        'date' => $formattedDate,
                        'type' => $activity['type'],
                        'distance' => $activity['distance'],
                        'duration' => $activity['moving_time'],
                        'avg_speed' => $activity['average_speed'],
                        'avg_steps' => $activity['average_cadence'] ?? 0,
                    ]);
                }
            }
    
            return $activities;
        }
    
        // Handle the case when the access token is missing
        return redirect()->route('login')->with('error', 'Strava access token not found.');
    }
}