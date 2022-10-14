<?php
include('conexao.php');

$sql = "SELECT * from conteudo";
$conteudos = mysqli_query($conn, $sql);



?>



<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Golden Voice</title>

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css" />
  <link rel="stylesheet" href="styletreinar.css" />
</head>

<body style="background-color:white;">

  <div class="page">

    <nav>
      <a id="logo" href="paginainicial.php">
        <img src="images/logohor.png" alt="logo" height="80px">
      </a>
      <!--  -->
      <ul>
        <li> <i class="fa fa-house" aria-hidden="true"> </i> <a href="paginainicial.php">Página Inicial</a></li>
        <li> <i class="fa fa-user" aria-hidden="true"> </i> <a href="perfil.php">Perfil </a></li>
        <li> <i class="fa fa-question-circle" aria-hidden="true"></i> <a href="forum.php">Fórum</a></li>
        <li> <i class="fa fa-power-off" aria-hidden="true"> </i><a href="#"> Sair</a></li> 
      </ul>

    </nav>

    <ul class="cards">

      <?php while($row = mysqli_fetch_assoc($conteudos)) {?>
        <li>
          <a href="conteudo.php?id=<?=$row['cod_conteudo']?>" class="card">
            <img src="images/back.jpg" class="card__image" alt="" />
            <div class="card__overlay">
              <div class="card__header">
                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                  <path />
                </svg>
                <div class="card__header-text">
                  <h1 class="card__title"><?= $row['enunciado']?></h1>
                </div>
              </div>
              <p class="card__description">Bem vindo ao Golden Voice. Essa é nossa aula de introdução.</p>
            </div>
          </a>
        </li>
      <?php } ?>
      </ul>



</body>

</html>