<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html
<html>
<head>
    <title>Database</title>
    <link rel="stylesheet" href="css/user.css"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>

    <nav class="navbar">
        <a href="#" class="navbar-logo">Dis<span>kopumker</span></a>

        <ul>
            <li>
                <a href="#">data</a>
                <ul class="dropdown">
                    <li><a href="userperen.php">perencanaan</a></li>
                </ul>
            </li>

            <li><a href="#">gallery</a></li>
            <li><a href="logout.php" class="btn">logout</a></li>

        </ul>    

    </nav>

    <div class="text">
        <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1><br>
        <br Dinas Koperasi<br>
        Data Usaha Mikro daan Tenaga Kerja<br>
        Kota Banjarmasin
        
    </div>



    <script src="../jss/sidebar.js"></script>
 
</body>

</html>