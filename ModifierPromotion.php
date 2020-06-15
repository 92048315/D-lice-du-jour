<?php
include '../entities/promotions.php';
include '../core/promotionsC.php';




  //récupération des valeurs des champs:
  //nom:
  //prenom:

  //adresse:
  $taux_promo = $_POST["taux_promo"] ;
  //code postal:
  //numéro de téléphone:
  $date_fin       = $_POST["date_fin"] ;
 $refp=$_POST["refp"];

 $promotion1C=new promotionC();
$listepromotions=$promotion1C->modifierpromotion($refp,$date_fin,$taux_promo);
  header("location:AfficherProm.php");




  //affichage des résultats, pour savoir si la modification a marchée:
  // if($requete)
  // {
  //   echo("La modification à été correctement effectuée") ;
  // }
  // else
  // {
  //   echo("La modification à échouée") ;
  // }
?>
