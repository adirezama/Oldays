<?php 
include "models/barang.php";
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OLDAYS Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="frontend/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="frontend/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="frontend/vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- owl carousel-->
    <link rel="stylesheet" href="frontend/vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="frontend/vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="frontend/css/style.blue.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="frontend/css/custom.css">
    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="frontend/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="frontend/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="frontend/img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="frontend/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="frontend/img/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="frontend/img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="frontend/img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="frontend/img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="frontend/img/apple-touch-icon-152x152.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div id="all">
      <!-- Top bar-->
      <div class="top-bar">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-6 d-md-block d-none">
              <p>Contact us on 085330630656 or OLDAYS@gmail.com.</p>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end justify-content-between">
                <ul class="list-inline contact-info d-block d-md-none">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
                <div class="login">
       <?php if (isset($_SESSION["pelanggan"])): ?>
                  <a href="frontend/logout_pelanggan.php"   class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Log Out</span></a>
                <a href="frontend/profil.php"   class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">PROFIL USER</span></a>
             <?php else: ?>
                  <a href="#" data-toggle="modal" data-target="#login-modal" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Sign In</span></a>
          <?php endif ?>
                  <a href="frontend/customer-register.php" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Sign Up</span></a></div>                <ul class="social-custom list-inline">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Top bar end-->
      <!-- Login Modal-->
      <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Pelanggan Login</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <form action="" method="POST">
                <div class="form-group">
                  <input id="email_modal" name="email" type="email" placeholder="email" class="form-control">
                </div>
                <div class="form-group">
                  <input id="password_modal" type="password" name="password" placeholder="password" class="form-control">
                </div>

                          <?php 
            //jika tombol login ditekan
              if (isset($_POST["login"])) 
              {
                $email = $_POST["email"];
                $password = $_POST["password"];
                //cek akun pada database
                $ambil = $conn->query("SELECT * FROM pelanggan WHERE email='$email'");
                //parameter sukses login
                $sukses = $ambil->num_rows;

                //jika parameter benar
                if ($sukses==1) 
                {
                  //bisa login
                  $akun = $ambil->fetch_assoc();

                  if (password_verify($password, $akun["password"]) ){

                  //simpan session
                  $_SESSION["pelanggan"]=$akun;

                  echo "<script>alert('login berhasil');</script>";
                  echo "<script>location='index.php';</script>";
                }
                 else 
                {
                  //gagal login
                  echo "<script>alert('GAGAL! Periksa Kembali');</script>";
                  echo "<script>location='index.php';</script>";
                }
                }
              }
            ?>
   <p class="text-center">
      <button class="btn btn-template-outlined" type="submit" name="login" id="login" ><i class="fa fa-sign-in"  ></i> Log in</button>
                </p>
              </form>
              <p class="text-center text-muted">Not registered yet?</p>
              <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      <!-- Navbar Start-->
      <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="index.php" class="navbar-brand home"><img src="frontend/img/roeman.png" alt="Universal " class="d-none d-md-inline-block"><img src="frontend/img/roeman.png" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown active"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Home <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="index.php" class="nav-link">home</a></li>
                    <li class="dropdown-item"><a href="#" class="nav-link">Option 2: Application</a></li>

                  </ul>
                </li>

                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Tips And Tricks <b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        <div class="col-lg-6"><img src="frontend/img/temwte-homepage.png" alt="" class="img-fluid d-none d-lg-block"></div>
                        <div class="col-lg-3 col-md-6">
                          <h5><a href="frontend/blog.php" class="nav-link">Tips And Trick disini</a></h5>

                        </div>
                        <div class="col-lg-3 col-md-6">
                          <h5>About</h5>
                          <ul class="list-unstyled mb-3">
