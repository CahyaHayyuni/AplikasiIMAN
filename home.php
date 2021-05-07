<marquee>Selamat Datang Di halaman Utama Aplikasi Penginput Data Berbasis Web</marquee>
<div id="page-inner">
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-download"></i>
                </span>
                <div class="text-box">
                    <?php
                    $sql = $koneksi->query("select count(*) jumlah_barang_masuk from tb_barang_masuk");
                    $data = $sql->fetch_assoc();
                    ?>
                    <p class="main-text"><?php echo $data['jumlah_barang_masuk']; ?></p>
                    <p class="text-muted">Barang Masuk</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-upload"></i>
                </span>
                <div class="text-box">
                    <?php
                    $sql = $koneksi->query("select count(*) jumlah_barang_keluar from tb_barang_keluar");
                    $data = $sql->fetch_assoc();
                    ?>
                    <p class="main-text"><?php echo $data['jumlah_barang_keluar']; ?></p>
                    <p class="text-muted">Barang Keluar</p>
                </div>
            </div>
        </div>

    </div>