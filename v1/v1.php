<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8">
		<title>Aamir Husain</title>
		<link href = "https://fonts.googleapis.com/css?family=Roboto:100,300,500|Cabin+Sketch|Comfortaa:300,400,700|Unica+One" rel = "stylesheet">
		<link rel = "stylesheet" href = "css/style.css">
		<link rel = "stylesheet" href = "css/mobile.css">
		<link rel = "icon" href = "favicon.png">
		
<!-- Scripts -->
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src = "js/navBar.js"></script>
		<script src = "js/superlatives.js"></script>
		<script src = "js/workText.js"></script>
		<script src = "js/smoothScroll.js"></script>
		<script>
			$(document).ready(function(){
				$("#submit").hover(
					function(){
						document.getElementById("submit").value = "Send!";
					},
					function(){
						document.getElementById("submit").value = "Send";
					}
				);
			});
		</script>
	</head>
	
	<body>
<!-- Navigation Bar  -->
		<div id = "shadow"></div>
		
		<nav class = "mNav">
			<div id = "mBackground"></div>
			<div class = "mBar">
				<div id = "mMenu">
					<div id = "mMenuIcon"></div>
				</div>
				<div id = "mMenuLogo">
					<div id = "mLogo"></div>
				</div>
			</div>
		</nav>
		
		<nav class = "navbar">
			<div class = "bar">
				<div id = "lnkAbout" class = "navItem" style = "margin-top: 0px"><a href = "#about">me</a></div>
				<div id = "lnkWork" class = "navItem"><a href = "#workAnchor">work</a></div>
				<div id = "lnkSchool" class = "navItem"><a href = "#schoolAnchor">school</a></div>
				<div id = "lnkProject" class = "navItem"><a href = "#projectAnchor">portfolio</a></div>
				<div id = "lnkPhoto" class = "navItem"><a href = "#photoAnchor">photo</a></div>
				<div id = "lnkContact" class = "navItem"><a href = "#contact">contact</a></div>
			</div>
			
			<div id = "navLogo">
				<div id = "navLogoImg">
					<img src = "logos/logoWhite.svg">
				</div>
			</div>
			
			<div class = "title">
				<div id = "name">aamir husain</div>
				<div id = "superlative"></div>
			</div>
		</nav>

<!-- Modules -->
		<div id = "mAbout">
			<div id = "circlePic">
				<img src = "circlePic.png">
			</div>
			<div id = "separator">
				<img id = "fancyLine" src = "fancyLine.svg">
			</div>
		</div>
		
		<div class = "modules">
			<div id = "about">
				<div class = "moduleText">
					<?php require_once("php/about.php");?>
				</div>
			
				<div id = "skills">
					<table>
						<?php require_once("php/skills.php");?>	
					</table>
				</div>
			</div>
		
			<div id = "work">
				<div class = "separator">
					<div class = "spacer"></div>
					<img id = "workAnchor" class = "moduleIcon" src = "icons/workIcon.png">
				</div>
				
				<div class = "moduleText">
					<?php require_once("php/work.php");?>
				</div>
		
				<div class = "container">
					<div class = "tiles">
						<?php require_once("php/workTiles.php");?>
					</div>
				</div>
			
				<div class = "detail" id = "workBox">
					<div class = "logo" id = "workLogo"></div>
					<div class = "text" id = "workText"></div>
				</div>
			</div>
		
			<div id = "school">
				<div class = "separator">
					<div class = "spacer"></div>
					<img id = "schoolAnchor" class = "moduleIcon" src = "icons/schoolIcon.png">
				</div>
				
				<div class = "moduleText">
					<?php require_once("php/school.php");?>
				</div>
			
				<div class = "container">
					<div class = "tiles">
						<?php require_once("php/schoolTiles.php");?>
					</div>
				</div>
			
				<div class = "detail" id = "schoolBox">
					<div class = "logo" id = "schoolLogo"></div>
					<div class = "text" id = "schoolText"></div>
				</div>
			</div>
		
			<div id = "project">
				<div class = "separator">
					<div class = "spacer"></div>
					<img id = "projectAnchor" class = "moduleIcon" src = "icons/projectIcon.png">
				</div>
				
				<div class = "moduleText">
					<?php require_once("php/projects.php");?>
				</div>
			</div>
	
			<div id = "photo">
				<div class = "separator">
					<div class = "spacer"></div>
					<img id = "photoAnchor" class = "moduleIcon" src = "icons/photoIcon.png">
				</div>
				
				<div class = "moduleText">
					<?php require_once("php/photo.php");?>
				
					<div id = "photoLink">
						<form action = "tester.html" target = "_blank">
							<button id = "photoLink" type = "submit">See My Work</button>
						</form>
					</div>
				</div>
			</div>
	
			<div class = "email" id = "contact">
				<div class = "contactMessage">
					<div id = "txtContact">
						<img id = "contactIcon" src = "icons/paperplane.svg">
						
						<div id = "chatTitle">Let's Chat.</div>
				
						<div id = "chatText">
							Questions? Comments? Want a copy of my resume? I'd love to hear from you! Fill out the form and I'll get in touch as soon as I can.
						</div>
						
						<div class = "social">
							<div id = "links">
							<a class = "socialIcon" href = "https://www.instagram.com/aamirhatim/" target = "_blank">
								<img src = "icons/instagram.svg"></a>
							<a class = "socialIcon" href = "https://www.linkedin.com/in/aamir-husain-19396950" target = "_blank">
								<img src = "icons/linkedin.svg"></a>
							<a class = "socialIcon" href = "https://github.com/" target = "_blank">
								<img src = "icons/github.svg"></a>
							</div>
						</div><!--close social-->
					</div>
				</div>
		
				<div class = "contactForm">
					<form action = "email_script.php" method = "POST">
							<input type = "text" name = "name" placeholder = "name." size = "20" required/>
							<input type = "text" name = "email" placeholder = "email." size = "30" required/>
							<br>
							<input type = "text" name = "subject" placeholder = "subject." size = "40" autocomplete = "off" required/>
							<br>
							<textarea rows = "10" cols = "55" name = "message" placeholder = "message." autocomplete = "off" required></textarea>
							<br>
							<input id = "submit" type = "submit" name = "submit" value = "Send"/>
					</form>
				</div>
			</div><!--close email-->
		</div>
	
<!-- Footer -->
		<footer>
			<div id = "logo">
				<a><img src = "logos/logo.svg"/></a>
			</div>
			<div id = "copyright">Copyright &copy; Aamir Husain</div>
			<div id = "footerIcons">
				Powered by:<br>
				<div id = "footerContainer">
					<a><img src = "footer/html.svg"/></a>
					<a><img src = "footer/css.svg"/></a>
					<a><img src = "footer/js.svg"/></a>
					<a><img src = "footer/php.svg"/></a>
				</div>
			</div>
		</footer>
	</body>
	
	<div id = "preload">
		<img src = "images/About.jpg"/>
		<img src = "images/School.jpg"/>
		<img src = "images/Work.jpg"/>
		<img src = "images/Project.jpg"/>
		<img src = "images/Photo.jpg"/>
		<img src = "images/Contact.jpg"/>
	</div>
</html>