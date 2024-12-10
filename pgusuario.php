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
    <title>ADMIN - Usuário</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <?php include 'menu.php';?>
<!-- painel de cadastro de usuário para entrar no back end -->
    <div class="container mt-3">
<!-- Inicio Botao Modal Cadastro -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Adicionar usuário
        </button>

        <!-- Modal Cadastro-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="opusuario.php?acao=cadastrar" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label">Nome</label>
                          <input type="text" class="form-control" placeholder="Digite o nome do usuário" name="txt_nome" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email</label>
                          <input type="email" class="form-control" placeholder="Digite o email" name="txt_email" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Senha</label>
                          <input type="password" class="form-control" placeholder="********" name="txt_senha" required>
                        </div>
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Foto</label>
                          <input class="form-control" type="file" name="file_foto" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>   
<!-- inicio da Tabela de Listagem de usuários cadastrados -->
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Senha</th>
                <th scope="col">Foto</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
<!-- inicio da função de puxar todos os dados do banco de dados-->
            <?php
                $lista = $pdo->query("SELECT * FROM usuarios");

                while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr>
                <th scope="row"><?php echo $linha['idusuario'];?></th>
                <td><?php echo $linha['nome'];?></td>
                <td><?php echo $linha['email'];?></td>
                <th><?php echo $linha['senha'];?></th>
                <td><img src="imagens/<?php echo $linha['foto'];?>" class="rounded-3"width="95" height="115"></td>
                <td>
<!-- botão editar -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEditar<?php echo $linha['idusuario'];?>">Editar</button> 
<!-- botão excluir -->   
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalExcluir<?php echo $linha['idusuario'];?>">Excluir</button>
                </td>
                </tr>
<!-- inicio do Modal excluir -->
                <div class="modal fade" id="ModalExcluir<?php echo $linha['idusuario'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja excluir o usuário?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-auto">
                        <a href="opusuario.php?acao=excluir&id=<?php echo $linha['idusuario'];?>&foto=<?php echo $linha['foto'];?>" class="btn btn-danger">Sim</a>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                    </div>
                    </div>
                </div>
                </div>
<!-- fim do Modal excluir -->
<!-- inicio do Modal Editar -->
                <div class="modal fade" id="ModalEditar<?php echo $linha['idusuario'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edição de Usuário</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="opusuario.php?acao=editar&id=<?php echo $linha['idusuario'];?>&foto=<?php echo $linha['foto'];?>" method="post" enctype="multipart/form-data">
                              <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" value="<?php echo $linha['nome'];?>" placeholder="Digite o nome do usuário" name="txt_nome">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control"value="<?php echo $linha['email'];?>" placeholder="Digite o email" name="txt_email">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Senha</label>
                                <input type="password" class="form-control"value="<?php echo $linha['senha'];?>" placeholder="********" name="txt_senha">
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
<!--Fim do Modal Editar -->
<!-- fim do puxamento de todos os dados do banco de dados -->
                <?php } ?>
            </tbody>
        </table>
<!--fim da tabela de listagem de usuários-->
    </div>

    <script src="../assets/javascript/bootstrap.bundle.min.js"></script>
</body>
</html>