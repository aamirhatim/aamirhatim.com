<!DOCTYPE html>
<html>
  <?php include('parse_project_info.php'); ?>

  <head>
    <?php
    include("../../head.php");
    include("load_project_title.php");
    ?>
    <link rel = "stylesheet" href = "/css/projects.css">
  </head>

  <body>
    <nav>
      <?php
      $nav_page = 'portfolio';
      include("../../navbar.php");
      ?>
    </nav>

    <header <?php include("load_project_header.php");?> >
      <?php
      echo '<div id = "project-title">';
      echo '<h3>'.$title.'</h3>';
      echo '<h4>'.$proj_desc.'</h4>';
      include("load_github_link.php");
      echo '</div>';
      // if (trim($video) != "none") {
      //   echo '<iframe class = "header-video" src = "'.$video.'"></iframe>';
      // }
      ?>

      <div id = "skills-concepts-container">
        <div id = "skills-concepts-content">
          <p>SKILLS & CONCEPTS</p>
          <div id = "skills-concepts">
            <?php include("load_skills_concepts.php");?>
          </div>
        </div>
      </div>
    </header>

    <main>
      <section id = "peep">
        <?php include("load_gallery.php"); ?>
      </section>

      <section id = "description">
        <?php include("description.php");?>
      </section>
    </main>

    <footer>
      <?php include("../../footer.php");?>
    </footer>
  </body>

</html>
