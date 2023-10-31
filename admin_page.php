<?php

@include 'config/config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <title>admin page</title>
    <link rel="stylesheet" href="css/admin.css"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>

<body>
   
<nav class="navbar">

        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
            <button class="dropdown-btn">Data Dinas
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
              <a href="dataperencanaan.php">Umpeg</a>
              <a href="datakeuangan.php">Keuangan</a>
              <a href="datakoperasi.php">koperasi</a>
              <a href="datausahamikro.php">Usaha Mikro</a>
              <a href="datatenagakerja.php">Pembinaan kerja</a>
              <a href="datahubunganindustial.php">Hubungan industrial</a>
              <a href="dataseluruh.php">Data seluruh</a>
              
            </div>
            <a href="jenis_data.php">Jenis data</a>
            <a href="logout.php" class="btn-danger">logout</a>
          </div>

          <div id="main">
            <button class="openbtn" onclick="openNav()">☰</button>  
            <a class="navbar-logo">Dis<span>kopumker</span></a>  
          </div>

    </nav>

            <div class="text">
            <div class="position-absolute top-50 start-50 translate-middle"><h2 style="font-size: 50px">SELAMAT DATANG</h2></div>
          </div>

<script src="jss/sidebar.js"></script>



</body>
</html>