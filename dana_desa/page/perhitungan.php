<hr class="my-3"/>
<div class="row">
	<div class="col-md-12">
	<?php if (isset($_GET["bantuan"])) {
		$sqlKriteria = "";
		$namaKriteria = [];
		$queryKriteria = $connection->query("SELECT a.kd_kriteria, a.nama FROM kriteria a JOIN model b USING(kd_kriteria) WHERE b.jenis_bantuan=$_GET[bantuan]");
		while ($kr = $queryKriteria->fetch_assoc()) {
			$sqlKriteria .= "SUM(
				IF(
					c.kd_kriteria=".$kr["kd_kriteria"].",
					IF(c.sifat='max', nilai.nilai/c.normalization, c.normalization/nilai.nilai), 0
				)
			) AS ".strtolower(str_replace(" ", "_", $kr["nama"])).",";
			$namaKriteria[] = strtolower(str_replace(" ", "_", $kr["nama"]));
		}
		$sql = "SELECT
			(SELECT nama FROM keluarga WHERE NIK=klg.NIK) AS nama,
			(SELECT NIK FROM keluarga WHERE NIK=klg.NIK) AS NIK,
			(SELECT tahun_mengajukan FROM keluarga WHERE NIK=klg.NIK) AS tahun,
			$sqlKriteria
			SUM(
				IF(
						c.sifat = 'max',
						nilai.nilai / c.normalization,
						c.normalization / nilai.nilai
				) * c.bobot
			) AS rangking
		FROM
			nilai
			JOIN keluarga klg USING(NIK)
			JOIN (
				SELECT
						nilai.kd_kriteria AS kd_kriteria,
						kriteria.sifat AS sifat,
						(
							SELECT bobot FROM model WHERE kd_kriteria=kriteria.kd_kriteria AND jenis_bantuan=bantuan.jenis_bantuan
						) AS bobot,
						ROUND(
							IF(kriteria.sifat='max', MAX(nilai.nilai), MIN(nilai.nilai)), 1
						) AS normalization
					FROM nilai
					JOIN kriteria USING(kd_kriteria)
					JOIN bantuan ON kriteria.jenis_bantuan=bantuan.jenis_bantuan
					WHERE bantuan.jenis_bantuan=$_GET[bantuan]
				GROUP BY nilai.kd_kriteria
			) c USING(kd_kriteria)
		WHERE jenis_bantuan=$_GET[bantuan]
		GROUP BY nilai.NIK
		ORDER BY rangking DESC"; ?>
	  <div class="panel panel-info">
	      <div class="panel-heading"><h3 class="text-center"><h2 class="text-center"><?php $query = $connection->query("SELECT * FROM bantuan WHERE jenis_bantuan=$_GET[bantuan]"); echo $query->fetch_assoc()["nama"]; ?></h2></h3></div>
	      <div class="panel-body">
	          <table class="table table-condensed table-hover">
	              <thead>
	                  <tr>
							<th>NIK</th>
							<th>Nama</th>
							<?php //$query = $connection->query("SELECT nama FROM kriteria WHERE jenis_bantuan=$_GET[bantuan]"); while($row = $query->fetch_assoc()): ?>
								<!-- <th><?//=$row["nama"]?></th> -->
							<?php //endwhile ?>
							<th>Nilai</th>
	                  </tr>
	              </thead>
	              <tbody>
					<?php $query = $connection->query($sql); while($row = $query->fetch_assoc()): ?>
					<?php
					$rangking = number_format((float) $row["rangking"], 8, '.', '');
					$q = $connection->query("SELECT NIK FROM hasil WHERE NIK='$row[NIK]' AND jenis_bantuan='$_GET[bantuan]' AND tahun='$row[tahun]'");
					if (!$q->num_rows) {
					$connection->query("INSERT INTO hasil VALUES(NULL, '$_GET[bantuan]', '$row[NIK]', '".$rangking."', '$row[tahun]')");
					}
					?>
					<tr>
						<td><?=$row["NIK"]?></td>
						<td><?=$row["nama"]?></td>
						<?php for($i=0; $i<count($namaKriteria); $i++): ?>
						<!-- <th><?//=number_format((float) $row[$namaKriteria[$i]], 8, '.', '');?></th> -->
						<?php endfor ?>
						<td><?=$rangking?></td>
					</tr>
					<?php endwhile;?>
	              </tbody>
	          </table>
	      </div>
	  </div>
	<?php } else { ?>
		<h1>bantuan belum dipilih...</h1>
	<?php } ?>
	</div>
</div>
