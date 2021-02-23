<?php 
ob_start();
session_start();
if (!isset($_SESSION['admin'])) header("Location: login.php");
include "../models/barang.php";

//pagination

$JumlahDataPerHalaman = 5;
$JumlahBarang = count(tampil("SELECT * FROM tb_barang"));
$JumlahHalaman = ceil($JumlahBarang / $JumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awaldata = ($JumlahDataPerHalaman * $halamanAktif) - $JumlahDataPerHalaman;




if (isset($_POST["cari"])) {
  $barang = tampil("SELECT * FROM tb_barang WHERE nama_barang LIKE '%$_POST[keyword]%'");
}
else{
  $barang = tampil("SELECT * FROM tb_barang LIMIT $awaldata, $JumlahDataPerHalaman");  
}

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
          <a class="navbar-brand" href="../dashboard.php">Oldays Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="../dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Content <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="tables.php">OLDAYS SHOP</a></li>
                <li><a href="tampil_blog.php">BLOG TIPS</a></li>
              </ul>
            </li>

          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Akun <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="user.php">List Pelanggan</a></li>
                <li><a href="register.php">Daftar Pelanggan</a></li>
                <li><a href="tampil_feedback.php">FeedBack User</a></li>
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
                    <span class="name">Irfan:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">Irfan:</span>
                    <span class="message">Hey there, I wanted to ask you something...</span>
                    <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                  </a>
                </li>
                <li class="divider"></li>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="http://placehold.it/50x50"></span>
                    <span class="name">Irfan:</span>
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Irfan <b class="caret"></b></a>
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
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="fa fa-table"></i> Barang</li>
            </ol>
 
          </div>
        </div><!-- /.row -->

     <div class="col-lg-12">
      <div class="row">
        
     <div class="col-md-4">    
      <a href="transaksi_shop.php" ><button class="btn btn-success"><i ></i> Transaksi Shop</button></a>       

     <a href="../models/tambah.php" ><button class="btn btn-success"><i ></i> Tambah Barang</button></a>       
     </div>


     <div class="col-md-3 col-md-offset-5">
     <form action="" method="POST">   
      <div class="input-group">
     <input type="text" name="keyword" placeholder="Cari..." class="form-control" autocomplete="off" required>
     <span class="input-group-btn"><button type="submit" name="cari" class="btn btn-primary btn-md"><i class="fa fa-search"></i></button></span>
     
      </div>
     </form>   
     </div>
      </div>
      <br>
      <br>
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th>No <i class="fa fa-sort"></i></th>
                    <th>Nama Barang <i class="fa fa-sort"></i></th>
                    <th>Stok Barang <i class="fa fa-sort"></i></th>
                    <th>Harga Barang <i class="fa fa-sort"></i></th>
                    <th>Deskripsi Barang <i class="fa fa-sort"></i></th>
                    <th>Kategori Barang <i class="fa fa-sort"></i></th>
                    <th>Gambar <i class="fa fa-sort"></i></th>
                    <th>Pilihan <i class="fa fa-sort"></i></th>
                  </tr>
                      <?php $no = 1; ?>
                      <?php foreach ( $barang as $row ) : 
            $kategori = $row["id_kategori_barang"];
                        ?>

                </thead>
                <tbody>
                  

                  <tr>
                    <td><?= $no + $awaldata ?></td>
                    <td><?= $row["nama_barang"]  ?></td>
                    <td><?= $row["quantity"]  ?></td>
                    <td>Rp.<?= number_format( $row["harga"])  ?></td>
                    <td style="word-wrap: break-word;max-width: 250px;" ><?= $row["deskripsi_barang"]  ?></td>
                    <td>

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

                  </td>
                    <td>
                      <img src="../models/img/barang/<?= $row["gambar"];  ?>" width="70px">
                    </td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="../models/ubah.php?id=<?= $row["id_barang"]; ?>" title="Edit"><i class="fa fa-pencil" ></i></a>
                      <a href="../models/hapus.php?id=<?= $row ["id_barang"] ?>" onclick="return confirm('yakin akan menghapus data ini?')" title="Hapus"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                    </td>
                  </tr>
                  <?php $no++; ?>
                  <?php endforeach; ?>
                  

          
                </tbody>

              </table>
              <div class="col-md-offset-5">
              <ul class="pagination">
          <?php for( $i = 1; $i <= $JumlahHalaman; $i++ ) : ?>
              <?php if ( $i == $halamanAktif ) : ?>
                     <li class="active"> <a href="?halaman=<?= $i; ?>" ><?= $i;  ?></a></li>
                  <?php else : ?>
                      <li> <a href="?halaman=<?= $i; ?>"><?= $i;  ?></a></li>
                <?php endif; ?>
          <?php endfor; ?> 
</ul>
</div>
            </div>


          </div>
        </div><!-- /.row -->

       

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- navigasi page  -->
    
    <!-- JavaScript -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="../assets/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../assets/js/tablesorter/tables.js"></script>

  </body>
</html>