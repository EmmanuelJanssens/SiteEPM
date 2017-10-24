<?php
$titre ='Contenu pédagogique';

// Tampon de flux stocké en mémoire
ob_start();
?>

<header>
    <div id="entete"><h1>Contenu pédagogique</h1></div>
    <ul id="menu-deroulant">
        <li><a href="#">1ère année</a></li>
        <li><a href="#">2ème année</a></li>
        <li><a href="#">3ème année</a></li>

    </ul>
</header>
<p> <button class="Menuheader">Powerpoint</button><button>Mapping</button><button>Flip-Chart</button></p>

<div id="vue">

</div>
<?php

$contenu = ob_get_clean();
require "gabarit.php";
?>






