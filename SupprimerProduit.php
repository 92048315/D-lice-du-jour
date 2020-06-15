<?PHP
include "../core/produitC.php";

if (isset($_GET["nom"])) {
	
	$produit1C=new ProduitC();
	$produit1C->supprimerproduit($_GET["nom"]);
	echo "ok";
	header('Location:afficherproduit.php');

}
else{
	echo "NON";
}

?>