<!DOCTYPE html>
<html>
<head>

<!-- your webpage info goes here -->

    <title>My First Website</title>
	
	<meta name="author" content="your name" />
	<meta name="description" content="" />

<!-- you should always add your stylesheet (css) in the head tag so that it starts loading before the page html is being displayed -->	
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	
</head>
<body>

<!-- webpage content goes here in the body -->

	<div id="page">
		<div id="logo">
			<h1><a href="/" id="logoLink">My First Website</a></h1>
		</div>
		<div id="nav">
			<ul>
				<li><a href="home2.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>	
		</div>
		<div id="content">

			<p> <h3>Site navigation</h3>
				There aren’t many surprises here, at least not from a pure HTML point of view — 
				try navigating to the different pages in the example to see what happens. Later on in the course we’ll talk about
				styling these kind of menus with CSS and adding behaviour via JavaScript. One important thing to consider is how to highlight the current document in the menu, to give the user a sense of being in a particular place, and that they are moving location (even though in reality they aren’t, unless of course they are using a mobile device to browse the Web!). In this case we are just removing the link to the current page, in each case - this makes sense, as you don't need to link to the same document you are on, 
				and it makes it clear where you are in the menu. We’ll look more at "you are here" in the next section.
			</p>
		</div>
		<div id="footer">
			<p>
				Webpage made by <a href="/" target="_blank">[SA!FUL !SLAM]</a>
			</p>
		</div>
	</div>
</body>
</html>