<head>
    <link rel='stylesheet' href='/v6/css/experience.css'>
    <script src='/v6/js/experience.js'></script>
</head>

<section id='experience'>
    <div id='timeline'>
        <div id='line'></div>
        <template id='timeline-block'>
            <img class='job' src=''>
        </template>
    </div>

    <div id='job-window'>
        <div id='job-text'>
            <h2 id='job-title'></h2>
            <div class='job-details'>
                <?php echo file_get_contents('img/map_pin.svg'); ?>
                <h3 id='job-location'></h3>
            </div>
            <div class='job-details'>
                <?php echo file_get_contents('img/calendar.svg'); ?>
                <h3 id='job-time'></h3>
            </div>
            <ul id='job-description'></ul>
        </div>
    </div>

    <template id='company'>
        <a href=''><span id='job-company'></span></a>
    </template>

    <template id='job-bullet'>
        <li><p>Work</p></li>
    </template>
</section>