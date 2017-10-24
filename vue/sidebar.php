<div id="sidebar">

    <!-- Logo -->
    <h1 id="logo"><a href="#">STRIPED</a></h1>

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <?php
            if(!isset($_SESSION['login']))
            {
                ?>
                <li><a href="index.php?action=login">Login</a></li>
                <?php
            }
            else
            {
                ?>
                <li class="current"><a href="index.php?action=recette">Recette</a></li>
                <li><a href="index.php?action=film">Film</a></li>
                <li><a href="index.php?action=docEnseignant">Enseignant</a></li>
                <li><a href="index.php?action=contenuPed">Contenu Pédagogique</a></li>
                <li><a href="index.ph?action=photos">Photos</a></li>
                <li><a href="index.php?action=divers">Divers</a></li>
                <?php
            }
            ?>


        </ul>
    </nav>

    <!-- Search -->
    <section class="box search">
        <form method="post" action="#">
            <input type="text" class="text" name="search" placeholder="Search" />
        </form>
    </section>


    <!-- Copyright -->
    <ul id="copyright">
        <li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>
</div>