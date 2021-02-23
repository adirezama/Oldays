<?php  

include('../models/barang.php');

ob_start();
session_start();

if(isset($_GET['id']))
{
$id=$_GET['id'];
$getdata= "SELECT * FROM pemesanan WHERE id_pemesanan='".$id."' ";
$check1=mysqli_query($conn, $getdata) or die (mysqli_error($conn));
$room=mysqli_fetch_array($check1);
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
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              We're using <a class="alert-link" href="http://tablesorter.com/docs/">Tablesorter 2.0</a> for the sort function on the tables. Read the documentation for more customization options or feel free to use something else!
            </div>
          </div>
        </div><!-- /.row -->

                  <!-- pop up tambah barang -->


<form action="ubah_pesanan.php" method="POST">

 <input name="id" type="hidden"  value="<?php if(isset($_GET['id'])){ echo $_GET['id']; }  ?>" />

  <h2 align="center" id="h"><u><i>Booking Kandang</i></u></h2>

    <div class="container">
                 <input name="id" type="hidden"  value="<?php if(isset($_GET['id'])){ echo $_GET['id']; }  ?>" /> 

     
          <div class="col-md-10 col-md-offset-1">
            <div class="form-group">

       <div class="form-field">
             <i class="icon icon-calendar2"></i>

              <input name="startdate1" id="date" type="date" class="form-control " value="<?php echo isset($_GET['startdate1']) ? $_GET['startdate1'] : $room['checkin'] ?>"/>
               </div>
          </div>
              </div>


    <input name="startdate" type="hidden" value="<?php echo isset($_GET['startdate1']) ? $_GET['startdate1'] : $room['checkin'] ?>" />
  <input name="email" type="hidden" value="<?php if(isset($_GET['id'])){ echo $room['email']; }  ?>"  />



          <div class="col-md-10 col-md-offset-1">
            <div class="form-group">

     <div class="form-field">
        <i class="icon icon-arrow-down3"></i>
            <select name="field_1" id="field_1" class="form-control " >
<option value="<?php if(isset($_GET['id'])){ echo $room['tipe_kandang']; }  ?>">- Jenis Kandang -</option>
<?php 
if(isset($_GET['startdate1'])){
$paymentDate = $_POST['startdate1'];
$contractDateBegin = '2019-05-20';


if (($paymentDate >= $contractDateBegin) )
{
 $s2="SELECT * FROM kandang WHERE musim ='Hari Puasa' ";
$s3=mysqli_query($conn, $s2);
}
else
{
$s2="SELECT * FROM kandang WHERE musim='Hari Biasa' ";
$s3=mysqli_query($conn, $s2);
}


?>

<?php  

while($catdata=mysqli_fetch_array($s3)) { ?>  
  <option data-harga="<?php echo $catdata['harga_kandang'] ?>" ><?php echo $catdata['tipe_kandang']; ?></option>
  
           <?php } ?>
       <?php } ?>
  </select>
   </div>
  </div>
    </div>


       <div class="col-md-10 col-md-offset-1 ">
          <div class="form-label-group">
                 <i class="icon icon-arrow-down3"></i>
RP
                    <input name="field_2" id="a1" class="form-control" value="<?php if(isset($_GET['id'])){ echo $room['harga_kandang']; }  ?>" readonly="">
                  </div>
                </div>
                <div class="col-md-10 col-md-offset-1">
            <div class="form-group">

         <div class="form-field">
                  <i class="icon icon-arrow-down3"></i>
                           <select  name="jenis_hewan" id="jenis_hewan" class="form-control"  >
                                <option value="<?php if(isset($_GET['id'])){ echo $room['jenis_hewan']; }  ?>"  >- Jenis Hewan -</option>
                                  <option>Anjing</option>
                        <option>Kucing</option>
                              </select>

                            </div>
                          </div>
                      </div>
       <div class="col-md-10 col-md-offset-1 ">
                <div class="form-label-group">
                  <i class="icon icon-arrow-down3"></i>
                    <input type="text" name="hari" id="hari" class="form-control" placeholder="Lama Penitipan" value="<?php if(isset($_GET['id'])){ echo $room['hari']; }  ?>" onChange="gettotal_harga1()" >

                  </div>
                </div>
      <div class="col-md-10 col-md-offset-1 ">
               <div class="form-label-group">
                 <i class="icon icon-arrow-down3"></i>
                    <input type="text" name="totalharga" id="total_harga1"  class="form-control" placeholder="Harga Total" value="<?php if(isset($_GET['id'])){ echo $room['total_harga']; }  ?>" readonly="" />


                  </div>
                </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="form-group">
              <i class="icon icon-arrow-down3"></i>

        <input type="submit" name="update"  id="update" value="ubah data" class="btn btn-primary btn-block">
        </div>
      </div>
     </div>
    

     </form>
     <?php 

             //cek tombol sudah di klik apa belum
              if ( isset($_POST["update"]) ) {
                //cek data berhasil atau tidak

                if (ubah_pemesanan($_POST) > 0 ) {


                    echo "
                    <script>
                      alert('data berhasil di update!');
                      document.location.href = '../tampilan/tampil_booking.php';
                    </script>
                    ";
                  } else {
                    echo "
                    <script>
                      alert('data gagal di update!');
                      document.location.href = '../tampilan/tampil_booking.php';
                    </script>
                  ";
                }
              }
 ?>
     <script language="javascript" type="text/javascript">
      
    
    document.getElementById("field_1").onchange = notEmpty;


   function gettotal_harga1(){
      var tot1=document.getElementById('a1').value;
      var tot2=document.getElementById('hari').value;
      var tot3=parseFloat(tot1)* parseFloat(tot2);
      
      document.getElementById('total_harga1').value=tot3;
  
   }
      </script>
  </div>
  <div class="col-md-10 col-md-offset-1">
 <li><a href="logout_pelanggan.php"><i class="fa fa-power-off"></i> Log Out</a></li>
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
  
   <!-- jQuery -->
  <script src="../assets/js/jquery.min.js"></script>
  <!-- jQuery Easing -->
  <script src="../assets/js/jquery.easing.1.3.js"></script>
  <!-- Bootstrap -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <!-- Waypoints -->
  <script src="../assets/js/jquery.waypoints.min.js"></script>
  <!-- Flexslider -->
  <script src="../assets/js/jquery.flexslider-min.js"></script>
  <!-- Owl carousel -->
  <script src="../assets/js/owl.carousel.min.js"></script>
  <!-- Magnific Popup -->
  <script src="../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../assets/js/magnific-popup-options.js"></script>
  <!-- Date Picker -->
  <script src="../assets/js/bootstrap-datepicker.js"></script>
  <!-- Stellar Parallax -->
  <script src="../assets/js/jquery.stellar.min.js"></script>
  <!-- Main -->
  <script src="../assets/js/main.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){
        $("#field_1").change(function(){
          var harga = $(this).find(":selected").data("harga")
          $("#a1").val(harga)
        })
        $("#date").change(function(){
          var thisVal = $(this).val()
          window.location = "?id=<?php echo $_GET['id'] ?>&startdate1="+thisVal
        })
      })
  
</script>

  </body>
</html>