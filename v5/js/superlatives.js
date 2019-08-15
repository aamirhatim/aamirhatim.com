$(document).ready(function(){
	$("#superlative h2").html("engineer");
	var superlative = setInterval(displayTimer, 3000);
	var i = 0;
	var arrSuperlatives = ["engineer",
                        "problem solver",
                        "programmer",
                        "3D designer",
                        "snowboarder",
												"roboticist",
                        "photographer",
                        "creative thinker",
                        "explorer",
                        "graphic designer",
                        "weekend adventurer",
												"engineer",
                        "obsessive flosser",
												"avid coder",
                        "freelancer",
                        "artist",
                        "developer",
                        "team player",
                        "consultant"];

	function displayTimer() {
		if (i > (arrSuperlatives.length - 1)) {
			i = 0;
		};

    $("#superlative").fadeOut("slow", function() {
      $("#superlative h2").html(arrSuperlatives[i]);
      $("#superlative").fadeIn();
    });

		i++;
	};
});
