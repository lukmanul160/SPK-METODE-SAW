<hr class="my-3"/>
<div class="row">
	<div class="col-md-12">
	    <div class="panel panel-info">
	        <div class="panel-heading"><h3 class="text-center">DAFTAR PENDAFTARAN</h3></div>
	        <div class="panel-body">
	            <table class="table table-condensed">
	                <thead>
	                    <tr>
	                        <th>No</th>
	                        <th>NIK</th>
							<th>Nama</th>
							<th>Alamat</th>
	                        <th>Jenis Kelamin</th>
	                        <th>Tahun Mengajukan</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php $no = 1; ?>

						 <?php 
                        $halperpage = 10;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page>1) ? ($page * $halperpage) - $halperpage : 0;
                        $result = $connection->query("SELECT * FROM keluarga");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$halperpage);             
                        $query = $connection->query("SELECT * FROM keluarga WHERE NIK IN(SELECT NIK FROM nilai) LIMIT $mulai, $halperpage")or die(mysql_error);
                        $no = $mulai+1;
                        ?>


	                        <?php while($row = $query->fetch_assoc()): ?>
	                        <tr>
	                            <td><?=$no++?></td>
								<td><?=$row["NIK"]?></td>
	                            <td><?=$row["nama"]?></td>
	                            <td><?=$row['alamat']?></td>
	                            <td><?=$row['jenis_kelamin']?></td>
	                            <td><?=$row['tahun_mengajukan']?></td>
	                        </tr>
	                        <?php endwhile ?>

	                </tbody>
	            </table>

				 <div>
                    <?php for ($i=1; $i<=$pages ; $i++){ ?>
                    <a class="btn btn-info btn-md" href="?page=lap_pendaftaran&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php } ?>
                </div> 
	        </div>
	    </div>
	</div>
</div>
