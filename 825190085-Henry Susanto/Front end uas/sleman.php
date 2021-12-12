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
          <h1> Berita Wisata</h1>
  <li class="media">
    <img class="mr-3" src="images/wisata1.jpg" alt="Generic placeholder image">
    <div class="media-body">
      <h5 class="mt-0 mb-1">8 Tempat Wisata di sleman yang instagramable dan cocok untu Liburan Keluarga</h5>
     <p>Tempat wisata di sleman cocok buat kamu yang ingin mendapatkan suasana dan foto yang indah 

      <p>Liputan6.com, Jakarta Tempat wisata di Sleman sebagai wilayah utara Daerah Istimewa Yogyakarta bisa menjadi alternatif liburan yang dekat dari kota. Walaupun tidak memiliki daerah pantai seperti di wilayah selatan yaitu Gunung Kidul dan Bantul, Sleman menawarkan keelokan Gunung Merapi.

Selain itu, banyak juga tempat wisata di Sleman yang menawarkan keindahan candi-candi peninggalan masa lalu. Termasuk salah satunya adalah candi yang sudah sangat mendunia, yaitu Candi Prambanan. Letak tempat wisata di Sleman ini pun tidak terlalu jauh dari Kota Jogja. Tempat wisata di Sleman cocok buat kamu yang ingin mendapatkan suasana dan foto yang indah. Jika Gunungkidul terkenal dengan beragam pantai yang memiliki keindahan masing-masing, Sleman terkenal dengan beragam destinasi untuk berfoto.

Berikut Liputan6.com rangkum tentang tempat wisata di Sleman dari berbagai sumber, Kamis (17/10/2019).</p>

<h3>Source : Liputan6.com</h3>
    </div>
  </li>
  



      </div>
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