<!DOCTYPE html>

<?php
  include "includes/config.php";

  if(isset($_POST['RegisterAccount']))
  {
    if (isset($_REQUEST['inputkode']))
    {
      $adminkode = $_REQUEST['inputkode'];
    }
  if (!empty($adminkode))
  {
    $adminkode = $_POST['inputkode'];
  }

  else {
    ?> <h1>Anda harus mengisi data </h1> <?php
    die("Anda harus memasukan datanya ");
  }
     $adminnama = $_POST['inputnama'];
     $adminemail = $_POST['inputemail'];
     $adminpassword = $_POST['inputpass'];

     mysqli_query($connection,"insert into admin values('$adminkode',' $adminnama','$adminemail','$adminpassword')");
     
     header("location:login.php");
  }
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" class="user">
                                    <div class="form-group row">
                                <div class="col-sm-10 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                           name= "inputkode" placeholder="Admin ID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                           name ="inputnama"   placeholder=" Masukan Nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="inputemail" 
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user " name="inputpass" 
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    
                                </div>

                                <input type="submit" name="RegisterAccount" class="btn btn-primary btn-user btn-block" value="Register Account" >
                        

                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Daftar Nama register </h1>
                    <h2> Hasil Entry Data Pada Tabel admin </h2>
                </div>
            </div> <!-- penutup jumbotron-->

<!-- memulai menampilkan data -->
    <form method="POST">
        <div class="form-group row mb-2">
            <label for="search" class="col-sm-3 ">Nama admin</label>
            <div class="col-sm-6">
                <input type="text" name="search" class="form-control" id="search" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>" placeholder="Cari Nama admin">
            </div>
            <input type="submit" name="kirim" class="col-sm-1 btn-primary" value="search">
        </div>
    </form>

     <table class="table table-hover table-danger ">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama admin</th>
                <th>Email Admin</th>
                <th>Password Admin</th>
          <th colspan="2" style="text-align: center;">Action</th>
            </tr>
        </thead>

     <tbody>

    <?php
    if(isset($_POST["kirim"]))
    {
        $search = $_POST['search'];
        $query = mysqli_query($connection,"select admin.*, 
            admin.adminID,admin.adminnama
            from admin
            where adminnama like'%".$search."%'");
    }else
    {
    $query = mysqli_query($connection, "select admin.*, 
            admin.adminID,admin.adminnama
            from admin
            ");

  }
    $nomor = 1;
 
    while ($row = mysqli_fetch_array($query))
        {?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $row['adminID']; ?></td>
                <td><?php echo $row['adminNAMA']; ?></td>
                <td><?php echo $row['adminEMAIL']; ?></td>
                <td><?php echo $row['adminPASSWORD']; ?></td>

 <!-- untuk icon edit dan delete -->
     <td>
      <a href="adminedit.php?ubah=<?php echo $row["adminID"]?>" 
        class = "btn btn-success btn-sm" title ="EDIT">
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor"   xmlns="http://www.w3.org/2000/svg">
      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </svg>
    </a>
    </td>

      <td>
         <a href="adminhapus.php?hapus=<?php echo $row["adminID"]?>" 
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>