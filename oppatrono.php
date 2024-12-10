<?php
include 'config.php';

if(!empty($_POST['txt_patrono'])){
    $nome = $_POST['txt_patrono'];
    $nascimento = $_POST['date_nascimento'];
    $falecimento = $_POST['date_falecimento'];
    $descricao1 = $_POST['txt_descricao1'];
    $descricao2 = $_POST['txt_descricao2'];
    $descricao3 = $_POST['txt_descricao3'];
    $descricao4 = $_POST['txt_descricao4'];
    $descricao5 = $_POST['txt_descricao5'];
    $foto = $_FILES['file_foto']['name'];
    $foto = str_replace(" ", "", $foto);
    $foto_temp = $_FILES['file_foto']['tmp_name'];
    $destino = "imagens/".$foto;   
}

if(isset($_GET['acao']) && $_GET['acao'] == "cadastrar"){
    if(move_uploaded_file($foto_temp, $destino)){
        $insert = $pdo->prepare("INSERT INTO patrono (nome, nascimento, falecimento, descricao1, descricao2, descricao3, descricao4, descricao5, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindValue(1, $nome);
        $insert->bindValue(2, $nascimento);
        $insert->bindValue(3, $falecimento);
        $insert->bindValue(4, $descricao1);
        $insert->bindValue(5, $descricao2);
        $insert->bindValue(6, $descricao3);
        $insert->bindValue(7, $descricao4);
        $insert->bindValue(8, $descricao5);
        $insert->bindValue(9, $foto);
        $insert->execute();

        header("Location:pgpatrono.php");
    }
}

if(isset($_GET['acao']) && $_GET['acao'] == "excluir"){
    $id = $_GET['id'];
    $foto = $_GET['foto'];

    $del = $pdo->prepare("DELETE FROM patrono WHERE idpatrono= ?");
    $del->bindValue(1, $id);
    $del->execute();
    unlink('imagens/'.$foto);
    header('Location:pgpatrono.php');
}

if(isset($_GET['acao']) && $_GET['acao'] == "editar"){
    $id = $_GET['id'];
    $fotodb = $_GET['foto'];

    if($_FILES['file_foto']['size'] == 0){
        $edit = $pdo->prepare("UPDATE patrono SET nome=?, nascimento = ?, falecimento =?, descricao1 =?, descricao2 =?, descricao3 =?, descricao4 =?, descricao5 =?, WHERE idpatrono = ?");
        $edit->bindValue(1, $nome);
        $edit->bindValue(2, $nascimento);
        $edit->bindValue(3, $falecimento);
        $edit->bindValue(4, $descricao1);
        $edit->bindValue(5, $descricao2);
        $edit->bindValue(6, $descricao3);
        $edit->bindValue(7, $descricao4);
        $edit->bindValue(8, $descricao5);
        $edit->bindValue(9, $id);
        $edit->execute();
        header("Location:pgpatrono.php");
    }else{
        unlink('imagens/'.$fotodb);
        if(move_uploaded_file($foto_temp, $destino)){
            $edit = $pdo->prepare("UPDATE patrono SET nome=?, nascimento = ?, falecimento =?, descricao1 =?, descricao2 =?, descricao3 =?, descricao4 =?, descricao5 =?, foto = ? WHERE idpatrono = ?");
            $edit->bindValue(1, $nome);
            $edit->bindValue(2, $nascimento);
            $edit->bindValue(3, $falecimento);
            $edit->bindValue(4, $descricao1);
            $edit->bindValue(5, $descricao2);
            $edit->bindValue(6, $descricao3);
            $edit->bindValue(7, $descricao4);
            $edit->bindValue(8, $descricao5);
            $edit->bindValue(9, $foto);
            $edit->bindValue(10, $id);
            $edit->execute();
    
            header("Location:pgpatrono.php");
        }
    }
}

?>