<!DOCTYPE html>
<html>
  <?php $about = file('about.txt');
  $photo = $about[1];
  $title = $about[4];
  $bio = $about[7];
  ?>

  <head>
    <?php include("../../head.php");?>
		<title>Aamir Husain | About</title>
    <link rel = "stylesheet" href = "/css/about.css">
  </head>

  <nav>
    <?php
    $nav_page = 'about';
    include "../../navbar.php";
    ?>
  </nav>

  <body>
    <main>
      <div id = "about-img">
        <img src = <?php echo '"../../img/'.$photo.'"'; ?>>
      </div>

      <div id = "about-container" class = "container-row">
        <div id = "about-txt" class = "container-column">
          <h4><?php echo $title; ?></h4>
          <p>
            <?php echo $bio; ?>
          </p>

          <div id = "schools">
            <div class = "school-tile">
              <div class = "school-txt">
                <h1>Master of Science</h1>
                <h2>Robotics</h2>
                <img src = "/img/wildcat.svg">
                <h2>Northwestern University</h2>
              </div>
              <div class = "school-hover" style = "background-color: #4E2A84">GO CATS!</div>
            </div>

            <div class = "school-tile">
              <div class = "school-txt">
                <h1>Bachelor of Science</h1>
                <h2>Biomedical Engineering</h2>
                <img src = "/img/colonial.svg">
                <h2>George Washington University</h2>
              </div>
              <div class = "school-hover" style = "background-color: #004065">RAISE HIGH!</div>
            </div>
          </div>

        </div>
      </div>
    </main>

    <footer>
      <?php include "../../footer.php";?>
    </footer>
  </body>

</html>
