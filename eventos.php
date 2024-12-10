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

<div class="espelho">
    <div class="row justify-content-around">
        <div class="text-dark text-center mt-5">
            <img src="admin/imagens/logosm.png" width="300" height="300">
        </div>
    </div>
    <h2 class="display-5 text-center text-dark mb-5">Eventos Escolares</h2>
    <div class="carousel-inner">
        <?php 
        $card = $pdo->query("SELECT * FROM avisos ORDER BY idaviso DESC");
        $activeClass = 'active';
        $count = 0; 
        echo '<div class="card-evento ' . $activeClass . '"><div class="row justify-content-center">';
        while($linha = $card->fetch(PDO::FETCH_ASSOC)){
            if ($count > 0 && $count % 1 == 0) {  
                echo '</div><div class="card-evento"><div class="row justify-content-center">';
            }
        ?>

<div class="card rounded-4 m-4 shadow-lg" style="max-width: 900px;">
  <div class="row g-0">
    <div class="col-md-5 d-flex align-items-center justify-content-center p-3">
      <img src="admin/imagens/<?php echo $linha['foto']; ?>" class="img-fluid rounded-4">
    </div>
    <div class="col-md-7">
      <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
        <h4 class="card-title bg-bebe rounded-3 p-3 mb-3 w-100"><?php echo $linha['aviso']; ?></h4>
        <p class="card-text mb-2"><strong>Data:</strong> <?php echo date('d/m/Y', strtotime($linha['dia'])); ?></p>
        <p class="card-text mb-2"><strong>Horário:</strong> <?php echo $linha['horario']; ?></p>
        <p class="card-text border bg-bebe p-3 rounded-3 w-100"><?php echo $linha['descricao']; ?></p>
      </div>
    </div>
  </div>
</div>
        <?php 
            $count++;
        } 
        echo '</div></div>';
        ?>
    </div>
</div>
</div>
<?php include 'logoinferior.php'?>
<?php include 'rodapesobre.php'?> 

<script type="text/javascript" src="assets/javascript/bootstrap.bundle.min.js"></script>  
</body>
</html>