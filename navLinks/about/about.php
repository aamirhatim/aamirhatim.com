<!DOCTYPE html>
<html>
  <?php $about = file('about.txt');
  $photo = $about[1];
  $bio = $about[4];
  ?>

  <head>
    <?php include("../../head.php");?>
		<title>Aamir Husain | About</title>
    <link rel = "stylesheet" href = "../../css/about.css">
  </head>

  <nav>
    <?php
    $nav_page = 'about';
    include "../../navbar.php";
    ?>
  </nav>

  <body>
    <div id = "about-container" class = "container-row">
      <img class = "tile" src = <?php echo '"../../img/'.$photo.'"'; ?>>
      <div id = "about-txt" class = "container-column">
        <h4>About</h4>
        <p>
          <?php echo $bio; ?>
        </p>
      </div>
    </div>

    <footer>
      <?php include "../../footer.php";?>
    </footer>
  </body>

</html>
