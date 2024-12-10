<?php 
include 'admin/config.php';
?>
<nav class="navbar navbar-expand-lg bg-musgo navbar-dark">
  <div class="container-fluid">
    <!-- Logo ou imagem -->
    <img src="admin/imagens/coruja.png" width="80" height="80">

    <!-- Botão de hambúrguer para telas pequenas -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mx-2 p-1" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item mx-2">
          <a class="nav-link active" aria-current="page" href="index.php">Início</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link active" aria-current="page" href="sobre.php">Sobre</a>
        </li>
        <li>
          <a class="nav-link active nav-item mx-2" aria-current="page" href="galeria.php">Galeria de Fotos</a>
        </li>
        <li>
          <a class="nav-link active nav-item mx-2" aria-current="page" href="eventos.php">Eventos</a>
        </li>
        <li class="nav-item dropup mx-2">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Suporte e Plataformas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="https://atendimento.educacao.sp.gov.br/">Suporte Escolar</a></li>
            <li><a class="dropdown-item"  href="https://cmspweb.ip.tv/">CMSP</a></li>
            <li><a class="dropdown-item" href="https://sed.educacao.sp.gov.br/boletim/boletimescolar">Boletim Escolar</a></li>
            <li><a class="dropdown-item" href="https://enem.inep.gov.br/participante/#!/">Página do Participante Enem</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

  <!-- Copyright ou rodapé -->
  <h6 class="text-dark text-center">© Copyright - NovoTec 2023 / 2024 - Proz</h6>
</nav>
