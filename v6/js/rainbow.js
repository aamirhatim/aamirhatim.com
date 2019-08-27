var rainbow = [
    '#5ebd3e',
    '#ffb900',
    '#f78200',
    '#e23838',
    '#973999',
    '#009dcf'
];

document.addEventListener('DOMContentLoaded', function() {
    var scroll_count = 0;
    var color_pos = 0;
    var rainbow_txt = document.getElementById('rainbow');

    window.addEventListener('scroll', function() {
        if (document.documentElement.scrollTop == 0) {
            rainbow_txt.style.color = 'black';
        } else if (scroll_count >= 10) {
            if (color_pos == rainbow.length - 1) {
                color_pos = 0;
            } else {
                color_pos++;
            }
            rainbow_txt.style.color = rainbow[color_pos];
            scroll_count = 0;
        } else {
            scroll_count++;
        }
    });

    // Change transparency of landing text with scroll
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
});