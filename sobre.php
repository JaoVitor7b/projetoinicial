<?php 
include 'admin/config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola Estadual Professora Maria Santana de Almeida</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="website icon" type="png" href="admin/imagens/logosm.png">
    <style>
        /* Evitar o overflow horizontal */
        html, body {
            width: 100%;
            overflow-x: hidden;  /* Ocultar qualquer excesso horizontal */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 100%;  /* Evitar que o container ultrapasse a largura da tela */
            padding-left: 15px; /* Pequeno padding para evitar que o conteúdo toque as bordas */
            padding-right: 15px; /* Também um pequeno padding à direita */
        }

        .img-container {
            text-align: center;
        }
        .text-center p {
            margin: 20px 0;
        }

        /* Melhorias de layout */
        .content {
            max-width: 960px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php include 'navegasobre.php'?>

    <div class="content">
        <div class="text-dark text-center p-5 mb-4">
            <img src="admin/imagens/logosm.png" width="300" height="300" class="mx-auto d-block">
        </div>

        <div class="text-center">
            <?php
            $lista = $pdo->query("SELECT * FROM patrono");
            while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
            ?>
            <h3><?php echo $linha['nome'];?></h3>
            <div class="img-container">
                <img src="admin/imagens/<?php echo $linha['foto'];?>" class="m-2 rounded-4" width="300" height="400">
            </div>
            <div class="m-3">
                <h5>Nascimento <?php echo date('d/m/Y', strtotime($linha['nascimento'])); ?></h5>
                <h5>Falecimento <?php echo date('d/m/Y', strtotime($linha['falecimento'])); ?></h5>
            </div>

            <h2 class="display-6 container my-5 text-center text-dark py-3 rounded-4">Sua História</h2>

            <div class="text-center p-5">
                <p class="m-3"><?php echo $linha['descricao1'];?></p>
                <p class="m-3"><?php echo $linha['descricao2'];?></p>
                <p class="m-3"><?php echo $linha['descricao3'];?></p>
                <p class="m-3"><?php echo $linha['descricao4'];?></p>
                <p class="m-3"><?php echo $linha['descricao5'];?></p>
            </div>
            <?php } ?> 

            <?php
            $lista = $pdo->query("SELECT * FROM escola");
            while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
            ?>
            <h3><?php echo $linha['nome'];?></h3>
            <div class="img-container">
                <img src="admin/imagens/<?php echo $linha['foto'];?>" class="mx-auto rounded-4" width="300" height="300">
            </div>
            <h5 class="m-5">Fundação <?php echo date('d/m/Y', strtotime($linha['fundacao'])); ?></h5>

            <h2 class="display-6 container my-5 text-center text-dark py-3 rounded-4">Nossa História</h2>

            <div class="text-center p-5">
                <p class="m-3"><?php echo $linha['descricao1'];?></p>
                <p class="m-3"><?php echo $linha['descricao2'];?></p>
                <p class="m-3"><?php echo $linha['descricao3'];?></p>
                <p class="m-3"><?php echo $linha['descricao4'];?></p>
            </div>
            <?php } ?> 
        </div>
    </div>

    <?php include 'logoinferior.php'?>
    <?php include 'rodapesobre.php'?> 

    <script type="text/javascript" src="assets/javascript/bootstrap.bundle.min.js"></script>  
</body>
</html>
