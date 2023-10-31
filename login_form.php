<?php

@include 'config/config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);


   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'bdgperen'){

         $_SESSION['user_name'] = $row['bdgperen'];
         header('location:userperen.php');

      }elseif($row['user_type'] == 'bdguang'){

         $_SESSION['user_name'] = $row['bdguang'];
         header('location:useruang.php');

      }elseif($row['user_type'] == 'bdgkoperasi'){

         $_SESSION['user_name'] = $row['bdgkoperasi'];
         header('location:userkop.php');
         
      }elseif($row['user_type'] == 'bdgpembinaankerja'){

         $_SESSION['user_name'] = $row['bdgpembinaankerja'];
         header('location:userpembinaankerja.php');
         
      }elseif($row['user_type'] == 'bdgusahamikro'){

         $_SESSION['user_name'] = $row['bdgusahamikro'];
         header('location:userusahamikro.php');
         
      }elseif($row['user_type'] == 'bdghubungindus'){

         $_SESSION['user_name'] = $row['bdghubungindus'];
         header('location:userhubungindus.php');
         
      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>