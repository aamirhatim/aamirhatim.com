document.addEventListener('DOMContentLoaded', function() {
    var skills = document.getElementById('skills');
    document.addEventListener('scroll', function() {
        // Get distance of skills section from top of the browser window
        dist = skills.getBoundingClientRect().top;
        
        // Animate skill boxes on scroll
        boxes = document.getElementsByClassName('skill-box');
        if (dist >= 0) {
            var offset = dist/20;
            boxes[0].style.right = offset+ 'px';
            boxes[1].style.top = offset + 'px';
            boxes[2].style.left = offset + 'px';
        }
    });
});