<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Golden Voice</title>

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css" />
  <link rel="stylesheet" href="styleforum.css" />
  <style>
    .errada{
      background-color: red;
    }
    .correta{
      background-color: green;
    }
  </style>
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
if(!isset($_GET['cont_id'])){
    if(!isset($_POST['cont_id'])){
      header('Location: treinar.php');
      exit;
    }else{
      $cod = $_POST['cont_id'];
    }
}else{
  $cod = $_GET['cont_id'];
}
include('conexao.php');
$sql = "SELECT * from questao where cod_conteudo = '$cod'";
$questoes = mysqli_query($conn, $sql);
$erros = [];

session_start();
if(isset($_POST['sub_questoes'])){
  while($questao = mysqli_fetch_assoc($questoes)) {
      if(isset($_POST[$questao['enunciado']])){
        $marcou = $_POST[$questao['enunciado']];
      }else{
        $marcou = 'asdjasnksfasdbhf';
      }
      $erros[$questao['enunciado']] = ['marcou'=> $marcou, 'certa'=>'alt'.$questao['alt_correta']];
  }
}

$questoes = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questoes</title>
</head>
<body>
  <form action="" method="post">
    <?php while($row = mysqli_fetch_assoc($questoes)) {?>
    <h2><?=$row['enunciado']?></h2>        
    <input type="radio" id="<?=$row['enunciado']?>alt1" name="<?=$row['enunciado']?>" value="alt1">
    <label for="<?=$row['enunciado']?>alt1" class="<?php
    if(count($erros) > 0){
      if($erros[$row['enunciado']]['certa'] == 'alt1'){
        echo 'correta';
        }
        if($erros[$row['enunciado']]['marcou'] == 'alt1' && $erros[$row['enunciado']]['certa'] != 'alt1'){
          echo 'errada';
        }
    }
    ?>"><?=$row['alt1']?></label><br>
    <input type="radio" id="<?=$row['enunciado']?>alt2" name="<?=$row['enunciado']?>" value="alt2">
    <label for="<?=$row['enunciado']?>alt2" class="<?php
    if(count($erros) > 0){
      if($erros[$row['enunciado']]['certa'] == 'alt2'){
        echo 'correta';
      }
      if($erros[$row['enunciado']]['marcou'] == 'alt2' && $erros[$row['enunciado']]['certa'] != 'alt2'){
        echo 'errada';
      }
    }
    ?>"><?=$row['alt2']?></label><br>
    <input type="radio" id="<?=$row['enunciado']?>alt3" name="<?=$row['enunciado']?>" value="alt3">
    <label for="<?=$row['enunciado']?>alt3" class="<?php
    if(count($erros) > 0){
      if($erros[$row['enunciado']]['certa'] == 'alt3'){
        echo 'correta';
      }
      if($erros[$row['enunciado']]['marcou'] == 'alt3' && $erros[$row['enunciado']]['certa'] != 'alt3'){
          echo 'errada';
        }
    }
    ?>"><?=$row['alt3']?></label><br>
    <input type="radio" id="<?=$row['enunciado']?>alt4" name="<?=$row['enunciado']?>" value="alt4">
    <label for="<?=$row['enunciado']?>alt4" class="<?php
    if(count($erros) > 0){
      if($erros[$row['enunciado']]['certa'] == 'alt4'){
      echo 'correta';
      }
      if($erros[$row['enunciado']]['marcou'] == 'alt4' && $erros[$row['enunciado']]['certa'] != 'alt4'){
        echo 'errada';
      }
    }
    ?>"><?=$row['alt4']?></label><br>
    <input type="radio" id="<?=$row['enunciado']?>alt5" name="<?=$row['enunciado']?>" value="alt5" >
    <label for="<?=$row['enunciado']?>alt5" class="<?php
    if(count($erros) > 0){
      if($erros[$row['enunciado']]['certa'] == 'alt5'){
        echo 'correta';
      }
      if($erros[$row['enunciado']]['marcou'] == 'alt5' && $erros[$row['enunciado']]['certa'] != 'alt5'){
        echo 'errada';
      }
    }
    ?>"><?=$row['alt5']?></label><br>
    <?php } ?>
  <input type="hidden" value="<?=$cod?>" />
  <button type="submit" name="sub_questoes">Enviar</button>
  </form>
</body>
</html>

