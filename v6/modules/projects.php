<head>
    <link rel='stylesheet' href='/v6/css/projects.css'>
    <script src='/v6/js/projects.js'></script>
</head>

<section id='projects' class='home-section'>
    <div class='section-header' id='projects-header'>
        <?php echo file_get_contents('img/nav_projects.svg'); ?>
    </div>

    <div id='highlights'>
        <template id=feature-proj-left>
            <div class='proj-item' style='align-items: flex-start;'>
                <img class='proj-img' src='' style='right: 0;'>
                <div class='proj-header'>
                    <h2 class='proj-title'></h2>
                    <h3 class='proj-subtitle'></h3>
                </div>
                <div class='proj-text' style='align-items: flex-start;'>
                    <p class='proj-description' style='box-shadow: -7px -7px var(--accent-1);'></p>
                    <div class='proj-extras' style='left: 10px;'>
                        <div class='ext-links'></div>
                        <h3 class='proj-link'>
                            <a href='projects/sample.php'>Read More</a>
                            <?php echo file_get_contents('img/arrow.svg'); ?>
                        </h3>
                    </div>
                    <div class='proj-keywords' style='justify-content: flex-start;'></div>
                </div>
            </div>
        </template>

        <template id=feature-proj-right>
                <div class='proj-item' style='align-items: flex-end;'>
                    <img class='proj-img' src='' style='left: 0;'>
                    <div class='proj-header' style='text-align: right;'>
                        <h2 class='proj-title'></h2>
                        <h3 class='proj-subtitle'></h3>
                    </div>
                    <div class='proj-text' style='align-items: flex-end;'>
                        <p class='proj-description' style='box-shadow: 7px -7px var(--accent-1);'></p>
                        <div class='proj-extras' style='right: 10px;'>
                            <div class='ext-links'></div>
                            <h3 class='proj-link'>
                                <a href='projects/sample.php'>Read More</a>
                                <?php echo file_get_contents('img/arrow.svg'); ?>
                            </h3>
                        </div>
                        <div class='proj-keywords' style='justify-content: flex-end;'></div>
                    </div>
                </div>
            </template>

            <template id='github-link'>
                <a><?php echo file_get_contents('img/github.svg'); ?></a>
            </template>

            <template id='video-link'>
                <a><?php echo file_get_contents('img/video.svg'); ?></a>
            </template>

            <template id='keyword-template'>
                <h3 class='keyword'></h3>
            </template>


    </div>

    <div id='grid'>
        <template id='grid-template'>
            <div class='grid-tile'>
                <div class='grid-text'>
                    <h2 class='grid-title'></h2>
                    <h3 class='proj-subtitle'></h3>
                    <p class='grid-description'></p>
                </div>
                <div class='grid-extras'>
                    <div class='ext-links'></div>
                    <h3 class='proj-link'>
                        <a href='projects/sample.php'>Read More</a>
                        <?php echo file_get_contents('img/arrow.svg'); ?>
                    </h3>
                </div>
            </div>
        </template>
    </div>

    <h3 id='more-proj'>See More Projects!</h3>
    <div id='proj-fade'></div>
    
</section>