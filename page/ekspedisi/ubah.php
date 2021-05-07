<?php


$id = $_GET['id'];

$sql = $koneksi->query("select * from tb_ekspedisi where id = '$id'");

$tampil = $sql->fetch_assoc();

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">

                <form method="POST">
                    <div class="form-group">
                        <label>Singkatan</label>
                        <input class="form-control" name="singkatan" value="<?php echo $tampil['singkatan'] ?>" required />

                    </div>

                    <div class=" form-group">
                        <label>Nama Ekspedisi</label>
                        <input class="form-control" name="nama_ekspedisi" value="<?php echo $tampil['nama_ekspedisi'] ?>" required />

                    </div>

                    <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
            </div>
        </div>

        </form>
    </div>
</div>
</div>
</div>

<?php

$singkatan = isset($_POST['singkatan']) ? $_POST['singkatan'] : '';
$nama_ekspedisi = isset($_POST['nama_ekspedisi']) ? $_POST['nama_ekspedisi'] : '';

$simpan = isset($_POST['simpan']) ? $_POST['simpan'] : '';

//echo $simpan;
if ($simpan) {

    $sql = $koneksi->query("update tb_ekspedisi set singkatan='$singkatan', nama_ekspedisi='$nama_ekspedisi' where id='$id'");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href = "?page=ekspedisi";
        </script>
<?php
    }
}

?>