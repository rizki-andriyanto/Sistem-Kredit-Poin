

<?php include '../connection.php'; ?>
<?php include '../header/header-point.php'; ?>

<?php

try {
    $query = "SELECT
    point.kode_point,
    kategori.kategori,
    jenis_lingkup.keterangan,
    point.poin
  FROM
    point
  INNER JOIN kategori ON point.kode_kategori = kategori.kode_kategori
  INNER JOIN jenis_lingkup ON point.kode_jenis_lingkup=jenis_lingkup.kode_jenis_lingkup";
    $execute =  $my_koneksi->prepare($query);
    $execute->execute();
          
  } catch (PDOException $e) {
    die("Error: ".$e->getMessage());
  }
  $skp = $execute->fetchAll();
?>


    <div class="container">
  <h1>Daftar Point Kemahasiswaan</h1>
  <a href="tambah.php" class="btn btn-danger pull-left">Tambah</a>
  <div class="row">
    <div class="col-sm-12">
        
        <p>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Poin</th>
              <th>Kategori</th>
              <th>Lingkup</th>
              <th>Nilai Poin</th>
            
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
                <td><?php echo $data['kode_point']; ?></td>
                <td><?php echo $data['kategori']; ?></td>
                <td><?php echo $data['keterangan']; ?></td>
                <td><?php echo $data['poin'];?></td>
                
                
                
                <script type="text/javascript" language="JavaScript">
                function konfirmasi()
               {
               tanya = confirm("Anda Yakin Akan Menghapus Data ?");
               if (tanya == true) return true;
               else return false;
               }</script>

                <td><?php echo '<a onclick="return konfirmasi()" href="koreksi.php?kode_point='.$data['kode_point'].'" class="btn btn-danger">&nbsp;Edit&nbsp;</a>';?>
                  <?php echo '<a onclick="return konfirmasi()" href="delete.php?kode_point='.$data['kode_point'].'"class="btn btn-danger">Delete</a>';?>
                
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