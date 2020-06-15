<?PHP
include_once "../config.php";

class ProduitC {
function afficherProduit ($Produit,$nom){
	$sql="SELECT * FROM dbpatisserie.produit where nom=':nom'";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':nom',$nom);
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	 function afficherproduit1($refp)
    {

        $sql="select nom from dbpatisserie.produit where refp ='$refp' ";

        $db = config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
	function ajouterProduit($produit){
		      $nom=$produit->getNom();
            $prix=$produit->getPrix();
            $disponibilite=$produit->getDisponibilite();
            $datep=$produit->getDatep();
            $type=$produit->getType();
            $parfum=$produit->getParfum();
            $image=$produit->getImage();
            $description=$produit->getDescription();

		$sql="INSERT INTO dbpatisserie.produit (nom,prix,disponibilite,datep,type,parfum,image,description) VALUES ('$nom','$prix','$disponibilite','$datep','$type','$parfum','$image','$description')";
		$db = config::getConnexion();
		try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur'.$e->getMessage());
        }
	}
	
	function afficherproduits(){
		$sql="SELECT * FROM dbpatisserie.produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
    
    function afficherproduitstri(){
        $sql="SELECT * FROM dbpatisserie.produit ORDER BY nom";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


	function supprimerproduit($nom){
		$sql="DELETE FROM dbpatisserie.produit where nom=:nom";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
        $req->bindValue(':nom',$nom);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierproduit($refp,$nom,$prix,$disponibilite,$datep,$type,$parfum,$image,$description){
		$sql="UPDATE dbpatisserie.produit SET prix='$prix',disponibilite='$disponibilite',datep='$datep',type='$type',parfum='$parfum',image='$image',description='$description' WHERE nom='$nom'";
		
		$db = config::getConnexion();
		try{
				$db->query($sql);
				//header('Location: ../views/afficherproduit.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function recupererproduit($refp){
		$sql="SELECT * from dbpatisserie.produit where refp like '$refp'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherproduit($nom){
		$sql="SELECT * from dbpatisserie.produit where nom='$nom'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function afficherParPagination($start,$page,$limit)
    {
        

        $sql="select * from dbpatisserie.produit limit $start, $limit";

        $db = config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

    function afficherproduittype($type){
        $sql="SELECT * from dbpatisserie.produit where type like '$type'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}
?>