<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title?></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <?php 
    session_start();
    if(empty($_SESSION['id_user'])){
        header('location: ../halaman-login.php');
    }
    ?>
  </head>

  <body> 
    <div class="container">