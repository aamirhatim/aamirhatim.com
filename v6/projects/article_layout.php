<?php

function insert_nav() {
    require '../modules/nav.html';
}

function insert_footer() {
    require '../modules/footer.html';
}

function insert_header($title) {
    echo <<<HEAD
    <head>
        <title>$title</title>
        <link rel='stylesheet' href='/v6/css/global.css'>
        <link rel='stylesheet' href='/v6/css/article.css'>
    </head>
HEAD;

}

function article_panel($title, $description) {
    echo <<<TITLE_PANEL
    <section id='article-panel'>
        <div id='proj-title'>$title</div>
        <div id='proj-subtitle'>$description</div>
    </section>
TITLE_PANEL;
}


?>