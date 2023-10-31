<?php

@include 'config/config.php';

if (isset($_POST['cari'] )){
  $page = (isset($_GET['page']))? (int)$_GET['page'] : 1;
  $num_per_page = 2;
  $start_from = ($page-1)*2;
  $pencarian = $_POST['cari'];
  $query = "SELECT * FROM usahamikro WHERE nama_data like '%" .$pencarian. "%'" ;
}else{
$page = (isset($_GET['page']))? (int)$_GET['page'] : 1;
$num_per_page = 5;
$start_from = ($page-1)*5;
$query = "SELECT *FROM usahamikro ORDER BY id_usahamikro DESC limit $start_from,$num_per_page";
}
$sql = mysqli_query($conn, $query);
$no = 0;

?>


<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <title>Usaha Mikro</title>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='input.css'>";
    ?>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/3135239f1a.js" crossorigin="anonymous"></script>
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
            <a href="logout.php" class="text-danger">logout</a>
          </div>
          
          <div id="main">
            <button class="openbtn" onclick="openNav()">☰</button>  
            <a class="navbar-logo">Dis<span>kopumker</span></a>  
          </div>
    </nav>


    <h1> Data Usaha Mikro</h1>

      <div class="pull-right col-2">
        <a href ="tambahusahamikro.php"><i class="fa-solid fa-plus">tambah data</i></a>
      </div>

    <div class ="input-group">
      <label>Search :</label>
      <form action="datausahamikro.php" method="POST">
	      <input type="text" class="form-control rounded" aria-label="Search" aria-describedby="search-addon" name="cari" placeholder="Cari Data" value="<?php if(isset($_POST['cari'])) {echo $_POST['cari']; } ?>"/>
      </form>
    </div><br>
    <div class = "container">
      <table class="table table-striped" border="1" cellpadding="10" cellspacing="0">
          <tr>
            <th width="100" style="text-align:center" >No</th>   
            <th width="250">Nama Data</th>
            <th width="250">Hari/tanggal</th>
            <th width="150">Jenis data</th>
            <th width="150">File</th>
            <th width="80"><i class="fa-solid fa-gear fa-spin" ></i></th>
         </tr>
        <?php
        
          while($result = mysqli_fetch_array($sql)){
        ?>
        <tr>
          <td><center>
            <?php echo $start_from +=1;?>
          </center></td>
          <td><?php echo $result['nama_data']; ?></td>
          <td><?php echo $result['tanggal_hari']; ?></td>
          <td><?php echo $result['id_jenis']; ?></td>
          <td><a href ="berkas/<?php echo $result['file'];?>">Lihat File</a></td>

          <td>
              <a href="tambahusahamikro.php?update=<?php echo $result['id_usahamikro']; ?>" type="botton" class="fa-sharp fa-solid fa-pen"></a>
              <a href="prosesusahamikro.php?hapus=<?php echo $result['id_usahamikro']; ?>" type="botton" class="fa-solid fa-trash class="fa-solid fa-trash style="color: #ff0000;"></a>  
          </td>
        </tr>
        <?php
          }
        ?>  
      </table>

      <?php
      $pr_query = "SELECT *FROM usahamikro";
      $pr_sql = mysqli_query($conn, $pr_query);
      $total_record = mysqli_num_rows($pr_sql);
      
      $total_page = ceil($total_record/$num_per_page);

      if($page>1){
        echo "<a href='datausahamikro.php?page=".($page-1)."' class = 'btn btn-danger'>Previous</a>";
      }

      for($i=1; $i<$total_page;$i++){

        echo "<a href='datausahamikro.php?page=".$i."' class = 'btn btn-primary'>$i</a>";
      }

      if($i>$page){
        echo "<a href='datausahamikro.php?page=".($page+1)."' class = 'btn btn-danger'>Next</a>";
      }

      ?>



    </div>
<script src="jss/sidebar.js"></script>

</body>
</html>
