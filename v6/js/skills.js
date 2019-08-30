document.addEventListener('DOMContentLoaded', function() {

    // var skill_boxes = document.getElementsByClassName('skill-box');
    // for (var i = 0; i < skill_boxes.length; i++) {
    //     skill_boxes[i].addEventListener('scroll', function() {
    //         // Get the distance between skill box and 
    //     })
    // }

    var skills = document.getElementById('skills');
    document.addEventListener('scroll', function() {
        // Get distance of skills section from top of the browser window
        dist = skills.getBoundingClientRect().top;
        
        // Animate skill boxes on scroll
        boxes = document.getElementsByClassName('skill-box');
        // console.log(boxes);
        if (dist >= 0) {
            boxes[0].style.right = dist/20 + 'px';
            boxes[1].style.top = dist/20 + 'px';
            boxes[2].style.left = dist/20 + 'px';
        }
    });
});