<?php
@include 'config/config.php';

if (isset($_POST['cari'] )){
    $page = (isset($_GET['page']))? (int)$_GET['page'] : 1;
    $num_per_page = 2;
    $start_from = ($page-1)*2;
    $pencarian = $_POST['cari'];
    $query = "SELECT * FROM koperasi WHERE nama_data like '%" .$pencarian. "%'" ;
  }else{
  $page = (isset($_GET['page']))? (int)$_GET['page'] : 1;
  $num_per_page = 50;
  $start_from = ($page-1)*50;
  $query = "SELECT *FROM koperasi ORDER BY id_datakoperasi DESC limit $start_from,$num_per_page";
  }
$sql = mysqli_query($conn, $query);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <title>Data Koperasi</title>
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
            <a href="userseluruhdata.php">Data Seluruh</a>
            </div>
            <a href="logout.php" class="text-danger">logout</a>
          </div>
          
          <div id="main">
            <button class="openbtn" onclick="openNav()">☰</button> 
            <a class="navbar-logo">Dis<span>kopumker</span></a>  
          </div>
    </nav>


    <h1> Data Koperasi</h1><br>
    <div class ="input-group">
      <label>Search :</label>
      <form action="userkop.php" method="POST">
	      <input type="text" class="form-control rounded" aria-label="Search" aria-describedby="search-addon" name="cari" placeholder="Cari Data" value="<?php if(isset($_POST['cari'])) {echo $_POST['cari']; } ?>"/>
      </form>
    </div><br>
    <div class = "container">
      <table class="table table-striped">
          <tr>
            <th width="10" style="text-align:center">No</th>
            <th width="100">Nama Data</th>
            <th width="50"><i class="fa-solid fa-gear fa-spin" ></i></th>
          </tr>
        <?php
          while($result = mysqli_fetch_assoc($sql)){
        ?>
        <tr>
          <td><center>
            <?php echo ++$no;?>
            </center></td>
            <td><?php echo $result['nama_data']; ?></td>
          </td>

          <td>
            <button type = "button" class = "btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalViewData<?php echo $result['id_datakoperasi']?>">
            Detail Data
            </button>
          
<!-- Modal view -->
<div class="modal fade" id="ModalViewData<?php echo $result['id_datakoperasi']?>" tabindex="-1" aria-labelledby="ModalViewDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-white" id="ModalViewDataLabel">Detail Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class = "row">
          <div class =" col-sm-4">
          Nama Data <br/>
          Tanggal & Hari <br/>
          jenis <br/>
          File <br/>
          </div>

          <div class =" col-sm-8">
          : <?php echo $result['nama_data']; ?><br/>
          : <?php echo $result['tanggal_hari']; ?><br/>
          : <?php echo $result['id_jenis']; ?><br/>
          : <a href ="berkas/<?php echo $result['file'];?>">Lihat File</a><br/>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end Model View -->
          </td>
        </tr>
        <?php
          }
        ?>
        
      </table>
    </div>
<script src="jss/sidebar.js"></script>

</body>
</html>
