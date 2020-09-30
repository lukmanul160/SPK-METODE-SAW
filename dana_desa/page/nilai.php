<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
    $sql = $connection->query("SELECT * FROM nilai JOIN penilaian USING(kd_kriteria) WHERE kd_nilai='$_GET[key]'");
    $row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["save"])) {
    $validasi = false; $err = false;
    if ($update) {
        $sql = "UPDATE nilai SET kd_kriteria='$_POST[kd_kriteria]', NIK='$_POST[NIK]', nilai='$_POST[nilai]' WHERE kd_nilai='$_GET[key]'";
    } else {
        $query = "INSERT INTO nilai VALUES ";
        foreach ($_POST["nilai"] as $kd_kriteria => $nilai) {
            $query .= "(NULL, '$_POST[jenis_bantuan]', '$kd_kriteria', '$_POST[NIK]', '$nilai'),";
        }
        $sql = rtrim($query, ',');
        $validasi = true;
    }

    if ($validasi) {
        foreach ($_POST["nilai"] as $kd_kriteria => $nilai) {
            $q = $connection->query("SELECT kd_nilai FROM nilai WHERE jenis_bantuan=$_POST[jenis_bantuan] AND kd_kriteria=$kd_kriteria AND NIK=$_POST[NIK] AND nilai LIKE '%$nilai%'");
            if ($q->num_rows) {
                echo alert("Nilai untuk ".$_POST["NIK"]." sudah ada!", "?page=nilai");
                $err = true;
            }
        }
    }

  if (!$err AND $connection->query($sql)) {
        echo alert("Berhasil!", "?page=nilai");
    } else {
        echo alert("Gagal!", "?page=nilai");
    }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM nilai WHERE kd_nilai='$_GET[key]'");
    echo alert("Berhasil!", "?page=nilai");
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete_all') {
    $connection->query("DELETE FROM nilai WHERE NIK='$_GET[key]'");
      echo alert("Berhasil!", "?page=nilai");
  }
?>
<hr class="my-3"/>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-<?= ($update) ? "warning" : "info" ?>">
            <div class="panel-heading"><h3 class="text-center"><?= ($update) ? "EDIT" : "TAMBAH" ?></h3></div>
            <div class="panel-body">
                <form action="<?=$_SERVER["REQUEST_URI"]?>" method="post">
                                    <div class="form-group">
                                        <label for="NIK">Keluarga</label>
                                        <?php if ($_POST): ?>
                                            <input type="text" name="NIK" value="<?=$_POST["NIK"]?>" class="form-control" readonly="on">
                                        <?php else: ?>
                                            <select class="form-control" name="NIK">
                                                <option>---</option>
                                                <?php $sql = $connection->query("SELECT * FROM keluarga"); while ($data = $sql->fetch_assoc()): ?>
                                                    <option value="<?=$data["NIK"]?>" <?= (!$update) ? "" : (($row["NIK"] != $data["NIK"]) ? "" : 'selected="selected"') ?>><?=$data["NIK"]?> | <?=$data["nama"]?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                      <label for="jenis_bantuan">Bantuan</label>
                                        <?php if ($_POST): ?>
                                            <?php $q = $connection->query("SELECT nama FROM bantuan WHERE jenis_bantuan=$_POST[jenis_bantuan]"); ?>
                                            <input type="text"value="<?=$q->fetch_assoc()["nama"]?>" class="form-control" readonly="on">
                                            <input type="hidden" name="jenis_bantuan" value="<?=$_POST["jenis_bantuan"]?>">
                                        <?php else: ?>
                                            <select class="form-control" name="jenis_bantuan" id="bantuan">
                                                <option>---</option>
                                                <?php $sql = $connection->query("SELECT * FROM bantuan"); while ($data = $sql->fetch_assoc()): ?>
                                                    <option value="<?=$data["jenis_bantuan"]?>"<?= (!$update) ? "" : (($row["jenis_bantuan"] != $data["jenis_bantuan"]) ? "" : 'selected="selected"') ?>><?=$data["nama"]?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($_POST): ?>
                                        <?php $q = $connection->query("SELECT * FROM kriteria WHERE jenis_bantuan=$_POST[jenis_bantuan]"); while ($r = $q->fetch_assoc()): ?>
                                <div class="form-group">
                                      <label for="nilai"><?=ucfirst($r["nama"])?></label>
                                                        <select class="form-control" name="nilai[<?=$r["kd_kriteria"]?>]" id="nilai">
                                                            <option>---</option>
                                                            <?php $sql = $connection->query("SELECT * FROM penilaian WHERE kd_kriteria=$r[kd_kriteria]"); while ($data = $sql->fetch_assoc()): ?>
                                                                <option value="<?=$data["bobot"]?>" class="<?=$data["kd_kriteria"]?>"<?= (!$update) ? "" : (($row["kd_penilaian"] != $data["kd_penilaian"]) ? "" : ' selected="selected"') ?>><?=$data["keterangan"]?></option>
                                                            <?php endwhile; ?>
                                                        </select>
                                </div>
                                        <?php endwhile; ?>
                                        <input type="hidden" name="save" value="true">
                                    <?php endif; ?>
                    <button type="submit" id="simpan" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block"><?=($_POST) ? "Simpan" : "Tampilkan"?></button>
                    <?php if ($update): ?>
                                        <a href="?page=nilai" class="btn btn-info btn-block">Batal</a>
                                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="text-center">DAFTAR</h3></div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Bantuan</th>
                            <th>Kriteria</th>
                            <th>Nilai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php $no = 1; ?>
                        <?php 
                        $halperpage = 10;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page>1) ? ($page * $halperpage) - $halperpage : 0;
                        $result = $connection->query("SELECT * FROM nilai");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$halperpage);             
                        $query = $connection->query("SELECT a.kd_nilai, c.nama AS nama_bantuan, b.nama AS nama_kriteria, d.NIK, d.nama AS nama_keluarga, a.nilai FROM nilai a JOIN kriteria b ON a.kd_kriteria=b.kd_kriteria JOIN bantuan c ON a.jenis_bantuan=c.jenis_bantuan JOIN keluarga d ON d.NIK=a.NIK LIMIT $mulai, $halperpage")or die(mysql_error);
                        $no = $mulai+1;
                        
                        ?>  
                            
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$row['NIK']?></td>
                                <td><?=$row['nama_keluarga']?></td>
                                <td><?=$row['nama_bantuan']?></td>
                                <td><?=$row['nama_kriteria']?></td>
                                <td><?=$row['nilai']?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="?page=nilai&action=delete_all&key=<?=$row['NIK']?>"  class="btn btn-warning btn-xs" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus Semua</a>
                                        <a href="?page=nilai&action=delete&key=<?=$row['kd_nilai']?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile ?>

                    </tbody>
                </table>

                 <div>
                    <?php for ($i=1; $i<=$pages ; $i++){ ?>
                    <a class="btn btn-info btn-md" href="?page=nilai&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php } ?>
                </div> 
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$("#kriteria").chained("#bantuan");
$("#nilai").chained("#kriteria");
</script>



