<?php

require 'article_layout.php';
require 'project_info.php';
$project = $PROJECT_LIST['sample'];

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
        <p>Sample Works<p>
    </main>
</body>

</html>