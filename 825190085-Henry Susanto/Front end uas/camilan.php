<!doctype html>
<?php 
 include "includes/config.php";
 $query = mysqli_query($connection,"SELECT * FROM area");
 $query1 = mysqli_query($connection,"SELECT * FROM objekwisata");
 $query2 = mysqli_query($connection,"SELECT * FROM hotel");
 $query3 = mysqli_query($connection,"SELECT * FROM restoran");

 $destinasi = mysqli_query($connection,"SELECT * FROM kategori,destinasi,fotodestinasi
  WHERE kategori.kategoriID = destinasi.kategoriID 
  AND destinasi.destinasiID = fotodestinasi.destinasiID");

 $sql = mysqli_query($connection,"SELECT * FROM destinasi");
 $jumlah = mysqli_num_rows($sql);


$sql1 = mysqli_query($connection,"SELECT * FROM hotel");
$jumlah1 = mysqli_num_rows($sql1);


$sql2 = mysqli_query($connection,"SELECT * FROM objekwisata");
$jumlah2 = mysqli_num_rows($sql2);

  $foto = mysqli_query($connection,"SELECT * FROM fotodestinasi");
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">


    <title>User Interface</title>
  </head>
  <body>
  
  <!--untuk membuat menu-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="frontend.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Area
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php if(mysqli_num_rows($query) >0){
          while ($row = mysqli_fetch_array($query))
            { ?>
          <a class="dropdown-item" href="#"><?php echo $row["areanama"]?></a>
       <?php } } ?>
        </div>
      </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Objek Wisata
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php if(mysqli_num_rows($query1) >0){
          while ($row = mysqli_fetch_array($query1))
            { ?>
          <a class="dropdown-item" href="#"><?php echo $row["objeknama"]?></a>
       <?php } } ?>
         

        </div>
      </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Hotel 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php if(mysqli_num_rows($query2) >0){
          while ($row = mysqli_fetch_array($query2))
            { ?>
          <a class="dropdown-item" href="#"><?php echo $row["hotelnama"]?></a>
       <?php } } ?>
         

        </div>
      </li>

     </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Restoran 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        <?php if(mysqli_num_rows($query3) >0){
          while ($row = mysqli_fetch_array($query3))
            { ?>
          <a class="dropdown-item" href="#"><?php echo $row["restonama"]?></a>
       <?php } } ?>
         

        </div>
      </li>
 </nav>


  <!-- akhir menu -->

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
      <div class="carousel-caption d-none d-md-block">
        <h1>Pemandangan Gunung</h1>
        <p>Gunung yang berada di Benua Eropa</p>
      </div>
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
     <div class="col-sm-8" style="background-color:#f8f1f1">

  <?php if(mysqli_num_rows($destinasi) > 0){
    while($row2 = mysqli_fetch_array($destinasi))
  { ?>    
      <div class="media">
  <div class="media-body">
    <h4 class="mt-0 mb-1"><?php echo $row2["destinasinama"]?></h4>
    <h5><?php echo $row2["destinasialamat"]?></h5>
    <p><?php echo $row2["kategoriketerangan"]?></p>
  </div>
  <img class="ml-3" style="width: 200px; height: 100%;" src="images/<?php echo $row2["fotofile"]?>" alt="Gambar Tidak Ada" >
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
  Hotel
    <span class="badge badge-primary badge-pill"><?php echo $jumlah1?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   Objek Wisata
    <span class="badge badge-primary badge-pill"><?php echo $jumlah2?></span>
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

<div class="container1">
    <div class="row">
      <div class="col-sm-8">
        <ul class="list-unstyled">
        <div class="kiri">

  <li class="media">
    <img class="mr-3" src="images/gambarberita2.jpg" alt="Generic placeholder image" >
    <div class="media-body">
      <h5 class="mt-0 mb-1">Perkenalkan Camilan Baru dari Sleman,Onde-Onde ikan Nila</h5>
     <p> Onde-Onde ikan Nila menjadi jajanan oleh-oleh baru bagi wisatawan yang sedang berkunjung ke Sleman</p>

     <p>Liputan6.com, Jakarta Apa jadinya jika onde-onde yang manis dipadukan dengan gurihnya ikan nila? Di Desa Somokaton, Margokaton, Seyegan, Sleman, Onde-onde ikan nila menjadi oleh khas yang banyak diburu wisatawan yang penasaran. Novianti, pencipta Onde-onde ikan nila kepada Liputan6.com beberapa waktu lalu mengatakan, ide awal pembuatan kuliner unik ini untuk menyiasati anak-anak yang masih susah makan ikan. Padahal protein dalam ikan sangat berguna dalam masa pertumbuhan anak.

“Dengan Onde-onde ini mereka bisa nyemil dan mendapat gizinya. Ya sekaligus ingin mendukung program Ibu Susi (Menteri Kelautan dan Perikanan)," ungkap Novianti.

Jajanan khas Majokerto dipadu dengan ikan nila ini baru dibuat 2016 lalu. Saat bahan baku ikan nila di daerahnya melimpah karena banyak warga kampung sebelah berprofesi sebagai petani ikan terutama Nila.

  Learn more
"Bahan baku banyak, biasanya kan hanya di goreng atau di bakar, nah saya kepikiran membuat produk yang berbeda. Terus muncul ide membuat jajanan Onde-onde Nila ini," tuturnya.

 </p>

 <p>Tanpa Pengawet
Menurut Novinati bahan yang digunakan membuat onde-onde sama halnya onde-onde pada umumnya hanya ditambah ikan nila. Bahan-bahannya antara lain tepung, mentega, gula, telur, vanili, wijen, baking powder dan ikan nila.

"Tidak ada pengawet dan pemanis buatan. Semua ini alami. Aman," ujarnya.

Onde-onde Ikan Nila berawal saat ia membagikan onde onde bikinannya ke tetangga sekitar. Semua tetangganya mengaku onde-onde buatannya enak dan memberanikan diri ikut pameran kuliner.

"Saya ikutkan pameran kuliner di Sleman dan ternyata banyak yang suka. Banyak orang yang datang ke pameran langsung order, terus sekarang produksi setiap hari," katanya.

 

</p>

<h3>Source : Liputan6.com</h3>
    </div>
  </li>
</ul>

</div>


  </div>
 <!-- end galeri-->

<footer style=" width: 1200px;
  background-color: #f8f1f1;
  padding: 25px;
  margin: auto;
  text-align: center;
  margin-top: -15px;">
  <p>Copyright WEBDEV &copy;2020</p>
</footer>


 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>