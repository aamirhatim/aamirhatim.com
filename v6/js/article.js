document.addEventListener('DOMContentLoaded', function() {
    // Insert correct figure numbers for article
    function fig_numbers() {
        // Get all figcaption elements
        var figs = document.getElementsByTagName('figcaption');

        if (figs.length > 0) {
            for (var i = 0; i < figs.length; i++) {
                // Add figure number to beginning of text
                var fignum = i+1;
                figs[i].textContent = 'Fig. ' + fignum.toString() + ': ' + figs[i].textContent;
            }
        }
    }

    fig_numbers();
});