<?php 
session_start(); 
include "../models/barang.php";

$id = $_GET["id"];
$barang = tampil("SELECT * FROM tb_tips WHERE id_tips = $id")[0];

// $terbaru = tampil("SELECT * FROM tb_barang WHERE id_barang DESC ");

// $barang = mysqli_query($conn ,"SELECT * FROM tb_barang WHERE id_barang = '$_GET[id]'");
// $value = mysqli_fetch_assoc($barang);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>isi blog tips and trick</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.blue.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png">
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
              <p>Contact us on +420 777 555 333 or oldays@gmail.com.</p>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end justify-content-between">
                <ul class="list-inline contact-info d-block d-md-none">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
               <div class="login">
       <?php if (isset($_SESSION["pelanggan"])): ?>
                  <a href="logout_pelanggan_daycare.php"   class="login-btn"><i class="fas fa-user-check"></i><span class="d-none d-md-inline-block">Log Out</span></a>
                <a href="profil.php"   class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">PROFIL USER</span></a>
             <?php else: ?>
                  <a href="#" data-toggle="modal" data-target="#login-modal" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Sign In</span></a>
          <?php endif ?>
                  <a href="customer-register.php" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Sign Up</span></a></div>
                <ul class="social-custom list-inline">
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
              <p class="text-center text-muted"><a href="customer-register.php"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      <!-- Navbar Start-->
      <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="index.html" class="navbar-brand home"><img src="img/roeman.png" alt="Universal roeman" class="d-none d-md-inline-block"><img src="img/roeman.png" alt="Universal roeman" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
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
                        <div class="col-lg-6"><img src="img/templatsomepage.png" alt="" class="img-fluid d-none d-lg-block"></div>
                        <div class="col-lg-3 col-md-6">
                          <h5><a href="blog.php" class="nav-link">Tips And Trick disini</a></h5>

                        </div>
                        <div class="col-lg-3 col-md-6">
                          <h5>About</h5>
                          <ul class="list-unstyled mb-3">
<!--                             <li class="nav-item"><a href="about.php" class="nav-link">About Anjing</a></li>
                            <li class="nav-item"><a href="team.php" class="nav-link">About jacket</a></li>
                            <li class="nav-item"><a href="team-member.php" class="nav-link">Team member</a></li> -->

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
                            <li class="nav-item"><a href="shop-category-left.php" class="nav-link">Pet Shop</a></li>
                            <li class="nav-item"><a href="shop-keranjang.php" class="nav-link">Shopping Cart</a></li>
 
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
                    <li class="dropdown-item"><a href="feedback.php" class="nav-link">Feedback Us !</a></li>
                      <li class="dropdown-item"><a href="contact.php" class="nav-link">Contact Us </a></li>

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
      
      <div id="heading-breadcrumbs" class="border-top-0 border-bottom-0">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2"><?php echo $barang["judul_tips"]; ?></h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
                <li class="breadcrumb-item active">Blog Post</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <!-- LEFT COLUMN _________________________________________________________-->
            <div id="blog-post" class="col-md-9">
              <p class="text-muted text-uppercase mb-small text-right text-sm">By <a href="#">Admin</a> |  <?php echo $barang["dibuat"]; ?></p>
              <p class="lead"><strong><?php echo $barang["judul_tips"]; ?></p></strong>
              <div id="post-content">
                <p class="text-sm"><?php echo $barang["isi_tips"]; ?></p>
                <p><img src="../models/img/barang/<?= $barang["gambar_tips"]; ?>" alt="Example blog post alt" class="img-fluid"></p>
    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- FOOTER -->
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h4 class="h6">About Us</h4>
              <p> Kepuasan Anda Merupakan Kesenangan Kami  </p>
              <hr>
              <h4 class="h6">Join Our Monthly Newsletter</h4>
              <form>
                <div class="input-group">
                  <input type="text" class="form-control">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-secondary"><i class="fa fa-send"></i></button>
                  </div>
                </div>
              </form>
              <hr class="d-block d-lg-none">
            </div>
            <div class="col-lg-3">
              <h4 class="h6">Blog</h4>
              <ul class="list-unstyled footer-blog-list">
                <li class="d-flex align-items-center">
                  <div class="image"><img src="img/jacket3.png" alt="..." class="img-fluid"></div>
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
                <li class="list-inline-item"><a href="#"><img src="img/jacket.png" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="img/jacket2.png" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="img/jacket3.png" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="img/slider2.png" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="img/slider4.png" alt="..." class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="img/slider1.png" alt="..." class="img-fluid"></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 text-center-md">
                <p>&copy; 2018. Oldays / Oldays Olshop</p>
              </div>
      </footer>
    </div>
    <!-- Javascript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/waypoints/lib/jquery.waypoints.min.js"> </script>
    <script src="vendor/jquery.counterup/jquery.counterup.min.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="vendor/jquery.scrollto/jquery.scrollTo.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>