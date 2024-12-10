<a href="espaco"></a>

      <!-- Exebição do carrossel -->

<div id="carouselExampleControls" class=" carousel slide" data-bs-ride="carousel"data-bs-interval="10000">
  <div class="carousel-inner">
  <?php
    $lista = $pdo->query("SELECT * FROM banner");
    while($linha = $lista->fetch(PDO::FETCH_ASSOC)){?>
      <div class="carousel-item active">
      <img src="admin/imagens/<?php echo $linha['foto'];?>" class="d-block w-100" >
    </div>
   <?php } ?>
  </div>
</div>