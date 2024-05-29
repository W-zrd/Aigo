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
               <center>Log & History</center>
            </h1>

            <div class="row ms-5 me-5 ps-4">
                @if ($notifications->count() > 0)
                <ul class="list-group mt-2">
                    @foreach ($notifications as $notification)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $notification->message }}</strong>
                                    <br>
                                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No notifications found.</p>
            @endif
            </div>

         </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>

   </body>
</html>