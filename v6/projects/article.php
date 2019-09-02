<?php
// Get project list
require 'project_info.php';

// Get project name
$project_name = $_GET['project'];

// Check if project exists
if (array_key_exists($project_name, $PROJECT_LIST)) {
    $project = $PROJECT_LIST[$project_name];
} else {
    header('Location: /v6/home.php');
    exit();
}

function add_video($project) {
    if ($project->video != '') {
        echo <<<VIDEO
        <iframe id='video' src=$project->video></iframe>
VIDEO;
    }
}

function add_keywords($keywords) {
    if (count($keywords) > 0) {
        foreach ($keywords as $k) {
            echo <<<KEYWORD
            <div class='keyword'>$k</div>
KEYWORD;
        }
    }
}

function add_github($github) {
    if ($github != '') {
        $svg = file_get_contents('../img/github.svg');
        echo <<<GITHUB
        <a href=$github>$svg</a>
GITHUB;
    }
}

?>

<!DOCTYPE html>

<html>

<head>
    <title><?php echo $project->title; ?></title>
    <link rel='stylesheet' href='/v6/css/global.css'>
    <link rel='stylesheet' href='/v6/css/article.css'>
    <link href="https://fonts.googleapis.com/css?family=Hepta+Slab|Open+Sans|Titillium+Web|Roboto+Mono:300&display=swap" rel="stylesheet">
</head>

<body>
    <section id='article-panel'>
        <nav>
            <a href='../home.php'><?php echo file_get_contents('../img/logo_block.svg'); ?></a>
            <?php add_github($project->github); ?>
        </nav>
        <div id='panel-contents'>
            <div id='article-title'>
                <h1><?php echo $project->title; ?></h1>
                <h3><?php echo $project->subtitle; ?></h3>
            </div>

            <?php add_video($project); ?>

            <div id=keywords>
                <?php add_keywords($project->keywords); ?>
            </div>
        </div>
    </section>

    <main id='article-content'>
        <h3 id='summary'><?php echo $project->description; ?></h3>
    </main>
</body>

</html>