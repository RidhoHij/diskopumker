<?php
    include 'config/config.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            
            $nama_data = $_POST['nama_data'];
            $tanggal_hari = $_POST['tanggal_hari'];
            $id_jenis = $_POST['id_jenis'];
            $file_name= $_FILES['file']['name'];

            $query = "INSERT INTO usahamikro VALUES(null, '$nama_data', '$tanggal_hari', '$id_jenis', '$file_name')";
            $sql = mysqli_query($conn, $query);

            $direktori = "berkas/";
            move_uploaded_file($_FILES['file']['tmp_name'],$direktori.$file_name);


            if($sql){
                header("location: datausahamikro.php");
            } else {
                echo $query;
            }
            
            
        } else if ($_POST['aksi'] == "edit"){
            echo "Edit data";
            //var_dump($_POST);
            $id_usahamikro = $_POST['id_usahamikro'];
            $nama_data = $_POST['nama_data'];
            $tanggal_hari = $_POST['tanggal_hari'];
            $id_jenis = $_POST['id_jenis'];
            $file_name= $_FILES['file']['name'];

            $query = "UPDATE usahamikro SET nama_data='$nama_data', tanggal_hari='$tanggal_hari', id_jenis='$id_jenis', file='$file_name' WHERE id_usahamikro='$id_usahamikro';";
            $sql =mysqli_query($conn, $query);

            $direktori = "berkas/";
            move_uploaded_file($_FILES['file']['tmp_name'],$direktori.$file_name);

            if($sql){
                header("location: datausahamikro.php");
            } else {
                echo $query;
            }
        }
    }

    if(isset($_GET['hapus'])){
        $id_usahamikro=$_GET['hapus'];
        $query = "DELETE FROM usahamikro WHERE id_usahamikro ='$id_usahamikro';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: datausahamikro.php");
        } else {
            echo $query;
        }
    }
    
    
?>
