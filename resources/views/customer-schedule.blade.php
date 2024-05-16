<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('/asset/css/dashboard.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="{{ asset('/asset/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Customer Transaction</title>
  </head>
  <body>
  @include('client-sidebar')
  <div class="container-flex" >
    <div class="content">
        <h1 class="mt-4 fw-bold">
            <center>My Schedule</center>
        </h1>

        <div class="card-container">
            <section class="content-wrapper">
                <div class="profile-pic"></div>
                <div class="details">
                    <div class="hospital-name">Rs. Telkom Medika Bandung</div>
                    <time class="date-info">19 Mei 2001</time>
                    <div class="doctor-name">dr. Arunika</div>
                    <time class="time-info">Pukul 10.00-12.00 Am</time>
                    <div class="status">Onsite</div>
                </div>
            </section>
            <button class="action-button" tabindex="0">Consultation</button>
        </div>  
        
    </div>
  </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>