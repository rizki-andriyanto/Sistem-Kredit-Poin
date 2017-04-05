
	<?php include '../connection.php'; 
        include '../header/header-kegiatan.php'; 



	if($_POST)
	{
		try {

			$qry = 'INSERT INTO kegiatan (kode_kegiatan, nama_kegiatan,kode_ukm, keterangan, kode_jenis_lingkup, kategori_kegiatan, jenis, biaya_pendaftaran, cara_pendaftaran, tanggal_acara, jam_acara,tanggal_pengajuan, tempat, untuk_sma, target_jumlah_peserta, ilustrasi, kebutuhan_biaya, info_pendaftaran, disetujui,  alasan, dana_disetujui) VALUES ( :kode_kegiatan,:nama_kegiatan,:kode_ukm,:keterangan,:kode_jenis_lingkup,:kategori_kegiatan,:jenis,NULL,NULL,:tanggal_acara,:jam_acara,:tanggal_pengajuan,:tempat,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)'; 
			$s = $my_koneksi->prepare($qry); 
			$s->bindValue(':kode_kegiatan',$_POST['kode_kegiatan']); 
      $s->bindValue(':nama_kegiatan',$_POST['nama_kegiatan']); 
      $s->bindValue(':kode_ukm',$_POST['kode_ukm']); 
      $s->bindValue(':keterangan',$_POST['keterangan']); 
			$s->bindValue(':kategori_kegiatan', $_POST['kategori_kegiatan']); 
      $s->bindValue(':kode_jenis_lingkup',$_POST['kode_jenis_lingkup']); 
      $s->bindValue(':jenis',$_POST['jenis']); 
      $s->bindValue(':tanggal_acara',$_POST['tanggal_acara']); 
      $s->bindValue(':jam_acara', $_POST['jam_acara']); 
       $s->bindValue(':tanggal_pengajuan', $_POST['tanggal_pengajuan']); 
      $s->bindValue(':tempat',$_POST['tempat']); 

			$rowCount = $s->execute(); 
			$s->closeCursor();

      header('Location: daftar.php');

		} catch (PDOException $e) {
			die("Error: ".$e->getMessage());
		}
	}
?>




<div class="container">
  <h1>Entry Kegiatan</h1>
  <div class="row">
    <div class="col-sm-5">
      <form class="form-horizontal" method="POST" action="">
        <div class="form-group">
          <label for="kode_kegiatan" class="col-sm-2 control-label">Kode Kegiatan</label>

          <div class="col-sm-5">
            <input type="text" name="kode_kegiatan" class="form-control" id="kode_kegiatan" placeholder="Kode Kegiatan">
          </div>

        </div>

      <!--   <div class="form-group">
          <label for="nama_kegiatan" class="col-sm-2 control-label">Nama Kegiatan</label>
          <div class="col-sm-5">
            <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" placeholder="Nama Kegiatan">
          </div>
        </div> -->
         <div class="form-group">
          <label for="nama_kegiatan" class="col-sm-2 control-label">Nama Kegiatan</label>

          <div class="col-sm-5">
            <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" placeholder="Nama Kegiatan">
          </div>
        </div>
        <div class="form-group">
          <label for="kode_ukm" class="col-sm-2 control-label">Nama UKM</label>
           <div class="col-sm-5">
           <?php 
          

          echo "<select name='kode_ukm' required class='form-control' id=kode_ukm'> <option value=0 selected>Pilih UKM </option>";
          $query="SELECT * FROM ukm ORDER BY kode_ukm";
          $tampil = $my_koneksi->prepare($query); 
          $tampil->execute();

          while ($pilih=$tampil->fetch(PDO::FETCH_ASSOC)) {
          echo "<option value=$pilih[kode_ukm]>$pilih[nama]</option>";

          }
          echo"</select>";

           ?>

           </div>
        </div>

        <div class="form-group">
          <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
          <div class="col-sm-5">
            <input type="text" name="keterangan" class="form-control input-lg" id="keterangan" placeholder="Keterangan">
          </div>
        </div>
         <div class="form-group">
          <label for="kategori_kegiatan" class="col-sm-2 control-label">Kategori</label>
           <div class="col-sm-5">
           <?php 
          

          echo "<select name='kategori_kegiatan' required class='form-control' id=kategori_kegiatan'> <option value=0 selected>Pilih Kategori </option>";
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
          <label for="kode_jenis_lingkup" class="col-sm-2 control-label">Lingkup</label>
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
          <label  class="col-sm-2 control-label">Jenis</label>
          <div class="col-sm-10">
            <input type="radio" name="jenis" value="Akademik"> Akademik &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="jenis" value="Non Akademik"> Non Akademik
          </div>
        </div>

        <div class="form-group">
          <label for="tanggal_acara" class="col-sm-2 control-label">Tanggal Acara</label>
          <div class="col-sm-5">
            <input type="date" name="tanggal_acara" id="tanggal_acara">
          </div>

          
          <script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("jam_acara").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>

          <label for="jam_acara" class="col-sm-2 control-label" >Jam</label>

  
          <input type="text" style="width: 70px;" name="jam_acara" id="jam_acara" value="<?php print date('H:i:s'); ?>"  />
        </div>
        <div class="form-group">
          <label for="tanggal_pengajuan" class="col-sm-2 control-label">Tanggal Pengajuan</label>
          <div class="col-sm-5">
            <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan">
          </div>
          </div>

        

        <div class="form-group">
          <label for="tempat" class="col-sm-2 control-label">Tempat Kegiatan</label>
          <div class="col-sm-5">
            <input type="text" name="tempat" class="form-control" id="tempat" placeholder="Tempat Kegiatan">
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

