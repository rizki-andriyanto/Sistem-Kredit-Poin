

<?php include '../connection.php'; ?>
<?php include '../header/header-kegiatan.php'; ?>

<?php

try {
    $query = "select * from kegiatan";
    $execute =  $my_koneksi->prepare($query);
    $execute->execute();
          
  } catch (PDOException $e) {
    die("Error: ".$e->getMessage());
  }
  $skp = $execute->fetchAll();
?>


    <div class="container">
  <h1>Daftar Kegiatan</h1> 
  
  <a href="tambah.php" class="btn btn-danger pull-left">Tambah Kegiatan</a>
  <div class="row">
    <div class="col-sm-12">
        
        <p>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kegiatan</th>
              <th>Biaya</th>
              <th>Tanggal</th>
              <th>Tanggal Pengajuan</th>
              <th>Status</th>
              <th>Operasi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
			$no =1;
			foreach ($skp as $data): 
          ?>
      <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nama_kegiatan']; ?></td>
                <td><?php echo $data['biaya_pendaftaran']; ?></td>
                <td><?php echo $data['tanggal_acara']; ?></td>
                <td><?php echo $data['tanggal_pengajuan'];?></td>
                
                <td><?php echo $data['disetujui']; ?></td>
                
                
                <td><?php echo '<a href="koreksi.php?kode_kegiatan='.$data['kode_kegiatan'].'" class="btn btn-danger">&nbsp;Edit&nbsp;</a>';?>

                <script type="text/javascript" language="JavaScript">
                function konfirmasi()
               {
               tanya = confirm("Anda Yakin Akan Menghapus Data ?");
               if (tanya == true) return true;
               else return false;
               }</script>

                <?php echo '<a onclick="return konfirmasi()" href="delete.php?kode_kegiatan='.$data['kode_kegiatan'].'"class="btn btn-danger">Delete</a>';?>
                <?php echo '<a href="#.php?kode_kegiatan='.$data['kode_kegiatan'].'" class="btn btn-danger">&nbsp; Panitia &nbsp;</a>';?>
                <?php echo '<a href="validasi.php?kode_kegiatan='.$data['kode_kegiatan'].'" class="btn btn-danger">&nbsp; Validasi &nbsp;</a>';?>

                

                </td>
               

              </tr>
            <?php 
              $no++;
              endforeach; 
            ?>
            
            
                </tbody>
              </table>
            </div>
          </div>
        </p>