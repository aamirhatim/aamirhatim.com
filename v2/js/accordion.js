$(document).ready(function(){
	var prev = "";
	var prevColor = "";
	var color = "";
	
	function getClassColor(element, mode) {		
		var parent = $(element).closest("div").attr("id");
// 		document.getElementById("test").innerHTML = parent;
		
		if(parent == "workAccordion") {
			if(mode == 1) {
				$(element).toggleClass("workActive");
			}
			else if(mode == 2) {
				$(element).removeClass("workActive");
			}
		}
		else if(element.id == "nu") {
			if(mode == 1) {
				$(element).toggleClass("nuActive");
			}
			else if(mode == 2) {
				$(element).removeClass("nuActive");
			}
		}
		else if(element.id == "gw") {
			if(mode == 1) {
				$(element).toggleClass("gwActive");
			}
			else if(mode == 2) {
				$(element).removeClass("gwActive");
			}
		}
	}
	
	$(".panel").hide();

	$(".accordion").click(function() {
		if(this.id == prev.id){
			$(prev).next(".panel").slideToggle();
			getClassColor(this,1);
		}
		else{
			$(".panel").slideUp();
			getClassColor(prev,2);
			getClassColor(this,1);
			$(this).next(".panel").slideToggle();
			prev = this;
		}
	});
});