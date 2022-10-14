<?php
session_start();

if(isset($_SESSION["email_logado"]) == false) {
 header('location: cadastrousuario.php');
 exit;
};
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <script src="https://kit.fontawesome.com/9884a810af.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Golden Voice</title>

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="stylepaginainicial.css">
</head>

<body>

  <div class="page">

    <nav>
      <a id="logo" href="#">
        <img src="images/logohor.png" alt="logo" height="80px">
      </a>
      <ul>
        <li> <i class="fa fa-user" aria-hidden="true"> </i> <a href="perfil.php"> Perfil</a></li>
        <li> <i class="fa fa-microphone" aria-hidden="true"> </i> <a href="treinar.php"> Treinar</a></li>
        <li> <i class="fa fa-question-circle" aria-hidden="true"> </i><a href="forum.php"> Fórum</a></li>
        <li> <i class="fa fa-power-off" aria-hidden="true"> </i><a href="logout.php"> Sair</a></li> 
      </ul>
    </nav>
 
    <main>
      <section>

        <h1>Treinos <span>exclusivos</span>
          para você!</h1>

        <p>
          Nós criamos treinos <strong>exclusivos e únicos para você.</strong><br />
          Invista na sua voz e <strong>tenha muito mais performance</strong> e qualidade de vida.

        </p>

        <a class="button" href="treinar.php" target="_blank">
          <i class="fa fa-microphone" ></i>
          Treine agora!
        </a>
      </section>


      <img src="images/music.svg" alt="music" height="500 px">


    </main>
    <footer>
      fale concosco no instagram
      <a href="https://instagram.com/treineme" target="_blank">@golden.voice</a>
    </footer>
  </div>

  <img id="balls" src="images/bolas.png" alt="Bolinhas decorativas amarelas no canto inferior direito da página." width="80px">

</body>

</html>