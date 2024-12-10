<a href="equipe"></a></a>
<div class="espelho mt-3 mb-5">
    <h2 class="display-5 text-center text-dark py-4">Equipe Escolar</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="15000">
      <div class="carousel-inner">

      <!-- Organização das <div> -->

        <?php 
        $card = $pdo->query("SELECT * FROM eixo");
        $activeClass = 'active';
        $count = 0; 
        echo '<div class="carousel-item ' . $activeClass . '"><div class="row justify-content-center">';
        while($linha = $card->fetch(PDO::FETCH_ASSOC)){
          if ($count > 0 && $count % 1 == 0) {  
            echo '</div></div><div class="carousel-item"><div class="row justify-content-center">';
          }
        ?>
          <div class="col-lg-3 col-md-3 col-sm-6 col-10 m-3 d-flex justify-content-center">
            <div class="postcard p-1 shadow bg-body border rounded-4 h-100 border rounded-4">
              <img src="admin/imagens/<?php echo $linha['foto'];?>" class="d-block w-100" alt="Foto de <?php echo $linha['nome'];?>">
              <b class="text-center">
                            <button type="button" class="btn d-inline-flex focus-ring focus-ring-dark py-2 px-3 mt-3 mb-3 text-decoration-none border rounded-4 justify-content-center bg-claro text-dark" data-bs-toggle="modal" data-bs-target="#modalCard<?php echo $linha['ideixo']; ?>">
                                <?php echo htmlspecialchars($linha['nome']); ?>
                            </button>
                        </b>
                    </div>
                </div>
          
          <!-- Modal de exebição dos eixos -->

          <div class="modal fade" id="modalCard<?php echo $linha['ideixo'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header text-dark">
                  <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $linha['nome'];?></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

      <!-- Modal de exebição dos funcionários -->
                
                <div class="modal-body text-light">
                  <table class="table imgfuncio">
                    <tbody>
                        <?php
                            $sql = $pdo->prepare("SELECT * FROM funcionarios WHERE ideixo=?");
                            $sql->bindValue(1, $linha['ideixo']);
                            $sql->execute();
                            while($listfuncio = $sql->fetch(PDO::FETCH_ASSOC)){
                                $nomefuncio = $listfuncio['funcionario'];
                                $descricaofuncio = $listfuncio['descricao'];
                                $cargofuncio = $listfuncio['cargo'];
                            ?>
                            <td><img src="admin/imagens/<?php echo $listfuncio['foto']; ?>" alt="<?php echo $nomefuncio; ?>"></td>
                            <td>
                            <tr>
                                <td>
                                  <h3>
                                    <?php echo $nomefuncio; ?>
                                  </h3>
                                    <h5><?php echo $cargofuncio; ?></h5>
                                    <p><?php echo $descricaofuncio; ?></p>
                                </td>     
                            </tr>
                            <?php } ?>
                        </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
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

      <!-- Botões de controle -->

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Voltar</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Avançar</span>
      </button>
    </div>
  </div>
