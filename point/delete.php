
<?php  
   

  include '../connection.php'; 
  include '../header/header-point.php'; 



    if(isset($_GET["kode_point"])){
        // Prepared statement untuk menghapus data
        $query = $my_koneksi->prepare("DELETE FROM point WHERE kode_point=:kode_point");
        $query->bindParam(":kode_point", $_GET["kode_point"]);
        // Jalankan Perintah SQL
        $query->execute();
        // Alihkan ke index.php
        header("location: daftar.php");
    }
?>


