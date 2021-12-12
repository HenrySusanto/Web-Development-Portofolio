<!doctype html>
<?php 
 include "includes/config.php";
 $query = mysqli_query($connection,"SELECT * FROM area");

 $destinasi = mysqli_query($connection,"SELECT * FROM kategori,destinasi,fotodestinasi
  WHERE kategori.kategoriID = destinasi.kategoriID 
  AND destinasi.destinasiID = fotodestinasi.destinasiID");

 $sql = mysqli_query($connection,"SELECT * FROM destinasi");
 $jumlah = mysqli_num_rows($sql);

  $foto = mysqli_query($connection,"SELECT * FROM fotodestinasi");
?>

<html lang="en">
  <head>

<?php 
ob_start();
session_start();

if(!isset($_SESSION['emailuser']))
  header("location:login.php");
?>


<?php include"header.php";?>

<div class="container-fluid">
<div class="card shadow mb-4">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>WISATA</title>
  </head>
 
  <!-- SLIDER-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/gunungfuji.jpg" alt="First slide">

      <div class="carousel-caption d-none d-md-block">
        <h1>Gunung Fuji</h1>
        <p>Gunung yang berada di Negara Jepang</p>
      </div>

    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/gunug.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/siluet.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <!-- akhir slider -->

 <!-- membuat tampilan obyek -->
 <div class="container">
   <div class="row">
     <div class="col-sm-8">

  <?php if(mysqli_num_rows($destinasi) > 0){
    while($row2 = mysqli_fetch_array($destinasi))
  { ?>    
      <div class="media">
  <div class="media-body">
    <h4 class="mt-0 mb-1"><?php echo $row2["destinasinama"]?></h4>
    <h5><?php echo $row2["destinasialamat"]?></h5>
    <p><?php echo $row2["kategoriketerangan"]?></p>
  </div>
  <img class="ml-3" style="width: 200px; height: 100%;" src="images/<?php echo $row2["fotofile"]?>" alt="Gambar Tidak Ada">
</div> 
<?php } } ?>
     </div>
     <div class="col-sm-4">
       <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Jumlah Obyek Wisata 
    <span class="badge badge-primary badge-pill"><?php echo $jumlah?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Dapibus ac facilisis in
    <span class="badge badge-primary badge-pill">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Morbi leo risus
    <span class="badge badge-primary badge-pill">1</span>
  </li>
</ul>
     </div>
   </div>
 </div>
 <!-- end obyek -->

<div class="container">
<div class="row">

<?php while($row3 = mysqli_fetch_array($foto))
{ ?>


<div class="col-sm-4">
 <!-- galeri -->
<figure class="figure">
  <img src="images/<?php echo $row3["fotofile"]?>" class="figure-img img-fluid rounded" alt="Foto Tidak ADA placeholder image with rounded corners in a figure.">
  <figcaption class="figure-caption text-right"><?php echo $row3["fotonama"] ?></figcaption>
</figure>
</div>
<?php } ?>
</div>
</div>
 <!-- end galeri-->

 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </div>
</div>

<?php include"footer.php";?>

<?php 
mysqli_close($connection);
ob_end_flush();

?>

</html>