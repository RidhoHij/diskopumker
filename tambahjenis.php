<!DOCTYPE html>

<?php
  include 'config/config.php';

    $id_jenis = '' ;
    $jenis_data = '' ;

  if(isset($_GET['update'])){
    $id_jenis = $_GET['update'];
    
    $query ="SELECT * FROM jenisdata WHERE id_jenis = '$id_jenis';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $jenis_data = $result['jenis_data'];

    //var_dump($result);

    //die();
  }
?>
<html lang="en">
<head>
<head>
    <title>Perencanaan</title>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='css/drr.css'>";
    ?>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/3135239f1a.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
            </div>
            <a href="jenis_data.php">Jenis data</a>
            <a href="logout.php" class="text-danger">logout</a>
        </div>
          
          <div id="main">
            <button class="openbtn" onclick="openNav()">☰</button>
            <a class="navbar-logo">Dis<span>kopumker</span></a>  
          </div>
        
    </nav>


  <h1>Tambah Jenis Data</h1>
  <br>
  <div class = "container">
    <form action="prosesjenis.php" method="post">
      <input type= "hidden" value="<?php echo $id_jenis; ?>" name="id_jenis">
      <div class="form-group">
		    <label>Jenis Data</label>
		    <input type="text" class="form-control" name="jenis_data" id="jenis" placeholder="Contoh form text ..." value="<?php echo $jenis_data; ?>">
	    </div>
 
    <br>
      <div class="form-group">
        <div class="col-sm-12 mb-3 mb-sm-0">
          <?php
            if(isset($_GET['update'])){
          ?>
          <button type="submit" class ="btn btn-success" name="aksi" value="edit">
          <i class="fa fa-save"></i> Simpan perubahan</button>
          <?php
            } else{
          ?>
          <button type="submit" class ="btn btn-success" name="aksi" value="add">
          <i class="fa fa-save"></i> Tambahkan</button>
          <?php
            }
          ?>
        </div>
      </div>
    </form>
  </div>
    

<script src="jss/sidebar.js"></script>

</body>
</html>