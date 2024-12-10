<?php
include 'config.php';

if(!empty($_POST['txt_nome'])){
    $nome = $_POST['txt_nome'];
    $email = $_POST['txt_email'];
    $senha = $_POST['txt_senha'];
    $foto = $_FILES['file_foto']['name'];
    $foto = str_replace(" ", "", $foto);
    $foto_temp = $_FILES['file_foto']['tmp_name'];
    $destino = "imagens/".$foto;   
}

if(isset($_GET['acao']) && $_GET['acao'] == "cadastrar"){
    if(move_uploaded_file($foto_temp, $destino)){
        $insert = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, foto) VALUES (?, ?, ?, ?)");
        $insert->bindValue(1, $nome);
        $insert->bindValue(2, $email);
        $insert->bindValue(3, $senha);
        $insert->bindValue(4, $foto);
        $insert->execute();

        header("Location:pgusuario.php");
    }
}


if(isset($_GET['acao']) && $_GET['acao'] == "excluir"){
    $id= $_GET['id'];
    $foto = $_GET['foto'];

    $del = $pdo->prepare("DELETE FROM usuarios WHERE idusuario = ?");
    $del->bindValue(1, $id);
    $del->execute();
    unlink('imagens/'.$foto);
    header('Location:pgusuario.php');
}

if(isset($_GET['acao']) && $_GET['acao'] == "editar"){
    $id = $_GET['id'];
    $fotodb = $_GET['foto'];

    if($_FILES['file_foto']['size'] == 0){
        $edit = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE idusuario = ?");
        $edit->bindValue(1, $nome);
        $edit->bindValue(2, $email);
        $edit->bindValue(3, $senha);
        $edit->bindValue(4, $id);
        $edit->execute();
        header("Location:pgusuario.php");
    }else{
        unlink('imagens/'.$fotodb);
        if(move_uploaded_file($foto_temp, $destino)){
            $edit = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ?, foto = ? WHERE idusuario = ?");
            $edit->bindValue(1, $nome);
            $edit->bindValue(2, $email);
            $edit->bindValue(3, $senha);
            $edit->bindValue(4, $foto);
            $edit->bindValue(5, $id);
            $edit->execute();
    
            header("Location:pgusuario.php");
        }
    }
}
