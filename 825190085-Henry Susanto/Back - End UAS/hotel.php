<!DOCTYPE html>

<?php
  include "includes/config.php";

  if(isset($_POST['Simpan']))
  {
  	if (isset($_REQUEST['inputkode']))
  	{
  		$hotelkode = $_REQUEST['inputkode'];
  	}
 	if (!empty($hotelkode))
 	{
 		$hotelkode = $_POST['inputkode'];
 	}

 	else {
 		die("Anda harus memasukan datanya ");
 	}
     $namahotel = $_POST['inputnama'];
     $kodearea = $_POST['kodearea'];

     mysqli_query($connection,"insert into hotel values('$hotelkode','$namahotel','$kodearea')");
     
     header("location:hotel.php");
  }
  $dataarea = mysqli_query($connection,"select * from area");
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width= , initial-scale=1.0">
	<title>Hotel wisata</title>
  <link rel="stylesheet"  type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>


<?php 
ob_start();
session_start();

if(!isset($_SESSION['emailuser']))
  header("location:login.php");
?>


<?php include"header.php";?>

<div class="container-fluid">
<div class="card shadow mb-4">


<div class="row">
	<div class="col-sm-1">
   
 </div>

 <div class="col-sm-10">
   <div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Input Hotel Wisata</h1>
				</div>
			</div> <!-- penutup jumbotron-->

 <form method="POST">
  
  <div class="form-group row">
    <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode</label>
    <div class="col-sm-10">
      <input type="Text" class="form-control" id="kodedestinasi" name= "inputkode" placeholder="Kode Hotel" maxlength="4">
    </div>
  </div>

  <div class="form-group row">
    <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
    <div class="col-sm-10">
      <input type="Text" class="form-control" id="namadestinasi" name ="inputnama"  placeholder="Nama Hotel">
    </div> 
  </div>

   <div class="form-group row"> <!-- kode area -->
    <label for="refkategori" class="col-sm-2 col-form-label">Area Wisata </label>
  <div class="col-sm-10">
   <select  class="form-control" id="kodearea" name="kodearea">
    
   	<?php  while($row = mysqli_fetch_array($dataarea))
   	{?>
   	<option value="<?php echo $row["areaID"]?>">
   		<?php echo $row["areaID"]?>
   		<?php echo $row["areanama"]?>
   	</option>
   <?php } ?> 
  
   </select>
</div>
  </div>


 <div class="form-group row">
    <div class="col-sm-2">
      
    </div> 
    <div class="col-sm-10">
    <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan">
    
    <input type="reset" class="btn btn-secondary" value="Batal" name="Batal" >
   
  </div>
</div>

</form>
 </div>

<div class="col-sm-1">
   
 </div>

</div> <!-- ini penutup class row -->

	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Daftar Hotel Wisata </h1>
					<h2> Hasil Entry Data Pada Tabel Hotel </h2>
				</div>
			</div> <!-- penutup jumbotron-->

<!-- memulai menampilkan data -->
	<form method="POST">
		<div class="form-group row mb-2">
			<label for="search" class="col-sm-3 ">Nama Hotel</label>
			<div class="col-sm-6">
				<input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Hotel">
			</div>
			<input type="submit" name="kirim" class="col-sm-1 btn-primary" value="search">
		</div>
	</form>

     <table class="table table-hover table-danger ">
     	<thead class="thead-dark">
     		<tr>
     			<th>No</th>
     			<th>Kode</th>
     			<th>Nama Hotel Wisata</th>
     			<th>Kode Area</th>
     			<th>Nama Area</th>

          <th colspan="2" style="text-align: center;">Action</th>
     		</tr>
     	</thead>

     <tbody>

	<?php

    $jumlahtampilan = 3;
    $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
    $mulaitampilan = ($halaman - 1 ) * $jumlahtampilan;


	if(isset($_POST["kirim"]))
	{
		$search = $_POST['search'];
		$query = mysqli_query($connection,"select hotel.*, 
      area.areaID,area.areanama 
			from hotel,area
			where hotelnama like'%".$search."%'
			and hotel.areaID = area.areaID limit $mulaitampilan, $jumlahtampilan");
	}else
	{
	$query = mysqli_query($connection, "select hotel.*,  
    area.areaID,area.areanama 
      from hotel,area
      where hotel.areaID = area.areaID limit $mulaitampilan, $jumlahtampilan");
  }
	$nomor = 1;
 
	while ($row = mysqli_fetch_array($query))
		{?>
			<tr>
				<td><?php echo $mulaitampilan+$nomor; ?></td>
				<td><?php echo $row['hotelID']; ?></td>
				<td><?php echo $row['hotelnama']; ?></td>
				<td><?php echo $row['areaID']; ?></td>
				<td><?php echo $row['areanama']; ?></td>

 <!-- untuk icon edit dan delete -->
     <td>
      <a href="hoteledit.php?ubah=<?php echo $row["hotelID"]?>" 
        class = "btn btn-success btn-sm" title ="EDIT">
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor"   xmlns="http://www.w3.org/2000/svg">
      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </svg>
    </a>
    </td>

      <td>
         <a href="hotelhapus.php?hapus=<?php echo $row["hotelID"]?>" 
        class = "btn btn-danger btn-sm" title="DELETE">
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns    ="http://www.w3.org/2000/svg">
          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
    </svg>
  </a>
      </td>

 <!-- akhir icon edit dan delete -->
		 	</tr>
		 <?php $nomor = $nomor+ 1; ?>	
		<?php } ?>

	</tbody>
     </table>

<?php 
      $query = mysqli_query($connection,"SELECT * FROM hotel");
      $jumlahrecord = mysqli_num_rows($query);
      $jumlahpage = ceil($jumlahrecord/$jumlahtampilan);

     ?>


     <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal=1; 
    echo $nomorhal?>">PERTAMA</a></li>
    <?php for($nomorhal=1; $nomorhal<=$jumlahpage; $nomorhal++)
    {?> 
    <li class="page-item">
      <?php
      if($nomorhal!=$halaman)
        { ?>
      <a class="page-link" href="?page=<?php  echo $nomorhal?>"><?php  echo $nomorhal ?></a>
    <?php } 
    else {?>
    <a class="page-link" href="?page=<?php  echo $nomorhal?>"><?php  echo $nomorhal ?></a>

      <?php }?>
      </li>
  <?php } ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal-1?>">TERAKHIR</a></li>
  </ul>
</nav>


		</div>
		<div class="col-sm-1"></div>
	</div>
<script type="text/javascript" src ="js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#kodearea').select2({
      allowClear : true,
      placeholder: "Pilih Area Wisata"
    });
  });
</script>

</div>
</div>

<?php include"footer.php";?>

<?php 
mysqli_close($connection);
ob_end_flush();
?>
</html>