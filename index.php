<?php
include "koneksi.php"; 
?>
<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Lexicon</title>
    <link rel="icon" href="logocars.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        * {
            transition: background-color 0.3s ease;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    <!-- nav begin -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Car Lexicon</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" target="_blank">Login</a>
                    </li>
                </ul>
                <!-- Theme Toggle Buttons -->
                <div class="d-flex ms-3 gap-2">
                    <button class="btn btn-danger" id="lightMode" type="button" style="color: white;">
                        <i class="bi bi-sun"></i>
                    </button>
                    <button class="btn btn-dark" id="darkMode" type="button" style="color: white;">
                        <i class="bi bi-moon"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <!-- nav end -->

    <!-- hero begin -->
    <section id="hero" class="text-center p-5 bg-secondary-subtle text-sm-start">
        <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <img src="img/lambo.jpg" class="img-fluid" width="300" alt="Lamborghini">
                <div>
                    <h1 class="fw-bold display-4">Black is not merely a colour; it is an attitude of dominance.</h1>
                    <h4 class="lead display-6">Black is not merely a colour; it is an attitude of dominance.</h4>
                    <h6>
                        <span id="tanggal"></span>
                        <span id="jam"></span>
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <!-- hero end -->

    <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->

    <!-- gallery begin -->
    <section id="gallery" class="text-center p-5 bg-secondary-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">gallery</h1>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/huracansakura.jpg" class="d-block w-100" alt="Huracan Sakura">
                    </div>
                    <div class="carousel-item">
                        <img src="img/blue huracan.jpg" class="d-block w-100" alt="Blue Huracan">
                    </div>
                    <div class="carousel-item">
                        <img src="img/black huracan.jpg" class="d-block w-100" alt="Black Huracan">
                    </div>
                    <div class="carousel-item">
                        <img src="img/black huracan.jpg" class="d-block w-100" alt="Black Huracan">
                    </div>
                    <div class="carousel-item">
                        <img src="img/huracansakura.jpg" class="d-block w-100" alt="Huracan Sakura">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- gallery end -->

    <!-- schedule begin -->
    <section id="schedule" class="text-center p-5">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Jadwal Kuliah & Kegiatan Mahasiswa</h1>
            
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <!-- Senin -->
                <div class="col">
                    <div class="card h-100 border-2">
                        <div class="card-header bg-primary-subtle fw-bold border-bottom border-primary border-2">
                            Senin
                        </div>
                        <div class="card-body text-start">
                            <div class="mb-3">
                                <p class="fw-bold mb-1">09:30 - 12:00</p>
                                <p class="mb-0">Sistem Operasi</p>
                                <p class="text-muted small">Ruang H.5.9</p>
                            </div>
                            <hr>
                            <div>
                                <p class="fw-bold mb-1">12:30 - 14:10</p>
                                <p class="mb-0">Technopreneurship</p>
                                <p class="text-muted small">Ruang H.4.10</p>
                            </div>
                            <hr>
                            <div>
                                <p class="fw-bold mb-1">14:10 - 15:50</p>
                                <p class="mb-0">Pendidikan Kewarganegaraan</p>
                                <p class="text-muted small">Ruang Aula E</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Selasa -->
                <div class="col">
                    <div class="card h-100 border-2">
                        <div class="card-header bg-success-subtle fw-bold border-bottom border-success border-2">
                            Selasa
                        </div>
                        <div class="card-body text-start">
                            <div class="mb-3">
                                <p class="fw-bold mb-1">09:00 - 12:00</p>
                                <p class="mb-0">Logika Informatika</p>
                                <p class="text-muted small">Ruang H.5.9</p>
                            </div>
                            <hr>
                            <div>
                                <p class="fw-bold mb-1">12:30 - 14:10</p>
                                <p class="mb-0">Basis Data</p>
                                <p class="text-muted small">Ruang H.5.9</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rabu -->
                <div class="col">
                    <div class="card h-100 border-2">
                        <div class="card-header bg-info-subtle fw-bold border-bottom border-info border-2">
                            Rabu
                        </div>
                        <div class="card-body text-start">
                            <div class="mb-3">
                                <p class="fw-bold mb-1">07:00 - 08:40</p>
                                <p class="mb-0">Basis Data</p>
                                <p class="text-muted small">Ruang D.2.K</p>
                            </div>
                            <hr>
                            <div>
                                <p class="fw-bold mb-1">10:20 - 12:00</p>
                                <p class="mb-0">Pemrograman Berbasis Web</p>
                                <p class="text-muted small">Ruang D.2.J</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kamis -->
                <div class="col">
                    <div class="card h-100 border-2">
                        <div class="card-header bg-warning-subtle fw-bold border-bottom border-warning border-2">
                            Kamis
                        </div>
                        <div class="card-body text-start">
                            <div class="mb-3">
                                <p class="fw-bold mb-1">07:00 - 09:30</p>
                                <p class="mb-0">Probabilitas Dan Statisktik</p>
                                <p class="text-muted small">Ruang H.4.9</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumat -->
                <div class="col">
                    <div class="card h-100 border-2">
                        <div class="card-header bg-danger-subtle fw-bold border-bottom border-danger border-2">
                            Jumat
                        </div>
                        <div class="card-body text-start">
                            <div class="mb-3">
                                <p class="fw-bold mb-1">07:00 - 09:30</p>
                                <p class="mb-0">Rekayasa Perangkat Lunak</p>
                                <p class="text-muted small">Ruang H.4.3</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sabtu -->
                <div class="col">
                    <div class="card h-100 border-2">
                        <div class="card-header bg-secondary-subtle fw-bold border-bottom border-secondary border-2">
                            Sabtu
                        </div>
                        <div class="card-body text-start d-flex align-items-center justify-content-center">
                            <p class="text-muted mb-0 fst-italic">Tidak Ada Jadwal</p>
                        </div>
                    </div>
                </div>

                <!-- Minggu -->
                <div class="col">
                    <div class="card h-100 border-2">
                        <div class="card-header bg-body-secondary fw-bold border-bottom border-secondary border-2">
                            Minggu
                        </div>
                        <div class="card-body text-start d-flex align-items-center justify-content-center">
                            <p class="text-muted mb-0 fst-italic">Tidak Ada Jadwal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- schedule end -->

    <!-- profile begin -->
    <section id="profile" class="p-5 bg-secondary-subtle">
        <div class="container">
            <!-- Header Section -->
            <div class="text-center mb-5">
                <h1 class="fw-bold display-4">Profil Mahasiswa</h1>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card border-0 shadow-lg rounded-5">
                        <div class="card-body p-5">
                            <div class="row align-items-center">
                                <!-- Photo Section -->
                                <div class="col-md-4 text-center mb-4 mb-md-0">
                                    <img src="img/foto_profile.jpg" 
                                        alt="Profile Photo" 
                                        class="rounded-circle border border-5 border-primary shadow" width="200" height="200">
                                </div>
                                
                                <!-- Info Section -->
                                <div class="col-md-8">
                                    <div class="bg-primary bg-opacity-10 p-4 rounded-3 mb-4">
                                        <h3 class="fw-bold text-primary mb-2">Axel Zaidanaufal Nutika</h3>
                                        <p class="text-body-secondary mb-0">Mahasiswa Teknik Informatika</p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="row mb-2">
                                            <div class="col-5">
                                                <span class="fw-bold">NIM</span>
                                            </div>
                                            <div class="col-7">
                                                <span>: A11.2024.15558</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">
                                                <span class="fw-bold">Program Studi</span>
                                            </div>
                                            <div class="col-7">
                                                <span>: Teknik Informatika</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">
                                                <span class="fw-bold">Email</span>
                                            </div>
                                            <div class="col-7">
                                                <span>: user@gmail.com</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">
                                                <span class="fw-bold">Telepon</span>
                                            </div>
                                            <div class="col-7">
                                                <span>: +62 111 2222 3333</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <span class="fw-bold">Alamat</span>
                                            </div>
                                            <div class="col-7">
                                                <span>: Semarang, Jawa Tengah</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile end -->

    <!-- footer begin -->
    <footer class="text-center p-5 bg-secondary-subtle">
        <div>
            <a href="https://www.instagram.com/axlzaidan_" class="text-decoration-none me-3">
                <i class="bi bi-instagram h3"></i>
            </a>
            </a>
            <a href="https://wa.me/+6288229536463" class="text-decoration-none">
                <i class="bi bi-whatsapp h3"></i>
            </a>
        </div>
        <div class="mt-3">
            Axel Zaidan &copy; 2025
        </div>
    </footer>
    <!-- footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
    <!-- Script Jam dan Tanggal -->
    <script type="text/javascript">
        window.setTimeout("tampilWaktu()", 1000);
        function tampilWaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth() + 1;
            setTimeout("tampilWaktu()", 1000);
            document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
        }
    </script>

    <!-- Script Dark Mode Toggle -->
    <script type="text/javascript">
        const htmlElement = document.documentElement;
        const lightModeBtn = document.getElementById('lightMode');
        const darkModeBtn = document.getElementById('darkMode');

        // Event listener untuk tombol Light Mode
        lightModeBtn.addEventListener('click', () => {
            htmlElement.setAttribute('data-bs-theme', 'light');
        });

        // Event listener untuk tombol Dark Mode
        darkModeBtn.addEventListener('click', () => {
            htmlElement.setAttribute('data-bs-theme', 'dark');
        });
    </script>
</body>
</html>