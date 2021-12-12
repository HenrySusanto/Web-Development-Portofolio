<?php
	include "includes/config.php";

	if(isset($_GET['hapus']))
	{
		$kodeadmin = $_GET["hapus"];
		mysqli_query($connection,"DELETE FROM admin
			WHERE adminID = '$kodeadmin'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location ='registersementata.php'</script>";
	}
?>