
<?php

$titre="Photos";
ob_start();
?>
<header>
    <div id="entete">
        <h1>Photos</h1>
        <h1 style="text-align: right">Applications pratiques :</h1>

        <!--<a href="index.php?select=grandChef">Grand Chefs</a>
        <a href="index.php?select=premiere">1ère année</a>
        <a href="index.php?select=deuxieme">2ème année</a>
        <a href="index.php?select=troisieme">3ème année</a>-->




        <form method="GET" action="index.php">

            <select name="type" style="text-align: right">
                <option value="grandsChefs">Grands chefs</option>
                <option value="appPratique">Application pratique</option>

            </select>


                <select name="annee" style="text-align: right">
                    <option value="premiere">1ère année</option>
                    <option value="deuxieme">2ème année</option>
                    <option value="troisieme">3ème année</option>
                </select>
            <input type ="hidden" name ="action" value="filtrerPhotos">
            <input type="submit" name="filtrer" value="valider">

        </form>

        <HR size=20 width="100%" align=center>


        <!--A Changer en PHP-->
        <?php
            if(isset($_GET['filtrer']))
            {
                foreach($resultat as $res)
                {
                    echo $res;
                }
            }
            else if(isset($_GET['image']))
            {
                echo $resultat;
            }

        ?>

        <!--<p>
            <img src="images\IMG_0545.JPG" alt="image plat grand chef" style ="width: 100px; height :100px">
            <img src="images\IMG_0546.JPG" alt="image plat grand chef" style ="width: 100px; height :100px">
            <img src="images\IMG_0550.JPG" alt="image plat grand chef" style ="width: 100px; height :100px">
            <img src="images\IMG_0553.JPG" alt="image plat grand chef" style ="width: 100px; height :100px">
            <img src="images\IMG_0554.JPG" alt="image plat grand chef" style ="width: 100px; height :100px">
        </p>-->

    </div>
</header>


<?php
$contenu = ob_get_clean();
require "gabarit.php"
?>



