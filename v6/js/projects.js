document.addEventListener('DOMContentLoaded', function() {

    // Github template
    function github_link(link) {
        var t = document.querySelector('#github-link').content;
        var n = document.importNode(t, true);

        n.querySelector('a').href = link;
        return n;
    }

    // Video template
    function video_link(link) {
        var t = document.querySelector('#video-link').content;
        var n = document.importNode(t, true);

        n.querySelector('a').href = link;
        return n;
    }

    // Function to populate a feature project left template
    function feature_project(data, direction) {
        var t;

        // Get template
        if (direction == 'left') {
            t = document.querySelector('#feature-proj-left').content;
        } else {
            t = document.querySelector('#feature-proj-right').content;
        }
        
        // Populate template
        node = document.importNode(t, true);
        node.querySelector('h2').textContent = data['title'];
        node.querySelector('h5').textContent = data['subtitle'];
        node.querySelector('.proj-description').textContent = data['description'];
        node.querySelector('a').href = '/v6/projects/article.php?project=' + data['name'];

        var img_path = '/v6/img/' + data['name'] + '.jpg';
        node.querySelector('.proj-img').src = img_path;

        // Add external links
        if (data['github'] != '') {
            node.querySelector('.ext-links').appendChild(github_link(data['github']));
        }
        if (data['video'] != '') {
            node.querySelector('.ext-links').appendChild(video_link(data['video']));
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

    // Function to populate other projects
    function project_grid(data) {
        var t;

        // Get template
        t = document.querySelector('#grid-template').content;

        // Populate template
        node = document.importNode(t, true);
        node.querySelector('h4').textContent = data['title'];
        node.querySelector('h6').textContent = data['subtitle'];
        node.querySelector('.grid-description').textContent = data['description'];
        node.querySelector('a').href = '/v6/projects/article.php?project=' + data['name'];

        // Add external links
        if (data['github'] != '') {
            node.querySelector('.ext-links').appendChild(github_link(data['github']));
        }
        if (data['video'] != '') {
            node.querySelector('.ext-links').appendChild(video_link(data['video']));
        }

        // Activate template
        document.querySelector('#grid').appendChild(node);
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
                    } else {
                        project_grid(value);
                    }
                }
            }
        };
    
        xmlhttp.open("GET", "/v6/projects/project_info.php?get_list=1", true);
        xmlhttp.send();
    };

    // Load projects into DOM
    load_projects();

    // Toggle project grid
    var toggle = true;
    var grid = document.getElementById('grid');

    document.getElementById('more-proj').addEventListener('click', function() {
        var height;
        // Toggle the "more projects" section when button is clicked
        if (toggle) {
            grid.style.display = 'flex';
            grid.style.height = grid.scrollHeight.toString() + 'px';
            grid.style.opacity = '1';
            toggle = !toggle;
            document.getElementById('more-proj').innerHTML = 'Show Less';
        } else {
            grid.style.height = '0px';
            grid.style.opacity = '0';
            window.setTimeout(function () {
                grid.style.display = 'none';
            }, 500);
            toggle = !toggle;
            document.getElementById('more-proj').innerHTML = 'See More Projects!';
        }        
    });

});