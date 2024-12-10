<?php
    session_start();
    if(!isset($_SESSION['email'])){
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
    <title>ADMIN - FUNCIONARIO</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <?php include 'menu.php';?>

    <div class="container mt-3">
<!-- Botao Modal Cadastro Inicio -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Adicionar Funcionario
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Funcionario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="opfuncionario.php?acao=cadastrar" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label class="form-label">Funcionario</label>
                    <input type="text" class="form-control" placeholder="Digite o nome" name="txt_funcionario" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Cargo</label>
                    <input type="text" class="form-control" placeholder="Digite o Cargo" name="txt_cargo" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea type="text" class="form-control" placeholder="Descrição" name="txt_descricao" rows="6" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                    <label class="form-label">Selecione o Eixo</label>
                    <select class="form-select" name="txt_eixo">
                    <?php 
                        $sql = $pdo->query("SELECT * FROM eixo ORDER BY nome");

                        while($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <option value="<?php echo $linha['ideixo'];?>"><?php echo $linha['nome'];?></option>
                    <?php } ?>
                    </select>    
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
                <th scope="col">Funcionario</th>
                <th scope="col">Eixo</th>
                <th scope="col">Cargo</th>
                <th scope="col">Descrição</th>
                <th scope="col">Foto</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lista = $pdo->query("SELECT s.idfuncionario, s.funcionario, s.cargo, s.descricao, s.foto, c.nome, c.ideixo 
                FROM funcionarios s INNER JOIN eixo c
                ON s.ideixo = c.ideixo");

                while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                <th scope="row"><?php echo $linha['idfuncionario'];?></th>
                <td><?php echo $linha['funcionario'];?></td>
                <td><?php echo $linha['nome'];?></td>
                <td><?php echo $linha['cargo'];?></td>
                <td><?php echo $linha['descricao'];?></td>
                <td><img src="imagens/<?php echo $linha['foto'];?>" class="rounded-3"width="100" height="150"></td>
                <td>
                <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#ModalEditar<?php echo $linha['idfuncionario'];?>">Editar</button>    
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalExcluir<?php echo $linha['idfuncionario'];?>">Excluir</button>
                </td>
                </tr>
<!-- Modal excluir inicio -->
                <div class="modal fade" id="ModalExcluir<?php echo $linha['idfuncionario'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja Excluir?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-auto">
                        <a href="opfuncionario.php?acao=excluir&id=<?php echo $linha['idfuncionario'];?>&foto=<?php echo $linha['foto'];?>" class="btn btn-danger">Sim</a>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Modal excluir fim -->
                <!-- Modal Editar inicio -->
                <div class="modal fade" id="ModalEditar<?php echo $linha['idfuncionario'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="opfuncionario.php?acao=editar&id=<?php echo $linha['idfuncionario'];?>&foto=<?php echo $linha['foto'];?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                            <label class="form-label">Funcionário</label>
                            <input type="text" class="form-control" value="<?php echo $linha['funcionario'];?>" name="txt_funcionario" required>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Cargo</label>
                            <input type="text" class="form-control" value="<?php echo $linha['cargo'];?>" name="txt_cargo" required>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Descrição</label>
                            <input type="text" class="form-control" value="<?php echo $linha['descricao'];?>" name="txt_descricao" required>
                            </div>

                            <div class="mb-3">
                            <label class="form-label">Selecione a Eixo</label>
                            <select class="form-select" name="txt_eixo">
                            <?php 
                                $sql = $pdo->query("SELECT * FROM eixo ORDER BY nome");

                                while($linhac = $sql->fetch(PDO::FETCH_ASSOC)){
                                if($linha['ideixo'] == $linhac['ideixo']){    
                            ?>
                            <option value="<?php echo $linhac['ideixo'];?>" selected><?php echo $linhac['nome'];?></option>
                            <?php }else{ ?>
                                <option value="<?php echo $linhac['ideixo'];?>"><?php echo $linhac['nome'];?></option>
                          <?php  } 
                        }?>
                            </select>    
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