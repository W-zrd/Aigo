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

    <div class="ms-5 ps-5 mt-5 pt-5 row justify-content-center">
        <div class="ms-5 ps-5 col-md-8">
            <div class="card">
                <div class="card-header">Consultation Result</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('doctor.store-consultation-result') }}">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="patient_id" value="{{ $patientId }}">

                        <div class="mb-3">
                            <label for="jarak_lari" class="form-label">Jarak Lari</label>
                            <input type="number" class="form-control" id="jarak_lari" name="jarak_lari" required>
                        </div>

                        <div class="mb-3">
                            <label for="sleeptime" class="form-label">Waktu Tidur</label>
                            <input type="number" step="0.01" class="form-control" id="sleeptime" name="sleeptime" required>
                        </div>

                        <div class="mb-3">
                            <label for="food" class="form-label">Food</label>
                            <input type="text" class="form-control" id="food" name="food" required>
                        </div>

                        <div class="mb-3">
                            <label for="unrecommended_food" class="form-label">Unrecommended Food</label>
                            <input type="text" class="form-control" id="unrecommended_food" name="unrecommended_food" required>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

  </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>