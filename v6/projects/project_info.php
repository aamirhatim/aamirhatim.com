<?php

class ProjectInfo {
    var $name;
    var $title;
    var $subtitle;
    var $description;
    var $github;
    var $video;

    function __construct($name, $title, $subtitle, $description, $github, $video)
    {
        $this->name = $name;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->github = $github;
        $this->video = $video;
    }
}

$PROJECT_LIST = array (
    'omni' => new ProjectInfo(
        'omni',
        'The Omni Project',
        'MSR Final Project (2018)',
        'Simultaneous operation of three omni-directional robots used for mapping the environment and manipulating large objects',
        '',
        'https://www.youtube.com/embed/xSkom9F3TOs'
    ),

    'argo' => new ProjectInfo(
        'argo',
        'Argo',
        'MSR Winter Project (2018)',
        'An autonomous differential drive suitcase that uses AR tags to track and follow objects in its environment',
        'https://github.com/aamirhatim/argo',
        'https://www.youtube.com/embed/L7owzQ5A6ZQ'
    )
);

echo json_encode($PROJECT_LIST);

?>