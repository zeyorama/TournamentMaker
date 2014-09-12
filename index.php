<!DOCTYPE html>
<?php include 'epic.php'; ?>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type"  content="text/html; charset=utf-8">
		<meta http-equiv="cache-control" content="no-cache">
		<meta http-equiv="pragma"        content="no-cache">
		<meta http-equiv="expires"       content="0">
		<meta name="Distribution"        content="Global">
		<meta name="Robots"              content="index,follow">
		<meta name="date"                content="<?php echo date("Y-m-d"); ?>">
		
		<!-- css -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" media="screen">
		<link type="text/css" rel="stylesheet" href="css/TM.css">
		
		<!-- js -->
		<script type="text/javascript" src="js/jquery.1.11.1.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</head>
	<body>
		<!-- Top Navigation -->
		<?php include 'sites/top_nav.php'; ?>
		
		<!-- Content Pages -->
		<div class="container-fluid">
			<div class="row" id="MessageBox"></div>
			<!-- Main Content -->
<?php
if ($currentUser && FileExists('sites/' . $cat . '/' . $cat . '.php'))
	include 'sites/' . $cat . '/' . $cat . '.php';
else
	include 'sites/base.php';
?>
		</div>
		
		<!-- Footer Content -->
		<div class="navbar navbar-fixed-bottom navbar-default" role="navigation">
			<div class="navbar-text" style="width: 100%; text-align: center;">
				&copy; Frank Kevin Zey 2014<!-- -<?php echo date('Y'); ?> --><br>
        <a href="#">Impressum</a>
			</div>
		</div>
	</body>
</html>