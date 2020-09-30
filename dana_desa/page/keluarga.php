<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
    $sql = $connection->query("SELECT * FROM keluarga WHERE NIK='$_GET[key]'");
    $row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validasi = false; $err = false;
    if ($update) {
        $sql = "UPDATE keluarga SET NIK='$_POST[NIK]', nama='$_POST[nama]', alamat='$_POST[alamat]', jenis_kelamin='$_POST[jenis_kelamin]', tahun_mengajukan='".date("Y")."' WHERE NIK='$_GET[key]'";
    } else {
        $sql = "INSERT INTO keluarga VALUES ('$_POST[NIK]', '$_POST[nama]', '$_POST[alamat]', '$_POST[jenis_kelamin]', '".date("Y")."')";
        $validasi = true;
    }

    if ($validasi) {
        $q = $connection->query("SELECT NIK FROM keluarga WHERE NIK=$_POST[NIK]");
        if ($q->num_rows) {
            echo alert($_POST["NIK"]." sudah terdaftar!", "?page=keluarga");
            $err = true;
        }
    }

  if (!$err AND $connection->query($sql)) {
    echo alert("Berhasil!", "?page=keluarga");
  } else {
        echo alert("Gagal aaaa!", "?page=keluarga");
  }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM keluarga WHERE NIK=$_GET[key]");
    echo alert("Berhasil!", "?page=keluarga");
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
                        <label for="NIK">NIK</label>
                        <input type="text" name="NIK" class="form-control" <?= (!$update) ?: 'value="'.$row["NIK"].'"' ?>>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" <?= (!$update) ?: 'value="'.$row["alamat"].'"' ?>>
                    </div>
                                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option>---</option>
                                            <option value="Laki-laki" <?= (!$update) ?: (($row["jenis_kelamin"] != "Laki-laki") ?: 'selected="on"') ?>>Laki-laki</option>
                                            <option value="Perempuan" <?= (!$update) ?: (($row["jenis_kelamin"] != "Perempuan") ?: 'selected="on"') ?>>Perempuan</option>
                                        </select>
                                    </div>
                    <button type="submit" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block">Simpan</button>
                    <?php if ($update): ?>
                                        <a href="?page=keluarga" class="btn btn-info btn-block">Batal</a>
                                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="text-center">DAFTAR KELUARGA</h3></div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tahun</th>
                            <th></th>
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
                        $query = $connection->query("SELECT * FROM keluarga LIMIT $mulai, $halperpage")or die(mysql_error);
                        $no = $mulai+1;
                        ?>
                        
                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$row['NIK']?></td>
                                <td><?=$row['nama']?></td>
                                <td><?=$row['alamat']?></td>
                                <td><?=$row['jenis_kelamin']?></td>
                                <td><?=$row['tahun_mengajukan']?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="?page=keluarga&action=update&key=<?=$row['NIK']?>" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="?page=keluarga&action=delete&key=<?=$row['NIK']?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile ?>
                      
                    </tbody>
                </table>
                <div>
                    <?php for ($i=1; $i<=$pages ; $i++){ ?>
                    <a class="btn btn-info btn-md" href="?page=keluarga&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php } ?>
                </div> 
            </div>
        </div>
    </div>
</div>


