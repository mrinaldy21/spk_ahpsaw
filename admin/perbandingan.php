
<div class="col-md-10 p-5 pt-2">
	<h3><i class="fas fa-clone fa-lg mr-3"></i>Data Perbandingan</h3><hr>
	<div class="card">
		<div class="card-body">
			<div class="panel panel-default">
				<div class="panel-heading">

					<form class="form-inline" action="?modul=perbandingan" method="post">
						<div class="form-group">
							<select class="form-control" name="ID1" id="k1">
							 <!-- <?php
							    if (isset($_GET['edit'])) {
							        $id = $_POST['id'];
							        $kriteria1 = $_POST['kriteria1'];
							        $kriteria2 = $_POST['kriteria2'];
							        $nilai = $_POST['nilai'];
							        mysqli_query($con, "UPDATE perbandingan_kriteria set kriteria1 = '$kriteria1' WHERE kriteria1 = $kriteria1");
							        header('location:?modul=perbandingan');
							    }
							?> -->
								<?php
								$q = mysqli_query($con, "select * from kriteria");
								$no = 1;
								while ($kr = mysqli_fetch_array($q)){
									?>
									<option  nama ="kriteria1" value="<?php echo "$kr[id_kriteria]" ?>">
										<?php echo "$kr[kode_kriteria]" ?> - 
										<?php echo "$kr[nama_kriteria]"?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group ml-2">
							<select class="form-control" name="nilai" id="bobot">
								<option value='1'>1 - Sama penting dengan</option><option value='2'>2 - Mendekati sedikit lebih penting dari</option><option value='3'>3 - Sedikit lebih penting dari</option><option value='4'>4 - Mendekati lebih penting dari</option><option value='5'>5 - Lebih penting dari</option><option value='6'>6 - Mendekati sangat penting dari</option><option value='7'>7 - Sangat penting dari</option><option value='8'>8 - Mendekati mutlak dari</option><option value='9'>9 - Mutlak sangat penting dari</option>        </select>
							</div>
							<div class="form-group ml-2">
								<select class="form-control" name="ID1" id="k2">
									<?php
									$q = mysqli_query($con, "select * from kriteria");
									$no = 1;
									while ($kr = mysqli_fetch_array($q)){
										?>
										<option nama ="kriteria2" value="<?php echo "$kr[id_kriteria]" ?>">
											<?php echo "$kr[kode_kriteria]" ?> - 
											<?php echo "$kr[nama_kriteria]"?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group ml-2">
								<div id="ubah" class="btn btn-success" >Ubah</div>
							</div>
						</form>
					</div>

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th scope="col"> Kode </th>
								<?php
								$q = mysqli_query($con, "select * from kriteria");
								$no = 1;
								while ($kr = mysqli_fetch_array($q)){
									?>
									<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[nama_kriteria]" ?></th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>

							<?php
							$q = mysqli_query($con, "select * from kriteria");
							$no = 1;
							while ($kr = mysqli_fetch_array($q)){
								?>
								<tr>
									<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[nama_kriteria]" ?></th>
									<?php
									$qww = mysqli_query($con, "select * from kriteria");
									$no = 1;
									while ($rre = mysqli_fetch_array($qww)){
										?>
										<td id="<?php echo "$kr[id_kriteria]" ?><?php echo "$rre[id_kriteria]" ?>">1</td>
									<?php } ?>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</table>


<script>
	$(document).ready(function(){
		$("#ubah").click(function(){
			<?php
			$q = mysqli_query($con, "select * from kriteria");
			$no = 1;
			while ($kr = mysqli_fetch_array($q)){
				$qww = mysqli_query($con, "select * from kriteria");
				$no = 1;
				while ($rre = mysqli_fetch_array($qww)){
					?>
					$("#<?php echo "$kr[id_kriteria]" ; echo "$rre[id_kriteria]" ?>").text("#bobot");
					<?php
				}
			} ?>
			});
	});
</script>
