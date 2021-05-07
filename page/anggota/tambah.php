<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">

                <form method="POST">
                    <div class="form-group">
                        <label>NIPP</label>
                        <input class="form-control" name="nip" required />
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" required />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" required />
                    </div>

                    <div class="form-group">
                        <label>User Login</label>
                        <select class="form-control" name="user_login">
                            <option value="notuser">Not User Login</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
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
                    <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php
$simpan = isset($_POST['simpan']) ? $_POST['simpan'] : '';
if ($simpan) {
    $nip = isset($_POST['nip']) ? $_POST['nip'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $divisi = isset($_POST['divisi']) ? $_POST['divisi'] : '';
    $user_login = isset($_POST['user_login']) ? $_POST['user_login'] : '';

    $sql = $koneksi->query("select * from tb_anggota where nip='$nip'");
    // $data = $sql->fetch_assoc();
    $ketemu = $sql->num_rows;
    if ($ketemu >= 1) {
?>
        <script type="text/javascript">
            alert("Gagal Simpan! NIPP tersebut sudah Ada");
            window.location.href = "?page=anggota&aksi=tambah";
        </script>

    <?php
    }

    $sql = $koneksi->query("insert into tb_anggota (nip, nama, password, email, divisi, user_login ) values ('$nip', '$nama', 'Pelindo3', '$email', '$divisi', '$user_login')");

    if ($sql) {
    ?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href = "?page=anggota";
        </script>
<?php
    }
}
?>