<?php 
include "barang.php";

$id = $_GET["id"];
$barang = tampil("SELECT * FROM tb_barang WHERE id_barang = $id")[0];
$gambar = $barang['gambar'];
$kategori = $barang['id_kategori_barang'];


// $barang = mysqli_query($conn ,"SELECT * FROM tb_barang WHERE id_barang = '$_GET[id]'");
// $value = mysqli_fetch_assoc($barang);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tables - SB Admin</title>

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
          <a class="navbar-brand" href="index.php">SB Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="../index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Content <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="../tampilan/tables.php">Pet Shop</a></li>
                <li><a href="#">Pet Day Care</a></li>
                <li><a href="#">Pet Treatment</a></li>
              </ul>
            </li>

          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Akun <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Admin</a></li>
                <li><a href="register.php">Pelanggan</a></li>
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
            <h1>Tables <small>Sort Your Data</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-table"></i> Tables</li>
            </ol>

          </div>
        </div><!-- /.row -->

                  <!-- pop up tambah barang -->


              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Ubah Data Barang</h4>

            </div>
            <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $barang["id_barang"]; ?>">
              <input type="hidden" name="gambarLama" id="gambarLama "value="<?= $barang["gambar"]; ?>">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label" for="nama_barang">Nama Barang</label>
                  <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="<?= $barang["nama_barang"]; ?>" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="stok">Stok Barang</label>
                  <input type="number" name="quantity" class="form-control" id="quantity" value="<?= $barang["quantity"]; ?>" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="harga">Harga Barang</label>
                  <input type="number" name="harga" class="form-control" id="harga" value="<?= $barang["harga"]; ?>" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="nama_barang">Deskripsi Barang</label>
                  <input type="text" name="deskripsi_barang" class="form-control" id="deskripsi_barang" value="<?= $barang["deskripsi_barang"]; ?>" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="kategori_barang">Kategori Barang</label>
                  <input type="text" name="id_kategori_barang" class="form-control" id="kategori_barang" value="<?= $barang["id_kategori_barang"]; ?> " required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="gambar">Gambar Barang</label>
                  <input type="file" name="gambar" class="form-control" id="gambar"  >
                  <img src="../models/img/barang/<?= $barang["gambar"];  ?>" width="70px">
<?php  
    if (stripos($kategori, "1") !== false)
     {

        echo 'baju';  # code...
    } else if (stripos($kategori, "2") !== false) {
        echo 'jacket'; 
    } else if (stripos($kategori, "3") !== false) {
      echo 'Accessoris'; 
    }
   ?>

                </div>
              </div>
              <div class="modal-footer">
                                <a href="../tampilan/tables.php" class="btn btn-danger">Batal Ubah</a></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger">Reset</button>
                <input type="submit" class="btn btn-success" name="ubah" value="Simpan">

              </div>

            </form>
              
              <?php
              //cek tombol sudah di klik apa belum
              if ( isset($_POST["ubah"]) ) {

                //cek data berhasil atau tidak

                if (ubah($_POST) > 0 ) {

                    if ($gambar){
                      unlink('img/barang/'.$gambar);

                    echo "
                    <script>
                      alert('data berhasil di update!');
                      document.location.href = '../tampilan/tables.php';
                    </script>
                    ";
                  } else {
                    echo "
                    <script>
                      alert('data gagal di update!');
                      document.location.href = '../tampilan/tables.php';
                    </script>
                  ";
                }
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