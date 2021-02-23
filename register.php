<?php 
ob_start();
session_start();
if (!isset($_SESSION['admin'])) header("Location: login.php");
require 'models/barang.php';



 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Register - Oldays user </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
        <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
	    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap core CSS-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
          <a class="navbar-brand" href="dashboard.php">Oldays Admin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Content <b class="caret"></b></a>
              <ul class="dropdown-menu">
                 <li><a href="tampilan/tables.php">OLDAYS SHOP</a></li>
                <li><a href="tampilan/tampil_blog.php">BLOG TIPS</a></li>
              </ul>
            </li>

          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Akun <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="tampilan/user.php">List Pelanggan</a></li>
                <li><a href="register.php">Daftar Pelanggan</a></li>
                <li><a href="tampilan/tampil_feedback.php">FeedBack User</a></li>
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
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>


        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->


   <div class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-9">
      	<img src="models/img/images/signup-image.jpg" width="70px" class="col-md-offset-6">
        <div class="card-header col-md-offset-6">Register an Account</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <div class="form-row">
     <div class="col-md-5 col-md-offset-2">
                  <div class="form-label-group">
                    <label for="nama_user">Nama Panjang</label>

                    <input type="text" name="nama_user"id="nama_user" class="form-control" placeholder="nama panjang" required="required" autofocus="autofocus">
                  </div>
                </div>
                <div class="col-md-5 ">
                  <div class="form-label-group">
                    <label for="username">User Name</label>

                    <input type="text" name="username" id="username" class="form-control" placeholder="username" required="required">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-10 col-md-offset-2 ">
                  <div class="form-label-group">
                    <label for="email">Email</label>

                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
                  </div>
                </div>
                    <div class="form-group">
           	<div class="col-md-10 col-md-offset-2">
          <label for="gender" name="gender" id="gender ">Jenis Kelamin:</label>

  					<select class="form-control" id="gender" name="gender" required>
  						<option></option>
    				<option>Laki - laki</option>
    				<option>Perempuan</option>
 			 </select>
					</div>
						</div> 
            <div class="col-md-10 col-md-offset-2">
            <div class="form-group">
              <div class="form-label-group ">
                <div class="form-group">
        <label >Tanggal lahir</label>

 					<input type="date" name="tgl_lahir" id="tgl_lahir" max="3000-12-31" 
        			min="1000-01-01" class="form-control">
			</div>
      	</div>
              </div>
            </div>
   
            <div class="col-md-10 col-md-offset-2">
            <div class="form-group">
              <div class="form-label-group ">
                <label for="no_hp">No.Hp</label>

                <input type="number" id="no_hp" name="no_hp" class="form-control" placeholder="Nomer hp" required="required" maxlength="12">
            	</div>
              </div>
            </div>
            <div class="col-md-10 col-md-offset-2">
            <div class="form-group">
              <div class="form-label-group ">
                <label for="Alamat">Alamat</label>

                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="alamat" required="required">
            	</div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-10 col-md-offset-2">
                  <div class="form-label-group">
                    <label for="password">Password</label>

                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
                  </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                  <div class="form-label-group">
                   <label for="confirmpassword">Confirm password</label>
                    <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Confirm password" required="required">
                  </div>
                </div>
              </div>
            </div>
        	</div>
          
        </div>
      </div>
    </div> 
   </div>
   <br>
  		<div class="col-md-5 col-md-offset-4">
            <button type="submit" id="registrasi" name="register" class="btn btn-success btn-block" >Register</button>
        </div>
        	<div class="form-group">
              <div class="form-row">
                <div class="col-md-10 col-md-offset-2">
                  <div class="form-label-group">
      				<div class="text-center">
      	              <div class="form-row">
             </div>
          </div>
       </div>
     </div>
   </div>
</div>
</form>
<?php  
if ( isset($_POST["register"]) ) {
	
	if ( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('Berhasil Mendaftar');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}
}	
 ?>
    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="assets/js/morris/chart-data-morris.js"></script>
    <script src="assets/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="assets/js/tablesorter/tables.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  </body>
</html>
