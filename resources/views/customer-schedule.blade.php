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
    <title>Jadwal Konsultasi</title>
  </head>
  <body>
  @include('client-sidebar')
  <div class="container-flex" >
    
    <div class="m-5 user-table">
      <table id="example" class="display table">
          <thead>
              <tr>
                  <th>Nama Dokter</th>
                  <th>Lokasi</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Action</th>
              </tr>
          </thead>

          
          <tbody>
            @foreach ($approvedConsultations as $consultation)
              <tr>
                <td>{{ $consultation->doctor->name }}</td>
                <td>{{ $consultation->location }}</td>
                <td>{{ $consultation->doctor->gender }}</td>
                <td>{{ $consultation->doctor->email }}</td>
                  {{-- <td>{{ $item->updated_at->format('d F Y') }}</td> --}}
                  <td>
                    <a href="/user/item->id" class="material-symbols-outlined me-2" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">info</a>
                    <a href="/aigochat/{{$consultation->doctor->id}}" class="material-symbols-outlined text-success" >chat</a>
                  </td>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">User Information</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <ul>
                            <li> Nama Doktor: {{$consultation->doctor->name}} </li>
                            <li> Alamat: {{$consultation->doctor->alamat}} </li>
                          </ul>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

              </tr>
            @endforeach
          </tbody>
       
      </table>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $('#example').DataTable();
  </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>