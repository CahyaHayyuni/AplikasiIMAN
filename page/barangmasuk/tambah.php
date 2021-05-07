<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data Barang Masuk
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
                        <label>Penerima/Pegawai</label>
                        <select class="form-control select2" name="nama">
                            <?php
                            $sql = $koneksi->query("select * from tb_anggota order by nip");
                            while ($data = $sql->fetch_assoc()) {
                                echo "<option value='$data[nip].$data[nama]'>$data[nip] | $data[nama]</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Barang</label>
                        <input class="form-control" name="barang" required />

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
                        <label>Tanggal Datang</label>
                        <input class="form-control" name="tgl_terima" type="date" required />

                    </div>

                    <div class="form-group">
                        <label>Divisi</label>
                        <select class="form-control" name="divisi">
                            <option value="it">Informasi Teknologi</option>
                            <option value="tnk">Teknik</option>
                            <option value="kom">Komersial</option>
                            <option value="keu">Keuangan</option>
                            <option value="qrm">Menegement Resiko & Mutu</option>
                            <option value="tpkb">TPKB</option>
                            <option value="trs">Trisakti</option>
                            <option value="hsse">HSSE</option>
                            <option value="umum">SDM & Umum</option>

                        </select>
                    </div>
                    <input type="hidden" name="file_foto" id="file_foto">
                    <input type="hidden" id="signature" name="signature">
                    <input type="submit" name="simpan" value="simpan" class="btn btn-primary" id="btn-save">
            </div>
            <div class="col-md-4">
                <b>Tanda Tangan</b>
                <div id="canvasDiv"></div>
                <br>
                <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
            </div>
        </div>

        </form>
    </div>
</div>
</div>
</div>

<?php
$simpan = isset($_POST['simpan']) ? $_POST['simpan'] : '';
if ($simpan) {

    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    if (isset($_POST['nama'])) {
        $pecah_nama = explode(".", $nama);
        $nip = $pecah_nama[0];
        $nama = $pecah_nama[1];
    }
    $barang = isset($_POST['barang']) ? $_POST['barang'] : '';
    $ekspedisi = isset($_POST['ekspedisi']) ? $_POST['ekspedisi'] : '';
    $tgl_terima = isset($_POST['tgl_terima']) ? $_POST['tgl_terima'] : '';
    $divisi = isset($_POST['divisi']) ? $_POST['divisi'] : '';
    $file_foto = isset($_POST['file_foto']) ? $_POST['file_foto'] : '';


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
    $subjek = 'Barang Masuk - Barang ' . $barang . 'Telah Datang';
    $isi = 'Dear ' . $nama .
        '<br><br>' .
        'Nama Barang : ' . $barang . ' telah datang pada tanggal : ' . $tgl_terima . '. Dari Eksepedisi : ' . $ekspedisi;

    $sql = $koneksi->query("insert into tb_barang_masuk (nip, nama, barang, ekspedisi, tgl_terima, divisi, file_foto, file_ttd) values ('$nip', '$nama', '$barang', '$ekspedisi', '$tgl_terima', '$divisi', '$file_foto', '$file_ttd')");
    $email = kirim_email($to, $subjek, $isi);

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href = "?page=barangmasuk";
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