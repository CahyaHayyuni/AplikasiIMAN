<?php

$id = $_GET['id'];

$koneksi->query("delete from tb_ekspedisi where id ='$id'");

?>


<script type="text/javascript">
    window.location.href = "?page=ekspedisi";
</script>