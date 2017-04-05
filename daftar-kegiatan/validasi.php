
  
<?php 

   $kode_kegiatan = $_GET['kode_kegiatan']; 


  include '../connection.php'; 
  include '../header/header-kegiatan.php'; 


    if(!isset($_GET['kode_kegiatan'])){
        die("Error: ID Tidak Dimasukkan");
    }

    //Ambil data
    $query = $my_koneksi->prepare("SELECT * FROM kegiatan WHERE kode_kegiatan = :kode_kegiatan");
    $query->bindParam(":kode_kegiatan", $_GET['kode_kegiatan']);
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
        

        $kode_kegiatan_new = htmlentities($_POST['kode_kegiatan']);
        $nama_kegiatan = htmlentities($_POST['nama_kegiatan']);
        $kode_ukm = htmlentities($_POST['kode_ukm']);
        $keterangan = htmlentities($_POST['keterangan']);
        $kategori_kegiatan = htmlentities($_POST['kategori_kegiatan']); 
        $kode_jenis_lingkup = htmlentities($_POST['kode_jenis_lingkup']);
        $jenis = htmlentities($_POST['jenis']);
        $tanggal_acara = htmlentities($_POST['tanggal_acara']);
        $jam_acara = htmlentities($_POST['jam_acara']);
        $tanggal_pengajuan = htmlentities($_POST['tanggal_pengajuan']);
        $tempat = htmlentities($_POST['tempat']);
        $disetujui = htmlentities($_POST['disetujui']);



        // Prepared statement untuk mengubah data
        $query = $my_koneksi->prepare("UPDATE  kegiatan SET 

      kode_kegiatan=:kode_kegiatan_new,
      nama_kegiatan=:nama_kegiatan,
      kode_ukm=:kode_ukm,
      keterangan=:keterangan,
      kategori_kegiatan=:kategori_kegiatan,
      kode_jenis_lingkup=:kode_jenis_lingkup,
      jenis=:jenis,
      tanggal_acara=:tanggal_acara,
      jam_acara=:jam_acara,
      tanggal_pengajuan=:tanggal_pengajuan,
      tempat=:tempat,
      disetujui=:disetujui
      
      WHERE kode_kegiatan=:kode_kegiatan");


        $query->bindParam(":kode_kegiatan", $kode_kegiatan);
        $query->bindParam(":nama_kegiatan", $nama_kegiatan);
        $query->bindParam(":kode_ukm", $kode_ukm);
        $query->bindParam(":keterangan", $keterangan);
        $query->bindParam(":kategori_kegiatan", $kategori_kegiatan);
        $query->bindParam(":kode_jenis_lingkup", $kode_jenis_lingkup);
        $query->bindParam(":jenis", $jenis);
        $query->bindParam(":tanggal_acara", $tanggal_acara);
        $query->bindParam(":jam_acara", $jam_acara);
        $query->bindParam(":tanggal_pengajuan", $tanggal_pengajuan);
        $query->bindParam(":tempat", $tempat);
        $query->bindParam(":disetujui", $disetujui);
        $query->bindParam(":kode_kegiatan_new", $kode_kegiatan_new);
        // Jalankan perintah SQL
        $query->execute();
        // Alihkan ke index.php
        header("location: daftar.php");
    }
?>



<div class="container">
  <h1>Edit Kegiatan</h1>
 <div class="row">
    <div class="col-sm-5">
      <form class="form-horizontal" method="POST" action="">
        <div class="form-group">
          <label for="kode_kegiatan" class="col-sm-2 control-label">Kode Kegiatan</label>

          <div class="col-sm-5">
            <input type="text" name="kode_kegiatan" class="form-control" id="kode_kegiatan" value="<?php echo $kode_kegiatan;?>">
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
            <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" value="<?php echo $data['nama_kegiatan'];?>">
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
          echo "<option value=$pilih[kode_ukm] selected>$pilih[nama]</option>";
         
          
         
          }
          echo"</select>";

           ?>

           </div>
        </div>

        <div class="form-group">
          <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
          <div class="col-sm-5">
            <input type="text" name="keterangan" class="form-control input-lg" id="keterangan" value="<?php echo $data['keterangan'];?>">
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
          
          echo "<option value=$pilih[kode_kategori] selected>$pilih[kategori]</option>";

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
          echo "<option value=$pilih[kode_jenis_lingkup] selected>$pilih[keterangan]</option>";

          }
          echo"</select>";

           ?>
           </div>

        </div>
        <div class="form-group">
          <label  class="col-sm-2 control-label">Jenis</label>
          <div class="col-sm-10">
            <input type="radio" name="jenis" value="Akademik" <?php if ($data['jenis']=='Akademik') {
          # code...
         echo 'checked';
         } ?>>
            Akademik &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="jenis" value="Non Akademik"  <?php if ($data['jenis']=='Non Akademik') {
          # code...
         echo 'checked';
         } ?> >
            Non Akademik
          </div>
        </div>

        <div class="form-group">
          <label for="tanggal_acara" class="col-sm-2 control-label">Tanggal Acara</label>
          <div class="col-sm-5">
            <input type="date" name="tanggal_acara" id="tanggal_acara"  value="<?php echo $data['tanggal_acara'];?>">
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

  
          <input type="text" style="width: 70px;" name="jam_acara" id="jam_acara" value="<?php echo $data['jam_acara'];?>">
        </div>
        <div class="form-group">
          <label for="tanggal_pengajuan" class="col-sm-2 control-label">Tanggal Pengajuan</label>
          <div class="col-sm-5">
            <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan"  value="<?php echo $data['tanggal_pengajuan'];?>">
          </div>
          </div>

        

        <div class="form-group">
          <label for="tempat" class="col-sm-2 control-label">Tempat Kegiatan</label>
          <div class="col-sm-5">
            <input type="text" name="tempat" class="form-control" id="tempat"  value="<?php echo $data['tempat'];?>">
          </div>
        </div>
         <div class="form-group">
          <label  class="col-sm-2 control-label">Disetujui</label>
          <div class="col-sm-10">
            <input type="radio" name="disetujui" value="Ya" <?php if ($data['disetujui']=='Akademik') {
          # code...
         echo 'checked';
         } ?>>
            Ya &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="jenis" value="Tidak"  <?php if ($data['disetujui']=='Non Akademik') {
          # code...
         echo 'checked';
         } ?> >
            Tidak
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-5">

            <button type="submit" class="btn btn-success"name="simpan">Simpan&nbsp;</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           

          </div>
          <div>
             <a href="daftar.php" class="btn btn-primary">Kembali</a>

          </div>
        </div>

