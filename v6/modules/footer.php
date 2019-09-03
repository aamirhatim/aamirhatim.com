<head>
    <link rel='stylesheet' href='/v6/css/footer.css'>
</head>

<footer>
    <div id='footer-break'>
        <div id='scissors'><?php echo file_get_contents('img/scissors.svg'); ?></div>
        <div id='break-line'></div>
    </div>

    <div id='footer-contents'>
        <div id='footer-links'>
            <div class='footer-item'>
                <?php echo file_get_contents('img/nav_resume.svg'); ?>
                <a href='/Aamir_Husain_Resume.pdf'><h6>Get my resume</h6></a>
            </div>

            <div class='footer-item'>
                <?php echo file_get_contents('img/linkedin.svg'); ?>
                <a href='https://www.linkedin.com/in/aamirhatim/'><h6>linkedin.com/in/aamirhatim</h6></a>
            </div>

            <div class='footer-item'>
                <?php echo file_get_contents('img/github.svg'); ?>
                <a href='https://github.com/aamirhatim'><h6>github.com/aamirhatim</h6></a>
            </div>

            <div class='footer-item'>
                <?php echo file_get_contents('img/insta.svg'); ?>
                <a href='https://www.instagram.com/aamirhatim/'><h6>instagram.com/aamirhatim</h6></a>
            </div>
        </div>

        <div id='dev-info'>
            <h6>
                Designed by Aamir Husain
                <br>
                Powered by: <br>
            </h6>
            <div id='dev-icons'>
                <?php echo file_get_contents('img/dev_html.svg'); ?>
                <?php echo file_get_contents('img/dev_css.svg'); ?>
                <?php echo file_get_contents('img/dev_js.svg'); ?>
            </div>
        </div>
    </div>
</footer>