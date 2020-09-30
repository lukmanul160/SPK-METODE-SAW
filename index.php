<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vesperr Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Vesperr - v2.1.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>SPK SAW</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Alur Perhitungan</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Writer</a></li>

          <li class="get-started"><a href="dana_desa"><?php 
          if (isset($_SESSION["is_logged"])) {
            echo 'Login';
          }else{
            echo 'Go Dashboard';
          }
          ?></a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container" id="home">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Dessision Making System</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Sistem informasi ini menggunakan Metode Simple Addict Weigh(SAW)</h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/hero-img.jpg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients clients">
      
    </section><!-- End Clients Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Tentang Program</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p>
              Metode SAW sering dikenal dengan istilah metode penjumlahan terbobot. Konsep dasar metode SAW (Simple Additive Weighting) 
              adalah mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif pada semua atribut. Metode 
              SAW dapat membantu dalam pengambilan keputusan suatu kasus, akan tetapi perhitungan dengan menggunakan
               metode SAW ini hanya yang menghasilkan nilai terbesar yang akan terpilih sebagai alternatif yang terbaik.
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <p>
              Perhitungan akan sesuai dengan metode ini apabila alternatif yang terpilih memenuhi kriteria yang telah 
                ditentukan. Metode SAW ini lebih efisien karena waktu yang dibutuhkan dalam perhitungan lebih singkat.
                 Metode SAW membutuhkan proses normalisasi 
              matriks keputusan (X) ke suatu skala yang dapat diperbandingkan dengan semua rating alternatif yang ada.
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start" data-aos="fade-right" data-aos-delay="150">
            <img src="assets/img/counts-img.jpg" alt="" class="img-fluid">
          </div>

          <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-simple-smile"></i>
                    <span data-toggle="counter-up">1</span>
                    <p><strong>Data Keluarga</strong> penggunaan sistem harus memiliki data keluarga yang ada</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-document-folder"></i>
                    <span data-toggle="counter-up">2</span>
                    <p><strong>Kriteria</strong> Berisi max/min atau benefit/cost untuk perhitungan</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-clock-time"></i>
                    <span data-toggle="counter-up">3</span>
                    <p><strong>model</strong> Pembobotan dari kriteria yang ada</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-award"></i>
                    <span data-toggle="counter-up">4</span>
                    <p><strong>Penilaian</strong> berisi nilai yang diisi sesuai kriteria yang dipilih</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Alur Perhitungan</h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title">Pengisian Data Kependudukan</h4>
              <p class="description">Mengisi data Kependudukan berdasarkan KK</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title">Kriteria</h4>
              <p class="description">isi kriterai berupa nama kriteria typee max/min</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title">Model</h4>
              <p class="description">beri bobot penilaian untuk kriteria max total bobot = 1</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title">Penilaian</h4>
              <p class="description">berikan kriteria terhadap KK </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= More Services Section ======= -->

    <div class="section-title" data-aos="fade-up">
      <h2>Alasan Penggunaan SAW</h2>
    </div>
    <section id="more-services" class="more-services">
      <div class="container">

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card" style='background-image: url("assets/img/more-services-1.jpg");' data-aos="fade-up" data-aos-delay="100">
              <div class="card-body">
                <h5 class="card-title"><a href="">mudah dimengerti</a></h5>
                <p class="card-text">metode yang digunakan mudah dimengerti dan mudah dipahai</p>
              
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="card" style='background-image: url("assets/img/more-services-2.jpg");' data-aos="fade-up" data-aos-delay="200">
              <div class="card-body">
                <h5 class="card-title"><a href="">fleksibel</a></h5>
                <p class="card-text">metode yang dipakai fleksibel bisa diganti dan dimodifikasi</p>
              
              </div>
            </div>

          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4">
            <div class="card" style='background-image: url("assets/img/more-services-3.jpg");' data-aos="fade-up" data-aos-delay="100">
              <div class="card-body">
                <h5 class="card-title"><a href="">memecahkan persoalan yang
                  kompleks </a></h5>
                <p class="card-text">dapat menyelesaikan masalah yang kompleks</p>
              
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4">
            <div class="card" style='background-image: url("assets/img/more-services-4.jpg");' data-aos="fade-up" data-aos-delay="200">
              <div class="card-body">
                <h5 class="card-title"><a href="">melakukan
                  pembelajaran berdasarkan pengetahuan </a></h5>
                <p class="card-text">penilaian berdasarkan data yang ada dan pengetahuan</p>
              
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End More Services Section -->

    

    

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
          <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem</p>
        </div>

 

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portofolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>IMG 1</h4>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portofolio-1.jpg"  class="venobox" title="App 1"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portofolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>IMG 2</h4>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portofolio-2.jpg"  class="venobox" title="App 1"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portofolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>IMG 3</h4>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portofolio-3.jpg"  class="venobox" title="App 1"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portofolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>IMG 4</h4>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portofolio-4.jpg"  class="venobox" title="App 1"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portofolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>IMG 5</h4>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portofolio-5.jpg"  class="venobox" title="App 1"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portofolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>IMG 6</h4>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portofolio-6.jpg"  class="venobox" title="App 1"><i class="bx bx-plus"></i></a>

                </div>
              </div>
            </div>
          </div>



        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Writer </h2>
          <p>penulis dan pembuat</p>
        </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" style="margin:0px auto; text-align:center;">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="assets/img/team/team-33.jpg" class="img-fluid " alt="" >
              <div class="member-info">
                <h4>Adinda Aisya</h4>
                <span>writer</span>
              </div>
            </div>
          </div>

      </div>
    </section><!-- End Team Section -->

   
    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>Pembuatan website Menggunakan?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              menggunakan HTML,CSS,dan PHP 7
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>apa itu data kriteria?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Data Kriteria yang berisi kode, nama, atribut, bobot. Bobot kriteria menentukan seberapa penting kriteria tersebut. Atribut kriteria terdiri dari benefit atau cost, dimana benefit artinya semakin besar nilainya semakin bagus, sedangkan cost semakin kecil nilainya semakin bagus.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>Apa itu Data Crips?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Data Crips (nilai kriteria) yang berisi kode kriteira, keterangan, bobot. Crips bersifat optional yaitu sebagai pembatas dari nilai setiap kriteria. Misal jika kriterianya adalah penghasilan, maka cripsnya adalah:
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>Apa itu Data Alternatif?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Data Alternatif merupakan alternatif yang akan dihitung nilainya dan dipilih sebagai alternatif terbaik. Data alternatif biasanya berisi kode dan nama. Hal lainnya bisa menyesuaikan dengan studi kasus. Misal kalau studi kasusnya adalah pemberian kredit, maka data alternatif adalah data calon yang mengajukan kredit.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>Apa itu Data Nilai Alternatif?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Nilai Alternatif mencatat nilai setiap alternatif berdasarkan semua data kriteria.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

      </div>
    </section><!-- End F.A.Q Section -->

   

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Vesperr</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>