<div class="col-md-10 p-5 pt-2">
	<h3><i class="fas fa-calculator fa-lg mr-3"></i>Analisa SAW </h3><hr>
	<div class="card">
    <div class="card header bg-light">
	    <div class="card-title ml-2 mt-2">
	      <h4>Perhitungan SAW</h4>
	  	</div>
	  </div>
    <div class="card-body">
      <div class="card card-info mb-2">
        <div class="card header bg-primary">
          <div class="card-title ml-2">
            <a class="text-white" data-toggle="collapse" href="#alt_krit">
                Alternatif Kriteria
            </a>
        	</div>
    		</div>
        <div class="table-responsive collapse" id="alt_krit">
          <table class="table table-bordered table-striped table-hover">
            <thead><tr>
              <th>Nama Karyawan</th>
              <?php
								$q = mysqli_query($con, "select * from kriteria");
								while ($kr = mysqli_fetch_array($q)){
							?>
							<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[nama_kriteria]" ?></th>
							<?php } ?>
						</tr></thead>
          	<tbody>
							<?php
								$q = mysqli_query($con, "select * from karyawan");
								$no = 1;
								while ($kr = mysqli_fetch_array($q)){
							?>
							<tr>
								<th value="<?php echo "$kr[id_karyawan]" ?>" scope="col"><?php echo "$kr[nama_karyawan]" ?></th>
								<?php
									$qww = mysqli_query($con, "select * from kriteria");
									$no = 1;
									while ($rre = mysqli_fetch_array($qww)){
								?>
								<td>1</td>
								<?php } ?>
							</tr><?php } ?>
							<tfoot><tr>
                <td colspan="1" class="text-right">Max</td>
                <td></td>
              </tr><tr>
                <td colspan="1" class="text-right">Min</td>
                <td></td>
              </tr></tfoot>
						</tbody>
          </table>
        </div>
      </div>
      <div class="card card-info mb-2">
        <div class="card header bg-primary">
          <div class="card-title ml-2">
            <a class="text-white" data-toggle="collapse" href="#nmatrik">
                Normalisasi Matriks
            </a>
        	</div>
    		</div>
        <div class="table-responsive collapse" id="nmatrik">
          <table class="table table-bordered table-striped table-hover">
            <thead><tr>
              <th>Nama Karyawan</th>
              <?php
								$q = mysqli_query($con, "select * from kriteria");
								while ($kr = mysqli_fetch_array($q)){
							?>
							<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[nama_kriteria]" ?></th>
							<?php } ?>
						</tr></thead>
          	<tbody>
							<?php
								$q = mysqli_query($con, "select * from karyawan");
								$no = 1;
								while ($kr = mysqli_fetch_array($q)){
							?>
							<tr>
								<th value="<?php echo "$kr[id_karyawan]" ?>" scope="col"><?php echo "$kr[nama_karyawan]" ?></th>
								<?php
									$qww = mysqli_query($con, "select * from kriteria");
									$no = 1;
									while ($rre = mysqli_fetch_array($qww)){
								?>
								<td>1</td>
								<?php } ?>
							</tr><?php } ?>
							<tfoot><tr>
                <td colspan="1" class="text-right">Max</td>
                <td></td>
              </tr><tr>
                <td colspan="1" class="text-right">Min</td>
                <td></td>
              </tr></tfoot>
						</tbody>
          </table>
        </div>
      </div>
      <div class="card card-info mb-2">
        <div class="card header bg-primary">
          <div class="card-title ml-2">
            <a class="text-white" data-toggle="collapse" href="#tbobot">
                Terbobot
            </a>
        	</div>
    		</div>
        <div class="table-responsive collapse" id="tbobot">
          <table class="table table-bordered table-striped table-hover">
            <thead><tr>
              <th>Nama Karyawan</th>
              <?php
								$q = mysqli_query($con, "select * from kriteria");
								while ($kr = mysqli_fetch_array($q)){
							?>
							<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[nama_kriteria]" ?></th>
							<?php } ?>
						</tr></thead>
          	<tbody>
							<?php
								$q = mysqli_query($con, "select * from karyawan");
								$no = 1;
								while ($kr = mysqli_fetch_array($q)){
							?>
							<tr>
								<th value="<?php echo "$kr[id_karyawan]" ?>" scope="col"><?php echo "$kr[nama_karyawan]" ?></th>
								<?php
									$qww = mysqli_query($con, "select * from kriteria");
									$no = 1;
									while ($rre = mysqli_fetch_array($qww)){
								?>
								<td>1</td>
								<?php } ?>
							</tr><?php } ?>
							<tfoot><tr>
                <td colspan="1" class="text-right">Max</td>
                <td></td>
              </tr><tr>
                <td colspan="1" class="text-right">Min</td>
                <td></td>
              </tr></tfoot>
						</tbody>
          </table>
        </div>
      </div>
      <div class="card card-info mb-2">
        <div class="card header bg-primary">
          <div class="card-title ml-2">
            <a class="text-white" data-toggle="collapse" href="#rank">
                Perankingan
            </a>
        	</div>
    		</div>
        <div class="table-responsive collapse" id="rank">
          <table class="table table-bordered table-striped table-hover">
            <thead><tr>
              <th>Nama Karyawan</th>
              <?php
								$q = mysqli_query($con, "select * from kriteria");
								while ($kr = mysqli_fetch_array($q)){
							?>
							<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[nama_kriteria]" ?></th>
							<?php } ?>
						</tr></thead>
          	<tbody>
							<?php
								$q = mysqli_query($con, "select * from karyawan");
								$no = 1;
								while ($kr = mysqli_fetch_array($q)){
							?>
							<tr>
								<th value="<?php echo "$kr[id_karyawan]" ?>" scope="col"><?php echo "$kr[nama_karyawan]" ?></th>
								<?php
									$qww = mysqli_query($con, "select * from kriteria");
									$no = 1;
									while ($rre = mysqli_fetch_array($qww)){
								?>
								<td>1</td>
								<?php } ?>
							</tr><?php } ?>
							<tfoot><tr>
                <td colspan="1" class="text-right">Max</td>
                <td></td>
              </tr><tr>
                <td colspan="1" class="text-right">Min</td>
                <td></td>
              </tr></tfoot>
						</tbody>
          </table>
        </div>
      </div>
    </div>
	</div>
</div>