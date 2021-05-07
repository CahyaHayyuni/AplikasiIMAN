<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                <form method="POST">
                    <div class="form-group">
                        <label>Singkatan</label>
                        <input class="form-control" name="singkatan" required />

                    </div>

                    <div class="form-group">
                        <label>Nama Ekspedisi</label>
                        <input class="form-control" name="nama_ekspedisi" required />

                    </div>

                    <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
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

if ($simpan) {
    //echo $simpan;
    $sql = $koneksi->query("insert into tb_ekspedisi (singkatan, nama_ekspedisi) values ('$singkatan', '$nama_ekspedisi')");
    //echo $sql;
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