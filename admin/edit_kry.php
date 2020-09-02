<?php
  if (isset($_GET['save'])) {
      $id = $_POST['id_karyawan'];
      $nama = $_POST['nama_karyawan'];
      $jenkel = $_POST['jenkel'];
      $jabatan = $_POST['jabatan'];
      $telepon = $_POST['no_tel'];
      mysqli_query($con, "UPDATE karyawan set nama_karyawan = '$nama', jenkel = '$jenkel', jabatan = '$jabatan', no_tel = '$telepon' WHERE id_karyawan = $id");
      header('location:?modul=karyawan');
  }
  ?>