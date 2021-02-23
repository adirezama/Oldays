<?php 
session_start();
session_destroy();

echo "<script>alert('anda telah logout');</script>";
echo "<script>location='daycare.php';</script>";
					
?>