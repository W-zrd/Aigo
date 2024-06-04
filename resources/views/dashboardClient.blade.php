<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="shortcut icon" href="{{ asset('/asset/svg/logo.svg') }}" />
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
      <link href="{{ asset('/asset/main.css') }}" rel="stylesheet" />
      <link href="{{ asset('/asset/css/dashboard.css') }}" rel="stylesheet" />
      <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

      <title>Dashboard</title>
   </head>
   <body>
      <div class="container-flex">
         @include('client-sidebar')
         <div class="content">
            <h2 class="mt-5 mb-5 fw-bold">
               <center>Customer Dashboard</center>
            </h2>

            <div class="row pe-5 ps-5 pb-4">

               {{-- KOLOM 1 --}}
               <div class="col-7 ">
                  {{-- PROFILE & RECOMMENDATIONS --}}
                  <div class="row boxshadow mb-4">
                     {{-- PROFILE --}}
                     <div class="col me-3">
                        <section class="customer-profile">
                           <div class="profile-image"></div>
                           <h2 class="customer-name">{{auth()->user()->name}}</h2>
                           <p class="customer-email">{{auth()->user()->email}}</p>
                           
                           <div class="customer-stats">
                             <div class="stat-item">
                               <span class="stat-label">Weight</span>
                               <div class="stat-value">
                                 <span class="stat-number">{{$healthData->weight ?? 'N/A'}}</span>
                                 <span class="stat-unit">kg</span>
                               </div>
                             </div>
                             
                             <div class="stat-item">
                               <span class="stat-label">Height</span>
                               <div class="stat-value">
                                 <span class="stat-number">{{$healthData->height ?? 'N/A'}}</span>
                                 <span class="stat-unit">cm</span>
                               </div>
                             </div>
                             
                             <div class="obesity-status">
                               <span class="obesity-label">Obesity Status</span>
                               <span class="obesity-value">{{ $healthData->obesity_status ?? "N/A"}}</span>
                             </div>
                           </div>
                         </section>
                         
                     </div>
                     
                     {{-- RECOMMENDATIONS --}}
                     <div class="col">
                        <h2 class="customer-name fs-5 ">Recommendations</h2>
                        <section class="calories-container mt-3">
                           <div class="icon-wrapper" id="calories">
                             <img src="{{asset('/asset/svg/flame.svg')}}" alt="Calories icon" class="calories-icon" />
                           </div>
                           <div class="calories-info">
                             <p class="calories-label pt-2">Calories</p>
                             <p class="calories-value">{{ $healthData->calorie_recommendation ?? 'N/A' }} cal</p>
                           </div>
                         </section>

                         <section class="calories-container mt-2">
                           <div class="icon-wrapper" id="distance">
                             <img src="{{asset('/asset/svg/shoes.svg')}}" alt="Calories icon" class="calories-icon" />
                           </div>
                           <div class="calories-info">
                             <p class="calories-label pt-2">Running Distance</p>
                             <p class="calories-value">{{ $totalDistance ?? 'N/A' }} meters</p>
                           </div>
                         </section>

                         <section class="calories-container mt-2">
                           <div class="icon-wrapper" id="sleep">
                             <img src="{{asset('/asset/svg/moon.svg')}}" alt="Calories icon" class="calories-icon" />
                           </div>
                           <div class="calories-info">
                             <p class="calories-label pt-2">Sleep Time</p>
                             <p class="calories-value">{{ $healthData->sleeptime ?? 'N/A' }} hours/day</p>
                           </div>
                         </section>
                     </div>
                  </div>
                  

                  {{-- ACTIVITY HISTORY --}}
                  <div class="row">
                     <section class="activity-log">
                        <header class="activity-header">
                          <div class="header-date">Date</div>
                          <div class="header-activity">Activity</div>
                          <div class="header-distance">Distance</div>
                          <div class="header-duration">Duration</div>
                        </header>

                        @foreach ($activities as $activity)
                           <article class="activity-item mb-3">
                              <div class="item-date">{{ $activity['date'] }}</div>
                              <div class="item-activity">{{ $activity['type'] }}</div>
                              <div class="item-distance">{{ $activity['distance'] }} m</div>
                              <div class="item-duration">{{ $activity['duration'] }} seconds</div>
                           </article>
                        @endforeach
                      </section>
                  </div>
               </div>

               {{-- KOLOM 2: UPCOMING APPOINTMENT --}}
               <div class="col-4 boxshadow ms-4 ps-4">
                  
                  <div class="row">

                     <article class="appointment-item">
                        <h2 class="customer-name fs-5 mb-4">Upcoming Appointment</h2>
                        <div class="mt-1">
                           <div class="appointment-time">
                              <div class="appointment-status"></div>
                              <time class="appointment-datetime">Today, 08:30 AM - 10:30 AM</time>
                            </div>
                            <div class="appointment-details">
                              <div class="appointment-connector"></div>
                              <div class="doctor-info mt-2">
                                <p class="doctor-name">Nama Dokter</p>
                                <p class="hospital-name">RS. Telkomedika Bandung</p>
                              </div>
                            </div>
                        </div>

                        <div class="mt-1">
                           <div class="appointment-time">
                              <div class="appointment-status"></div>
                              <time class="appointment-datetime">Today, 08:30 AM - 10:30 AM</time>
                            </div>
                            <div class="appointment-details">
                              <div class="appointment-connector"></div>
                              <div class="doctor-info mt-2">
                                <p class="doctor-name">Nama Dokter</p>
                                <p class="hospital-name">RS. Telkomedika Bandung</p>
                              </div>
                            </div>
                        </div>

                        <div class="mt-1">
                           <div class="appointment-time">
                              <div class="appointment-status"></div>
                              <time class="appointment-datetime">Today, 08:30 AM - 10:30 AM</time>
                            </div>
                            <div class="appointment-details">
                              <div class="appointment-connector"></div>
                              <div class="doctor-info mt-2">
                                <p class="doctor-name">Nama Dokter</p>
                                <p class="hospital-name">RS. Telkomedika Bandung</p>
                              </div>
                            </div>
                        </div>

                        
                      </article>
                      
                      
                  </div>
               </div>

            </div>
                  
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

      {{-- <script>
         // Ambil nilai obesityPrediction dari PHP dan pasang ke elemen HTML yang sesuai
         var obesityPrediction = "{{ $obesityPrediction }}";
         document.getElementById('obesityValue').innerText = obesityPrediction;
      </script> --}}
   </body>
</html>
