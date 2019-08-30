document.addEventListener('DOMContentLoaded', function() {
    // Landing
    var landing_text = document.getElementById('landing-text');
    window.addEventListener('scroll', function() {
        // Scale the opacity value against scroll value
        var scroll = document.documentElement.scrollTop;
        var opacity = Math.max(0, 1 - scroll/600.0);
        var padding = scroll/3.0;

        // Set opacity
        landing_text.style.opacity = opacity.toString();

        // Set padding
        landing_text.style.paddingBottom = padding.toString() + 'px';
    });


    // Skills header & body
    document.addEventListener('scroll', function() {
        // Get distance of skills section from top of the browser window
        var skills = document.getElementById('skill-boxes');
        var dist = skills.getBoundingClientRect().top;
        
        // Animate skill boxes on scroll
        var boxes = document.getElementsByClassName('skill-box');
        if (dist >= 0) {
            var offset = dist/20;
            boxes[0].style.right = offset+ 'px';
            boxes[1].style.top = offset + 'px';
            boxes[2].style.left = offset + 'px';

            var img = document.querySelector('#skills-header img');
            img.style.top = dist/10 + 'px';
        }
    });

    // Projects header
    document.addEventListener('scroll', function() {
        var highlights = document.getElementById('highlights');
        var dist = highlights.getBoundingClientRect().top;

        if (dist >= 0) {
            var img = document.querySelector('#projects-header img');
            img.style.top = dist/10 + 'px';
        }
    });

    // About header
    document.addEventListener('scroll', function() {
        var about = document.getElementById('about-contents');
        var dist = about.getBoundingClientRect().top;

        if (dist >= 0) {
            var img = document.querySelector('#about-header img');
            img.style.top = dist/10 + 'px';
        }
    });
});