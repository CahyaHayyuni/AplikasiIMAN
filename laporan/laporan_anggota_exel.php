<?php

$koneksi = new mysqli("localhost", "root", "", "db_aplikasisdm");

$filename = "anggota_exel-(" . date("d-m-Y") . ").xls";

header("content-disposition: attachment; filename=$filename");
header("content-type: application/vdn.ms-exel");



?>

<h2>Lapora Anggota</h2>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin </th>
        <th>Program Studi</th>
        <th>Aksi</th>
    </tr>

    <?php

    $no = 1;

    $sql = $koneksi->query("select * from tb_anggota");

    while ($data = $sql->fetch_assoc()) {

        $jk = ($data['jk'] == 'l') ? "Laki-laki" : "Perempuan";

        $prodi = ($data['prodi'] == 'ti') ? "Teknik Informatika" : "Sistem Informasi";
    ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nim']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['tempat_lahir']; ?></td>
            <td><?php echo $data['tgl_lahir']; ?></td>
            <td><?php echo $jk; ?></td>
            <td><?php echo $prodi; ?></td>

        </tr>


    <?php } ?>

</table>