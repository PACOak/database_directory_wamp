<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Babyfacebook - Create Your Profile</title>
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
						<h2>Create Your Account Now!</h2>
						<form method="post" action="processCreateForm.php">
							<div class="field">
								<input type="text" name="first_name" id="first_name" placeholder="First Name" />
							</div>
							<div class="field">
								<input type="text" name="last_name" id="last_name" placeholder="Last Name" />
							</div>
							<div class="field">
								<input type="email" name="email" id="email" placeholder="Email" />
							</div>
							<div class="field">
								<input type="text" name="description" id="description" placeholder="Description" />
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
								<input type="checkbox" id="background_image_tiling" name="background_image_tiling" value="1" /><label for="background_image_tiling">Tile Background</label>
							</div>
							
							<ul class="actions">
								<li><button type="submit" class="button">Submit</a></li>
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