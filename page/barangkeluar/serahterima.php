<?php

$id = $_GET['id'];

$sql = $koneksi->query("select * from tb_barang_keluar where id='$id'");

$tampil = $sql->fetch_assoc();

$divisi = $tampil['divisi'];
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Serah Terima Barang Keluar
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="container form-group" id="Cam"><b>Camera Preview...</b>
                    <div id="my_camera"></div>
                    <form>
                        <input type="button" value="Ambil Foto" class="btn btn-warning" onClick="take_snapshot()">
                    </form>
                </div>
                <div class="container form-group" id="Prev">
                    <b>Hasil Foto Preview...</b>
                    <div id="results"></div>
                </div>
                <div class="container form-group" id="Saved">
                    <img id="uploaded" src="" />
                    <br>
                    <span id="loading"></span>
                    <strong><span id="saved_text"></span></strong>
                </div>

                <form method="POST" id="signatureform">
                    <div class="form-group">
                        <label>Nip Pengirim/Pegawai</label>
                        <input class="form-control" name="nip" value="<?php echo $tampil['nip'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Nama Pengirim/Pegawai</label>
                        <input class="form-control" name="nama" value="<?php echo $tampil['nama'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Barang</label>
                        <input class="form-control" name="barang" value="<?php echo $tampil['barang'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Tertuju/Tujuan</label>
                        <input class="form-control" name="tujuan" value="<?php echo $tampil['tujuan'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Ekspedisi</label>
                        <select class="form-control select2" name="ekspedisi">
                            <?php
                            $sql = $koneksi->query("select * from tb_ekspedisi order by id");
                            while ($data = $sql->fetch_assoc()) {
                                echo "<option value='$data[singkatan]'>$data[singkatan] </option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Terima</label>
                        <input class="form-control" name="tgl_terima" type="date" required />
                    </div>

                    <div class="form-group">
                        <label>Tanggal Serah</label>
                        <input class="form-control" name="tgl_serah" type="date" value="<?php echo $tampil['tgl_serah'] ?>" readonly />
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
                        <input type="hidden" name="file_foto" id="file_foto">
                        <input type="hidden" id="signature" name="signature">
                        <input type="submit" name="simpan" value="simpan" class="btn btn-primary" id="btn-save">
                    </div>
            </div>
            <div class="col-md-4">
                <b>Tanda Tangan</b>
                <div id="canvasDiv"></div>
                <br>
                <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
            </div>
            </form>

        </div>
    </div>
</div>

<?php

$id = isset($_POST['id']) ? $_POST['id'] : '';
$nip = isset($_POST['nip']) ? $_POST['nip'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$barang = isset($_POST['barang']) ? $_POST['barang'] : '';
$tujuan = isset($_POST['tujuan']) ? $_POST['tujuan'] : '';
$ekspedisi = isset($_POST['ekspedisi']) ? $_POST['ekspedisi'] : '';
$tgl_terima = isset($_POST['tgl_terima']) ? $_POST['tgl_terima'] : '';
$tgl_serah = isset($_POST['tgl_serah']) ? $_POST['tgl_serah'] : '';
$file_foto = isset($_POST['file_foto']) ? $_POST['file_foto'] : '';
$simpan = isset($_POST['simpan']) ? $_POST['simpan'] : '';

if ($simpan) {
    // post tanda tangan
    $signature = $_POST['signature'];
    $signatureFileName = uniqid() . '.png';
    $signature = str_replace('data:image/png;base64,', '', $signature);
    $signature = str_replace(' ', '+', $signature);
    $data_ttd = base64_decode($signature);
    $file_ttd = 'signatures/' . $signatureFileName;
    file_put_contents($file_ttd, $data_ttd);

    // post email
    $sql = $koneksi->query("select email from tb_anggota where nip='" . $nip . "'");
    $data = $sql->fetch_assoc();
    $to = $data['email'];
    $subjek = 'Barang Keluar - Barang ' . $barang . 'Telah Dikirim';
    $isi = 'Dear ' . $nama .
        '<br><br>' .
        'Nama Barang : ' . $barang . ' telah dikirim pada tanggal : ' . $tgl_serah . '. Ke Eksepedisi : ' . $ekspedisi;

    $sql = $koneksi->query("insert into tb_histori_barang_keluar (id, nip, nama, barang, tujuan, ekspedisi, tgl_terima, tgl_serah, divisi, file_foto, file_ttd) values ('$id', '$nip', '$nama', '$barang', '$tujuan', '$ekspedisi', '$tgl_terima', '$tgl_serah', '$divisi', '$file_foto', '$file_ttd')");
    $koneksi->query("delete from tb_barang_keluar where id ='$id'");

    $email = kirim_email($to, $subjek, $isi);

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Behasil Disimpan Dihistori");
            window.location.href = "?page=barangkeluar";
        </script>
<?php
    }
}

?>

<script type="text/javascript" src="assets/webcam/webcam.js"></script>
<script language="JavaScript">
    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            document.getElementById('results').innerHTML = '<img id="base64image" src="' + data_uri + '"/><br><button class="btn btn-warning" onclick="SaveSnap();">Simpan Foto</button>';
        });
    }

    function ShowCam() {
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 100
        });
        Webcam.attach('#my_camera');
    }

    function SaveSnap() {
        document.getElementById("loading").innerHTML = "Saving, please wait...";
        var file = document.getElementById("base64image").src;
        var formdata = new FormData();
        formdata.append("base64image", file);
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("load", function(event) {
            uploadcomplete(event);
        }, false);
        ajax.open("POST", "upload.php");
        ajax.send(formdata);
    }

    function uploadcomplete(event) {
        document.getElementById("loading").innerHTML = "";
        var image_return = event.target.responseText;
        var showup = document.getElementById("uploaded").src = image_return;
        document.getElementById("file_foto").value = image_return;
        document.getElementById("saved_text").innerHTML = "Berhasil Tersimpan";
    }
    window.onload = ShowCam;
</script>