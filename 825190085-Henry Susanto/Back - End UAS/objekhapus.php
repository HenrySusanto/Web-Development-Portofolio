<?php
	include "includes/config.php";

	if(isset($_GET['hapus']))
	{
		$kodeob = $_GET["hapus"];
		mysqli_query($connection,"DELETE FROM objekwisata
			WHERE objekID = '$kodeob'");
		echo "<script>alert('DATA BERHASIL DIHAPUS');
			document.location ='objekwisata.php'</script>";
	}
?>
