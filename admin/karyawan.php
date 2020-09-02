<?php
  include '../variableStore.php';

  if (isset($_POST['tambah'])) {
    $id = $_POST['id_karyawan'];
    $nama = $_POST['nama_karyawan'];
    $jenkel = $_POST['jenkel'];
    $jabatan = $_POST['jabatan'];
    $telepon = $_POST['no_tel'];

    mysqli_query($con, "INSERT INTO karyawan VALUES('$id','$nama','$jenkel','$jabatan','$telepon')");

    // header("Location: http://$baseUrl/admin/index.php?modul=karyawan");
  }
  if (isset($_GET['edit'])) {
    $id = $_POST['id_karyawan'];
    $nama = $_POST['nama_karyawan'];
    $jenkel = $_POST['jenkel'];
    $jabatan = $_POST['jabatan'];
    $telepon = $_POST['no_tel'];

    mysqli_query($con, "UPDATE karyawan set nama_karyawan = '$nama', jenkel = '$jenkel', jabatan = '$jabatan', no_tel = '$telepon' WHERE id_karyawan = $id");
  }
?>
<div class="col-md-10 p-5 pt-2">
		<h3><i class="fas fa-users fa-lg mr-3"></i>Data Alternatif </h3><hr>
    <div class="card">
      <div class="card-body">
      <a href="#"  class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah"> + TAMBAH </a>
      <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Tambah Data Alternatif</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label" for="id_karyawan"> Id </label>
                  <input type="text" name="id_karyawan" class="form-control mb-2" id="id_karyawan" required>
                  <label class="control-label" for="nama_karyawan"> Nama Karyawan</label>
                  <input type="text" name="nama_karyawan" class="form-control mb-2" id="nama_karyawan" required>
                  <label class="control-label" for="jenkel"> Jenis Kelamin</label>
                  <input type="text" name="jenkel" class="form-control mb-2" id="jenkel" required>
                  <label class="control-label" for="jabatan"> Jabatan</label>
                  <input type="text" name="jabatan" class="form-control mb-2" id="jabatan" required>
                  <label class="control-label" for="no_tel"> No Telepon</label>
                  <input type="number" name="no_tel" class="form-control mb-2" id="no_tel" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger"> Reset</button>
                <input type="submit" class="btn btn-success" name="tambah" value="simpan">
              </div>
            </form>
          </div>
        </div>
      </div>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="row">NO</th>
            <th scope="col">ID Karyawan</th>
            <th scope="col">Nama Karyawan</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Jabatan</th>
            <th scope="col">No Telepon</th>
            <th colspan="2" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $q = mysqli_query($con, "select * from karyawan");
          $no = 1;
          while ($kr = mysqli_fetch_array($q)) {
        ?>
          <tr>
            <td align="center"><?php echo $no++; ?> </td>
            <td><?php echo "$kr[id_karyawan]" ?> </td>
            <td><?php echo "$kr[nama_karyawan]" ?> </td>
            <td><?php echo "$kr[jenkel]" ?> </td>
            <td><?php echo "$kr[jabatan]" ?> </td>
            <td><?php echo "$kr[no_tel]" ?> </td>
            <!-- <td><?php echo openssl_decrypt("X41LAYnDcLy23SbhHPsISA==", "AES-128-ECB", "test") ?></td> -->
            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo "$kr[id_karyawan]" ?>">Edit</a>
            <a href=<?php echo "?id=$kr[id_karyawan]&column=id_karyawan&table=karyawan&location=?modul=karyawan&pesan=hapus&hapus=true" ?>><button type='button' class='btn btn-danger'>delete</button></a></td>
          </tr>
          <div id="edit<?php echo "$kr[id_karyawan]" ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"> Edit Data Karyawan</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" enctype="multipart/form-data" role="form" action="?modul=karyawan&edit">
                  <div class="modal-body">
                    <div class="form-group">
                      <input type="hidden" name="id_karyawan" class="form-control mb-2" id="id_karyawan" value="<?php echo "$kr[id_karyawan]" ?>" required>
                      <label class="control-label" for="nama_karyawan"> Nama Karyawan</label>
                      <input type="text" name="nama_karyawan" class="form-control mb-2" id="nama_karyawan" value="<?php echo "$kr[nama_karyawan]" ?>" required>
                      <label class="control-label" for="jenkel"> Jenis Kelamin</label>
                      <input type="text" name="jenkel" class="form-control mb-2" id="jenkel" value="<?php echo "$kr[jenkel]" ?>" required>
                      <label class="control-label" for="jabatan"> Jabatan</label>
                      <input type="text" name="jabatan" class="form-control mb-2" id="jabatan" value="<?php echo "$kr[jabatan]" ?>" required>
                      <label class="control-label" for="no_tel"> No Telepon</label>
                      <input type="text" name="no_tel" class="form-control mb-2" id="no_tel" value="<?php echo "$kr[no_tel]" ?>" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-success" name="tambah" value="simpan">
                  </div>
                </form>
              </div>
            </div>s
          </div>
        <?php }?>
      </tbody>
      </table>
     </div>
    </div>
  	</div>
</div>