<!--                             <li class="nav-item"><a href="about.html" class="nav-link">About Anjing</a></li>
                            <li class="nav-item"><a href="team.html" class="nav-link">About Kucing</a></li>
                            <li class="nav-item"><a href="team-member.html" class="nav-link">Team member</a></li> -->

                          </ul>
  
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <!-- ========== FULL WIDTH MEGAMENU ==================-->
                 <li class="nav-item dropdown "><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Shop <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <div class="row">
                        <div class="col-md-7 col-lg-3">

                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="frontend/shop-category-left.php" class="nav-link">Oldays Shop</a></li>
                            <li class="nav-item"><a href="frontend/shop-keranjang.php" class="nav-link">Shopping Cart</a></li>
 
                          </ul>
                        </div>

                      </div>
                    </li>
                  </ul>
                </li>
                <!-- ========== FULL WIDTH MEGAMENU END ==================-->
                <!-- ========== Contact dropdown ==================-->
                <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Contact Us <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="frontend/feedback.php" class="nav-link">Feedback Us !</a></li>
                      <li class="dropdown-item"><a href="frontend/contact.php" class="nav-link">Contact Us </a></li>

                  </ul>
                </li>
                <!-- ========== Contact dropdown end ==================-->
              </ul>
            </div>
            <div id="search" class="collapse clearfix">
              <form role="search" class="navbar-form">
                <div class="input-group">
                  <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </header>
      <!-- Navbar End-->
      
      <section style="background: url('frontend/img/photogrid.jpg') center center repeat; background-size: cover;" class="relative-positioned">
        <!-- Carousel Start-->
        <div class="home-carousel">
          <div class="dark-mask mask-primary"></div>
          <div class="container">
            <div class="homepage owl-carousel">
              <div class="item">
                <div class="row">
                  <div class="col-md-5 text-right">
                    <p><img src="frontend/img/roeman.png" alt="" class="ml-auto"></p>
                    <h1>Get Your Style now</h1>
                    <p>24 hour services free</p>
                    <p>Without Queue Line up</p>

                  </div>
                  <div class="col-md-5"><img src="frontend/img/slider4.png" alt="" class="img-fluid"></div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-md-5 text-center"><img src="frontend/img/slider1.png" alt="" class="img-fluid"></div>
                  <div class="col-md-5">
                    <h2>Old Days</h2>
                    <ul class="list-unstyled">
                      <li>Barang barang secara online</li>
                      <li>Transaksi secara online</li>
                      <li>Terbaik di online Shop</li>
                      <li>Banyak Diskon Menarik yang menanti</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-md-5 text-right">
                    <h1>Tips And Tricks</h1>
                    <ul class="list-unstyled">
                      <li>Di Dalam Blog Kita !! </li>
                      <li>Buka 24 jam</li>
                      <li>Contact kami 24 jam</li>
                      <li>Stay Tune On Our Web Site</li>

                    </ul>
                  </div>
                  <div class="col-md-5"><img src="frontend/img/slider2.png" alt="" class="img-fluid"></div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- Carousel End-->
      </section>
      <!-- fitur -->
      <section class="bar background-white no-mb">
        <div class="container">
          <div class="col-md-12">
            <div class="heading text-center">
              <h2>Fitur Yang Kami Sediakan</h2>
            </div>
            <p class="lead">Kita Selalu Memberikan Pelayanan 100% agar anda Merasa Puas Dengan Pelayanan Kami,   " Anda Puas Kami senang" Silahkan Pilih Pelayanan Kita di bawah ini <a href="frontend/perawatan.php">Check our blog!</a></p>
            <div class="row">
              <div class="col-lg-3">
                <div class="home-blog-post">
                  <div class="image"><img src="frontend/img/slide1.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><a href="frontend/shop-category-left.php" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                  </div>
                  <div class="text">
                    <h4><a href="#">SHOP </a></h4>
                    <p class="author-category">By <a href="frontend/shop-category-left.php">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                    <p class="intro">Ini merupakan Berita yg ada di dalam webssite kami, yg menarik namun juga tentu saja membuat orang penasaran akan adanya itu</p><a href="frontend/shop-category-left.php" class="btn btn-template-outlined">Continue Reading</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="home-blog-post">
                  <div class="image"><img src="frontend/img/detailsquare2.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><a href="frontend/blog.php" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                  </div>
                  <div class="text">
                    <h4><a href="#">Blog Tips And Trick</a></h4>
                    <p class="author-category">By <a href="frontend/blog.php">John Snow</a> in <a href="frontend/blog.php">Webdesign</a></p>
                    <p class="intro">Kita Selalu Memberikan Pelayanan 100% agar anda Merasa Puas Dengan Pelayanan Kami,   " Anda Puas Kami senang" Silahkan Pilih Pelayanan Kita di bawah ini</p><a href="frontend/blog.php" class="btn btn-template-outlined">Continue Reading</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="home-blog-post">
                  <div class="image"><img src="frontend/img/basketsquare.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><a href="frontend/contact.php" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                  </div>
                  <div class="text">
                    <h4><a href="#">Contact</a></h4>
                    <p class="author-category">By <a href="#">John Snow</a> in <a href="frontend/contact.php">Webdesign</a></p>
                    <p class="intro">Kita Selalu Memberikan Pelayanan 100% agar anda Merasa Puas Dengan Pelayanan Kami,   " Anda Puas Kami senang" Silahkan Pilih Pelayanan Kita di bawah ini</p><a href="frontend/contact.php" class="btn btn-template-outlined">Continue Reading</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="home-blog-post">
                  <div class="image"><img src="frontend/img/laki2.png" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                  </div>
                  <div class="text">
                    <h4><a href="#">Feedback </a></h4>
                    <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                    <p class="intro">Kita Selalu Memberikan Pelayanan 100% agar anda Merasa Puas Dengan Pelayanan Kami,   " Anda Puas Kami senang" Silahkan Pilih Pelayanan Kita di bawah ini.</p><a href="#" class="btn btn-template-outlined">Continue Reading</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end of fitur -->
      <section style="background: url(frontend/img/lg.png) center top no-repeat; background-size: cover;" class="bar no-mb color-white text-center bg-fixed relative-positioned">
        <div class="dark-mask"></div>
        <div class="container">
          <div class="icon icon-outlined icon-lg"><i class="fa fa-paper-plane"></i></div>
          <h3 class="text-uppercase"> Punya masalah dengan Peliharaan anda ?</h3>
          <p class="lead">Kita Sudah Menyiapkan Pelayanan Dengan 24 jam</p>
          <p class="text-center"><a href="frontend/contact.php" class="btn btn-template-outlined-white btn-lg">Silahkan Hubungi Kami Disini</a></p>
        </div>
      </section>

      <section class="bar background-pentagon no-mb">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="heading text-center">
                <h2>Testimonials</h2>
              </div>
              <p class="lead">Kita Selalu Memberikan Pelayanan 100% agar anda Merasa Puas Dengan Pelayanan Kami,   " Anda Puas Kami senang"</p>
              <!-- Carousel Start-->
              <ul class="owl-carousel testimonials list-unstyled equal-height">
  <?php  $ambil = tampil("SELECT * FROM post_feedback "); ?>
         <?php foreach ( $ambil as $row ) : ?>

                <li class="item">
                  <div class="testimonial d-flex flex-wrap">
                    <div class="text">
                      <p style="word-wrap: break-word;max-width: 220px;" ><?= $row["message"]  ?></p>
                    </div>
                    <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                      <div class="icon"><i class="fa fa-quote-left"></i></div>
                      <div class="testimonial-info d-flex">
                        <div class="title">
                          <h6 style="word-wrap: break-word;max-width: 100px;"><?= $row["nama_user"]  ?></h5>
                          <pre><?= $row["jenis_hewan"]  ?></pre>
                        </div>
                        <div class="avatar"><img alt="" src="frontend/img/person-1.jpg" class="img-fluid"></div>
                      </div>
                    </div>
                  </div>
                </li>
      <?php endforeach; ?>
                <li class="item">
                  <div class="testimonial d-flex flex-wrap">
                    <div class="text">
                      <p>Pagi Hari ini kami sangat Senang karena Pelayanan anda sangat memuaskan sekali pada pagi hari ini</p>
                    </div>
                    <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                      <div class="icon"><i class="fa fa-quote-left"></i></div>
                      <div class="testimonial-info d-flex">
                        <div class="title">
                          <h5>John McIntyre</h5>
                          <p>CEO, TransTech</p>
                        </div>
                        <div class="avatar"><img alt="" src="frontend/img/person-1.jpg" class="img-fluid"></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <!-- Carousel End-->
            </div>
          </div>
        </div>
      </section>
      <!-- FOOTER -->
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h4 class="h6">About Us</h4>
              <p>Style Anda Merupakan Style kami !</p>
              <hr>

              <hr class="d-block d-lg-none">
            </div>
            <div class="col-lg-3">
              <h4 class="h6">Blog</h4>
              <ul class="list-unstyled footer-blog-list">
                <li class="d-flex align-items-center">
                  <div class="image"><img src="frontend/img/jacket3.png" alt="..." class="img-fluid"></div>
                  <div class="text">
                    <h5 class="mb-0"> <a href="blog.php">Blog</a></h5>
                  </div>
                </li>

  
              </ul>
              <hr class="d-block d-lg-none">
            </div>
            <div class="col-lg-3">
              <h4 class="h6">Contact</h4>
              <p class="text-uppercase"><strong>Jl. Delima Putih</strong><br>No 8 <br>Jember <br>45Y 73J <br>Indonesia <br><strong>Patrang</strong></p><a href="contact.php" class="btn btn-template-main">Go to contact page</a>
              <hr class="d-block d-lg-none">
            </div>
            <div class="col-lg-3">
              <ul class="list-inline photo-stream">
                <li class="list-inline-item"><a href="#"><img src="frontend/img/jacket.png" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="frontend/img/jacket2.png" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="frontend/img/jacket3.png" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="frontend/img/slider2.png" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="frontend/img/slider4.png" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="frontend/img/slider1.png" alt="..." class="img-fluid"></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 text-center-md">
                <p>&copy; 2018. Oldays | Olshop</p>
              </div>
 
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!-- endfooter -->
    <!-- Javascript files-->
    <script src="frontend/vendor/jquery/jquery.min.js"></script>
    <script src="frontend/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="frontend/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="frontend/vendor/waypoints/lib/jquery.waypoints.min.js"> </script>
    <script src="frontend/vendor/jquery.counterup/jquery.counterup.min.js"> </script>
    <script src="frontend/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
    <script src="frontend/js/jquery.parallax-1.1.3.js"></script>
    <script src="frontend/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="frontend/vendor/jquery.scrollto/jquery.scrollTo.min.js"></script>
    <script src="frontend/js/front.js"></script>
  </body>
</html>