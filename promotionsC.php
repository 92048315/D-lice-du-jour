	<?php
include_once "../config.php";
class promotionC 
{
    function getProds()
    {
        $this->check();
        $sql="select * from produit";
        $db=config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            echo 'error: '.$e->getMessage();
        }
    }
    function getProms($idprom=null)
    {
        if($idprom!=null)
        {
            $sql="select * from promotion where id_promo='$idprom'";

        }
        else
        {
            $sql="select * from promotion";
        }
        $db=config::getConnexion();
        try
        {
            return $db->query($sql)->fetchAll();
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }

    }


    function getfirstProms()
    {
        $sql="SELECT * FROM `promotion` ORDER BY taux_promo DESC LIMIT 5";
        $db=config::getConnexion();
        try
        {
            return $db->query($sql)->fetchAll();
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }

    }
    function ajouterpromotion($taux,$idProd,$datefin,$nom)
    {
        $sql2="insert into dbpatisserie.promotion (nom_promo, taux_promo, date_debut, date_fin, refp) values ('$nom','$taux',now(),'$datefin','$idProd')";

        $db=config::getConnexion();
        try
        {
            $db->query($sql2);
            
        }
        catch (Exception $e)
        {
            echo 'error :'.$e->getMessage();
        }



    }
    function supprimerpromotion($id_prod)
	{
		$sql="DELETE FROM dbpatisserie.promotion where id_promo='$id_prod'";
		$db = config::getConnexion();
		try{
            $db->query($sql);

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function check()
    {
        $sql="update produit set etat=0 where date_fin < now()";
        $db=config::getConnexion();
        try{
            $db->query($sql);

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

//	function ajouterpromotion($promotion)
//	{
//
//		$sql="insert into promotion (nom_promo, refp, taux_promo,date_debut,date_fin,etat) values (:nom_promo,:refp,:taux_promo,:date_debut,:date_fin,:etat)";
//		$db = config::getConnexion();
//		try{
//        $req=$db->prepare($sql);
//
//        $nom_promo=$promotion->get_nom_promo();
//
//        $refp=$promotion->get_refp();
//        $taux_promo=$promotion->get_taux_promo();
//        $date_debut=$promotion->get_date_debut();
//        $date_fin=$promotion->get_date_fin();
//        $etat=$promotion->get_etat();
//
//
//		$req->bindValue(':nom_promo',$nom_promo);
//        $req->bindValue(':refp',$refp);
//		$req->bindValue(':taux_promo',$taux_promo);
//        $req->bindValue(':date_debut',$date_debut);
//        $req->bindValue(':date_fin',$date_fin);
//	    $req->bindValue(':etat',$etat);
//
//            $req->execute();
//
//        }
//        catch (Exception $e){
//            echo 'Erreur: '.$e->getMessage();
//        }
//
//	}
//	function afficherpromotions(){
//		$sql="SELECT * From promotion";
//		$db = config::getConnexion();
//		try{
//
//		$liste=$db->query($sql);
//		return $liste;
//		}
//        catch (Exception $e){
//            die('Erreur: '.$e->getMessage());
//        }
//	}
//	function supprimerpromotion($id_promo)
//	{
//		$sql="DELETE FROM promotion where refp= '$id_promo'";
//		$db = config::getConnexion();
//		echo "salem";
//		try{
//            $db->query($sql);
//
//        }
//        catch (Exception $e){
//            die('Erreur: '.$e->getMessage());
//        }
//	}
function modifierpromotion( $refp,$date_fin,$taux_promo)
    	  {
	$db = config::getConnexion();
	$sql="UPDATE promotion SET taux_promo='$taux_promo',date_fin='$date_fin' where refp='$refp'";
	echo $sql;
	$db=config::getConnexion();
	try
	{
     $db->query($sql);    
       }
     catch (Exception $e){
         echo 'Erreur: '.$e->getMessage();
     }	}
}

?>