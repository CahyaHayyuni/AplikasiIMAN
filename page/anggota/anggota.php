<a href="?page=anggota&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Anggota
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIPP</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Email</th>
                                <th>User Login</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("select * from tb_anggota");
                            while ($data = $sql->fetch_assoc()) {
                                $divisi = convert_divisi($data['divisi']);
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nip']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $divisi; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['user_login']; ?></td>
                                    <td>
                                        <a href="?page=anggota&aksi=ubah&id=<?php echo $data['nip']; ?>" class="btn btn-info">Ubah</a>
                                        <a onclick="return confirm('Anda Yakin Menghapus Data Ini?')" href="?page=anggota&aksi=hapus&id=<?php echo $data['nip']; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <a href="./laporan/laporan_anggota_exel.php" target="blank" class="btn btn-default" style="margin-top: 8px;"><i class="fa fa-print"></i> ExportToExel </a>
                <a href="./laporan/laporan_anggota_pdf.php" target="blank" class="btn btn-default" style="margin-top: 8px;"><i class="fa fa-print"></i> ExportToPdf </a>
            </div>
        </div>
    </div>
</div>