<?php
include 'config.php';

if(!empty($_POST['txt_eixo'])){
    $nome = $_POST['txt_eixo'];
    $foto = $_FILES['file_foto']['name'];
    $foto = str_replace(" ", "", $foto);
    $foto_temp = $_FILES['file_foto']['tmp_name'];
    $destino = "imagens/".$foto;   
}

if(isset($_GET['acao']) && $_GET['acao'] == "cadastrar"){
    if(move_uploaded_file($foto_temp, $destino)){
        $insert = $pdo->prepare("INSERT INTO eixo (nome, foto) VALUES (?, ?)");
        $insert->bindValue(1, $nome);
        $insert->bindValue(2, $foto);
        $insert->execute();
        header("Location:pgeixo.php");
    }
} 

if(isset($_GET['acao']) && $_GET['acao'] == "excluir"){
    $id = $_GET['id'];
    $foto = $_GET['foto'];

    $del = $pdo->prepare("DELETE FROM eixo WHERE ideixo = ?");
    $del->bindValue(1, $id);
    $del->execute();
    unlink('imagens/'.$foto);
    header('Location:pgeixo.php');
}

if(isset($_GET['acao']) && $_GET['acao'] == "editar"){
    $id = $_GET['id'];
    $fotodb = $_GET['foto'];

    if($_FILES['file_foto']['size'] == 0){
        $edit = $pdo->prepare("UPDATE eixo SET nome = ? WHERE ideixo = ?");
        $edit->bindValue(1, $nome);
        $edit->bindValue(2, $id);
        $edit->execute();
        header("Location:pgeixo.php");
    }else{
        unlink('imagens/'.$fotodb);
        if(move_uploaded_file($foto_temp, $destino)){
            $edit = $pdo->prepare("UPDATE eixo SET nome = ?, foto = ? WHERE ideixo = ?");
            $edit->bindValue(1, $nome);
            $edit->bindValue(2, $foto);
            $edit->bindValue(3, $id);
            $edit->execute();
    
            header("Location:pgeixo.php");
        }
    }
}

?>