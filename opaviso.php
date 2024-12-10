<?php
include 'config.php';

if(!empty($_POST['txt_aviso'])){
    $aviso = $_POST['txt_aviso'];
    $dia = $_POST['date_dia'];
    $horario = $_POST['txt_horario'];
    $descricao = $_POST['txt_descricao'];   
    $foto = $_FILES['file_foto']['name'];
    $foto = str_replace(" ", "", $foto);
    $foto_temp = $_FILES['file_foto']['tmp_name'];
    $destino = "imagens/".$foto;   
}

if(isset($_GET['acao']) && $_GET['acao'] == "cadastrar"){
    if(move_uploaded_file($foto_temp, $destino)){
        $insert = $pdo->prepare("INSERT INTO avisos (aviso, dia, horario, descricao, foto) VALUES (?, ?, ?, ?, ?)");
        $insert->bindValue(1, $aviso);
        $insert->bindValue(2, $dia);
        $insert->bindValue(3, $horario);
        $insert->bindValue(4, $descricao);
        $insert->bindValue(5, $foto);
        $insert->execute();

        header("Location:pgaviso.php");
    }
}

if(isset($_GET['acao']) && $_GET['acao'] == "excluir"){
    $id = $_GET['id'];
    $foto = $_GET['foto'];

    $del = $pdo->prepare("DELETE FROM avisos WHERE idaviso= ?");
    $del->bindValue(1, $id);
    $del->execute();
    unlink('imagens/'.$foto);
    header('Location:pgaviso.php');
}

if(isset($_GET['acao']) && $_GET['acao'] == "editar"){
    $id = $_GET['id'];
    $fotodb = $_GET['foto'];

    if($_FILES['file_foto']['size'] == 0){
        $edit = $pdo->prepare("UPDATE avisos SET aviso=?, dia =?, horario =?, descricao =? WHERE idaviso = ?");
        $edit->bindValue(1, $aviso);
        $edit->bindValue(2, $dia);
        $edit->bindValue(3, $horario);
        $edit->bindValue(4, $descricao);
        $edit->bindValue(5, $id);
        $edit->execute();
        header("Location:pgaviso.php");
    }else{
        unlink('imagens/'.$fotodb);
        if(move_uploaded_file($foto_temp, $destino)){
            $edit = $pdo->prepare("UPDATE avisos SET aviso = ?, dia =?, horario =?, descricao =?, foto = ? WHERE idaviso = ?");
            $edit->bindValue(1, $aviso);
            $edit->bindValue(2, $dia);
            $edit->bindValue(3, $horario);
            $edit->bindValue(4, $descricao);
            $edit->bindValue(5, $foto);
            $edit->bindValue(6, $id);
            $edit->execute();
    
            header("Location:pgaviso.php");
        }
    }
}

?>