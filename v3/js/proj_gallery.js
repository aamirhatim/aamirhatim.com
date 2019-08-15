$(document).ready(function(){
	var name = "";
	var path = "";
	var prev = "";
	var time = 4000;
	var projectCount = $(".portfolio tr td").length;
	var project = new Array();
	var id = "";
	var i = 0;
	var k = 1;

	function getPath(name) {
		path = "../html/projectGallery/" + name + ".html";
		return path;
	};

	function swap(path) {
		$("#portContent").hide();
		$("#portContent").load(path, function() {
			$("#portContent").fadeIn(600);
		});
	}

	function rotate() {
		if (k > projectCount-1 || k == 0) {
			k = 0;
			prev = project[projectCount-1];
		} else {
			prev = project[k-1];
		};

		name = project[k];
// 		document.getElementById("test1").innerHTML = name;
// 		document.getElementById("test2").innerHTML = prev;
		var rpath = getPath(project[k]);

		if (name != prev) {
			swap(rpath);
		};

		k++;
	};


// Get all project names for rotating html frames
	project[0] = $(".portfolio tr td").attr("id");
	for (i = 1; i < projectCount; i++) {
		id = $("#" + project[i-1]).next().attr("id");
		project[i] = id;
	}

// 	Initialize
	swap(getPath(project[0]));
	name = project[0];
	prev = project[projectCount-1];
	var start = setInterval(function(){ rotate() }, time);

// 	Change portfolio header on click
	$(".portfolio tr td").click(function() {
		clearInterval(start);

		prev = name;
		name = this.id;
		path = getPath(name);

		if (name != prev) {
			swap(path);
		};

		start = setInterval(function(){ rotate() }, time);
		k = project.indexOf(name)+1;

// 		document.getElementById("test1").innerHTML = name;
// 		document.getElementById("test2").innerHTML = prev;
	});

});
