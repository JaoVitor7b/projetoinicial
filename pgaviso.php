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
    <title>ADMIN - Avisos</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <?php include 'menu.php';?>

    <div class="container mt-3">
<!-- Botao Modal Cadastro Inicio -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Adicionar informações
        </button>

<!-- Modal Cadastro-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar informações</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="opaviso.php?acao=cadastrar" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label class="form-label">Evento</label>
                    <input type="text" class="form-control" placeholder="Digite o evento" name="txt_aviso" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Data do evento</label>
                    <input type="date" class="form-control" placeholder="Digite a data" name="date_dia" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Horário do evento</label>
                    <input type="text" class="form-control" placeholder="Digite o horario" name="txt_horario" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea type="text" class="form-control" placeholder="Descrição" name="txt_descricao" rows="6" required></textarea>
                    <div class="mb-3">
                    <label for="formFile" class="form-label">Foto</label>
                    <input class="form-control" type="file" name="file_foto" required>
                    </div>
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
                <th scope="col">Eventos</th>
                <th scope="col">Data</th>
                <th scope="col">Horário</th>                
                <th scope="col">Descrição</th>
                <th scope="col">Foto</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lista = $pdo->query("SELECT * FROM avisos ORDER BY idaviso DESC");

                while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                <th scope="row"><?php echo $linha['idaviso'];?></th>
                <td><?php echo $linha['aviso'];?></td>
                <td><?php echo $linha['dia'];?></td>
                <td><?php echo $linha['horario'];?></td>
                <td><?php echo $linha['descricao'];?></td>
                <td><img src="imagens/<?php echo $linha['foto'];?>" class="rounded-3"width="100" height="150"></td>
                <td>

                <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#ModalEditar<?php echo $linha['idaviso'];?>">Editar</button>    
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalExcluir<?php echo $linha['idaviso'];?>">Excluir</button>
                </td>
                </tr>
                <!-- Modal excluir inicio -->
                <div class="modal fade" id="ModalExcluir<?php echo $linha['idaviso'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja excluir?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-auto">
                        <a href="opaviso.php?acao=excluir&id=<?php echo $linha['idaviso'];?>&foto=<?php echo $linha['foto'];?>" class="btn btn-danger">Sim</a>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                    </div>
                    </div>
                </div>
                </div>
<!-- Modal excluir fim -->
<!-- Modal Editar inicio -->
                <div class="modal fade" id="ModalEditar<?php echo $linha['idaviso'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="opaviso.php?acao=editar&id=<?php echo $linha['idaviso'];?>&foto=<?php echo $linha['foto'];?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                            <label class="form-label">Evento</label>
                            <input type="text" class="form-control" value="<?php echo $linha['aviso'];?>" name="txt_aviso" required>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Data</label>
                            <input type="date" class="form-control" value="<?php echo $linha['dia'];?>" name="date_dia" required>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Horário</label>
                            <input type="text" class="form-control" value="<?php echo $linha['horario'];?>" name="txt_horario" required>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Descricao</label>
                            <textarea type="text" class="form-control" placeholder="Descrição" name="txt_descricao" rows="6" required></textarea>
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