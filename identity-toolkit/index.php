<!DOCTYPE html>
<html>

<head>
<?php
  set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ .'/vendor/google/apiclient/src');
  require_once __DIR__ . '/vendor/autoload.php';

  $gitkitClient = Gitkit_Client::createFromFile(dirname(__FILE__) . '/gitkit-server-config.json');
  $gitkitUser = $gitkitClient->getUserInRequest();
?>
	<title>Test Google Authentication</title>
	<!-- 1: Configure the sign-in button -->

<script type="text/javascript" src="//www.gstatic.com/authtoolkit/js/gitkit.js"></script>
<link type="text/css" rel="stylesheet" href="//www.gstatic.com/authtoolkit/css/gitkit.css" />
<script type="text/javascript">
  window.google.identitytoolkit.signInButton(
    '#navbar', // accepts any CSS selector
    {
      widgetUrl: "http://localhost/identity-toolkit/gitkit.php",
      signOutUrl: "http://localhost/identity-toolkit/index.php",
    }
  );
</script>
</head>

<body>
	<div id="navbar"></div>
	<p>
	  <?php if ($gitkitUser) { ?>
		Welcome back!<br><br>
		Email: <?= $gitkitUser->getEmail() ?><br>
		Id: <?= $gitkitUser->getUserId() ?><br>
		Name: <?= $gitkitUser->getDisplayName() ?><br>
		Identity provider: <?= $gitkitUser->getProviderId() ?><br>
	  <?php } else { ?>
		You are not logged in yet.
	  <?php } ?>
	</p>
</body>

</html>