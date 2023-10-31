//keuangan
<?php
    include 'config/config.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            
            $jenis_data = $_POST['jenis_data'];

            $query = "INSERT INTO jenisdata VALUES(null, '$jenis_data')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: jenis_data.php");
            } else {
                echo $query;
            }
            
            
        } else if ($_POST['aksi'] == "edit"){
            echo "Edit data";
            //var_dump($_POST);
            $id_jenis = $_POST['id_jenis'];
            $jenis_data = $_POST['jenis_data'];

            $query = "UPDATE jenisdata SET jenis_data='$jenis_data' WHERE id_jenis='$id_jenis';";
            $sql =mysqli_query($conn, $query);

            if($sql){
                header("location: jenis_Data.php");
            } else {
                echo $query;
            }
        }
    }

    if(isset($_GET['hapus'])){
        $id_jenis=$_GET['hapus'];
        $query = "DELETE FROM jenisdata WHERE id_jenis ='$id_jenis';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: jenis_data.php");
        } else {
            echo $query;
        }
    }
?>