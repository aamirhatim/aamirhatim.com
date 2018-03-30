<!DOCTYPE html>
<html>

  <head>
    <?php include "head.php";?>
		<title>Aamir Husain</title>
    <script src = "js/fades.js"></script>
    <script src = "js/superlatives.js"></script>
  </head>

  <nav>
    <?php include "navbar.php";?>
  </nav>

  <body>
    <div id = "portfolio">
      <?php
      $project_name = "argo";
      include("projects/load_tile.php");

      $project_name = "baxter";
      include("projects/load_tile.php");

      $project_name = "website";
      include("projects/load_tile.php");

      $project_name = "techtiles";
      include("projects/load_tile.php");

      $project_name = "kuka";
      include("projects/load_tile.php");

      // $project_name = "splits";
      // include("projects/load_tile.php");
      ?>
    </div>

    <div id = "scissors">
      <img src = "img/scissors.svg">
      <div id = "line"><div></div></div>
    </div>

    <div id = "contact">
      <div class = "contact" id = "contact-text">
        <h1>ASK ME ANYTHING!</h1>
        <p>Feel free to ask me anything</p>
      </div>

      <div class = "contact" id = "contact-form">
      </div>
    </div>
  </body>

  <footer>
    <?php include "footer.php";?>
  </footer>

</html>
