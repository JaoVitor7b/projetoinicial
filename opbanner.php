<?php
include 'config.php';

if($_FILES['file_foto']['size'] != 0){
    $foto = $_FILES['file_foto']['name'];
    $foto = str_replace(" ", "", $foto);
    $foto_temp = $_FILES['file_foto']['tmp_name'];
    $destino = "imagens/".$foto;   
}

if(isset($_GET['acao']) && $_GET['acao'] == "cadastrar"){
    if(move_uploaded_file($foto_temp, $destino)){
        $insert = $pdo->prepare("INSERT INTO banner (foto) VALUES (?)");
        $insert->bindValue(1, $foto);
        $insert->execute();

        header("Location:pgbanner.php");
    }
}

if(isset($_GET['acao']) && $_GET['acao'] == "excluir"){
    $id = $_GET['id'];
    $foto = $_GET['foto'];

    $del = $pdo->prepare("DELETE FROM banner WHERE idbanner = ?");
    $del->bindValue(1, $id);
    $del->execute();
    unlink('imagens/'.$foto);
    header('Location:pgbanner.php');
}

if(isset($_GET['acao']) && $_GET['acao'] == "editar"){
    $id = $_GET['id'];
    $fotodb = $_GET['foto'];

    if($_FILES['file_foto']['size'] == 0){
        header("Location:pgbanner.php");
    }else{
        unlink('imagens/'.$fotodb);
        if(move_uploaded_file($foto_temp, $destino)){
            $edit = $pdo->prepare("UPDATE banner SET foto = ? WHERE idbanner = ?");
            $edit->bindValue(1, $foto);
            $edit->bindValue(2, $id);
            $edit->execute();
    
            header("Location:pgbanner.php");
        }
    }
}

?>