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
    <title>Consultation Result</title>
  </head>
  <body>
  @include('client-sidebar')
  <div class="container-flex ps-5 ms-5" >

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Consultation Result Details</div>

                <div class="card-body">
                    @if ($result)
                        <div class="mb-3">
                            <label class="form-label">Jarak Lari</label>
                            <p>{{ $result->jarak_lari }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Waktu Tidur</label>
                            <p>{{ $result->sleeptime }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Food</label>
                            <p>{{ $result->food }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Unrecommended Food</label>
                            <p>{{ $result->unrecommended_food }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <p>{{ $result->notes }}</p>
                        </div>
                    @else
                        <p>No consultation result available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

  </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>