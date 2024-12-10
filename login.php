<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Maria Santana de Almeida</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/stylelogin.css">
	<link rel="website icon" type="png" href="../admin/imagens/logosm.png"> 
</head>
<body>
	<div class="card" style="width: 16rem;">

	<img class="align-self-center mt-3"src="../admin/imagens/logosm.png"  width="150" height="150">
		
  <div class="card-body text-center">
  	<form action="oplogin.php" method="post">
        <div class="mb-3">
		  <label for="emailFormControlInput1" class="form-label">E-mail</label>
		  <input type="email" class="form-control" id="emailFormControlInput1" placeholder="nome@email.com" name="email">
		</div>
		<div class="mb-3">
		  <label for="senhaFormControlInput1" class="form-label">Senha</label>
		  <input type="password" class="form-control " id="senhaFormControlInput1" placeholder="••••••••" name="senha">
		</div>
        <button class="btn bg-verde" type="submit" value="Logar"><strong>Entrar</strong></button>
    	</div>
    </form>
  </div>		
</body>
</html>