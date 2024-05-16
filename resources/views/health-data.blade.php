<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="shortcut icon" href="{{ asset('/asset/svg/logo.svg') }}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
      <link href="{{ asset('/asset/main.css') }}" rel="stylesheet" />
      <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      <style>
         .menu{
         margin : 20px;
         }
         .content{
         padding-left: 250px;
         }
         .nav-link.active {
         background-color: #6FFFE9 !important; 
         color: #0B132B !important; 
         }
         .nav-link{
         color: #0B132B !important;
         }
         .containerContent a {
         text-decoration: none;
         color: #8296C5; 
         }
         .containeritem {
         background-color: #ffffff; 
         border-radius: 6px;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
         margin-left: 30px;
         padding: 10px;
         display: inline-flex;
         align-items: center; 
         width: calc(100% - 120px); 
         }
         .tab.active {
         display: block; 
         }
         .nav-pills .nav-link {
         cursor: pointer;
         }
         .item {
         padding-left: 265px;
         padding-bottom:50px;
         }
         .nav-item {
         margin-right: 150px;
         }
         .nav-item:last-child {
         margin-right: 0; 
         }
         .form-control {
         width: 100%; 
         }
      </style>
      <title>Request Consultation</title>
   </head>
   <body>
      <div class="container-flex">
         @include('client-sidebar')
         <div class="item justify-content-center">
            <div class="row">
               <div class="container d-flex justify-content-center" style="padding:50px;">
                  <h2>Health Data</h2>
               </div>
            </div>
            <div class="event-form p-5 me-5 ms-5 mt-4">
               <form action="{{route('health-data.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  {{-- ROW 1 --}}
                  <div class="row">
                     {{-- Tanggal Lahir --}}
                     <div class="col">
                        <div class="mb-3">
                           <label for="birthdate" class="form-label">Tanggal Lahir</label>
                           <div class="input-group date" id="birthdatePicker" data-target-input="nearest">
                               <input type="text" class="form-control datetimepicker-input" id="birthdate" name="birthdate" style="border-radius: 20px" data-target="#birthdatePicker" placeholder="Pilih Tanggal Lahir" value="{{ old('birthdate', $healthData->birthdate ?? '') }}"/>
                               <div class="input-group-append" data-target="#birthdatePicker" data-toggle="datetimepicker">
                               </div>
                           </div>
                       </div>
                     </div>
                     {{-- Berat Badan --}}
                     <div class="col">
                        <div class="mb-3">
                           <label for="weight" class="form-label">Berat Badan (kg)</label>
                           <input value="{{old('weight', $healthData->weight ?? '')}}" type="text" class="form-control" name="weight" id="weight" aria-describedby="weightHelp" style="border-radius: 20px" placeholder="60">
                        </div>
                     </div>
                  </div>
                  {{-- ROW 2 --}}
                  <div class="row">
                     {{-- Tinggi Badan --}}
                     <div class="col">
                        <div class="mb-3">
                           <label for="height" class="form-label">Tinggi Badan (cm)</label>
                           <input value="{{old('height', $healthData->height ?? '')}}" type="text" class="form-control" id="height" name="height" aria-describedby="heightHelp" style="border-radius: 20px" placeholder="170">
                        </div>
                     </div>
                     {{-- Waktu Tidur--}}
                     <div class="col">
                        <div class="mb-3">
                           <label for="sleeptime" class="form-label">Waktu Tidur per hari (jam)</label>
                           <input value="{{old('sleeptime', $healthData->sleeptime ?? '')}}" type="text" class="form-control" name="sleeptime" id="sleeptime" aria-describedby="sleeptimeHelp" style="border-radius: 20px" placeholder="8">
                        </div>
                     </div>
                  </div>
                  {{-- ROW 3 --}}
                  <div class="row">
                     {{-- Riwayat Alergi Makanan --}}
                     <div class="col">
                        <div class="mb-3">
                           <label for="disease" class="form-label">Riwayat Alergi Makanan</label>
                           <input value="{{old('disease', $healthData->alergi_makanan ?? '')}}" type="text" class="form-control" id="alergi_makanan" name="alergi_makanan" aria-describedby="alergi_makananHelp" style="border-radius: 20px" placeholder="Flu">
                        </div>
                     </div>
                     {{-- Kebiasaan Makan --}}
                     <div class="col">
                        <div class="mb-3">
                           <label for="food" class="form-label">Kebiasaan Makan</label>
                           <input value="{{old('food', $healthData->food ?? '')}}" type="text" class="form-control" name="food" id="food" aria-describedby="foodHelp" style="border-radius: 20px" placeholder="Makanan yang sering dimakan dalam 1 bulan terakhir">
                        </div>
                     </div>
                  </div>

                  {{-- ROW 4 --}}
                  <div class="row">
                     {{-- Riwayat Penyakit --}}
                     <div class="col">
                        <div class="mb-3">
                           <label for="disease" class="form-label">Riwayat Penyakit</label>
                           <input value="{{old('disease', $healthData->disease ?? '')}}" type="text" class="form-control" id="disease" name="disease" aria-describedby="diseaseHelp" style="border-radius: 20px" placeholder="Flu">
                        </div>
                     </div>
                  </div>
                  <div class="row justify-content-end mt-5">
                     <div class="col-auto">
                        <button class="btn btn-primary" type="submit">Next</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      <script>
         $(function () {
             $('#birthdatePicker').datepicker({
                 format: 'yyyy-mm-dd',
                 autoclose: true,
                 todayHighlight: true
             });
         });
     </script>
   </body>
</html>
