document.addEventListener('DOMContentLoaded', function() {

    // Show work experience in reading window
    function show_experience(data) {
        // Get the reading window
        var w = document.getElementById('job-window');

        // Populate
        w.querySelector('#job-title').innerHTML = data['position'];
        w.querySelector('#job-location').innerHTML = data['location'];
        w.querySelector('#job-time').innerHTML = data['date'];

        // Populate company name
        var c = document.getElementById('company').content;
        var node = document.importNode(c, true);
        node.querySelector('#job-company').innerHTML = '@' + data['company'];
        node.querySelector('a').href = data['company_link'];
        document.querySelector('#job-title').appendChild(node);

        // Reset then Populate job description
        document.querySelector('#job-description').textContent = '';
        description = data['description'];
        for (var i = 0; i < description.length; i++) {
            var d = document.getElementById('job-bullet').content;
            node = document.importNode(d, true);
            node.querySelector('p').textContent = description[i];

            document.querySelector('#job-description').appendChild(node);
        }
        
    };

    // Add timeline entry
    function timeline_block(data) {
        // Get template
        var t = document.querySelector('#timeline-block').content;

        // Populate
        node = document.importNode(t, true);
        node.querySelector('.job').id = data['name'];
        node.querySelector('.job').src = '/v6/img/' + data['name'] + '.svg';

        // Activate
        document.querySelector('#timeline').appendChild(node);
    };

    // Import work list
    function load_work_list() {
        var xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var experiences_json = JSON.parse(this.responseText);
                var experiences = Object.entries(experiences_json);

                // Create timeline blocks
                for ([key, value] of experiences) {
                    timeline_block(value);
                }

                // Create event listeners for each block
                var jobs = document.getElementsByClassName('job');
                for (var i = 0; i < jobs.length; i++) {
                    // Create event listener
                    jobs[i].addEventListener('mouseover', function() {
                        if (!this.classList.contains('job-active')) {
                            prev_job.classList.remove('job-active');

                            // Get correct data
                            var data = experiences_json[this.id];

                            // Populate reading pane
                            document.getElementById('job-text').style.color = 'white';
                            document.querySelector('#job-title a').style.color = 'white';
                            document.getElementById('job-text').style.opacity = 0;
                            
                            window.setTimeout(function () {
                                show_experience(data);
                                document.getElementById('job-text').style.color = 'black';
                                document.querySelector('#job-title a').style.color = 'black';
                                document.getElementById('job-text').style.opacity = 1;
                            }, 200);

                            this.classList.add('job-active');
                            prev_job = this;
                        }
                    });
                }

                // Set initial job window
                var default_job = experiences[experiences.length-1][1];
                show_experience(default_job);
                prev_job = document.getElementById(default_job['name']);
                prev_job.classList.add('job-active');
            }
        };
    
        xmlhttp.open("GET", "/v6/work/work_info.php?get_list=1", true);
        xmlhttp.send();

    };

    // Previous selected job
    var prev_job;

    // Load work items into DOM
    load_work_list();

});