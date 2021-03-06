<!DOCTYPE html>
<html>

  <head>
    <?php include "head.php";?>
		<title>Aamir Husain</title>
    <link rel = "stylesheet" href = "css/contact.css">
    <script src = "js/fades.js"></script>
    <script src = "js/superlatives.js"></script>
    <script src = "js/filter.js"></script>
  </head>

  <body>
    <nav>
      <?php include "navbar.php";?>
    </nav>

    <main>

      <div id = "dropdown">
        <div id = "filter-container">
          <div id = "filter-choice">
            Highlights
            <img src = "/img/dropdown.svg">
          </div>
          <div id = "filters" class = "dropdown-filters">
            <div id = "all">All</div>
            <div id = "highlight">Highlights</div>
            <div id = "mechatronics">Mechatronics</div>
            <div id = "ml">Machine Learning</div>
            <div id = "python">Python</div>
            <div id = "ros">ROS</div>
            <div id = "c">C</div>
            <div id = "cv">Computer Vision</div>
            <div id = "mathematica">Mathematica</div>
          </div>
        </div>
      </div>

      <section id = "portfolio">
        <?php
        $project_name = "boeing";
        include("projects/load_tile.php");

        $project_name = "argo";
        include("projects/load_tile.php");

        $project_name = "day_zero";
        include("projects/load_tile.php");

        $project_name = "baxter";
        include("projects/load_tile.php");

        $project_name = "network";
        include("projects/load_tile.php");

        $project_name = "motor_controller";
        include("projects/load_tile.php");

        $project_name = "kuka";
        include("projects/load_tile.php");

        $project_name = "rrt";
        include("projects/load_tile.php");

        $project_name = "website";
        include("projects/load_tile.php");

        $project_name = "splits";
        include("projects/load_tile.php");

        $project_name = "techtiles";
        include("projects/load_tile.php");

        $project_name = "speakers";
        include("projects/load_tile.php");
        ?>
      </section>
    </main>

    <div id = "scissors">
      <img src = "img/scissors.svg">
      <div id = "line"><div></div></div>
    </div>

    <section id = "contact">
      <?php include('contact.php'); ?>
    </section>

    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>

</html>
