<?php

$id = $_GET['id'];

$sql = $koneksi->query("select * from tb_barang_masuk where id='$id'");

$tampil = $sql->fetch_assoc();

$divisi = $tampil['divisi'];
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Serah Terima Barang Masuk
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Foto/Gambar</label>
                    <br>
                    <img src="<?php echo $tampil['file_foto'] ?>">
                </div>

                <div class="form-group">
                    <label>Tanda Tangan</label>
                    <br>
                    <img src="<?php echo $tampil['file_ttd'] ?>">
                </div>
                <form method="POST">
                    <div class="form-group">
                        <label>Nip Penerima/Pegawai</label>
                        <input class="form-control" name="nip" value="<?php echo $tampil['nip'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Nama Penerima/Pegawai</label>
                        <input class="form-control" name="nama" value="<?php echo $tampil['nama'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Barang</label>
                        <input class="form-control" name="barang" value="<?php echo $tampil['barang'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Ekspedisi</label>
                        <input class="form-control" name="ekspedisi" value="<?php echo $tampil['ekspedisi'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Penerima Fisik</label>
                        <input class="form-control" name="penerima_fisik" required />
                    </div>

                    <div class="form-group">
                        <label>Tanggal Terima</label>
                        <input class="form-control" name="tgl_terima" type="date" value="<?php echo $tampil['tgl_terima'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Tanggal Serah</label>
                        <input class="form-control" name="tgl_serah" type="date" required />
                    </div>

                    <div class="form-group">
                        <label>Divisi</label>
                        <select class="form-control" name="divisi" readonly>
                            <option value="it" <?php if ($divisi == 'it') {
                                                    echo "selected";
                                                } ?>>Informasi Teknologi</option>
                            <option value="tnk" <?php if ($divisi == 'tnk') {
                                                    echo "selected";
                                                } ?>>Teknik</option>
                            <option value="kom" <?php if ($divisi == 'kom') {
                                                    echo "selected";
                                                } ?>>Komersial</option>
                            <option value="keu" <?php if ($divisi == 'keu') {
                                                    echo "selected";
                                                } ?>>Keuangan</option>
                            <option value="qrm" <?php if ($divisi == 'qrm') {
                                                    echo "selected";
                                                } ?>>Menegement Resiko & Mutu</option>
                            <option value="tpkb" <?php if ($divisi == 'tpkb') {
                                                        echo "selected";
                                                    } ?>>TPKB</option>
                            <option value="trs" <?php if ($divisi == 'trs') {
                                                    echo "selected";
                                                } ?>>Trisakti</option>
                            <option value="hsse" <?php if ($divisi == 'hsse') {
                                                        echo "selected";
                                                    } ?>>HSSE</option>
                            <option value="umum" <?php if ($divisi == 'umum') {
                                                        echo "selected";
                                                    } ?>>SDM & Umum</option>
                        </select>
                    </div>

                    <div>
                        <input type="hidden" name="id" value=<?= $id ?>>
                        <input type="hidden" name="file_foto" value=<?php echo $tampil['file_foto'] ?>>
                        <input type="hidden" name="file_ttd" value="<?php echo $tampil['file_ttd'] ?>">
                        <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

$id = isset($_POST['id']) ? $_POST['id'] : '';
$nip = isset($_POST['nip']) ? $_POST['nip'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$barang = isset($_POST['barang']) ? $_POST['barang'] : '';
$ekspedisi = isset($_POST['ekspedisi']) ? $_POST['ekspedisi'] : '';
$penerima_fisik = isset($_POST['penerima_fisik']) ? $_POST['penerima_fisik'] : '';
$tgl_terima = isset($_POST['tgl_terima']) ? $_POST['tgl_terima'] : '';
$tgl_serah = isset($_POST['tgl_serah']) ? $_POST['tgl_serah'] : '';
$simpan = isset($_POST['simpan']) ? $_POST['simpan'] : '';
$file_foto = isset($_POST['file_foto']) ? $_POST['file_foto'] : '';
$file_ttd = isset($_POST['file_ttd']) ? $_POST['file_ttd'] : '';

if ($simpan) {
    $sql = $koneksi->query("insert into tb_histori_barang_masuk (id, nip, nama, barang, ekspedisi, penerima_fisik, tgl_terima, tgl_serah, divisi, file_foto, file_ttd) values ('$id', '$nip', '$nama', '$barang', '$ekspedisi', '$penerima_fisik', '$tgl_terima', '$tgl_serah', '$divisi', '$file_foto', '$file_ttd')");
    $koneksi->query("delete from tb_barang_masuk where id ='$id'");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Behasil Disimpan Dihistori");
            window.location.href = "?page=barangmasuk";
        </script>
<?php
    }
}
?>