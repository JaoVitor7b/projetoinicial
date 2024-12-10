<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maria Santana admin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="website icon" type="png" href="../admin/imagens/logosm.png">
    <link rel="website icon" type="png" href="../admin/imagens/logosm.png">
</head>
<body>
    <?php include 'menu.php';?>


   <div class="row justify-content-around">
      <div class="text-dark text-center p-5 mb-4 ">
        <img src="../admin/imagens/logosm.png" width="400" height="400">
        </div>
    </div>
    <script src="../assets/javascript/bootstrap.bundle.min.js"></script>
</body>
</html>