<a href="?page=barangkeluar&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Barang & Surat
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP Pengirim/Pegawai</th>
                                <th>Nama Pengirim/Pegawai</th>
                                <th>Barang</th>
                                <th>Tertuju/Tujuan</th>
                                <th>Tanggal Serah</th>
                                <th>Divisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            $sql = $koneksi->query("select * from tb_barang_keluar order by id desc");
                            while ($data = $sql->fetch_assoc()) {
                                $divisi = convert_divisi($data['divisi']);
                            ?>

                                </tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nip']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['barang']; ?></td>
                                <td><?php echo $data['tujuan']; ?></td>
                                <td><?php echo $data['tgl_serah']; ?></td>
                                <td><?php echo $divisi; ?></td>
                                <td>
                                    <a href="?page=barangkeluar&aksi=serahterima&id=<?php echo $data['id']; ?>" class="btn btn-info">Serah Terima</a>
                                    <a onclick="return confirm('Anda Yakin Menghapus Data Ini?')" href="?page=barangkeluar&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger">Hapus</a>

                                </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>