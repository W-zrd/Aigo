<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        img{
            width:60%;
        }
        .homecontainer{
            padding-left:50px;
        }

        a:hover{

        }
        
        h3{
            font-family: 'Open Sans', sans-serif;;
            font-weight: bold;
            font-size: 36px;
            color: #6FFFE9;
        }

        p{
            font-family: 'Open Sans', sans-serif;;
            font-size: 16px;
            color: #6FFFE9;
        }

        .row-container {
            display: flex;
            align-items: center; /* Mengatur teks dan gambar agar berada di tengah-tengah vertikal */
        }

        .text-container {
            max-width: 500px;
            margin: 0 auto; 
            text-align: center; 
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btnreg{
            background-color: #37B3B7;
            width: 200px;
            margin: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            color: white;

        }

        .btnreg:hover {
            background-color: #fff; 
            color:#37B3B7;
        }

        img.imgsect2 {
            max-width: 20%; /* Membuat gambar tidak melebihi lebar container */
            height: auto; /* Menjaga aspek rasio gambar */
            display: block; /* Menghilangkan margin bawaan gambar */
            margin: auto; /* Menempatkan gambar di tengah */
        }

        #section2 {
            background-color: #f8f9fa; /* Warna latar belakang */
            padding: 50px 0; /* Padding atas dan bawah */
        }

        .row-container {
            display: flex; /* Mengatur container utama menjadi flex */
            justify-content: center; /* Memastikan konten berada di tengah horizontal */
        }

        .col-md-4 {
            display: flex; /* Mengatur kolom menjadi flex */
            align-items: center; /* Memastikan konten berada di tengah vertikal */
            justify-content: center; /* Memastikan konten berada di tengah horizontal */
            flex-direction: column; /* Menjadikan konten di dalam kolom menjadi tata letak kolom */
            text-align: center; /* Pusatkan teks di dalam kolom */
        }
        .text-below {
            margin-top: 10px; /* Jarak antara gambar dan teks di bawahnya */
            font-size: 16px; /* Ukuran teks */
            color: #333; /* Warna teks */
            width: 50%;
        }
    </style>
  </head>
  <body>
  @include('navbar')
    <div class="row d-flex justify-content-center" style="padding-top:50px;">
        <section id="section1" style="background-color:#0B132B;">
            <div class="homecontainer">
                <div class="row-container d-flex justify-content-center">
                    <div class="col-md-6 d-flex align-items-center text-container">
                        <H3> Cegah sebelum Terlambat. Kenali Risiko dan Amati Pola Makan serta Gaya Hidup Anda.</H3>
                        <p>Obesitas bukan hanya masalah penampilan, tapi juga kesehatan. Perubahan kecil dalam gaya hidup dapat membuat perbedaan besar.</p>
                        <a class="btn btnreg" href="/">Kenali Tubuh Anda</a>
                    </div>
                    <div class="col-md-6 align-items-center">
                        <img src="{{ asset('asset/page4.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section id="section2" >
            <div class="container">
                <div class="row-container d-flex justify-content-center">
                    <div class="col-md-4 d-flex align-items-center">
                        <img class="imgsect2" src="{{ asset('asset/page1.png') }}" alt="">
                        <div class="text-below">Kenali Proporsi Ideal Tubuh Anda</div>
                    </div>
                    <div class="col-md-4 align-items-center">
                        <img class="imgsect2" src="{{ asset('asset/page2.png') }}" alt="">
                        <div class="text-below">Dapatkan Rekomendasi Pencegahan Obesitas</div>
                    </div>
                    <div class="col-md-4 align-items-center">
                        <img class="imgsect2" src="{{ asset('asset/page3.png') }}" alt="">
                        <div class="text-below">Dapatkan Langkah Penanganan Obesitas Anda</div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>