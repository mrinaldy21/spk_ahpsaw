<?php
  session_start();
  include '../koneksi.php';
  include '../fungsi.php';

  $nama = $_SESSION['data']['username'];

  if (isset($_GET['hapus'])) {
      $value_id = $_GET['id'];
      $table = $_GET['table'];
      $key_id = $_GET['column'];
      $location = $_GET['location'];

      mysqli_query($con, "DELETE from $table where $key_id='$value_id'");

      header("location:$location");
  }
?>
<html>

  <head>
    <title> SPK </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
      .nav-link:hover {
        background-color: lightblue;
      }

      .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
      <div style="flex: 1; width: 100%">
        <a class="navbar-brand font-weight-bold text-light ml-3" href="/admin/index.php?modul=home">
          <img class="mr-3" src="../images/logo.jpg" width="120" height="auto" alt=""> Promosi Jabatan
        </a>
        <a style="float: right;" href="#" class="btn btn-primary mt-2" data-toggle="modal" data-target="#user"><i
            class="fas fa-user mr-2  fa-lg"></i><?php echo $nama; ?></a>
      </div>
      <div class="navbar-nav">
        <div class="modal fade mt-4" id="user" tabindex="-1" role="dialog" style="flex: 1; width: 100%">
          <div class="modal-dialog modal-sm mr-4" style="float: right; width: 15%;">
            <div class="modal-content">
              <div class="modal">
                <h5 class="modal-title"></h5>
              </div>
              <div class="modal-body">
                <center>
                  <p class="align-center font-weight-bold"><i
                      class="fas fa-user mr-2 mt-2 fa-4x"></i><br><?php echo $nama; ?></p>
                </center>
                <div style="flex: 1; width: 100%">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a style="float: right;" href="/" type="button" class="btn btn-primary">Logout</a>
                </div>
              </div>
              <div class="modal">
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="row no-gutters">
      <div class="col-md-2 bg-light pr-3 pt-4">
        <ul class="nav flex-column ml-3">
          <li class="nav-item">
            <a class="nav-link active text-secondary font-weight-bold" href="?modul=dashboard"><i
                class="fas fa-home fa-lg mr-3"></i>Dashboard</a>
            <hr class=" bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary font-weight-bold" href="?modul=karyawan"><i
                class="fas fa-users fa-lg mr-3"></i>Data Alternatif</a>
            <hr class=" bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary font-weight-bold" href="?modul=kriteria"><i
                class="fas fa-database fa-lg mr-3"></i>Data Kriteria</a>
            <hr class=" bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary font-weight-bold" href="?modul=perbandingan"><i
                class="fas fa-clone fa-lg mr-3"></i>Data Perbandingan</a>
            <hr class=" bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary font-weight-bold" href=""><i class="fas fa-calculator fa-lg mr-3"></i>Hasil Perhitungan</a><hr class=" bg-light">
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary font-weight-bold" href="#"><i
                class="fas fa-file fa-lg mr-3"></i></i>Laporan</a>
            <hr class=" bg-light">
          </li>
        </ul>
      </div>
        <?php
          if (isset($_GET['modul'])) {
              switch ($_GET['modul']) {
                  //menu
                  case 'home':include 'home.php';
                      break;
                  case 'dashboard':include 'dashboard.php';
                      break;
                  case 'karyawan':include 'karyawan.php';
                      break;
                  case 'kriteria':include 'kriteria.php';
                      break;
                  case 'perbandingan':include 'perbandingan.php';
                      break;
                  case 'bobotalternatif': include 'bobot_alternatif.php';
                      break;
                  case 'analisasaw': include 'analisasaw.php';
                      break;
              }

          } else {
              include "home.php";
          }
        ?>
    </div>
    <div class="footer bg-light pt-3">
      <center>
        <p>Copyright @ 2020 Muhammad Rinaldy</p>
      </center>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>
</html>