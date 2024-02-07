<?php

$id_mk = $_GET['id_mk'];

// Delete
$delete = $con->prepare("DELETE FROM daftar_mk WHERE id_mk = ?");
$delete->bindParam(1, $id_mk); 
$delete->execute();

// Redirect setelah menghapus
echo "<script>
        alert('Data Berhasil dihapus');
        window.location.href = 'index.php?halaman=daftar_mk';
</script>";
?>