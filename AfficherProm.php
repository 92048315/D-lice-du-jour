<?PHP
//session_start();
include "../core/promotionsC.php";
include "../core/produitC.php";

$prom=new promotionC();
$listeproduits=$prom->getProms();
?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="Afficher.php"> <i class="menu-icon fa fa-dashboard"></i>Accueil </a>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Produits</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="afficherproduit.php">Afficher</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="AjouterProd.html">Ajouter</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="ModifierProd.html">Modifier</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="SupprimerProd.html">Supprimer</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="RechercherProd.html">Rechercher</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Promotions</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="AfficherProm.php">Afficher</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="AjouterPromo.php">Ajouter</a></li>
                        </ul>
                    </li>
            
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                    </div>
                </div>

               
            </div>

        </header><!-- /header -->
<!--================Portfolio Area Area =================-->


<section class="portfolio_area portfolio_full p_100">

    <div class="portfolio_full_width_area grid_portfolio_area imageGallery1">

    <?php
    foreach($listeproduits as $row){
        ?>
        <div class="portfolio_full_item cake choco">
                <div class="portfolio_item">
                    <div class="portfolio_text">
                        Taux: <?PHP echo $row['taux_promo']; ?><br>
                        Date de la fin: <?PHP echo $row['date_fin']; ?><br>
                    </div>
                    <div>
                        <form action="ModifierProm.php" method="post">

                            <input type="hidden" name="date_fin" value="<?PHP echo $row['date_fin']; ?>">
                            <input type="hidden" name="taux_promo" value="<?PHP echo $row['taux_promo']; ?>">
                            <input type="hidden" name="refp" value="<?PHP echo $row['refp']; ?>">

                            <button  class="btn-sm btn-outline-info" type="submit">modifier promotion Promotion</button>
                        </form>
                    </div>
                    <div class="text-center">
                        <form action="supprimerpromotion.php" method="post">
                            <input type="hidden" name="idProduit" value="<?PHP echo $row['id_promo']; ?>">
                            <button  class="btn-sm btn-outline-info" type="submit">supprimer Promotion</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
    ?>

    </div>
</section>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
