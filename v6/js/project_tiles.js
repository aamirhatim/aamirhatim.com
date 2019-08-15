function fill_template(data) {
    var t, item;

    // Get template
    t = document.querySelector('#tile-template').content;

    // Populate template
    node = document.importNode(t, true);
    node.querySelector('.proj-title').textContent = data['title'];
    node.querySelector('.proj-subtitle').textContent = data['subtitle'];
    node.querySelector('.proj-text').textContent = data['description'];

    // Activate template
    document.querySelector('#tiles').appendChild(node);
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