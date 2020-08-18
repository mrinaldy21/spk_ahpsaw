<?php
    if (isset($_GET['save'])) {
        $id = $_POST['id_karyawan'];
        $nama = $_POST['nama_karyawan'];
        $jenkel = $_POST['jenkel'];
        $jabatan = $_POST['jabatan'];
        $telepon = $_POST['no_tel'];
        mysqli_query($con, "UPDATE karyawan set nama_karyawan = '$nama', jenkel = '$jenkel', jabatan = '$jabatan', no_tel = '$telepon' WHERE id_karyawan = $id");
        header('location:?modul=karyawan');
    } else {
        $id = $_GET['id_karyawan'];
        $q = mysqli_query($con, "SELECT * FROM karyawan WHERE id_karyawan = $id");
        $no = 1;
        while ($kr = mysqli_fetch_array($q)){
?>

<div class="col-md-10 p-5 pt-2">
    <h3> Edit Data Karyawan </h3><hr>
    <div class="card">
        <div class="card-body">            
            <form method="POST" action="?modul=edit&save" class="">
                <input type="hidden" name="id_karyawan" value="<?php echo $kr['id_karyawan'] ?>" required class="form-control form-control-line" />
                <div class="form-group">
                    <label class="col-md-12">Nama Karyawan</label>
                    <div class="col-md-12">
                         <input type="text" name="nama_karyawan" value="<?php echo $kr['nama_karyawan'] ?>"   required class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Jenis Kelamin</label>
                    <div class="col-md-12">
                         <input type="text" name="jenkel" value="<?php echo $kr['jenkel'] ?>" required class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Jabatan</label>
                    <div class="col-md-12">
                         <input type="text" name="jabatan" value="<?php echo $kr['jabatan'] ?>" required class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">No Telepon</label>
                    <div class="col-md-12">
                         <input type="text" name="no_tel" value="<?php echo $kr['no_tel'] ?>" required class="form-control form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success"><i class="mdi mdi-content-save"></i> Simpan Data</button>
                    <div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php }} ?>