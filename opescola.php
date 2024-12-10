<?php
include 'config.php';

if(!empty($_POST['txt_escola'])){
    $nome = $_POST['txt_escola'];
    $descricao1 = $_POST['txt_descricao1'];
    $descricao2 = $_POST['txt_descricao2'];
    $descricao3 = $_POST['txt_descricao3'];
    $descricao4 = $_POST['txt_descricao4']; 
    $fundacao = $_POST['date_fundacao'];   
    $foto = $_FILES['file_foto']['name'];
    $foto = str_replace(" ", "", $foto);
    $foto_temp = $_FILES['file_foto']['tmp_name'];
    $destino = "imagens/".$foto;   
}

if(isset($_GET['acao']) && $_GET['acao'] == "cadastrar"){
    if(move_uploaded_file($foto_temp, $destino)){
        $insert = $pdo->prepare("INSERT INTO escola (nome, fundacao, descricao1, descricao2, descricao3, descricao4, foto) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insert->bindValue(1, $nome);
        $insert->bindValue(2, $fundacao);
        $insert->bindValue(3, $descricao1);
        $insert->bindValue(4, $descricao2);
        $insert->bindValue(5, $descricao3);
        $insert->bindValue(6, $descricao4);
        $insert->bindValue(7, $foto);
        $insert->execute();

        header("Location:pgescola.php");
    }
}

if(isset($_GET['acao']) && $_GET['acao'] == "excluir"){
    $id = $_GET['id'];
    $foto = $_GET['foto'];

    $del = $pdo->prepare("DELETE FROM escola WHERE idescola= ?");
    $del->bindValue(1, $id);
    $del->execute();
    unlink('imagens/'.$foto);
    header('Location:pgescola.php');
}

if(isset($_GET['acao']) && $_GET['acao'] == "editar"){
    $id = $_GET['id'];
    $fotodb = $_GET['foto'];

    if($_FILES['file_foto']['size'] == 0){
        $edit = $pdo->prepare("UPDATE escola SET nome=?, fundacao =?, descricao1 =?, descricao2 =?, descricao3 =?, descricao4 =?, WHERE idescola = ?");
        $edit->bindValue(1, $nome);
        $edit->bindValue(2, $fundacao);
        $edit->bindValue(3, $descricao1);
        $edit->bindValue(4, $descricao2);
        $edit->bindValue(5, $descricao3);
        $edit->bindValue(6, $descricao4);
        $edit->bindValue(7, $id);
        $edit->execute();
        header("Location:pgescola.php");
    }else{
        unlink('imagens/'.$fotodb);
        if(move_uploaded_file($foto_temp, $destino)){
            $edit = $pdo->prepare("UPDATE escola SET nome = ?, fundacao =?, descricao1 =?, descricao2 =?, descricao3 =?, descricao4 =?, foto = ? WHERE idescola = ?");
            $edit->bindValue(1, $nome);
            $edit->bindValue(2, $fundacao);
            $edit->bindValue(3, $descricao1);
            $edit->bindValue(4, $descricao2);
            $edit->bindValue(5, $descricao3);
            $edit->bindValue(6, $descricao4);
            $edit->bindValue(7, $foto);
            $edit->bindValue(8, $id);
            $edit->execute();
    
            header("Location:pgescola.php");
        }
    }
}

?>