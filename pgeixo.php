<?php
    session_start();
    if(!isset($_SESSION['email'])){
        // Se o usuário não estiver logado, redirecioná-lo para a página de login
        header("Location: login.php");
        exit();
    }
?>
<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - EIXO</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <?php include 'menu.php';?>

    <div class="container mt-3">
<!-- Botao Modal Cadastro Inicio -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Adicionar Eixo
        </button>

<!-- Modal Cadastro-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Eixo Escolar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="opeixo.php?acao=cadastrar" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label class="form-label">Nome do Eixo</label>
                    <input type="text" class="form-control" placeholder="Digite o nome do eixo" name="txt_eixo" required>
                    </div>
                    <div class="mb-3">
                    <label for="formFile" class="form-label">Foto</label>
                    <input class="form-control" type="file" name="file_foto" required>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>   
<!-- Listagem início -->
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Eixo Escolar</th>
                <th scope="col">Foto</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lista = $pdo->query("SELECT * FROM eixo");

                while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                <th scope="row"><?php echo $linha['ideixo'];?></th>
                <td><?php echo $linha['nome'];?></td>
                <td><img src="imagens/<?php echo $linha['foto'];?>" class="rounded-3"width="95" height="115"></td>
                <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEditar<?php echo $linha['ideixo'];?>">Editar</button>    
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalExcluir<?php echo $linha['ideixo'];?>">Excluir</button>
                </td>
                </tr>
                <!-- Modal excluir inicio -->
                <div class="modal fade" id="ModalExcluir<?php echo $linha['ideixo'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja excluir?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-auto">
                        <a href="opeixo.php?acao=excluir&id=<?php echo $linha['ideixo'];?>&foto=<?php echo $linha['foto'];?>" class="btn btn-danger">Sim</a>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                    </div>
                    </div>
                </div>
                </div>
<!-- Modal excluir fim -->
<!-- Modal Editar inicio -->
                <div class="modal fade" id="ModalEditar<?php echo $linha['ideixo'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edição do Eixo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="opeixo.php?acao=editar&id=<?php echo $linha['ideixo'];?>&foto=<?php echo $linha['foto'];?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                            <label class="form-label">Eixo Escolar</label>
                            <input type="text" class="form-control" value="<?php echo $linha['nome'];?>" name="txt_eixo" required>
                            </div>

                            <div class="mb-3">
                            <label for="formFile" class="form-label">Foto</label>
                            <input class="form-control" type="file" name="file_foto">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>   
<!-- Modal Editar fim -->
                <?php } ?>
            </tbody>
        </table>
<!-- listagem fim -->
    </div>

    <script src="../assets/javascript/bootstrap.bundle.min.js"></script>
</body>
</html>