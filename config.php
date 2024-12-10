<?php
$db = "escola";
$user = "root";
$pass = "";

try{
    $pdo = new PDO("mysql:host=localhost;dbname=".$db, $user, $pass);
    }catch(PDOException $erro){
        echo "ERRO: ".$erro->getMessage();
        exit;
    }
?>