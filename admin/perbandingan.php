<?php
if($_POST) include'../aksi.php';
?>
<div class="col-md-10 p-5 pt-2">
	<h3><i class="fas fa-clone fa-lg mr-3"></i>Data Perbandingan</h3><hr>
	<div class="card">
		<div class="card-body">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php
					if (@$_POST['perbandingan']){
						$ID1 = $_POST['id1'];
				    $ID2 = $_POST['id2'];
				    $nilai = abs($_POST['nilai']);
				    
				    if($ID1==$ID2 && $nilai<>1)
				        print_msg("Kriteria yang sama harus bernilai 1.");
				    else{
				        mysqli_query($con,"UPDATE bobot_kriteria SET nilai=$nilai WHERE id1='$ID1' AND id2='$ID2'");
				        mysqli_query($con,"UPDATE bobot_kriteria SET nilai=1/$nilai WHERE id2='$ID1' AND id1='$ID2'");
				        print_msg("Nilai kriteria berhasil diubah.", 'success');
				    }
				  }
        	?>
					<form id="perbandingan" class="form-inline" action="?modul=perbandingan" method="post">
						<div class="form-group">
							<select class="form-control" name="id1">
								<?php
								$q = mysqli_query($con, "select * from kriteria");
								$no = 1;
								while ($kr = mysqli_fetch_array($q)){
									?>
									<option  nama ="kriteria1" value="<?php echo "$kr[id_kriteria]" ?>">
										<?php echo "$kr[kode_kriteria]" ?> - 
										<?php echo "$kr[nama_kriteria]"?>
									</option><?php($_POST['id1']);?>
								<?php } ?>($_POST['id1']);
							</select>
						</div>
						<div class="form-group ml-2">
							<select class="form-control" name="nilai">
								<?php
								 $nilai = array(
							        '1' => 'Sama penting dengan',
							        '2' => 'Mendekati sedikit lebih penting dari',
							        '3' => 'Sedikit lebih penting dari',
							        '4' => 'Mendekati lebih penting dari',
							        '5' => 'Lebih penting dari',
							        '6' => 'Mendekati sangat penting dari',
							        '7' => 'Sangat penting dari',
							        '8' => 'Mendekati mutlak dari',
							        '9' => 'Mutlak sangat penting dari',
							    ); 
							    foreach($nilai as $key => $val){
							        echo "<option value='$key'>$key - $val</option>";
							    }?><?php($_POST['nilai']);?>    
							</select>
							</div>
							<div class="form-group ml-2">
								<select class="form-control" name="id2">
									<?php
									$q = mysqli_query($con, "select * from kriteria");
									$no = 1;
									while ($kr = mysqli_fetch_array($q)){
										?>
										<option nama ="kriteria2" value="<?php echo "$kr[id_kriteria]" ?>">
											<?php echo "$kr[kode_kriteria]" ?> - 
											<?php echo "$kr[nama_kriteria]"?>
										</option><?php($_POST['id2']);?>
									<?php } ?>($_POST['id2']);
								</select>
							</div>
							<div class="form-group">
				                <button class="btn btn-success ml-2"><span class="glyphicon glyphicon-edit"></span> Ubah</button>
				            </div>
				        </div>
					</form>
				</div>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th scope="col"> Kode </th>
							<?php
							$q = mysqli_query($con, "select * from kriteria");
							while ($kr = mysqli_fetch_array($q)){
								?>
								<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[nama_kriteria]" ?></th>
							<?php } ?>
						</tr>
					</thead>
					<?php
					$no = 1;
					$a = 1;
					$arr = array();
					$rows = mysqli_query($con, "SELECT * FROM bobot_kriteria ORDER BY id1, id2");
					?>
					<tbody>

						<?php
						$q = mysqli_query($con, "select * from kriteria");
						$no = 1;
						$b = 1;
						while ($kr = mysqli_fetch_array($q)){
							?>
							<tr>
								<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[nama_kriteria]" ?></th>
								<?php
								$qww = mysqli_query($con, "select * from kriteria");
								$no = 1;
								while ($rre = mysqli_fetch_array($qww)){
									?>
									<td value="<?php echo "$kr[id_kriteria]"?>" class="<?=$a==$b ? 'success' : ($a < $b ? 'danger' : '')?>"><? echo "$kr[nilai]"?></td>
								<?php $b++; } ?>
							</tr>
						<?php $a++;} ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-body">
		<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Mengukur Konsistensi Kriteria (AHP)</h3>
    </div>
    <div class="panel panel-primary">
    <div class="panel-body">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">
                    <a data-toggle="collapse" href="#mpkriteria">
                        Matriks Perbandingan Kriteria
                    </a>
                </div>
            </div>
            <div class="table-responsive collapse" id="mpkriteria">
                <table class="table table-bordered table-striped table-hover">
                    <thead><tr>
                        <th>Kode</th>
                        <th>Kriteria</th>
                        	<?php
													$q = mysqli_query($con, "select * from kriteria");

													while ($kr = mysqli_fetch_array($q)){
													?>
												<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[kode_kriteria]" ?></th>
												<?php } ?>
                    </tr></thead>
                    <tbody>
                    	<?php
                      		$q = mysqli_query($con, "select * from kriteria");
					$no = 1;
					while ($kr = mysqli_fetch_array($q)){
					?>
						<tr>
							<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[kode_kriteria]" ?></th>
							<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[nama_kriteria]" ?></th>
							<?php
							$qww = mysqli_query($con, "select * from kriteria");
							$no = 1;
							while ($rre = mysqli_fetch_array($qww)){
								?>
								<td>1</td>
							<?php } ?>
						</tr>
					<?php } ?>
					<tfoot><tr>
              <td colspan="2" class="text-right">Total</td>
              <td>1</td>
          </tr></tfoot>
                  </tbody>
                </table>            
            </div>        
        </div>        
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">
                    <a data-toggle="collapse" href="#mbpkriteria">
                        Matriks Bobor Prioritas Kriteria
                    </a>
                </div>
            </div>
            <div class="table-responsive collapse" id="mbpkriteria">
                <table class="table table-bordered table-striped table-hover">
                    <thead><tr>
                        <th>Kode</th>
                        <?php
													$q = mysqli_query($con, "select * from kriteria");

													while ($kr = mysqli_fetch_array($q)){
													?>
												<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[kode_kriteria]" ?></th>
												<?php } ?>
                        <th>Prioritas</th>
                        <th>Consistency Measure</th>
                    </tr></thead>
                    <tbody>
                    	<?php
                      		$q = mysqli_query($con, "select * from kriteria");
													$no = 1;
													while ($kr = mysqli_fetch_array($q)){
													?>
														<tr>
															<th value="<?php echo "$kr[id_kriteria]" ?>" scope="col"><?php echo "$kr[kode_kriteria]" ?></th>
															<?php
															$qww = mysqli_query($con, "select * from kriteria");
															$no = 1;
															while ($rre = mysqli_fetch_array($qww)){
																?>
																<td>1</td>
															<?php } ?>
														</tr>
													<?php } ?>
												</tbody>
                </table> 
            </div>
        </div>        
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">
                    <a data-toggle="collapse" href="#konsisten">
                        Konsistensi Kriteria
                    </a>
                </div>
            </div>
            <div class="panel-body collapse" id="konsisten">        
                <p>Berikut tabel ratio index berdasarkan ordo matriks.</p>    
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Ordo matriks</th>
                            <?php
                                foreach($nRI as $key => $value){
                                    if(count($rel_kriteria)==$key)
                                        echo "<td class='text-primary'>$key</td>";
                                    else
                                        echo "<td>$key</td>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <th>Ratio index</th>
                            <?php
                                foreach($nRI as $key => $value){
                                    if(count($rel_kriteria)==$key)
                                        echo "<td class='text-primary'>$value</td>";
                                    else
                                        echo "<td>$value</td>";
                                }
                            ?>
                        </tr>
                    </table>
                </div>        
            </div>
            <div class="panel-footer">
            <?php
                $cm = $ahp->cm;
                $CI = ((array_sum($cm)/count($cm))-count($cm))/(count($cm)-1);	
            	$RI = $nRI[count($rel_kriteria)];
            	$CR = $CI/$RI;
            	echo "<p>Consistency Index: ".round($CI, 3)."<br />";	
            	echo "Ratio Index: ".round($RI, 3)."<br />";
            	echo "Consistency Ratio: ".round($CR, 3);
            	if($CR>0.10){
            		echo " (Tidak konsisten)<br />";	
            	} else {
            		echo " (Konsisten)<br />";
            	}
            ?>
            </div>
        </div>
    </div>
		</div>
	</div>
</div>