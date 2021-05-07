<?php
$nip = $_GET['id'];
$sql = $koneksi->query("select * from tb_anggota where nip = '$nip'");
$tampil = $sql->fetch_assoc();
$divisi = $tampil['divisi'];
$user_login = $tampil['user_login'];
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">

                <form method="POST">
                    <div class="form-group">
                        <label>NIPP</label>
                        <input class="form-control" name="nip" value="<?php echo $tampil['nip'] ?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" value="<?php echo $tampil['nama'] ?>" />
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" value="<?php echo $tampil['password'] ?>" />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="<?php echo $tampil['email'] ?>" />
                    </div>

                    <div class="form-group">
                        <label>User Login</label>
                        <select class="form-control" name="user_login">
                            <option value="notuser" <?php if ($user_login == 'notuser') {
                                                        echo "selected";
                                                    } ?>>Not User Login</option>
                            <option value="user" <?php if ($user_login == 'user') {
                                                        echo "selected";
                                                    } ?>>User</option>
                            <option value="admin" <?php if ($user_login == 'admin') {
                                                        echo "selected";
                                                    } ?>>Admin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Divisi</label>
                        <select class="form-control" name="divisi">
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
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php

$nip = isset($_POST['nip']) ? $_POST['nip'] : '';
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$divisi = isset($_POST['divisi']) ? $_POST['divisi'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$user_login = isset($_POST['user_login']) ? $_POST['user_login'] : '';

$simpan = isset($_POST['simpan']) ? $_POST['simpan'] : '';

//echo $simpan;
if ($simpan) {

    $sql = $koneksi->query("update tb_anggota set nama='$nama', password='$password', user_login='$user_login', divisi='$divisi', email='$email' where nip='$nip'");

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