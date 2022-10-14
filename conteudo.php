<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Golden Voice</title>

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css" />
  <link rel="stylesheet" href="styleforum.css" />
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
        <li> <i class="fa fa-microphone" aria-hidden="true"></i> <a href="treinar.php">Treinar</a></li>
        <li> <i class="fa fa-power-off" aria-hidden="true"> </i><a href="#"> Sair</a></li> 
      </ul>

      
    </nav>
  </div>
  
<?php
if(!isset($_GET['id'])){
    header('Location: treinar.php');
    exit;
}
include("conexao.php"); // inclui o arquivo de conexão com BD
$id = $_GET["id"];
$sql = "SELECT * from conteudo WHERE cod_conteudo = '$id'";
$result = mysqli_query($conn, $sql);
$conteudo = mysqli_fetch_array($result, MYSQLI_ASSOC);
if($conteudo['midia']){
    $midialink = "https://www.youtube.com/embed/".explode("https://www.youtube.com/watch?v=",$conteudo['midia'])[1];
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$conteudo['enunciado']?></title>
</head>
<body>
<?php
if($conteudo['midia']){?>
    <iframe width="560" height="315" src=<?=$midialink?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php } ?>

<a href="questoes.php?cont_id=<?=$id?>" >Questoes</a>
</body>
</html>