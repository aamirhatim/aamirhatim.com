function fill_accordion_template(data) {
    var t, item;
    var path = 'projects/';

    // Get template
    t = document.querySelector('#panel-template').content;

    // Populate template
    node = document.importNode(t, true);
    node.querySelector('.panel-title').textContent = data['title'];
    node.querySelector('.panel-subtitle').textContent = data['subtitle'];
    node.querySelector('.panel-description').textContent = data['description'];
    node.querySelector('a').href = path.concat(data['name'], '.php');

    var path = '/v6/img/' + data['name'] + '.jpg';
    node.querySelector('.proj-panel').style.backgroundImage = 'url("' + path + '")';

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

function select_panel(panel) {
    panel.style.flexGrow = '20';
    panel.classList.add('panel-active');
    panel.style.height = '320px';
}

function deselect_panel(panel) {
    panel.style.flexGrow = '1';
    panel.classList.remove('panel-active');
    panel.style.height = '300px';
}

function get_panel_list() {
    return document.querySelectorAll('.proj-panel');
}

// var panel_switcher;
window.addEventListener('load', function() {
    var selected = -1;
    var panel_list = get_panel_list();
    console.log(panel_list.length);
    
    // while (typeof panel_list == 'undefined') {
    //     panel_list = get_panel_list();
    //     console.log('hi');
    // }

    // while (typeof panel_list[0] == 'undefined') {
    //     panel_list = get_panel_list();
    //     console.log('ho');
    // }
    // while (panel_list.length == 0) {
    //     panel_list = get_panel_list();
    // }
    
    if (selected == -1) {
        selected = 0;
        select_panel(panel_list[selected]);
    }

    var panel_switcher = setInterval(function() {
        if (selected == -1) {
            selected = 0;
            select_panel(panel_list[selected]);
        } else if (selected < panel_list.length - 1) {
            deselect_panel(panel_list[selected]);
            selected++;
            select_panel(panel_list[selected]);
        } else {
            deselect_panel(panel_list[selected]);
            selected = 0;
            select_panel(panel_list[selected]);
        }
    }, 10000);

    document.getElementById('left-panel-nav').addEventListener('click', function() { 
        if (selected > 0) {
            // clearInterval(panel_switcher);
            deselect_panel(panel_list[selected]);
            selected--;
            select_panel(panel_list[selected]);
            // panel_switcher = setInterval(panel_switcher, 2000);
        }
    });

    document.getElementById('right-panel-nav').addEventListener('click', function() {
        if (selected < panel_list.length - 1) {
            // clearInterval(panel_switcher);
            deselect_panel(panel_list[selected]);
            selected++;
            select_panel(panel_list[selected]);
            // panel_switcher = setInterval(panel_switcher, 2000);
        }
    });

    // accordion.addEventListener('mouseover', function(event) {
    //     var panel = event.target.closest('.proj-panel');
    //     if (!panel.classList.contains('panel-active')) {
    //         panel.style.height = '320px';
    //     }
    // });

    // accordion.addEventListener('mouseout', function(event) {
    //     var panel = event.target.closest('.proj-panel');
    //     if (!panel.classList.contains('panel-active')) {
    //         panel.style.height = '300px';
    //     }
    // });

    // accordion.addEventListener('click', function(event) {
    //     // Select the correct element to modify
    //     var panel = event.target.closest('.proj-panel');

    //     if (!panel.classList.contains('panel-active')) {
    //         deselect_panel(prev_proj);
    //         select_panel(panel);
    //         prev_proj = panel;

    //         for (var i = 0; i < panel_list.length; i++) {
    //             if (panel_list[i] == panel) {
    //                 selected = i;
    //                 break;
    //             }
    //         }
    //     }
    // })
});

document.addEventListener('DOMContentLoaded', function() {
    var base = document.getElementById('accordion');
    var selected_proj;
    if (base) {
        base.addEventListener('click', function(event) {
            // Select the correct element to modify
            var panel = event.target.closest('.proj-panel');

            // Show/hide panel depending on if it was already active or not
            if (!panel.classList.contains('panel-active')) {
                panel.style.flexGrow = '20';
                panel.classList.add('panel-active');
                panel.style.height = '325px';
                
                if (selected_proj) {
                    if (selected_proj != panel) {
                        selected_proj.style.flexGrow = '1';
                        selected_proj.classList.remove('panel-active');
                        selected_proj.style.height = '300px';

                        selected_proj = panel;
                    }
                } else {
                    selected_proj = panel;
                }
            }
        });
    }

    // base.addEventListener('mouseover', function(event) {
    //     var panel = event.target.closest('.proj-panel');
    //     if (!panel.classList.contains('panel-active')) {
    //         panel.style.height = '320px';
    //     }
    // });

    // base.addEventListener('mouseout', function(event) {
    //     var panel = event.target.closest('.proj-panel');
    //     if (!panel.classList.contains('panel-active')) {
    //         panel.style.height = '300px';
    //     }
    // });
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