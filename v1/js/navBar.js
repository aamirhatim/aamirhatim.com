$(document).ready(function(){
// Change Active Nav Tab -----------------------------------   				
	var scroll = $(this).scrollTop();
	var scrollAbout = $("#about").offset();
	var scrollSchool = $("#schoolAnchor").offset();
	var scrollWork = $("#workAnchor").offset();
	var scrollProject = $("#projectAnchor").offset();
	var scrollPhoto = $("#photoAnchor").offset();
	var scrollContact = $("#contact").offset();
	var prevModule = "";
	var curModule = "";
	var offset = 250;
	
	function activeModule(previous, current) {
		curModule = current;
		if(previous !== curModule) {
			$(previous).removeClass("navActive");
			$(previous).addClass("navItem");
			$(current).removeClass("navItem");
			$(current).addClass("navActive");
			prevModule = curModule;
		}
	};
	
// 	Set initial active module
	if(scroll >= (scrollContact.top - offset)) {
		curModule = "#lnkContact";
	} 
	else if (scroll >= (scrollPhoto.top - offset)) {
		curModule = "#lnkPhoto";
	}
	else if (scroll >= (scrollProject.top - offset)) {
		curModule = "#lnkProject";
	}
	else if (scroll >= (scrollSchool.top - offset)) {
		curModule = "#lnkSchool";
	}
	else if (scroll >= (scrollWork.top - offset)) {
		curModule = "#lnkWork";
	}
	else if (scroll >= (scrollAbout.top - offset)){
		curModule = "#lnkAbout";
	};
	
	activeModule(prevModule, curModule);
	
// 	Set active module while scrolling
	$(document).scroll(function() { 
		scroll = $(this).scrollTop();
		scrollAbout = $("#about").offset();
		scrollSchool = $("#school").offset();
		scrollWork = $("#work").offset();
		scrollProject = $("#project").offset();
		scrollPhoto = $("#photo").offset();
		scrollContact = $("#contact").offset();
		
		if(scroll >= (scrollContact.top - offset)) {
			activeModule(prevModule, "#lnkContact");
		} 
		else if (scroll >= (scrollPhoto.top - offset)) {
			activeModule(prevModule, "#lnkPhoto");
		}
		else if (scroll >= (scrollProject.top - offset)) {
			activeModule(prevModule, "#lnkProject");
		}
		else if (scroll >= (scrollSchool.top - offset)) {
			activeModule(prevModule, "#lnkSchool");
		}
		else if (scroll >= (scrollWork.top - offset)) {
			activeModule(prevModule, "#lnkWork");
		}
		else if (scroll >= (scrollAbout.top - offset)){
			activeModule(prevModule, "#lnkAbout");
		}
	});
});