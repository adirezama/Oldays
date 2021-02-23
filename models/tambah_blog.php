<?php 
ob_start();
session_start();
if (!isset($_SESSION['admin'])) header("Location: login.php");
include "../models/barang.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog - Oldays</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../dashboard.php">Oldays Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="../dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Content <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../tampilan/tables.php">OLDAYS SHOP</a></li>
                <li><a href="../tampilan/tampil_blog.php">BLOG TIPS</a></li>
              </ul>
            </li>

          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Akun <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../tampilan/user.php">List Pelanggan</a></li>
                <li><a href="../register.php">Daftar Pelanggan</a></li>
                <li><a href="../tampilan/tampil_feedback.php">FeedBack User</a></li>

              </ul>
            </li>
          </ul>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">7 New Messages</li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">John Smith:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li><a href="#">View Inbox <span class="badge">7</span></a></li>
              </ul>
            </li>
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Default <span class="label label-default">Default</span></a></li>
                <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
                <li><a href="#">Success <span class="label label-success">Success</span></a></li>
                <li><a href="#">Info <span class="label label-info">Info</span></a></li>
                <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
                <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
                <li class="divider"></li>
                <li><a href="#">View All</a></li>
              </ul>
            </li>
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="../logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Blog Tips And Tricks <small>Bikin Baru</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-table"></i> Barang</li>
            </ol>

          </div>
        </div><!-- /.row -->

                  <!-- pop up tambah barang -->


              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tambah Blog Tips </h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label" for="nama_barang">Judul</label>
                  <input type="text" name="judul_tips" class="form-control" id="nama_barang" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="deskripsi_barang">Cuplikan Tips</label>
                   <textarea id="message" required="required" class="form-control" name="cuplikan" data-parsley-trigger="keyup" data-parsley-minlength="20"  data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."data-parsley-validation-threshold="10"  ></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label" for="deskripsi_barang">Isi Blog Tips</label>
                   <textarea id="message" required="required" class="form-control" name="isi_tips" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="1000" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."data-parsley-validation-threshold="10"  ></textarea>
                </div>

                <div class="form-group">
                  <label class="control-label" for="gambar">Gambar</label>
                  <input type="file" name="gambar" class="form-control" id="gambar" required>
                </div>
              </div>
              <div class="modal-footer">
              	<a href="../tampilan/tables.php" class="btn btn-danger">Batal Tambah</a></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger">Reset</button>
                <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
              </div>
            </form>
              <?php 
 


              //cek tombol sudah di klik apa belum
              if ( isset($_POST["tambah"]) ) {

                //cek data berhasil atau tidak

                if ( tambah_tips($_POST) > 0 ) {


                    echo "
                    <script>
                      alert('data berhasil di tambahkan!');
                      document.location.href = '../tampilan/tampil_blog.php';
                    </script>
                    ";
                  } else {
                    echo "
                    <script>
                      alert('data gagal di tambahkan!');
                      document.location.href = '../tampilan/tampil_blog.php';
                    </script>
                  ";
                }
              }


               ?>
          </div>
        </div>
      </div>



          </div>
        </div><!-- /.row -->

       

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="../assets/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../assets/js/tablesorter/tables.js"></script>

  </body>
</html>