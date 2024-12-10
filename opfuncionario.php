<?php
include 'config.php';

if(!empty($_POST['txt_funcionario'])){
    $funcionario = $_POST['txt_funcionario'];
    $eixo = $_POST['txt_eixo'];
    $cargo = $_POST['txt_cargo'];
    $descricao = $_POST['txt_descricao'];
    $foto = $_FILES['file_foto']['name'];
    $foto = str_replace(" ", "", $foto);
    $foto_temp = $_FILES['file_foto']['tmp_name'];
    $destino = "imagens/".$foto;   
}

if(isset($_GET['acao']) && $_GET['acao'] == "cadastrar"){
    if(move_uploaded_file($foto_temp, $destino)){
        $insert = $pdo->prepare("INSERT INTO funcionarios (ideixo, funcionario, cargo, descricao, foto) VALUES (?, ?, ?, ?, ?)");
        $insert->bindValue(1, $eixo);
        $insert->bindValue(2, $funcionario);
        $insert->bindValue(3, $cargo);
        $insert->bindValue(4, $descricao);
        $insert->bindValue(5, $foto);
        $insert->execute();

        header("Location:pgfuncionario.php");
    }
}

if(isset($_GET['acao']) && $_GET['acao'] == "excluir"){
    $id = $_GET['id'];
    $foto = $_GET['foto'];

    $del = $pdo->prepare("DELETE FROM funcionarios WHERE idfuncionario = ?");
    $del->bindValue(1, $id);
    $del->execute();
    unlink('imagens/'.$foto);
    header('Location:pgfuncionario.php');
}

if(isset($_GET['acao']) && $_GET['acao'] == "editar"){
    $id = $_GET['id'];
    $fotodb = $_GET['foto'];

    if($_FILES['file_foto']['size'] == 0){
        $edit = $pdo->prepare("UPDATE funcionarios SET ideixo = ?, funcionario=?, cargo = ?, descricao =? WHERE idfuncionario = ?");
        $edit->bindValue(1, $eixo);
        $edit->bindValue(2, $funcionario);
        $edit->bindValue(3, $cargo);
        $edit->bindValue(4, $descricao);
        $edit->bindValue(5, $id);
        $edit->execute();
        header("Location:pgfuncionario.php");
    }else{
        unlink('imagens/'.$fotodb);
        if(move_uploaded_file($foto_temp, $destino)){
            $edit = $pdo->prepare("UPDATE funcionarios SET ideixo = ?, funcionario=?, cargo = ?, descricao =?, foto = ? WHERE idfuncionario = ?");
            $edit->bindValue(1, $eixo);
            $edit->bindValue(2, $funcionario);
            $edit->bindValue(3, $cargo);
            $edit->bindValue(4, $descricao);
            $edit->bindValue(5, $foto);
            $edit->bindValue(6, $id);
            $edit->execute();
    
            header("Location:pgfuncionario.php");
        }
    }
}

?>