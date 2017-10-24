<?php
$titre ='Documentation enseignant';

// Tampon de flux stocké en mémoire
ob_start();
?>

<!DOCTYPE HTML>
<!--
	Striped by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	Evite les recopies de code
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

</body>
</html>

<?php

$contenu = ob_get_clean();//on récupère le contenu et on le libère. Données stockées en tampon
require "gabarit.php";
?>