<?php

$id = $_GET['id'];

$koneksi->query("delete from tb_barang_masuk where id ='$id'");

?>


<script type="text/javascript">
    window.location.href = "?page=barangmasuk";
</script>