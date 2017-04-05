
	<?php include '../connection.php'; 
        include '../header/header-point.php'; 

	if($_POST)
	{
		try {

			$qry = 'INSERT INTO point (kode_point, kode_kategori, kode_jenis_lingkup, jabatan, poin) VALUES (NULL, :kode_kategori,:kode_jenis_lingkup, NULL, :poin)'; 
			$s = $my_koneksi->prepare($qry); 
			
      $s->bindValue(':kode_kategori',$_POST['kode_kategori']); 
      $s->bindValue(':kode_jenis_lingkup',$_POST['kode_jenis_lingkup']); 
      $s->bindValue(':poin',$_POST['poin']); 
     

			$rowCount = $s->execute(); 
			$s->closeCursor();

      header('Location: daftar.php');

		} catch (PDOException $e) {
			die("Error: ".$e->getMessage());
		}
	}
?>


<div class="container">
  <h1>Entry Point Kemahasiswaan</h1>
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
          echo "<option value=$pilih[kode_kategori]>$pilih[kategori]</option>";

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
          echo "<option value=$pilih[kode_jenis_lingkup]>$pilih[keterangan]</option>";

          }
          echo"</select>";

           ?>
           </div>

        </div>
        
        

        <div class="form-group">
          <label for="poin" class="col-sm-2 control-label">Nilai Poin</label>
          <div class="col-sm-5">
            <input type="text" name="poin" class="form-control" id="poin" placeholder="Nilai Poin">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-5">

            <button type="submit" class="btn btn-success">Simpan&nbsp;</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger" type="reset">&nbsp;Reset&nbsp;</button>
           

          </div>
          <div>
             <a href="daftar.php" class="btn btn-primary">Kembali</a>
          </div>
        </div>

