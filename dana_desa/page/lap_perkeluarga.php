<hr class="my-3"/>
<div class="row">
	<div class="col-md-12">
	    <div class="panel panel-info">
	        <div class="panel-heading"><h3 class="text-center">Laporan Nilai Per keluarga</h3></div>
	        <div class="panel-body">
							<form class="form-inline" action="<?=$_SERVER["REQUEST_URI"]?>" method="post">
								<label for="mhs">keluarga :</label>
								<select class="form-control" name="mhs">
									<option> --- </option>
									<?php $q = $connection->query("SELECT * FROM keluarga WHERE NIK IN(SELECT NIK FROM hasil)"); while ($r = $q->fetch_assoc()): ?>
										<option value="<?=$r["NIK"]?>"><?=$r["NIK"]?> | <?=$r["nama"]?></option>
									<?php endwhile; ?>
								</select>
								<button type="submit" class="btn btn-primary">Tampilkan</button>
							</form>
	            <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
								<?php
								$q = $connection->query("SELECT b.jenis_bantuan, b.nama, h.nilai, (SELECT MAX(nilai) FROM hasil WHERE NIK=h.NIK) AS nilai_max FROM keluarga m JOIN hasil h ON m.NIK=h.NIK JOIN bantuan b ON b.jenis_bantuan=h.jenis_bantuan WHERE m.NIK=$_POST[mhs]");
								$bantuan = []; $data = [];
								while ($r = $q->fetch_assoc()) {
									$bantuan[$r["jenis_bantuan"]] = $r["nama"];
									$data[$r["jenis_bantuan"]][] = $r["nilai"];
									$max = $r["nilai_max"];
								}
								?>
								<hr>
								<table class="table table-condensed">
									<tbody>
										<?php $query = $connection->query("SELECT DISTINCT(p.jenis_bantuan), k.nama, n.nilai FROM nilai n JOIN penilaian p USING(kd_kriteria) JOIN kriteria k USING(kd_kriteria) WHERE n.NIK=$_POST[mhs] AND n.jenis_bantuan=1"); while ($r = $query->fetch_assoc()): ?>
											<tr>
												<th><?=$r["nama"]?></th>
												<td>: <?=number_format($r["nilai"], 8)?></td>
											</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
								<hr>
								<table class="table table-condensed">
		                <thead>
		                    <tr>
													<?php foreach ($bantuan as $key => $val): ?>
			                        <th><?=$val?></th>
													<?php endforeach; ?>
													<th>Nilai Maksimal</th>
		                    </tr>
		                </thead>
		                <tbody>
											<tr>
                        <?php foreach($bantuan as $key => $val): ?>
	                        <?php foreach($data[$key] as $v): ?>
															<td><?=number_format($v, 8)?></td>
													<?php endforeach ?>
												<?php endforeach ?>
												<td><?=number_format($max, 8)?></td>
											</tr>
		                </tbody>
		            </table>
	            <?php endif; ?>
	        </div>
	    </div>
	</div>
</div>
