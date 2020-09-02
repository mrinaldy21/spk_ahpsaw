<div class="col-md-10 p-5 pt-2">
	<h3><i class="fas fa-chart-bar fa-lg mr-3"></i>Bobot Alternatif </h3><hr>
	<div class="card">
		<div class="card-body">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th scope="col"> Nama Karyawan</th>
						<?php
							$q = mysqli_query($con, "select * from kriteria");

							while ($kr = mysqli_fetch_array($q)){
							?>
						<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[nama_kriteria]" ?></th>
						<?php } ?>
						<th scope="col"> Aksi</th>
					</tr>
				</thead>
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
								<td>
                    <a class="btn btn-xs btn-primary" href="?m=rel_alternatif_ubah&ID=<?=$row->kode_alternatif?>"><span class="glyphicon glyphicon-edit"></span> Edit</a>        
                </td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>