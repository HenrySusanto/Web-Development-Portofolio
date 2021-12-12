<?php
	include "includes/config.php";

	if(isset($_GET['hapus']))
	{
		$koderesto = $_GET["hapus"];
		mysqli_query($connection,"DELETE FROM restoran
			WHERE restoID = '$koderesto'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location ='resto.php'</script>";
	}
?>