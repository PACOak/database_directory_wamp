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
	$email = $row["email"];
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
		<title>Babyfacebook - Update Your Profile</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	
	<body class="is-loading">
	
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<h2>Update Your Profile</h2>
						<form method="post" action="processUpdateForm.php">
							<div class="field">
								<input type="text" 
										name="first_name" 
										id="first_name" 
										placeholder="First Name" 
										value="<?php echo $firstName; ?>"/>
							</div>
							
							<div class="field">
								<input type="text" 
										name="last_name" 
										id="last_name" 
										placeholder="Last Name" 
										value="<?php echo $lastName; ?>"/>
							</div>
							
							<div class="field">
								<input type="email" 
										name="email" 
										id="email" 
										placeholder="Email" 
										value="<?php echo $email; ?>"/>
							</div>
							
							<div class="field">
								<input type="text" 
										name="description" 
										id="description" 
										placeholder="Description" 
										value="<?php echo $description; ?>"/>
							</div>
							
							<div class="field">
								<input type="text" 
										name="facebook_link" 
										id="facebook_link" 
										placeholder="Facebook Link" 
										value="<?php echo $facebookLink; ?>"/>
							</div>
							
							<div class="field">
								<input type="text" 
										name="twitter_link" 
										id="twitter_link" 
										placeholder="Twitter Link" 
										value="<?php echo $twitterLink; ?>"/>
							</div>
							
							<div class="field">
								<input type="text" 
										name="linkedin_link" 
										id="linkedin_link" 
										placeholder="LinkedIn Link" 
										value="<?php echo $linkedInLink; ?>"/>
							</div>
							
							<div class="field">
								<input type="text" 
										name="instagram_link" 
										id="instagram_link" 
										placeholder="Instagram Link" 
										value="<?php echo $instagramLink; ?>"/>
							</div>
							
							<div class="field">
								<input type="text" 
										name="pinterest_link" 
										id="pinterest_link" 
										placeholder="Pinterest Link" 
										value="<?php echo $pinterestLink; ?>"/>
							</div>
							
							<div class="field">
								<div class="select-wrapper">
									<select name="background_image" id="background_image">
										<option value="">background Image</option>
										<option value="1.jpg">Skull with Horns</option>
										<option value="2.jpg">Tennis Court</option>
										<option value="3.jpg">Surfer in the Sun</option>
									</select>
								</div>
							</div>
							
							<div class="field">
								<input type="checkbox" 
										id="background_image_tiling" 
										name="background_image_tiling" 
										value="1" /><label for="background_image_tiling">Tile Background</label>
							</div>
							
							
								<input type="hidden" 
										name="user_id" 
										id="user_id" 
										value="<?php echo $_REQUEST["userId"]; ?>" />

							<ul class="actions">
								<li><button type="submit" class="button">Update</a></li>
							</ul>
						</form>
						<form method="post"
								action="processDelete.php">
							<input type="hidden" 
									name="user_id" 
									id="user_id" 
									value="<?php echo $_REQUEST["userId"]; ?>" />
							<ul class="actions">
								<li><button type="submit" class="button">Delete Your Profile</button></li>
							</ul>
						</form>
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