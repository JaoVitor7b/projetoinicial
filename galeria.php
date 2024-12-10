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
        <div class="text-dark text-center mt-5 ">
            <img src="admin/imagens/logosm.png" width="300" height="300">
        </div>
    </div>
    <h2 class="display-5 text-center text-dark mb-5">Galeria</h2>
    <div class="carousel-inner">
        <?php 
        $card = $pdo->query("SELECT * FROM galeria");
        $activeClass = 'active';
        $count = 0; 
        echo '<div class="card-item ' . $activeClass . '"><div class="row justify-content-center">';
        while($linha = $card->fetch(PDO::FETCH_ASSOC)){
            if ($count > 0 && $count % 2 == 0) {  
                echo '</div><div class="card-item"><div class="row justify-content-center">';
            }
        ?>
        <div class="col-lg-4 col-md-5 col-sm-6 col-12 m-5 d-flex justify-content-center">
            <div class="fotocard p-1 shadow bg-body rounded-4">
                <img src="admin/imagens/<?php echo $linha['foto'];?>" class="d-block w-100">
                <b class="text-center">
                    <p <?php echo $linha['idgaleria'];?> class="d-inline-flex focus-ring focus-ring-dark py-2 px-2 m-2 text-decoration-none border rounded-2 justify-content-center text-dark" data-bs-toggle="modal">
                        <?php echo $linha['nome'];?>
                    </p>
                </b>
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
