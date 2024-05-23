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
        <link href="{{ asset('/asset/css/acceptance-patient.css') }}" rel="stylesheet" />
        <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <title>Patient Acceptance</title>
     </head>
   <body>
      <div class="container-flex">
         @include('doctor-sidebar')
         <div class="content">
            <h1 class="mt-4 fw-bold">
               <center>Patient Acceptance</center>
            </h1>

            <div class="row ms-5 me-5 ps-4">

              {{-- LIST CARDS --}}

              @foreach ($consultations as $consultation)
              <div class="col mt-4">
                  <div class="appointment-card p-4">
                      <div class="div" style="display: flex">
                          <div class="patient-avatar"></div>
                          <div class="patient-info ms-3">
                              <h2 class="patient-name">{{ $consultation->patient->name }}</h2>
                              <p class="patient-email">{{ $consultation->patient->email }}</p>
                          </div>
                      </div>
                      <div class="location-info mt-2">
                          <img src="{{asset('asset/svg/location.svg')}}" alt="Location icon" class="location-icon" />
                          <p class="location-text">{{ $consultation->location }}</p>
                      </div>
                      <div class="date-time-info">
                          <div class="date-info">
                              <img src="{{asset('asset/svg/sched.svg')}}" alt="Calendar icon" class="date-icon" />
                              <p class="date-text">{{ $consultation->consultation_date }}</p>
                          </div>
                          <div class="time-info me-1">
                              <img src="{{asset('asset/svg/time.svg')}}" alt="Clock icon" class="time-icon" />
                              <p class="time-text">{{ $consultation->consultation_time }}</p>
                          </div>
                      </div>

                      <div class="row mt-4">
                          <div class="col mt-2">
                            <form action="{{ route('doctor.approve-consultation', ['consultationId' => $consultation->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="approve-button">
                                    <div class="icon-wrapper">
                                        <img src="{{asset('asset/svg/approve-icon.svg')}}" alt="Approve icon" class="approve-icon" />
                                    </div>
                                    <div class="approve-text">Approve</div>
                                </button>
                            </form>
                          </div>

                          <div class="col mt-2">
                              <a class="decline-button" href="#">
                                  <div class="decline-icon">
                                      <img src="{{asset('asset/svg/decline-icon.svg')}}" alt="" class="decline-icon" />
                                  </div>
                                  <div class="decline-text">Decline</div>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
            </div>

         </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

   </body>
</html>