<!DOCTYPE html>

<?php
  include "includes/config.php";

  if(isset($_POST['Edit']))
  {
  	if (isset($_REQUEST['inputkode']))
  	{
  		$objekkode = $_REQUEST['inputkode'];
  	}
 	if (!empty($objekkode))
 	{
 		$objekkode = $_POST['inputkode'];
 	}

 	else {
 		die("Anda harus memasukan datanya ");
 	}
     $namaobjek = $_POST['inputnama'];
     $kodeobjek = $_POST['kodearea'];

    /* mysqli_query($connection,"insert into hotel values('$hotelkode','$namahotel','$kodearea')");
     */

    mysqli_query($connection,"update objekwisata set objeknama='$namaobjek',areaID='$kodeobjek'
      WHERE objekID = '$objekkode'");
     header("location:objekwisata.php");
  }
  $dataarea = mysqli_query($connection,"select * from area");


  // untuk menampilkan data pada form edit 
   $kodeob = $_GET["ubah"];
   $editobjek = mysqli_query($connection,"SELECT * FROM objekwisata WHERE objekID = '$kodeob'");
   $rowedit = mysqli_fetch_array($editobjek);

   $editarea = mysqli_query($connection,"SELECT * FROM objekwisata,area
    WHERE objekID = '$kodeob' and objekwisata.areaID = area.areaID");
   $rowedit3 = mysqli_fetch_array($editarea)


?>

<html lang="en">
<head>
   <?php include"header.php";?>

<div class="container-fluid">
<div class="card shadow mb-4">
	<meta charset="UTF-8">
	<meta name="viewport" content="width= , initial-scale=1.0">
	<title>Objek wisata</title>
  <link rel="stylesheet"  type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>


<div class="row">
	<div class="col-sm-1">
   
 </div>

 <div class="col-sm-10">
   <div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-4">Input Objek Wisata</h1>
				</div>
			</div> <!-- penutup jumbotron-->

 <form method="POST">
  
  <div class="form-group row">
    <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode</label>
    <div class="col-sm-10">
      <input type="Text" class="form-control" id="kodedestinasi" name= "inputkode" value="<?php echo 
      $rowedit["objekID"]?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Objek Wisata</label>
    <div class="col-sm-10">
      <input type="Text" class="form-control" id="namadestinasi" name ="inputnama"  value="<?php echo 
      $rowedit["objeknama"]?>">
    </div> 
  </div>

   <div class="form-group row"> <!-- kode area -->
    <label for="refkategori" class="col-sm-2 col-form-label">Area Wisata </label>
  <div class="col-sm-10">
   <select  class="form-control" id="kodearea" name="kodearea">
    <option value="<?php echo $rowedit["areaID"]?>"><?php echo $rowedit['areaID'] ?> <?php echo $rowedit3['areanama']?></option>
 
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
    <input type="submit" class="btn btn-primary" value="Edit" name="Edit">
    
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
					<h1 class="display-4">Daftar Objek Wisata </h1>
					<h2> Hasil Entry Data Pada Tabel Objek Wisata </h2>
				</div>
			</div> <!-- penutup jumbotron-->

<!-- memulai menampilkan data -->
	<form method="POST">
		<div class="form-group row mb-2">
			<label for="search" class="col-sm-3 ">Nama Objek Wisata</label>
			<div class="col-sm-6">
				<input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama Objek Wisata">
			</div>
			<input type="submit" name="kirim" class="col-sm-1 btn-primary" value="search">
		</div>
	</form>

     <table class="table table-hover table-danger ">
     	<thead class="thead-dark">
     		<tr>
     			<th>No</th>
     			<th>Kode</th>
     			<th>Nama Objek Wisata</th>
     			<th>Kode Area</th>
     			<th>Nama Area</th>

          <th colspan="2" style="text-align: center;">Action</th>
     		</tr>
     	</thead>

     <tbody>

	<?php
	if(isset($_POST["kirim"]))
	{
		$search = $_POST['search'];
		$query = mysqli_query($connection,"select objekwisata.*, 
      area.areaID,area.areanama 
			from objekwisata,area
			where objeknama like'%".$search."%'
			and objekwisata.areaID = area.areaID");
	}else
	{
	$query = mysqli_query($connection, "select objekwisata.*,  
    area.areaID,area.areanama 
      from objekwisata,area
      where objekwisata.areaID = area.areaID");
  }
	$nomor = 1;
 
	while ($row = mysqli_fetch_array($query))
		{?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $row['objekID']; ?></td>
				<td><?php echo $row['objeknama']; ?></td>
				<td><?php echo $row['areaID']; ?></td>
				<td><?php echo $row['areanama']; ?></td>

 <!-- untuk icon edit dan delete -->
     <td>
      <a href="objekedit.php?ubah=<?php echo $row["objekID"]?>" 
        class = "btn btn-success btn-sm" title ="EDIT">
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor"   xmlns="http://www.w3.org/2000/svg">
      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </svg>
    </a>
    </td>

      <td>
         <a href="objekhapus.php?hapus=<?php echo $row["objekID"]?>" 
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
</body>
</div>
</div>
<?php include"footer.php";?>
</html>