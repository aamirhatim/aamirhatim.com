$(document).ready(function(){

	var name = "";
	var path = "";
	var bg_path;
	var prev = "";
	var time = 6000;
	var projectCount = $(".portfolio tr td").length;
	var project = new Array();
	var id = "";
	var i = 0;
	var k = 1;

	function getPath(name) {
		path = "../modules/html/projectGallery/" + name + ".html";
		return path;
	};

	function getBG(name) {
		bg_path = "url('../img/" + name + "_gallery.svg')";
		return bg_path;
	};

	function swap(path, bg_path) {
		$("#project_gallery").hide();
		$("#project_gallery").load(path, function() {
		$("#project_gallery").css("background-image", bg_path);
		$("#project_gallery").fadeIn(600);
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
		var rpath = getPath(project[k]);
		var bpath = getBG(project[k]);

		if (name != prev) {
			swap(rpath, bpath);
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
	name = project[0];
	prev = project[projectCount-1];
	swap(getPath(name), getBG(name));
	var start = setInterval(function(){ rotate() }, time);

// 	Change portfolio header on click
	$(".portfolio tr td").click(function() {
		clearInterval(start);

		prev = name;
		name = this.id;
		path = getPath(name);
		bpath = getBG(name);

		if (name != prev) {
			swap(path, bpath);
		};

		start = setInterval(function(){ rotate() }, time);
		k = project.indexOf(name)+1;
	});

});
