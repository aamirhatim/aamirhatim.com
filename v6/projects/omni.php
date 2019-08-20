<?php

require 'article_layout.php';
require 'project_info.php';
$project = $PROJECT_LIST['omni'];

?>

<!DOCTYPE html>

<html>

<?php
insert_header($project->title);
insert_nav();
?>

<body>
    <!-- Generate panel -->
    <?php article_panel($project->title, $project->description) ?>

    <!-- Add article contents -->
    <main>
        <p>Omni Works<p>
    </main>
</body>

</html>