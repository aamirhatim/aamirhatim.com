$(document).ready(function(){
	document.getElementById("superlative").innerHTML = "engineer.";
	var superlative = setInterval(displayTimer, 3000);
	var i = 0;
	var arrSuperlatives = [	"developer.",
							"problem solver.",
							"consultant.",
							"programmer.",
							"3D designer.",
							"snowboarder.",
							"photographer.",
							"creative thinker.",
							"graphic designer.",
							"weekend adventurer.",
							"obsessive flosser.",
							"cooking enthusiast.",
							"traveler.",
							"artist.",
							"cyclist.",
							"engineer."
						];
										
	function displayTimer() {
		if (i > (arrSuperlatives.length - 1)) {
			i = 0;
		};
		
		document.getElementById("superlative").innerHTML = arrSuperlatives[i];
		i++;
	};					
});