<?php
// Start session for user to track login etc.
session_start();

// Include the functions required
include_once("assets/functions.php");

// Get saved database
$db = get_db();

// If the user is not logged in, redirect them and die without sending any HTML
if (!($_SESSION["LOGGED_IN"] == true && $_SESSION["USERNAME"] == $db["username"] && $_SESSION["PASS"] == $db["PASSWORD"])) {
	header("Location: login.php");
	die("Log in first!");
} else {
	panel_login();
}

// Request credentials from the API

?>

<!--

Why are you looking here? Don't you have something
better to do? Surely you do? Right? Then go do it.
:]

-->

<!DOCTYPE html>
<html>
	<head>
		<title>Wraith Panel</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="assets/all.css" rel="stylesheet" type="text/css">
		<link href="assets/panel.css" rel="stylesheet" type="text/css">
		<script type="text/javascript">
			<?php $db = get_db(); ?>
			const current_panel_login_token = "<?php echo $db['current_panel_login_token']; ?>";
			const current_panel_crypt_key = "<?php echo $db['current_panel_crypt_key']; ?>";
			const trusted_server_signature = "<?php echo $db['server_id']; ?>";
		</script>
		<script type="text/javascript" src="assets/crypto.js"></script>
		<script type="text/javascript" src="assets/api.js"></script>
		<script type="text/javascript" src="assets/panel.js"></script>
	</head>
	<body onload="if (window.location.hash == '') {switch_to_page('info_page');} start_page_update_worker();">
		<div class="sidenav" id="sidenav">
			<h3 style="margin-left: 15px; margin-bottom: 8px;">Wraith Panel</h3>
			<a href="#info_page">Info</a>
			<a href="#wraiths_page">Wraiths</a>
			<a href="#command_center_page">Command Center</a>
			<a href="#server_options_page">Server Options</a>
			<a href="login.php?LOGMEOUTPLZ=true">Log Out</a>
		</div>
		<div name="info_page" id="info_page" class="page">
			<h3>Server Info Page</h3>
			<div id="info_page_table_container"></div>
		</div>
		<div name="wraiths_page" id="wraiths_page" class="page">
			<h3>Wraiths Management Page</h3>
			<div id="wraiths_page_table_container"></div>
		</div>
		<div name="command_center_page" id="command_center_page" class="page">
			<h3>Command Center</h3>
		</div>
		<div name="server_options_page" id="server_options_page" class="page">
			<h3>Settings</h3>
			<div id="wraiths_page_table_container"></div>
		</div>
	</body>
</html>
