<hr class="my-3"/>
<div class="row">
	<div class="col-md-12">
	    <div class="panel panel-info">
	        <div class="panel-heading"><h3 class="text-center">Laporan Nilai Seluruh keluarga</h3></div>
	        <div class="panel-body">
				<form class="form-inline" action="<?=$_SERVER["REQUEST_URI"]?>" method="post">
					<label for="tahun">Tahun :</label>
					<select class="form-control" name="tahun">
						<option>---</option>
						<option value="2017">2017</option>
					</select>
					<button type="submit" class="btn btn-primary">Tampilkan</button>
				</form>
	            <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
				<?php
				$q = $connection->query("SELECT b.jenis_bantuan, b.nama, h.nilai, m.nama AS keluarga, m.NIK, (SELECT MAX(nilai) FROM hasil WHERE NIK=h.NIK) AS nilai_max FROM keluarga m JOIN hasil h ON m.NIK=h.NIK JOIN bantuan b ON b.jenis_bantuan=h.jenis_bantuan WHERE m.tahun_mengajukan='$_POST[tahun]'");
				$bantuan = []; $data = []; $d = [];
				while ($r = $q->fetch_assoc()) {
					$bantuan[$r["jenis_bantuan"]] = $r["nama"];
					$s = $connection->query("SELECT b.nama, a.nilai FROM hasil a JOIN bantuan b USING(jenis_bantuan) WHERE a.NIK=$r[NIK] AND a.tahun=$_POST[tahun]");
					while ($rr = $s->fetch_assoc()){
						$d[$rr['nama']] = $rr['nilai'];
					}
					$m = max($d);
					$k = array_search($m, $d);
					$data[$r["NIK"]."-".$r["keluarga"]."-".$r["nilai_max"]."-".$k][$r["jenis_bantuan"]] = $r["nilai"];
				}
				?>
				<hr>
				<table class="table table-condensed">
	                <thead>
	                    <tr>
							<th>NIK</th>
							<th>Nama</th>
							<?php foreach ($bantuan as $val): ?>
		                        <th><?=$val?></th>
							<?php endforeach; ?>
							<th>Nilai Maksimal</th>
							<th>Rekomendasi</th>
	                    </tr>
	                </thead>
					<tbody>
					<?php foreach($data as $key => $val): ?>
						<tr>
							<?php $x = explode("-", $key); ?>
							<td><?=$x[0]?></td>
							<td><?=$x[1]?></td>
							<?php foreach ($val as $v): ?>
								<td><?=number_format($v, 8)?></td>
							<?php endforeach; ?>
							<td><?=number_format($x[2], 8)?></td>
							<td><?=$x[3]?></td>
						</tr>
					<?php endforeach ?>
					</tbody>
		            </table>
	            <?php endif; ?>
	        </div>
	    </div>
	</div>
</div>
