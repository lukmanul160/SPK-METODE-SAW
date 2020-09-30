<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
    $sql = $connection->query("SELECT * FROM kriteria WHERE kd_kriteria='$_GET[key]'");
    $row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validasi = false; $err = false;
    if ($update) {
        $sql = "UPDATE kriteria SET jenis_bantuan=$_POST[jenis_bantuan], nama='$_POST[nama]', sifat='$_POST[sifat]' WHERE kd_kriteria='$_GET[key]'";
    } else {
        $sql = "INSERT INTO kriteria VALUES (NULL, $_POST[jenis_bantuan], '$_POST[nama]', '$_POST[sifat]')";
        $validasi = true;
    }

    if ($validasi) {
        $q = $connection->query("SELECT kd_kriteria FROM kriteria WHERE jenis_bantuan=$_POST[jenis_bantuan] AND nama LIKE '%$_POST[nama]%'");
        if ($q->num_rows) {
            echo alert("Kriteri sudah ada!", "?page=kriteria");
            $err = true;
        }
    }

  if (!$err AND $connection->query($sql)) {
        echo alert("Berhasil!", "?page=kriteria");
    } else {
        echo alert("Gagal!", "?page=kriteria");
    }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM kriteria WHERE kd_kriteria='$_GET[key]'");
    echo alert("Berhasil!", "?page=kriteria");
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
                                        <select class="form-control" name="jenis_bantuan">
                                            <option>---</option>
                                            <?php $query = $connection->query("SELECT * FROM bantuan"); while ($data = $query->fetch_assoc()): ?>
                                                <option value="<?=$data["jenis_bantuan"]?>" <?= (!$update) ?: (($row["jenis_bantuan"] != $data["jenis_bantuan"]) ?: 'selected="on"') ?>><?=$data["nama"]?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>>
                    </div>
                                    <div class="form-group">
                      <label for="sifat">Sifat</label>
                                        <select class="form-control" name="sifat">
                                            <option>---</option>
                                            <option value="min" <?= (!$update) ?: (($row["sifat"] != "min") ?: 'selected="on"') ?>>Min</option>
                                            <option value="max" <?= (!$update) ?: (($row["sifat"] != "max") ?: 'selected="on"') ?>>Max</option>
                                        </select>
                                    </div>
                    <button type="submit" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block">Simpan</button>
                    <?php if ($update): ?>
                                        <a href="?page=kriteria" class="btn btn-info btn-block">Batal</a>
                                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="text-center">DAFTAR KRITERIA</h3></div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bantuan</th>
                            <th>Kriteria</th>
                            <th>Sifat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php 
                        $halperpage = 10;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page>1) ? ($page * $halperpage) - $halperpage : 0;
                        $result = $connection->query("SELECT * FROM kriteria");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$halperpage);             
                        $query = $connection->query("SELECT a.nama AS kriteria, b.nama AS bantuan, a.kd_kriteria, a.sifat FROM kriteria a JOIN bantuan b USING(jenis_bantuan) LIMIT $mulai, $halperpage")or die(mysql_error);
                        $no = $mulai+1;
                        ?>
                        
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$row['bantuan']?></td>
                                <td><?=$row['kriteria']?></td>
                                <td><?=$row['sifat']?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="?page=kriteria&action=update&key=<?=$row['kd_kriteria']?>" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="?page=kriteria&action=delete&key=<?=$row['kd_kriteria']?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile ?>

                    </tbody>
                </table>
                <div>
                    <?php for ($i=1; $i<=$pages ; $i++){ ?>
                    <a class="btn btn-info btn-md" href="?page=kriteria&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php } ?>
                </div> 
            </div>
        </div>
    </div>
</div>


