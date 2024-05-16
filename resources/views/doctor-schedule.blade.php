<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('/asset/css/dashboardDoc.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="{{ asset('/asset/main.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Doctor Dashboard</title>
  </head>
  <body>
  @include('doctor-sidebar')
  <div class="container-flex" >
    <div class="content">
        <h2 class="schedule-heading">Schedule</h2>
        <section class="appointments-container">
  <header class="appointments-header">
    <h2 class="appointments-title">Appointments</h2>
    <div class="appointments-icons">
      <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1101c7a3233cca792885dc6960fc213d42926998929b5978ab43e109358f3639?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Icon" class="icon" loading="lazy" />
      <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b1b0e6fc65d53aa06c8eb18bf9196c47d97ef8ef95dce33432650db38eac1722?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Icon" class="icon" loading="lazy" />
    </div>
    </header>
    
    <div class="appointments-table-header">
        <div class="table-header-name">Name</div>
        <div class="table-header-location">Location</div>
        <div class="table-header-patient-id">Patient ID</div>
        <div class="table-header-date">Date</div>
        <div class="table-header-time">Time</div>
        <div class="table-header-status">Status</div>
        <div class="table-header-status">Action</div>

    </div>
    
    <article class="appointment-row">
    <div class="patient-info">
      <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a035700e6dde8893391104b4951e482b92fd90bf27ee7430998441c8f71bd031?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Moris Johnson avatar" class="patient-avatar" />
      <div class="patient-name">Moris Johnson</div>
    </div>
    <div class="appointment-location">Online</div>
    <div class="appointment-patient-id">#013456</div>
    <div class="appointment-date">23.09.2021</div>
    <div class="appointment-time">10:30PM</div>
    <div class="appointment-status">Confirmed</div>
    <div class="chat-icon">
          <i class="fas fa-comment"></i>
        </div>
  </article>
    
    <article class="appointment-row">
        <div class="patient-info">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a035700e6dde8893391104b4951e482b92fd90bf27ee7430998441c8f71bd031?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Moris Johnson avatar" class="patient-avatar" />
        <div class="patient-name">Moris Johnson</div>
        </div>
        <div class="appointment-location">Online</div>
        <div class="appointment-patient-id">#013456</div>
        <div class="appointment-date">23.09.2021</div>
        <div class="appointment-time">10:30PM</div>
        <div class="appointment-status">Confirmed</div>
        <div class="chat-icon">
          <i class="fas fa-comment"></i>
        </div>
        
    </article>

    
    <article class="appointment-row">
        <div class="patient-info">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a035700e6dde8893391104b4951e482b92fd90bf27ee7430998441c8f71bd031?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Moris Johnson avatar" class="patient-avatar" />
        <div class="patient-name">Moris Johnson</div>
        </div>
        <div class="appointment-location">Online</div>
        <div class="appointment-patient-id">#013456</div>
        <div class="appointment-date">23.09.2021</div>
        <div class="appointment-time">10:30PM</div>
        <div class="appointment-status-cancelled">Cancelled</div>
        <div class="chat-icon">
          <i class="fas fa-comment"></i>
        </div>
    </article>
    
    
    <article class="appointment-row">
        <div class="patient-info">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a035700e6dde8893391104b4951e482b92fd90bf27ee7430998441c8f71bd031?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Moris Johnson avatar" class="patient-avatar" />
        <div class="patient-name">Moris Johnson</div>
        </div>
        <div class="appointment-location">RS. Telkom Medika Bandung</div>
        <div class="appointment-patient-id">#013456</div>
        <div class="appointment-date">23.09.2021</div>
        <div class="appointment-time">10:30PM</div>
        <div class="appointment-status">Confirmed</div>
        <div class="chat-icon">
          <i class="fas fa-comment"></i>
        </div>
    </article>
    </section>
    </div>
  </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>