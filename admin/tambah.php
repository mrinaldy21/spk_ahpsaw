<?php 

  if(isset($_GET['pesan'])){
  $pesan = $_GET['pesan'];
  if($pesan == "input"){
    echo "Data berhasil di input.";
  }else if($pesan == "update"){
    echo "Data berhasil di update.";
  }else if($pesan == "hapus"){
    echo "Data berhasil di hapus.";
  }
  $id = $_POST['id_karyawan'];
  $nama = $_POST['nama_karyawan'];
  $jenkel = $_POST['jenkel'];
  $jabatan = $_POST['jabatan'];
  $telepon = $_POST['no_tel'];
  $table = $_GET['table'];

  mysqli_query($con,"INSERT INTO $table VALUES('$id','$nama','$jenkel','$jabatan','$telepon')");
     
  header("location:$location");
}

?>


<div class="col-md-10 p-5 pt-2">
    <h3> Tambah Data Karyawan </h3><hr>
    <div class="card">
        <div class="card-body">            
        <form method="POST" action='?id=$kr[id_karyawan]&column=id_karyawan&table=karyawan&location=?modul=karyawan&pesan=input=true' class="">
            <input type="hidden" name="id" value=" $value_id">
                <div class="form-group">
                    <label class="col-md-12">Id Karyawan</label>
                    <div class="col-md-12">
                         <input type="text" name="id_karyawan" value=""   required="" class="form-control form-control-line">
                    </div>
                 </div>
                <div class="form-group">
                    <label class="col-md-12">Nama Karyawan</label>
                    <div class="col-md-12">
                         <input type="text" name="nama_karyawan" value=""   required="" class="form-control form-control-line">
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-12">Jenis Kelamin</label>
                    <div class="col-md-12">
                         <input type="text" name="jenkel" value=""   required="" class="form-control form-control-line">
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-12">Jabatan</label>
                    <div class="col-md-12">
                         <input type="text" name="jabatan" value=""   required="" class="form-control form-control-line">
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-12">No Telepon</label>
                    <div class="col-md-12">
                         <input type="text" name="no_tel" value=""   required="" class="form-control form-control-line">
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