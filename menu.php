<nav class="navbar navbar-expand-lg bg-success navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand"><strong>Maria Santana de Almeida - Admin</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Início</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastro
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="pgusuario.php">Usuário</a></li>
            <li><a class="dropdown-item" href="pgbanner.php">Banner</a></li>
            <li><a class="dropdown-item" href="pggaleria.php">Galeria</a></li>
            <li><a class="dropdown-item" href="pgaviso.php">Eventos</a></li>            
            <li><a class="dropdown-item" href="pgeixo.php">Eixo</a></li>
            <li><a class="dropdown-item" href="pgfuncionario.php">Funcionario</a></li>
            <li><a class="dropdown-item" href="pgpatrono.php">Patrono</a></li>
            <li><a class="dropdown-item" href="pgescola.php">História</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['email'];?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="login.php">Sair</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>