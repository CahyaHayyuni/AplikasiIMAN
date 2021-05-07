<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Histori Barang & Surat
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
                                <th>Ekspedisi</th>
                                <th>Tertuju/Tujuan</th>
                                <th>Tanggal Terima</th>
                                <th>Tanggal Serah</th>
                                <th>Divisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            $sql = $koneksi->query("select * from tb_histori_barang_keluar order by tgl_serah desc");
                            while ($data = $sql->fetch_assoc()) {
                                $divisi = convert_divisi($data['divisi']);
                            ?>

                                </tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['nip']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['barang']; ?></td>
                                <td><?php echo $data['ekspedisi']; ?></td>
                                <td><?php echo $data['tujuan']; ?></td>
                                <td><?php echo $data['tgl_terima']; ?></td>
                                <td><?php echo $data['tgl_serah']; ?></td>
                                <td><?php echo $divisi; ?></td>
                                <td><a href="?page=historibarangkeluar&aksi=view&id=<?php echo $data['id']; ?>" class="btn btn-info">View</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>