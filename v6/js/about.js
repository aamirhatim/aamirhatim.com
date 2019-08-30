document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('about-img').addEventListener('mouseover', function() {
        document.getElementById('about-img').src = '/v6/img/about_2.png';
    });

    document.getElementById('about-img').addEventListener('mouseout', function() {
        document.getElementById('about-img').src = '/v6/img/about.png';
    });

});