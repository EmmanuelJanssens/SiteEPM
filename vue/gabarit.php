<!DOCTYPE HTML>
<!--
	Striped by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title><?= $titre;?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="contenu/assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="contenu/assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="contenu/assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Content -->
			<div id="content">
				<div class="inner">
                    <?= $contenu;?>
                </div>
			</div>


		<?php 
			require "sidebar.php";									
		?>

		<!-- Scripts -->
			<script src="contenu/assets/js/jquery.min.js"></script>
			<script src="contenu/assets/js/skel.min.js"></script>
			<script src="contenu/assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="contenu/assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="contenu/assets/js/main.js"></script>

	</body>
</html>