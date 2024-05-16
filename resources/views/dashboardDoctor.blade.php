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
    <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Doctor Dashboard</title>
  </head>
  <body>
  @include('doctor-sidebar')
  <div class="container-flex" >
    <div class="content">
    <main class="doctor-dashboard">
    <h1 class="dashboard-title">Doctor Dashboard</h1>
    <section class="dashboard-content">
        <div class="content-row">
        <div class="content-column">
            <div class="patient-stats" >
            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/030a1f6bffadffc6ce4ec13f1bd97e7576bd78d674f5fb6de947cdf5a33aa29d?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Patient icon" class="patient-icon" />
            <div class="patient-stats-row">
                <div class="patient-stat">
                <div class="patient-stat-value">250</div>
                <div class="patient-stat-label">Normal</div>
                </div>
                <div class="patient-stat">
                <div class="patient-stat-value">150</div>
                <div class="patient-stat-label">Overweight</div>
                </div>
                <div class="patient-stat">
                <div class="patient-stat-value">100</div>
                <div class="patient-stat-label">Unknown</div>
                </div>
            </div>
            </div>
        </div>
        <div class="content-column-wide">
            <div class="appointment-summary">
            <div class="appointment-summary-header">
                    <div class="row">
                    <h2 class="appointment-summary-title">Patients Summary</h2>
                    </div>
                </div>
            <div class="appointment-summary-row">
                <div class="appointment-summary-column">
                <div class="gender-stats">
                    <div class="gender-icon-container">
                        <div class="male-icon">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/3fdf4134042a773bd7e5dc3089ac98934868c84a3f4c23fcc70dfc3110a076a1?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Male icon" class="gender-icon" />
                        </div>
                        <div class="female-icon">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/2d565bbdb293dab51447f444ac9d0e036ecac199920286ad2afcd2f297588c3b?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Female icon" class="gender-icon" />
                        </div>
                    </div>
                    <div class="gender-stats-labels">
                        <div class="gender-label">Male</div>
                        <div class="gender-value">28</div>
                        <div class="gender-label">Female</div>
                        <div class="gender-value">19</div>
                    </div>
                    </div>
                </div>
                <div class="appointment-summary-column-narrow">
                <div class="appointment-stats">
                    <div class="appointment-icon-container">
                        <div class="male-icon">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/3fdf4134042a773bd7e5dc3089ac98934868c84a3f4c23fcc70dfc3110a076a1?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Male icon" class="gender-icon" />
                        </div>
                        <div class="female-icon">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/2d565bbdb293dab51447f444ac9d0e036ecac199920286ad2afcd2f297588c3b?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Female icon" class="gender-icon" />
                        </div>
                    </div>
                    <div class="gender-stats-labels">
                        <div class="gender-label">Total appointment</div>
                        <div class="gender-value">28</div>
                        <div class="gender-label">Pending appointment</div>
                        <div class="gender-value">19</div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <section class="appointments-container">
    <header class="appointments-header">
        <h2 class="appointments-title">Appointments</h2>
        <a href="#" class="view-more-link">
        <span class="view-more-text">View More</span>
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1101b12b8f7a35f0cd2181e27b04fddc83baf3cd8095916bb541c62ba1875e0e?apiKey=e644a539de5445e499b1d21950fa439b&" alt="" class="arrow-icon" />
        </a>
    </header>

    <div class="appointments-table-header">
        <div class="header-name">Name</div>
        <div class="header-location">Location</div>
        <div class="header-date">Date</div>
        <div class="header-time">Time</div>
        <div class="header-status">Status</div>
    </div>

    <div class="appointment-row">
        <div class="patient-info">
        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a035700e6dde8893391104b4951e482b92fd90bf27ee7430998441c8f71bd031?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Moris Johnson avatar" class="patient-avatar" />
        <div class="patient-name">Moris Johnson</div>
        </div>
        <div class="appointment-location">Online</div>
        <div class="appointment-date">28 September 2024</div>
        <div class="appointment-time">15:30 WIB</div>
        <div class="appointment-status status-confirmed">Confirmed</div>
    </div>

    <div class="appointment-row">
    <div class="patient-info">
      <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a035700e6dde8893391104b4951e482b92fd90bf27ee7430998441c8f71bd031?apiKey=e644a539de5445e499b1d21950fa439b&" alt="Moris Johnson avatar" class="patient-avatar" />
      <div class="patient-name">Moris Johnson</div>
    </div>
    <div class="appointment-location">RS. Medicare Sukapura</div>
    <div class="appointment-date">28 September 2024</div>
    <div class="appointment-time">15:30 WIB</div>
    <div class="appointment-status status-cancelled">Cancelled</div>
  </div>

    </section>
    </main>
    </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>