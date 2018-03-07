$(document).ready(function(){
	var prevModule;
	var moduleID;
	var toggle = 0;
	var modulePath;
	var logo_path;

	$("#moduleContainer").hide();

	$(".navItem").click(function() {
		moduleID = this.id;
		modulePath = "../modules/html/" + moduleID + ".html";
		logo_path = "url(../modules/icons/" + moduleID + ".svg)";
// 		document.getElementById("test").innerHTML = moduleID;

		if(!toggle){
			$("#moduleContents").hide(1, function(){
				$("#moduleContents").load(modulePath, function(){
					$(".logo").css("background-image", logo_path);
					$("#moduleContents").fadeIn(800);
				});
			});
			$("#moduleContainer").slideDown("fast", "swing");
			toggle = 1;
			prevModule = moduleID;
		}
		else if(moduleID != prevModule){
			$("#moduleContents").hide(1, function(){
				$("#moduleContents").load(modulePath, function(){
					$(".logo").css("background-image", logo_path);
					$("#moduleContents").fadeIn(400);
				});
			});
			toggle = 1;
			prevModule = moduleID;
		}
	});

	$("#dropDown").click(function() {
		$("#moduleContainer").slideUp("fast", "swing");
		toggle = 0;
	});

	$("#name").click(function() {
		$("#moduleContainer").slideUp("fast", "swing");
		toggle = 0;
	});

});
