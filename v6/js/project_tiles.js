function fill_accordion_template(data) {
    var t, item;
    var path = 'projects/';

    // Get template
    t = document.querySelector('#panel-template').content;

    // Populate template
    node = document.importNode(t, true);
    node.querySelector('.panel-title').textContent = data['title'];
    node.querySelector('.panel-subtitle').textContent = data['subtitle'];
    node.querySelector('.panel-text').textContent = data['description'];
    node.querySelector('.panel-link').href = path.concat(data['name'], '.php');

    // Activate template
    document.querySelector('#accordion').appendChild(node);
};

function fill_grid_template(data) {
    var t, item;
    var path = 'projects/';

    // Get template
    t = document.querySelector('#grid-template').content;

    // Populate template
    node = document.importNode(t, true);
    node.querySelector('.grid-title').textContent = data['title'];
    node.querySelector('.grid-subtitle').textContent = data['subtitle'];
    node.querySelector('.grid-text').textContent = data['description'];
    node.querySelector('.grid-link').href = path.concat(data['name'], '.php');

    // Activate template
    document.querySelector('#grid').appendChild(node);
};

function load_projects() {
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var projects = JSON.parse(this.responseText);
            var count = 0;
            for ([key, value] of Object.entries(projects)) {
                if (count < 6) {
                    // Fill accordion
                    fill_accordion_template(value);
                    count += 1;
                } else {
                    // Fill grid
                    fill_grid_template(value);
                }
            }
        }
    };

    xmlhttp.open("GET", "projects/project_info.php?get_list=1", true);
    xmlhttp.send();
};

document.addEventListener('DOMContentLoaded', load_projects());

document.addEventListener('DOMContentLoaded', function() {
    var base = document.getElementById('accordion');
    var selected_proj;
    if (base) {
        base.addEventListener('click', function(event) {
            // Check if proper div was clicked
            if (event.target.classList.contains('proj-panel')) {
                // Show/hide panel depending on if it was already active or not
                if (event.target.classList.contains('panel-active')) {
                    event.target.style.flexGrow = '1';
                    event.target.classList.remove('panel-active');
                } else {
                    event.target.style.flexGrow = '20';
                    event.target.classList.add('panel-active');
                }
                
                // Show panel if it was clicked again from hidden state
                if (selected_proj) {
                    if (selected_proj != event.target) {
                        selected_proj.style.flexGrow = '1';
                        selected_proj.classList.remove('panel-active');
                    }
                }
                
                // Update the selected_project object
                selected_proj = event.target;
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var toggle = true;
    var grid = document.getElementById('grid');

    document.getElementById('more-proj').addEventListener('click', function() {
        // Toggle the "more projects" section when button is clicked
        if (toggle) {
            grid.style.display = 'flex';
            toggle = !toggle;
        } else {
            grid.style.display = 'none';
            toggle = !toggle;
        }        
    });
});