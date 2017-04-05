
	
<?php 

   $kode_point = $_GET['kode_point']; 


  include '../connection.php'; 
  include '../header/header-point.php'; 


    if(!isset($_GET['kode_point'])){
        die("Error: ID Tidak Dimasukkan");
    }

    //Ambil data
    $query = $my_koneksi->prepare("SELECT * FROM point WHERE kode_point = :kode_point");
    $query->bindParam(":kode_point", $_GET['kode_point']);
    // Jalankan perintah sql
    $query->execute();
    if($query->rowCount() == 0){
        // Tidak ada hasil
        die("Error: ID Tidak Ditemukan");
    }else{
        // ID Ditemukan, Ambil data
        $data = $query->fetch();
    }

    if(isset($_POST['simpan'])){
        // Simpan data yang di inputkan ke POST ke masing-masing variable
        // dan cgvert semua tag HTML yang mungkin dimasukkan untuk mengindari XSS
        // 
        

        
        $kode_kategori = htmlentities($_POST['kode_kategori']);
        $kode_jenis_lingkup = htmlentities($_POST['kode_jenis_lingkup']);
        $poin = htmlentities($_POST['poin']);
        



        // Prepared statement untuk mengubah data
        $query = $my_koneksi->prepare("UPDATE  point SET 

     
      kode_kategori=:kode_kategori,
      kode_jenis_lingkup=:kode_jenis_lingkup,
      poin=:poin
      
      
      WHERE kode_point=:kode_point");

        $query->bindParam(":kode_point", $kode_point);
        $query->bindParam(":kode_kategori", $kode_kategori);
        $query->bindParam(":kode_jenis_lingkup", $kode_jenis_lingkup);
        $query->bindParam(":poin", $poin);

        
        // Jalankan perintah SQL
        
        $query->execute();


        // Alihkan ke index.php
        header("location: daftar.php");
    }
?>



<div class="container">
  <h1>Edit Point Kemahasiswaan</h1>
 <div class="row">
    <div class="col-sm-5">
      <form class="form-horizontal" method="POST" action="">
        
        <div class="form-group">
          <label for="kode_kategori" class="col-sm-2 control-label">Kategori</label>
           <div class="col-sm-5">
           <?php 
          

          echo "<select name='kode_kategori' required class='form-control' id=kode_kategori'> <option value=0 selected>Pilih Kategori </option>";
          $query="SELECT * FROM kategori ORDER BY kode_kategori";
          $tampil = $my_koneksi->prepare($query); 
          $tampil->execute();

          while ($pilih=$tampil->fetch(PDO::FETCH_ASSOC)) {
          echo "<option value=$pilih[kode_kategori] selected>$pilih[kategori]</option>";

          }

          echo"</select>";

           ?>
           </div>


          

        </div>
        <div class="form-group">
          <label for="kode_jenis_lingkup" class="col-sm-2 control-label">Lingkup Kegiatan</label>
           <div class="col-sm-5">
           <?php 
          

          echo "<select name='kode_jenis_lingkup' required class='form-control' id=kode_jenis_lingkup'> <option value=0 selected>Pilih Lingkup </option>";
          $query="SELECT * FROM jenis_lingkup ORDER BY kode_jenis_lingkup";
          $tampil = $my_koneksi->prepare($query); 
          $tampil->execute();

          while ($pilih=$tampil->fetch(PDO::FETCH_ASSOC)) {
          echo "<option value=$pilih[kode_jenis_lingkup] selected>$pilih[keterangan]</option>";

          }
          echo"</select>";

           ?>
           </div>

        </div>
        
        

        <div class="form-group">
          <label for="poin" class="col-sm-2 control-label">Nilai Poin</label>
          <div class="col-sm-5">
            <input type="text" name="poin" class="form-control" id="poin"  value="<?php echo $data['poin'];?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-5">

            <button type="submit" class="btn btn-success" name="simpan">Simpan&nbsp;</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           

          </div>
          <div>
             <a href="daftar.php" class="btn btn-primary">Kembali</a>
          </div>
        </div>

