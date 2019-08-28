document.addEventListener('DOMContentLoaded', function() {

    // Function to populate a feature project left template
    function feature_project(data, direction) {
        var t, item;
        var path = 'projects/';

        // Get template
        if (direction == 'left') {
            t = document.querySelector('#feature-proj-left').content;
        } else {
            t = document.querySelector('#feature-proj-right').content;
        }
        
        // Populate template
        node = document.importNode(t, true);
        node.querySelector('.proj-title').textContent = data['title'];
        node.querySelector('.proj-subtitle').textContent = data['subtitle'];
        node.querySelector('.proj-description').textContent = data['description'];
        node.querySelector('a').href = path.concat(data['name'], '.php');

        var path = '/v6/img/' + data['name'] + '.jpg';
        node.querySelector('.proj-img').src = path;

        // Add Github link if present
        if (data['github'] != '') {
            // Get template
            g = document.querySelector('#ext-template').content;
            n = document.importNode(g, true);

            // Populate with link
            n.querySelector('a').href = data['github'];
            n.querySelector('.proj-ext').src = '/v6/img/github_128.svg';

            // Activate
            node.querySelector('.ext-links').appendChild(n);
        }

        // Add video link if present
        if (data['video'] != '') {
            // Get template
            g = document.querySelector('#ext-template').content;
            n = document.importNode(g, true);

            // Populate with link
            n.querySelector('a').href = data['video'];
            n.querySelector('.proj-ext').src = '/v6/img/video_128.svg';

            // Activate
            node.querySelector('.ext-links').appendChild(n);
        }

        // Add keywords
        if (data['keywords'].length > 0) {
            keys = data['keywords'];
            for (var i = 0; i < keys.length; i++) {
                // Get template
                var k = document.querySelector('#keyword-template').content;
                n = document.importNode(k, true);

                // Populate
                n.querySelector('.keyword').textContent = keys[i];

                // Activate
                node.querySelector('.proj-keywords').appendChild(n);
            }
        }

        // Activate template
        document.querySelector('#highlights').appendChild(node);
    }

    // Function to load the project list
    function load_projects() {
        var xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var projects = JSON.parse(this.responseText);
                var count = 0;
                var left = false;

                for ([key, value] of Object.entries(projects)) {
                    if (count < 4) {
                        // Fill highlights
                        if (left) {
                            feature_project(value, 'left');
                        } else {
                            feature_project(value, 'right');
                        }
                        left = !left;
                        count += 1;
                    }
                }
            }
        };
    
        xmlhttp.open("GET", "projects/project_info.php?get_list=1", true);
        xmlhttp.send();
    };

    // Load projects into DOM
    load_projects();

});