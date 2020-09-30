<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
    $sql = $connection->query("SELECT * FROM penilaian WHERE kd_penilaian='$_GET[key]'");
    $row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validasi = false; $err = false;
    if ($update) {
        $sql = "UPDATE penilaian SET kd_kriteria='$_POST[kd_kriteria]', keterangan='$_POST[keterangan]', bobot='$_POST[bobot]' WHERE kd_penilaian='$_GET[key]'";
    } else {
        $sql = "INSERT INTO penilaian VALUES (NULL, '$_POST[jenis_bantuan]', '$_POST[kd_kriteria]', '$_POST[keterangan]', '$_POST[bobot]')";
        $validasi = true;
    }

    if ($validasi) {
        $q = $connection->query("SELECT kd_penilaian FROM penilaian WHERE jenis_bantuan=$_POST[jenis_bantuan] AND kd_kriteria=$_POST[kd_kriteria] AND keterangan LIKE '%$_POST[keterangan]%' AND bobot=$_POST[bobot]");
        if ($q->num_rows) {
            echo alert("Penilaian sudah ada!", "?page=penilaian");
            $err = true;
        }
    }

  if (!$err AND $connection->query($sql)) {
    echo alert("Berhasil!", "?page=penilaian");
  } else {
        echo alert("Gagal!", "?page=penilaian");
  }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM penilaian WHERE kd_penilaian='$_GET[key]'");
    echo alert("Berhasil!", "?page=penilaian");
}
?>
<hr class="my-3"/>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-<?= ($update) ? "warning" : "info" ?>">
            <div class="panel-heading"><h3 class="text-center"><?= ($update) ? "EDIT" : "TAMBAH" ?></h3></div>
            <div class="panel-body">
                <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                                    <div class="form-group">
                      <label for="jenis_bantuan">Bantuan</label>
                                        <select class="form-control" name="jenis_bantuan" id="bantuan">
                                            <option>---</option>
                                            <?php $sql = $connection->query("SELECT * FROM bantuan") ?>
                                            <?php while ($data = $sql->fetch_assoc()): ?>
                                                <option value="<?=$data["jenis_bantuan"]?>" <?= (!$update) ?: (($row["jenis_bantuan"] != $data["jenis_bantuan"]) ?: 'selected="selected"') ?>><?=$data["nama"]?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                      <label for="kd_kriteria">Kriteria</label>
                                        <select class="form-control" name="kd_kriteria" id="kriteria">
                                            <option>---</option>
                                            <?php $sql = $connection->query("SELECT * FROM kriteria") ?>
                                            <?php while ($data = $sql->fetch_assoc()): ?>
                                                <option value="<?=$data["kd_kriteria"]?>" class="<?=$data["jenis_bantuan"]?>" <?= (!$update) ?: (($row["kd_kriteria"] != $data["kd_kriteria"]) ?: 'selected="selected"') ?>><?=$data["nama"]?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" <?= (!$update) ?: 'value="'.$row["keterangan"].'"' ?>>
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="text" name="bobot" class="form-control" <?= (!$update) ?: 'value="'.$row["bobot"].'"' ?>>
                    </div>
                    <button type="submit" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block">Simpan</button>
                    <?php if ($update): ?>
                                        <a href="?page=penilaian" class="btn btn-info btn-block">Batal</a>
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
                            <th>Bantuan</th>
                            <th>Kriteria</th>
                            <th>Keterangan</th>
                            <th>Bobot</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php 
                        $halperpage = 10;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page>1) ? ($page * $halperpage) - $halperpage : 0;
                        $result = $connection->query("SELECT * FROM penilaian");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$halperpage);             
                        $query = $connection->query("SELECT a.kd_penilaian, c.nama AS nama_bantuan, b.nama AS nama_kriteria, a.keterangan, a.bobot FROM penilaian a JOIN kriteria b ON a.kd_kriteria=b.kd_kriteria JOIN bantuan c ON a.jenis_bantuan=c.jenis_bantuan LIMIT $mulai, $halperpage")or die(mysql_error);
                        $no = $mulai+1;
                        ?>
                        
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$row['nama_bantuan']?></td>
                                <td><?=$row['nama_kriteria']?></td>
                                <td><?=$row['keterangan']?></td>
                                <td><?=$row['bobot']?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="?page=penilaian&action=update&key=<?=$row['kd_penilaian']?>" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="?page=penilaian&action=delete&key=<?=$row['kd_penilaian']?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile ?>

                    </tbody>
                </table>
                 <div>
                    <?php for ($i=1; $i<=$pages ; $i++){ ?>
                    <a class="btn btn-info btn-md" href="?page=penilaian&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php } ?>
                </div> 
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$("#kriteria").chained("#bantuan");
</script>


