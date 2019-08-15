function fill_template(data) {
    var t, item;

    // Get template
    t = document.querySelector('#panel-template').content;

    // Populate template
    node = document.importNode(t, true);
    node.querySelector('.proj-title').textContent = data['title'];
    node.querySelector('.proj-subtitle').textContent = data['subtitle'];
    node.querySelector('.proj-text').textContent = data['description'];

    // Activate template
    document.querySelector('#accordion').appendChild(node);
};

function load_projects() {
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var projects = JSON.parse(this.responseText);
            for ([key, value] of Object.entries(projects)) {
                fill_template(value);
            }
        }
    };

    xmlhttp.open("GET", "projects/project_info.php", true);
    xmlhttp.send();
};

document.addEventListener('DOMContentLoaded', load_projects());

document.addEventListener('DOMContentLoaded', function() {
    var base = document.getElementById('accordion');
    var selected_proj;
    if (base) {
        base.addEventListener('click', function(event) {
            if (event.target.classList.contains('proj-panel')) {
                if (event.target.classList.contains('panel-active')) {
                    event.target.style.flexGrow = '1';
                    event.target.classList.remove('panel-active');
                } else {
                    event.target.style.flexGrow = '20';
                    event.target.classList.add('panel-active');
                }
    
                if (selected_proj) {
                    if (selected_proj != event.target) {
                        selected_proj.style.flexGrow = '1';
                        selected_proj.classList.remove('panel-active');
                    }
                }
    
                selected_proj = event.target;
            }
        });
    }
})