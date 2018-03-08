$(document).ready(function(){
	document.getElementById("superlatives").innerHTML = "engineer";
	var superlative = setInterval(displayTimer, 3000);
	var i = 0;
	var arrSuperlatives = ["engineer",
                        "problem solver",
                        "programmer",
                        "3D designer",
                        "snowboarder",
                        "cyclist",
                        "photographer",
                        "creative thinker",
                        "explorer",
                        "graphic designer",
                        "weekend adventurer",
                        "obsessive flosser",
                        "freelancer",
                        "cooking enthusiast",
                        "artist",
                        "developer",
                        "team player",
                        "consultant"];

	function displayTimer() {
		if (i > (arrSuperlatives.length - 1)) {
			i = 0;
		};

    $("#superlative-container").fadeOut("slow", function() {
      document.getElementById("superlatives").innerHTML = arrSuperlatives[i];
      $("#superlative-container").fadeIn();
    });

		i++;
	};
});
