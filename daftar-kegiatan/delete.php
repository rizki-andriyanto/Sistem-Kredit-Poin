
<?php  
   

  include '../connection.php'; 
  include '../header/header-kegiatan.php'; 



    if(isset($_GET["kode_kegiatan"])){
        // Prepared statement untuk menghapus data
        $query = $my_koneksi->prepare("DELETE FROM kegiatan WHERE kode_kegiatan=:kode_kegiatan");
        $query->bindParam(":kode_kegiatan", $_GET["kode_kegiatan"]);
        // Jalankan Perintah SQL
        $query->execute();
        // Alihkan ke index.php
        
        header("location: daftar.php");
    }
?>


