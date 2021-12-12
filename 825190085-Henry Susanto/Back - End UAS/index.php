<!DOCTYPE html>

<?php 
ob_start();
session_start();
if(!isset($_SESSION['emailuser']))
	header("location:login.php");
?>

 <?php include "includes/config.php";?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Project Akhir Uas</title>
</head>
<body>

	<?php include"header.php";?>

<div class="container-fluid">
<div class="card shadow mb-4">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">DASHBOARD ADMIN</h1>
		</div>
	</div>

</div>
</div>
	<?php include "footer.php";?>
	
</body>
<?php 
mysqli_close($connection);
ob_end_flush();
?>
</html>