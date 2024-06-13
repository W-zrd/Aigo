<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta property="og:title" content="Aigo@w33zard" />
        <meta property="og:description" content="AIGO: AI-recommended Guidance for Obesity management " />
        <meta property="og:image" content="{{ asset('/asset/png/thumbnail.png') }}"/>
        <meta property="og:url" content="https://aigo.w333zard.my.id/" />
        <link rel="shortcut icon" href="{{ asset('/asset/svg/logo.svg') }}" />

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link href="{{ asset('/asset/main.css') }}" rel="stylesheet" />
        <link href="{{ asset('/asset/css/activity-report.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <title>Activity Report</title>
     </head>
   <body>
      <div class="container-flex">
         @include('client-sidebar')
         <div class="content">
            <h2 class="mt-5 mb-4 fw-bold">
               <center>Activity Report</center>
            </h2>
            <div class="row ms-4 me-4">
                <h3 class="mb-3">Summary</h3>
                <div class="col">
                    <div class="activity-container">
                        <div class="summary-icon-wrapper">
                            <img src="{{ asset('/asset/svg/SPM.svg') }}" alt="Steps icon" class="summary-icon" />
                            <div class="summary-text">Steps</div>
                        </div>
                        <div class="summary-details">
                            <div class="summary-count">{{ $totalSteps }}</div>
                            <div class="summary-unit">Steps per minute</div>
                        </div>
                    </div>
                </div>
                
                <div class="col mb-3">
                    <div class="activity-container">
                        <div class="summary-icon-wrapper" style="background-color: #66F4DF;">
                            <img src="{{ asset('/asset/png/distance.png') }}" alt="Steps icon" class="summary-icon" />
                            <div class="summary-text">Distance</div>
                        </div>
                        <div class="summary-details">
                            <div class="summary-count" style="color: #37B3B7;">{{ $totalDistance }}</div>
                            <div class="summary-unit">Meters</div>
                        </div>
                    </div>
                </div>

                <div class="col mb-3">
                    <div class="activity-container">
                        <div class="summary-icon-wrapper" style="background-color: #7EB2FF;">
                            <img src="{{ asset('/asset/png/duration.png') }}" alt="Steps icon" class="summary-icon" />
                            <div class="summary-text">Duration</div>
                        </div>
                        <div class="summary-details">
                            <div class="summary-count" style="color: #384C7F;">{{ $durationValue }}</div>
                            <div class="summary-unit">{{ ucfirst($durationUnit) }}</div>
                        </div>
                    </div>
                </div>

                <div class="col mb-3">
                    <div class="activity-container">
                        <div class="summary-icon-wrapper" style="background-color: #C094F7;">
                            <img src="{{ asset('/asset/png/moon.png') }}" alt="Steps icon" class="summary-icon" />
                            <div class="summary-text">Avg. Sleep</div>
                        </div>
                        <div class="summary-details">
                            <div class="summary-count" style="color: #7F00CC;">{{ $averageSleepTime }}</div>
                            <div class="summary-unit">Hours / Day</div>
                        </div>
                    </div>
                </div>

                <h3 class="mt-4 mb-3">Recommendation & Statistics</h3>
                <div class="activity-container p-4">
                    
                    <div class="col-4">
                        <h5>Recommendation</h5>
                        <section class="calories-container mt-4 mb-3">
                            <div class="avatar-container">
                                <img src="{{ asset('/asset/png/fire.png') }}" alt="Calories icon" class="calories-icon" />
                            </div>
                            <div class="calories-info">
                              <div class="calories-header">
                                <p class="calories-label">Calories (cal)</p>
                                <p class="calories-value">
                                  0 <span class="calories-total"> / {{ $predictedCalories }}</span>
                                </p>
                              </div>
                              <div class="progress calories-progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar calories-progress-bar" style="width: 10%"></div>
                              </div>
                              
                            </div>
                        </section>

                        <section class="calories-container mt-4 mb-3">
                            <div class="avatar-container">
                                <img src="{{ asset('/asset/svg/foot.svg') }}" alt="Calories icon" class="calories-icon" />
                            </div>
                            <div class="calories-info">
                                @php
                                    $maxDistance = $recommended_distance;
                                    $percentage = 0;
                                    if ($maxDistance != 0) {
                                        $percentage = ($totalDistance / $maxDistance) * 100;
                                        $percentage = min($percentage, 100); // Ensure the percentage doesn't exceed 100
                                    }
                                @endphp
                                <div class="calories-header">
                                    <p class="calories-label">Running Distance (m)</p>
                                    <p class="calories-value">
                                        {{ $totalDistance }} <span class="calories-total">/{{ $maxDistance }}</span>
                                    </p>
                                </div>
                                <div class="progress calories-progress" role="progressbar" aria-label="Distance progress" aria-valuenow="{{ $totalDistance }}" aria-valuemin="0" aria-valuemax="{{ $maxDistance }}">
                                    <div class="progress-bar calories-progress-bar" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        </section>
                    </div>

                    {{-- STATISTICS --}}
                    <div class="col-7 ms-5">
                        <h5>Daily Activity</h5>
                        <canvas id="myChart" style="height: 80%; width: 50%"></canvas>
                    </div>
                </div>

                <div class="col-4">
                    <div class="activity-container mt-5 mb-5 p-4 row">
                        <h5>Weight Tracking</h5>
                        @php
                            $previousWeight = null;
                        @endphp

                        @foreach ($filteredHealthData as $data)
                            <div class="weight-card">
                                <div class="weight-info">
                                    <div class="date">{{ $data->formatted_created_at }}</div>
                                    <div class="weight">{{ $data->weight }} kg</div>
                                </div>
                                <div class="weight-details">
                                    <div class="time">{{ $data->time }}</div>
                                    <div class="weight-change mt-3">
                                        @if ($data->weight_difference > 0)
                                            <div class="change-value text-danger">+{{ $data->weight_difference }} kg</div>
                                        @elseif ($data->weight_difference < 0)
                                            <div class="change-value text-success">{{ $data->weight_difference }} kg</div>
                                        @else
                                            <div class="change-value text-body-tertiary">+{{ $data->weight_difference }} kg</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                

                <div class="col ms-4">
                    <div class="row activity-container mt-5 p-4">
                        <h5>Activity History</h5>
                        <div class="p-3 user-table" style="padding:0px; width:100%;">
                            <table id="example" class="display table">
                               <thead>
                                  <tr>
                                     <th>Tanggal</th>
                                     <th>Olahraga</th>
                                     <th>Jarak Lari</th>
                                     <th>Waktu/Durasi</th>
                                     <th>Avg. Steps</th>
                                  </tr>
                               </thead>
                               <tbody>
                                  @foreach ($activities as $activity)
                                  <tr> 
                                     <td>{{ $activity['date'] }}</td>
                                     <td>{{ $activity['type'] }}</td>
                                     <td>{{ $activity['distance'] }} meter</td>
                                     <td>{{ $activity['duration'] }} detik</td>
                                     <td>{{ $activity['avg_steps'] }} detik</td>
                                  </tr>
                                  @endforeach
                               </tbody>
                            </table>
                         </div>
                    </div>
                </div>

            </div>


         </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
      <script>
        $('#example').DataTable();
      </script>

      {{-- <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["1 Mar", "2 Mar", "3 Mar", "4 Mar", "5 Mar"],
                datasets: [{
                    label: 'Data',
                    data: [100, 300, 200, 150, 400],
                    borderColor: 'rgba(55, 82, 183, 1)',
                    backgroundColor: 'rgba(63, 82, 109, 0.1)',
                    borderWidth: 1,
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: { 
                        min: 50,
                        max: 400
                    }
                }
            }
        });
     </script> --}}

     <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Distance (meter)',
                    data: {!! json_encode($distances) !!},
                    borderColor: 'rgba(55, 82, 183, 1)',
                    backgroundColor: 'rgba(63, 82, 109, 0.1)',
                    borderWidth: 1,
                    tension: 0.1
                }, {
                    label: 'Duration (sec)',
                    data: {!! json_encode($durations) !!},
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.1)',
                    borderWidth: 1,
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        min: 0,
                        max: Math.max({{ $distances->max() ?? 0 }}, {{ $durations->max() ?? 0 }})
                    }
                }
            }
        });
    </script>
   </body>
</html>
