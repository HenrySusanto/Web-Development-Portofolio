<?php
	include "includes/config.php";

	if(isset($_GET['hapus']))
	{
		$kategorikode = $_GET["hapus"];
		mysqli_query($connection,"DELETE FROM kategori
			WHERE kategoriID = '$kategorikode'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location ='inputoutput.php'</script>";
	}
?>