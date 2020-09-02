<?php
  include '../variableStore.php';
  include '../koneksi.php';

  if (isset($_POST['tambah'])) {
    $id = $_POST['id_kriteria'];
    $kode = $_POST['kode_kriteria'];
    $nkriteria = $_POST['nama_kriteria'];

    mysqli_query($con, "INSERT INTO kriteria VALUES('$id', '$kode', '$nkriteria')");
    // $banyakKriteria = mysqli_query($con, "SELECT * FROM kriteria;");
    // $bobotKriteria = array(mysqli_fetch_array(mysqli_query($con, "SELECT * from bobot_kriteria order by id desc")));
    // $countBobotKriteria = count($bobotKriteria);
    // $insertBobotKriteria = array();
    // $kriteria = mysqli_fetch_array($banyakKriteria);

    // while($kriteria) {
    //   array_push($insertBobotKriteria, "($countBobotKriteria++, $kriteria[id_kriteria]$id, 1)");
    // }
    // while($kriteria) {
    //   array_push($insertBobotKriteria, "($countBobotKriteria++, $id$kriteria[id_kriteria], 1)");
    // }
    // $insertBobotKriteria = join(",", $insertBobotKriteria);
    // mysqli_query($con, "INSERT INTO bobot_kriteria VALUES $insertBobotKriteria ;");




    // kodingan aldy
    // $id = $_POST['id_kriteria'];
    // $kode = $_POST['kode_kriteria'];
    // $nkriteria = $_POST['nama_kriteria'];
    // $atribut = $_POST['atribut'];

    // mysqli_query($con, "INSERT INTO kriteria VALUES('$id', '$kode', '$nkriteria', '$atribut')");
    // mysqli_query($con, "INSERT INTO bobot_kriteria(id1, id2, nilai)
    //   SELECT '$kode', kode_kriteria, 1 FROM kriteria");
    // mysqli_query($con, "INSERT INTO bobot_kriteria(id1, id2, nilai)
    //   SELECT kode_kriteria, '$kode', 1 FROM kriteria WHERE kode_kriteria<>'$kode'");
    // mysqli_query($con, "INSERT INTO bobot_karyawan(id_karyawan, kode_kriteria, nilai) 
    //   SELECT id_karyawan, '$kode', -1  FROM bobot_karyawan");

    // header("location:?modul=kriteria");
  };
  if (isset($_GET['edit'])) {
    $id = $_POST['id_kriteria'];
    $kode = $_POST['kode_kriteria'];
    $nkriteria = $_POST['nama_kriteria'];

    mysqli_query($con, "UPDATE kriteria set kode_kriteria = '$kode', nama_kriteria = '$nkriteria' WHERE id_kriteria = $id");
  }
?>
<div class="col-md-10 p-5 pt-2">
	<h3><i class="fas fa-database fa-lg mr-3"></i>Data Kriteria </h3><hr>
	<div class="card">
    <div class="card-body">
      <a href="#"  class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah"> + TAMBAH </a>
      <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Tambah Data Kriteria</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" enctype="multipart/form-data" role="form" action="?modul=kriteria&tambah">
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label" for="id_kriteria"> Id </label>
                  <input type="text" name="id_kriteria" class="form-control mb-2" id="id_kriteria" required>
                  <label class="control-label" for="kode_kriteria"> Kode Kriteria</label>
                  <input type="text" name="kode_kriteria" class="form-control mb-2" id="kode_kriteria" required>
                  <label class="control-label" for="nama_kriteria"> Nama Kriteria</label>
                  <input type="text" name="nama_kriteria" class="form-control mb-2" id="nama_kriteria" required>
                  <label class="control-label" for="atribut">Atribut</label>
                  <select class="form-control" name="atribut">
                  <?php
                  $atribut = array('benefit'=>'Benefit', 'cost'=>'Cost');   
                  foreach($atribut as $key => $val){
                        echo "<option value='$key'>$val</option>";
                    }
                  ?>
                </select>
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
            <th scope="col">Kode Kriteria</th>
            <th scope="col">Nama Kriteria</th>
            <th scope="col">Atribut</th>
            <th colspan="2" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $q = mysqli_query($con, "select * from kriteria");
            $no = 1;
            while ($kr = mysqli_fetch_array($q)) {
              echo "<tr>
                      <td>$no</td>
                      <td>$kr[kode_kriteria]</td>
                      <td>$kr[nama_kriteria]</td>
                      <td>$kr[atribut]</td>
                      <td>
                      <a href='' class='btn btn-primary' data-toggle='modal' data-target='#edit$kr[id_kriteria]'>Edit</a>
                      <a href='?id=$kr[id_kriteria]&column=id_kriteria&table=kriteria&location=?modul=kriteria&pesan=hapus&hapus=true'><button type='button' class='btn btn-danger'>delete</button</a></td>
                    </tr>";
              $no++;
          ?>
            <div id="edit<?php echo $kr['id_kriteria']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"> Edit Data Kriteria</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form method="POST" enctype="multipart/form-data" role="form" action="?modul=kriteria&edit">
                    <div class="modal-body">
                      <div class="form-group">
                        <input type="hidden" name="id_kriteria" value="<?php echo "$kr[id_kriteria]" ?>"required class="form-control form-control-line" />
                        <label class="control-label" for="kode_kriteria"> Kode Kriteria</label>
                        <input type="text" name="kode_kriteria" value="<?php echo "$kr[kode_kriteria]" ?>"required class="form-control form-control-line" />
                        <label class="control-label" for="nama_kriteria"> Nama Kriteria</label>
                        <input type="text" name="nama_kriteria" value="<?php echo "$kr[nama_kriteria]" ?>"required class="form-control form-control-line" />
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-success" name="edit" value="simpan">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>