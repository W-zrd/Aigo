<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pasien</title>
  <link href="{{ asset('/asset/css/doctor-recomendation.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="{{ asset('/asset/main.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>
<body>
@include('client-sidebar')

<div class="container">
  <div class="content">
    <h1 class="mb-4">Daftar Pasien</h1>
    <ul class="list-group patient-list">
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <h5>Pasien 1</h5>
          <p>Lokasi: Online</p>
          <p>Tanggal: 2024-06-03</p>
        </div>
        <div>
          <button class="btn btn-primary btn-recommendation" data-bs-toggle="modal" data-bs-target="#recommendationModal" onclick="setPatient('Pasien 1')">Rekomendasi</button>
          <button class="btn btn-secondary btn-result" data-bs-toggle="modal" data-bs-target="#resultModal" style="display: none;">Hasil</button>
        </div>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <h5>Pasien 2</h5>
          <p>Lokasi: Onsite</p>
          <p>Tanggal: 2024-06-04</p>
        </div>
        <div>
          <button class="btn btn-primary btn-recommendation" data-bs-toggle="modal" data-bs-target="#recommendationModal" onclick="setPatient('Pasien 2')">Rekomendasi</button>
          <button class="btn btn-secondary btn-result" data-bs-toggle="modal" data-bs-target="#resultModal" style="display: none;">Hasil</button>
        </div>
      </li>
      <!-- Add more patients here -->
    </ul>
  </div>
</div>

<!-- Modal Recommendation -->
<div class="modal fade" id="recommendationModal" tabindex="-1" aria-labelledby="recommendationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="recommendationModalLabel"><span class="material-symbols-outlined">medical_services</span>Tambahkan Rekomendasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="recommendationForm">
          <div class="mb-3">
            <label for="jarakLari" class="form-label">Jarak Lari (km):</label>
            <input type="text" class="form-control" id="jarakLari" name="jarakLari" placeholder="Masukkan jarak lari">
          </div>
          <div class="mb-3">
            <label for="waktuTidur" class="form-label">Waktu Tidur (jam):</label>
            <input type="text" class="form-control" id="waktuTidur" name="waktuTidur" placeholder="Masukkan waktu tidur">
          </div>
          <div class="mb-3">
            <label for="makananDikurangi" class="form-label">Jenis Makanan yang Perlu Dikurangi:</label>
            <input type="text" class="form-control" id="makananDikurangi" name="makananDikurangi" placeholder="Masukkan jenis makanan yang perlu dikurangi">
          </div>
          <div class="mb-3">
            <label for="makananDirekomendasikan" class="form-label">Jenis Makanan yang Direkomendasikan:</label>
            <input type="text" class="form-control" id="makananDirekomendasikan" name="makananDirekomendasikan" placeholder="Masukkan jenis makanan yang direkomendasikan">
          </div>
          <button type="submit" class="btn btn-primary">Tambahkan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Result -->
<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resultModalLabel">Rekomendasi Dokter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="resultContent">
        <!-- Hasil rekomendasi akan ditampilkan di sini -->
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  let currentPatient = '';
  let recommendations = {};

  function setPatient(patient) {
    currentPatient = patient;
  }

  document.getElementById('recommendationForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const jarakLari = document.getElementById('jarakLari').value;
    const waktuTidur = document.getElementById('waktuTidur').value;
    const makananDikurangi = document.getElementById('makananDikurangi').value;
    const makananDirekomendasikan = document.getElementById('makananDirekomendasikan').value;

    recommendations[currentPatient] = {
      jarakLari,
      waktuTidur,
      makananDikurangi,
      makananDirekomendasikan
    };

    document.querySelectorAll('.list-group-item').forEach(function (item) {
      if (item.textContent.includes(currentPatient)) {
        item.querySelector('.btn-result').style.display = 'inline-block';
      }
    });

    document.getElementById('recommendationForm').reset();
    const recommendationModal = new bootstrap.Modal(document.getElementById('recommendationModal'));
    recommendationModal.hide();
  });

  document.querySelectorAll('.btn-result').forEach(function (button) {
    button.addEventListener('click', function () {
      const patientName = this.parentElement.parentElement.textContent.trim().split('\n')[0].trim();
      const result = recommendations[patientName];

      document.getElementById('resultContent').innerHTML = `
        <p><strong>Jarak Lari:</strong> ${result.jarakLari} km</p>
        <p><strong>Waktu Tidur:</strong> ${result.waktuTidur} jam</p>
        <p><strong>Jenis Makanan yang Perlu Dikurangi:</strong> ${result.makananDikurangi}</p>
        <p><strong>Jenis Makanan yang Direkomendasikan:</strong> ${result.makananDirekomendasikan}</p>
      `;
    });
  });
</script>
</body>
</html>
