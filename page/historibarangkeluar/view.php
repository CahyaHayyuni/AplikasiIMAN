<?php

$id = $_GET['id'];

$sql = $koneksi->query("select * from tb_histori_barang_keluar where id='$id'");

$tampil = $sql->fetch_assoc();

$divisi = $tampil['divisi'];
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Kembali
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                <form method="POST">
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
                        <label>Teruju/Tujuan</label>
                        <input class="form-control" name="tujuan" value="<?php echo $tampil['tujuan'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Ekspedisi</label>
                        <input class="form-control" name="ekspedisi" value="<?php echo $tampil['ekspedisi'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Tanggal Terima</label>
                        <input class="form-control" name="tgl_terima" type="date" value="<?php echo $tampil['tgl_terima'] ?>" readonly />
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
                    <div>
                        <a href="<?php echo "?page=historibarangkeluar" ?>" class="btn btn-info">
                            << Kembali</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>