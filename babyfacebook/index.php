<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "baby_facebook";
	
	// Create the database connection
	$connection = new mysqli($servername, $username, $password, $database);
	
	// Check connection
	if ($connection->connect_error)
	{
		die("Database connection failed");
	}
	
	$sql = "SELECT * FROM users WHERE user_id='$_REQUEST[userId]';";
	$resultSet = $connection->query($sql);
	$row = $resultSet->fetch_assoc();
	$connection->close();

	$firstName = $row["first_name"];
	$lastName  = $row["last_name"];
	$description = $row["description"];
	$facebookLink = $row["facebook_link"];
	$twitterLink = $row["twitter_link"];
	$instagramLink = $row["instagram_link"];
	$linkedInLink = $row["linkedin_link"];
	$pinterestLink = $row["pinterest_link"];
	$backgroundImage = $row["background_image"];
	$backgroundImageTiling = $row["background_image_tiling"];

?>
<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Identity by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	
	<?php if (isset($_REQUEST["tiling"]) && $_REQUEST["tiling"] == "true"): ?>
		<body class="is-loading" style="background-size: 100px 100px,cover,cover; background-image: url('images/<?php echo $backgroundImage; ?>');">
	<?php elseif (isset($_REQUEST["tiling"]) && $_REQUEST["tiling"] == "false"): ?>
		<body class="is-loading" style="background-image: url('images/<?php echo $backgroundImage; ?>');">
	<?php elseif ($backgroundImageTiling == 1): ?>
		<body class="is-loading" style="background-size: 100px 100px,cover,cover; background-image: url('images/<?php echo $backgroundImage; ?>');">
	<?php else: ?>
		<body class="is-loading" style="background-image: url('images/<?php echo $backgroundImage; ?>');">
	<?php endif; ?>
	
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<span class="avatar"><img src="images/avatar.jpg" alt="" /></span>
							<h1><?php echo $firstName . " " . $lastName; ?></h1>
							<p><?php echo $description; ?></p>
						</header>
						<!--
						<hr />
						<h2>Extra Stuff!</h2>
						<form method="post" action="#">
							<div class="field">
								<input type="text" name="name" id="name" placeholder="Name" />
							</div>
							<div class="field">
								<input type="email" name="email" id="email" placeholder="Email" />
							</div>
							<div class="field">
								<div class="select-wrapper">
									<select name="department" id="department">
										<option value="">Department</option>
										<option value="sales">Sales</option>
										<option value="tech">Tech Support</option>
										<option value="null">/dev/null</option>
									</select>
								</div>
							</div>
							<div class="field">
								<textarea name="message" id="message" placeholder="Message" rows="4"></textarea>
							</div>
							<div class="field">
								<input type="checkbox" id="human" name="human" /><label for="human">I'm a human</label>
							</div>
							<div class="field">
								<label>But are you a robot?</label>
								<input type="radio" id="robot_yes" name="robot" /><label for="robot_yes">Yes</label>
								<input type="radio" id="robot_no" name="robot" /><label for="robot_no">No</label>
							</div>
							<ul class="actions">
								<li><a href="#" class="button">Get Started</a></li>
							</ul>
						</form>
						<hr />
						-->
						<footer>
							<ul class="icons">
								<?php if(!empty($twitterLink)): ?>
									<li><a href="<?php echo $twitterLink; ?>" class="fa-twitter">Twitter</a></li>
								<?php endif; ?>
								
								<?php if(!empty($instagramLink)): ?>
									<li><a href="<?php echo $instagramLink; ?>" class="fa-instagram">Instagram</a></li>
								<?php endif; ?>
								
								<?php if(!empty($facebookLink)): ?>
									<li><a href="<?php echo $facebookLink; ?>" class="fa-facebook">Facebook</a></li>
								<?php endif; ?>
								
								<?php if(!empty($pinterestLink)): ?>
									<li><a href="<?php echo $pinterestLink; ?>" class="fa-pinterest">Pinterest</a></li>
								<?php endif; ?>
								
								<?php if(!empty($linkedInLink)): ?>								
									<li><a href="<?php echo $linkedInLink; ?>" class="fa-linkedin">LinkedIn</a></li>
								<?php endif; ?>
							</ul>
						</footer>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>&copy; Jane Doe</li>
							<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>