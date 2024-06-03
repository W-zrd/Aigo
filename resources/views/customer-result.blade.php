<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('/asset/css/customer-result.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="{{ asset('/asset/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <title>Jadwal Konsultasi</title>
  </head>
  <body>
  @include('client-sidebar')
  <div class="container">
    <div class="content">
      <main class="main-content">
        <section class="consultation-section">
          <header class="consultation-header">Hasil Konsultasi Dokter</header>
          <div class="row">
            <div class="col-md-6 mb-4">
              <section class="consultation-card card">
                <header class="card-header d-flex justify-content-between">
                  <time datetime="2024-05-21" class="consultation-date">21 Mei 2024</time>
                </header>
                <footer class="card-body">
                  <section class="doctor-info">
                    <span class="doctor-name">Nama Dokter</span>
                    <a href="mailto:dokter@email.com" class="doctor-email" aria-label="dokter@email.com">dokter@email.com</a>
                  </section>
                  <button class="btn btn-primary view-result">View result</button>
                </footer>
              </section>
            </div>
            <div class="col-md-6 mb-4">
              <section class="consultation-card card">
                <header class="card-header d-flex justify-content-between">
                  <time datetime="2024-04-19" class="consultation-date">19 April 2024</time>
                </header>
                <footer class="card-body">
                  <section class="doctor-info">
                    <span class="doctor-name">Nama Dokter</span>
                    <a href="mailto:dokter@email.com" class="doctor-email" aria-label="dokter@email.com">dokter@email.com</a>
                  </section>
                  <button class="btn btn-primary view-result">View result</button>
                </footer>
              </section>
            </div>
            <div class="col-md-6 mb-4">
              <section class="consultation-card card">
                <header class="card-header d-flex justify-content-between">
                  <time datetime="2024-04-30" class="consultation-date">30 April 2024</time>
                </header>
                <footer class="card-body">
                  <section class="doctor-info">
                    <span class="doctor-name">Nama Dokter</span>
                    <a href="mailto:dokter@email.com" class="doctor-email" aria-label="dokter@email.com">dokter@email.com</a>
                  </section>
                  <button class="btn btn-primary view-result">View result</button>
                </footer>
              </section>
            </div>
            <div class="col-md-6 mb-4">
              <section class="consultation-card card">
                <header class="card-header d-flex justify-content-between">
                  <time datetime="2024-04-19" class="consultation-date">19 April 2024</time>
                </header>
                <footer class="card-body">
                  <section class="doctor-info">
                    <span class="doctor-name">Nama Dokter</span>
                    <a href="mailto:dokter@email.com" class="doctor-email" aria-label="dokter@email.com">dokter@email.com</a>
                  </section>
                  <button class="btn btn-primary view-result">View result</button>
                </footer>
              </section>
            </div>
          </div>
        </section>
      </main>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="consultationModal" tabindex="-1" aria-labelledby="consultationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="consultationModalLabel">Rekomendasi Dokter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Jarak Lari:</label>
            <p id="jarakLari">10 km</p>
          </div>
          <div class="mb-3">
            <label class="form-label">Waktu Tidur:</label>
            <p id="waktuTidur">8 jam</p>
          </div>
          <div class="mb-3">
            <label class="form-label">Jenis Makanan yang Dikurangi:</label>
            <p id="makananDikurangi">Gula, Garam</p>
          </div>
          <div class="mb-3">
            <label class="form-label">Jenis Makanan yang Direkomendasikan:</label>
            <p id="makananDirekomendasikan">Buah, Sayur</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGz2F2FrvXIDoWCl1sYuNsY3zJ3x04Z6VPX5m9QK/DHU8" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9HHR40MvBJoDzuyw4oB1oB9vWb6Zn6tZ8mHI5LSU7wrIT88UwSMPwfg" crossorigin="anonymous"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const viewResultButtons = document.querySelectorAll('.view-result');
    
    viewResultButtons.forEach(button => {
      button.addEventListener('click', function () {
        const jarakLari = "10 km"; 
        const waktuTidur = "8 jam"; 
        const makananDikurangi = "Gula, Garam"; 
        const makananDirekomendasikan = "Buah, Sayur";

        document.getElementById('jarakLari').innerText = jarakLari;
        document.getElementById('waktuTidur').innerText = waktuTidur;
        document.getElementById('makananDikurangi').innerText = makananDikurangi;
        document.getElementById('makananDirekomendasikan').innerText = makananDirekomendasikan;

        // Show the modal
        const consultationModal = new bootstrap.Modal(document.getElementById('consultationModal'));
        consultationModal.show();
      });
    });
  });
  </script>
  </body>
</html>
