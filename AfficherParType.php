<?PHP
//session_start();
include "../core/produitC.php";
$produit1C=new ProduitC();
$listeproduits=$produit1C->afficherproduittype($_POST['type']);

foreach($produit1C->afficherproduits() as $produit)
{
    $type[]=$produit['type'];
}
$types=array_unique($type);
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Cake - Bakery</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/linearicons/style.css" rel="stylesheet">
        <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
        <link href="vendors/stroke-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="vendors/animate-css/animate.css" rel="stylesheet">

        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">
        <link href="vendors/lightbox/simpleLightbox.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <!--================Main Header Area =================-->
		<header class="main_header_area">
			<div class="main_menu_area">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<a class="navbar-brand" href="#">
						<img src="img/logo.png" alt="">
						<img src="img/logo-2.png" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="my_toggle_menu">
                            	<span></span>
                            	<span></span>
                            	<span></span>
                            </span>
						</button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav justify-content-end">
                                <li class="dropdown submenu active">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Produits</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="AjouterProd.html">Ajouter produit</a></li>
                                        <li><a href="AfficherProduit.php">Afficher produits</a></li>
                                        <li><a href="ModifierProd.html">Modifier produit</a></li>
                                        <li><a href="SupprimerProd.html">Supprimer produit</a></li>
                                        <li><a href="RechercherProd.html">Rechercher produit</a></li>

                                    </ul>
                                </li>
                                <li class="dropdown submenu">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Promotions</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="AjouterPromo.php">Ajouter promotion</a></li>
                                        <li><a href="AfficherProm.php">Afficher promotion</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
					</nav>
				</div>
			</div>
		</header>
        <!--================End Main Header Area =================-->

        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Produits</h3>
                        <ul>
                            <li><a href="#">Produits</a></li>
        				<li><a href="Affichertri.php">Afficher produits par nom</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->

        <!--================Portfolio Area Area =================-->
        <section class="portfolio_area portfolio_full p_100">
            <form method="post" action="AfficherParType.php">
                vous pouvez afficher par type:
                <select id="type" name="type">
                    <?php
                    foreach($types as $row)
                    {
                        ?>
                        <option value="<?PHP echo $row; ?>"><?PHP echo $row; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" value="afficher">
            </form>
            <div class="portfolio_full_width_area grid_portfolio_area imageGallery1">

            <?php

            foreach($listeproduits as $row){
                ?>
                    <div class="portfolio_full_item cake choco">

                
                        <div class="portfolio_item">
                            <div class="portfolio_img">
                                <img class="img-fluid" src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['nom']; ?>">
                            </div>
                            <div class="portfolio_text">
                                <a href="#"><h4><?PHP echo $row['nom']; ?></h4></a>
                                </br> <?PHP echo $row['description']; ?></br>
                            </div>
                            Nom: <?PHP echo $row['nom']; ?><br>
                            Prix: <?PHP echo $row['prix']; ?>dt<br>
                            Disponibilite: <?PHP echo $row['disponibilite']; ?></br>
                            Date: <?PHP echo $row['datep']; ?><br>
                            Parfum: <?PHP echo $row['parfum']; ?><br>
                            Type: <?PHP echo $row['type']; ?><br>

                            <a class="lien" href="ModifierProduit.php?nom=<?PHP echo $row['nom']; ?>" >Modifier</a>
                            <form method="GET" action="SupprimerProduit.php" enctype="multipart/form-data">
                                <input type="submit" name="supprimer" value="Supprimer" class="button">
                                <input type="hidden" value="<?PHP echo $row['nom']; ?>" name="nom">
                            </form>
                        </div>
                    </div>



                <?PHP
            }
            ?>
                </div>
        </section>
        <!--================End Portfolio Area Area =================-->



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <!-- Extra plugin js -->
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/datetime-picker/js/moment.min.js"></script>
        <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>

        <script src="js/theme.js"></script>
    </body>

</html>
