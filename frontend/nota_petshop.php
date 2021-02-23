<?php 
session_start();
include '../models/barang.php';

$ambil = $conn->query("SELECT * FROM penjualan JOIN pelanggan on penjualan.id_pelanggan=pelanggan.id_pelanggan WHERE penjualan.id_penjualan='$_GET[id]'");
$detail = $ambil->fetch_assoc();
                      $status = $detail["status"];

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nota Penjualan</title>
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
              <p>Contact us on +8133023245 or roeman@gmail.com.</p>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end justify-content-between">
                <ul class="list-inline contact-info d-block d-md-none">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                </ul>
                 <div class="login">
       <?php if (isset($_SESSION["pelanggan"])): ?>
                  <a href="logout_pelanggan.php"   class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Log Out</span></a>
                <a href="profil.php"   class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">PROFIL USER</span></a>
             <?php else: ?>
                  <a href="#" data-toggle="modal" data-target="#login-modal" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Sign In</span></a>
          <?php endif ?>
        </a><a href="customer-register.html" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Sign Up</span></a></div>
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
              <h4 id="login-modalLabel" class="modal-title">Customer Login</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <form action="customer-orders.html" method="get">
                <div class="form-group">
                  <input id="email_modal" type="text" placeholder="email" class="form-control">
                </div>
                <div class="form-group">
                  <input id="password_modal" type="password" placeholder="password" class="form-control">
                </div>
                <p class="text-center">
                  <button class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
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
          <div class="container"><a href="index.html" class="navbar-brand home"><img src="img/roeman.png" alt="Universal roeman" class="d-none d-md-inline-block"><img src="img/roeman.png" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
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
                        <div class="col-lg-6"><img src="frontend/img/template-homepage.png" alt="" class="img-fluid d-none d-lg-block"></div>
                        <div class="col-lg-3 col-md-6">
                          <h5><a href="blog.php" class="nav-link">Tips And Trick disini</a></h5>

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
                            <li class="nav-item"><a href="shop-category-left.php" class="nav-link">Oldays Shop</a></li>
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
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Order #<?php echo $detail['id_penjualan']?></h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="customer-orders.html">My Orders</a></li>
                <li class="breadcrumb-item active">Order # <?php echo $detail['id_penjualan']?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar">
            <div id="customer-order" class="col-lg-9">
              <p class="lead">Order #<?php echo $detail['id_penjualan']?> was placed on <strong><?php echo $detail['tanggal_penjualan'];?></strong> and is status currently <strong>        <?php if (stripos($status, "belum bayar") !== false): ?>
                     <td><span class="badge badge-danger"><?= $detail['status'];?></span></td>
       <?php else: ?>
                     <td><span class="badge badge-success"><?= $detail['status'];?></span></td>

        <?php endif ?></strong>.</p>
              <p class="lead text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>
              <div class="box">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th colspan="2" class="border-top-0">Product</th>
                        <th class="border-top-0">Quantity</th>
                        <th class="border-top-0">Unit price</th>
                        <th class="border-top-0"></th>
                        <th class="border-top-0">Total</th>
                      </tr>
                    </thead>
                    <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$conn->query("SELECT * FROM penjualan_barang WHERE id_penjualan='$_GET[id]'"); ?>
    <?php while($pecah = $ambil->fetch_assoc()){?>
                      <tr>
                        <td><?php echo $nomor; ?>.</a></td>
                        <td><a href="#"><?php echo $pecah['nama_barang'];?></a></td>
                        <td><?php echo $pecah['jumlah'];?></td>
                        <td>Rp.<?php echo number_format($pecah['harga']);?></td>
                        <td></td>
                        <td>Rp.<?php echo number_format($pecah['subharga']);?></td>
                      </tr>
    <?php $nomor++ ?>
    <?php } ?>

                    </tbody>
                    <tfoot>

                      <tr>
                        <th colspan="5" class="text-right">Pembungkusan</th>
                        <th>Rp.0.00</th>
                      </tr>
                      <tr>
                        <th colspan="5" class="text-right">Tarif Ongkir</th>
                        <th>Rp. <?php echo number_format($detail['tarif']); ?></th>
                      </tr>
                      <tr>
                        <th colspan="5" class="text-right">Total</th>
                        <th>Rp. <?php echo number_format($detail['total_penjualan']) ?></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="row addresses">
                  <div class="col-md-6 text-right">
          
                  </div>
                  <div class="col-md-6 text-right">
                    <h3 class="text-uppercase">Shipping address</h3>
                    <p><?php echo $detail['nama_user']; ?><br>					    <?php echo $detail['alamat_pengiriman']; ?><br>					    <?php echo $detail['no_hp']; ?><br>					    45Y 73J<br>					    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title"><?php echo $detail['email']; ?></h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                    <li class="nav-item"><a href="history_pelanggan.php" class="nav-link"><i class="fa fa-list"></i> My orders</a></li>
                    <li class="nav-item"><a href="wishlist.php" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a></li>
                    <li class="nav-item"><a href="profil.php" class="nav-link"><i class="fa fa-user"></i> My account</a></li>
                    <li class="nav-item"><a href="upload_bayar.php?id=<?= $_GET["id"] ?>" class="nav-link"><i class="fa fa-sign-out"></i>Bayar Sekarang</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- GET IT-->
      <!-- FOOTER -->
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h4 class="h6">About Us</h4>
              <p>Kepuasan Peliharaan Anda Merupakan Prioritas Kami .</p>
              <hr>
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
                <p>&copy; 2018. Oldays | Oldays Olshop</p>
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