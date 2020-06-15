<?PHP
include "../entities/produit.php";
include "../core/produitC.php";

if (isset($_GET['nom'])) 
{
    $produitC=new ProduitC();
    $result=$produitC->rechercherproduit($_GET['nom']);
    foreach($result as $row)
    {
        $refp=$row['refp'];
        $nom=$row['nom'];
        $type=$row['type'];
        $parfum=$row['parfum'];
        $prix=$row['prix'];
        $disponibilite=$row['disponibilite'];
        $image=$row['image'];
        $datep=$row['datep'];
        $description=$row['description'];
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

    <table class="text-center table table-data2">
	<div >
       <form name="myform" method="POST" enctype="multipart/form-data" onsubmit="return verif()">
        <h1 class="prod">Modifier produit</h1>
    <center>
        <div>
        <label>Reference du produit</label></br>
        <input type="number" name="refp" value="<?php echo $refp; ?>" disabled>
    		</div>
    <div>
        <label>Nom</label></br>
        <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" disabled>
        <input type="hidden" name="nom"  value="<?PHP echo $nom ?>">
    </div>
    <div>
        <label>Type</label></br>
        <input type="text" id= "type" name="type" value="<?php echo $type ?>">
    </div>
    <div>
        <label>Parfum</label></br>
        <input type="text" name="parfum" id="parfum" value="<?php echo $parfum ?>">
    </div>
    <div>
        <label>Prix</label></br>
        <input type="number" name="prix" id="prix" value="<?php echo $prix ?>">

    </div>
    <div>
        <label>Description</label></br>
        <textarea name="description" id="description"><?php echo $description ?></textarea>
    </div>
    <div>
        <label>Date de preparation</label></br>
        <input type="date" name="datep" id="datep" value="<?php echo $datep ?>">
    </div>
    <div>
        <label>Disponibilite</label></br>
        <input type="number" name="disponibilite" id="disponibilite" value="<?php echo $disponibilite ?>">
    </div>
    <div>
    <label>Importer une image</label></br>
    <input type="file" name="image" id="image" value="upload" >
    </div>
</br>
   <input class="button" type="submit" name="modifier" id="modifier" value="Modifier" href="AfficherProduit.php" >
   
</br>
    </center>
 </form>
</div>
</table>

<?php
	}

	if (isset($_POST['modifier'])) {
		if (isset($_POST['image'])) {
            # code...
        
		$target = "images/";
		$target = $target . basename( $_FILES['image']['name']);
		$Filename=basename( $_FILES['image']['name']);
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
		{ 
			echo "The file ".basename($_FILES['image']['name'])." has been uploaded, and your information has been added to the directory";
		} 
        $image=$Filename;
        }
        //$refp=$_POST['refp'];
		$nom=$_POST['nom'];
		$prix=$_POST['prix'];
		$disponibilite=$_POST['disponibilite'] ;
		$datep=$_POST['datep'] ;
		$type=$_POST['type'];
		$parfum=$_POST['parfum'];
		$description=$_POST['description'];
        $produitC1=new ProduitC();
        
        $produitC1->modifierproduit($refp,$nom,$prix,$disponibilite,$datep,$type,$parfum,$image,$description);
	  // header("Location: afficherproduit.php");

		
}
else{
	echo "<script>function myFunction() { alert(erreur); }</script>";
}
}
?>
</section>
<!--================End Portfolio Area Area =================-->


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
