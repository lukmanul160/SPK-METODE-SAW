<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
    $sql = $connection->query("SELECT * FROM bantuan WHERE jenis_bantuan='$_GET[key]'");
    $row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validasi = false; $err = false;
    if ($update) {
        $sql = "UPDATE bantuan SET nama='$_POST[nama]' WHERE jenis_bantuan='$_GET[key]'";
    } else {
        $sql = "INSERT INTO bantuan VALUES (NULL, '$_POST[nama]')";
        $validasi = true;
    }

    if ($validasi) {
        $q = $connection->query("SELECT jenis_bantuan FROM bantuan WHERE nama LIKE '%$_POST[nama]%'");
        if ($q->num_rows) {
            echo alert("Bantuan sudah ada!", "?page=bantuan");
            $err = true;
        }
    }

  if (!$err AND $connection->query($sql)) {
    echo alert("Berhasil!", "?page=bantuan");
  } else {
        echo alert("Gagal!", "?page=bantuan");
  }
}

if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM bantuan WHERE jenis_bantuan='$_GET[key]'");
    echo alert("Berhasil!", "?page=bantuan");
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
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>>
                    </div>
                    <button type="submit" class="btn btn-<?= ($update) ? "warning" : "info" ?> btn-block">Simpan</button>
                    <?php if ($update): ?>
                                        <a href="?page=bantuan" class="btn btn-info btn-block">Batal</a>
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
                            <th>Nama</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php 
                        $halperpage = 10;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page>1) ? ($page * $halperpage) - $halperpage : 0;
                        $result = $connection->query("SELECT * FROM bantuan");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$halperpage);             
                        $query = $connection->query("SELECT * FROM bantuan LIMIT $mulai, $halperpage")or die(mysql_error);
                        $no = $mulai+1;
                        ?>

                            <?php while($row = $query->fetch_assoc()): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$row['nama']?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="?page=bantuan&action=update&key=<?=$row['jenis_bantuan']?>" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="?page=bantuan&action=delete&key=<?=$row['jenis_bantuan']?>" class="btn btn-danger btn-xs">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile ?>

                    </tbody>
                </table>
                <div>
                    <?php for ($i=1; $i<=$pages ; $i++){ ?>
                    <a class="btn btn-info btn-md" href="?page=bantuan&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php } ?>
                </div> 
            </div>
        </div>
    </div>
</div>


