<?php
session_start();
include 'config.php'; // Inclua o arquivo de configuração do banco de dados

if(!empty($_POST['email']) && !empty($_POST['senha'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $query->bindValue(1, $email);
    $query->bindValue(2, $senha);
    $query->execute();

    if($query->rowCount() == 1){
        // Login bem-sucedido
        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit();
    } else {
        // Login falhou
        echo "Email ou senha incorretos.";
    }
} else {
    echo "Por favor, forneça email e senha.";
}
?>

?>
