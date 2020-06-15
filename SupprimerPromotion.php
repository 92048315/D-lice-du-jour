<?PHP
include "../entities/promotions.php";
include "../core/promotionsC.php";
if (isset($_POST['idProduit'])){


$promotion1C=new promotionC();
$promotion1C->supprimerpromotion($_POST['idProduit']);

header('Location: AfficherProm.php');

}else{
	echo "vérifier les champs";
}
?>
