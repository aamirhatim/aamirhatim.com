<!DOCTYPE html>
<html>
  <?php include('../parse_project_info.php'); ?>

  <head>
    <?php
    include "../../head.php";
    include "../load_project_title.php";
    ?>
    <link rel = "stylesheet" href = "/css/projects.css">
    <script src = "../../js/fades.js"></script>
  </head>

  <nav>
    <?php include "../../navbar.php";?>
  </nav>

  <body>
    <div id = "header">
      <?php include("../load_project_header.php");?>
    </div>

    <div id = "peep">
      <div id = "gallery">
      </div>

      <div id = "skills-concepts-container">
          <div class = "info-box">
            <?php include("../load_github_link.php");?>
            <br>
            <h6>Skills & Concepts</h6>
            <div id = "skills-concepts">
              <?php include("../load_skills_concepts.php");?>
            </div>
            <br>
        </div>
      </div> <!-- CLOSE SKILLS-CONCEPTS-CONTAINER -->
    </div> <!-- CLOSE PEEP -->

    <div class = "description">
      <?php include("description.php");?>
    </div>
  </body>

  <footer>
    <?php include "../../footer.php";?>
  </footer>

</html>
