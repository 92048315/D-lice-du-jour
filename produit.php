<?PHP
class Produit{
	private $refp;
	private $nom;
	private $prix;
	private $disponibilite;
	private $datep;
	private $type;
	private $parfum;
	private $description;
	private $image;

	function __construct($nom,$prix,$disponibilite,$datep,$type,$parfum,$image,$description){
		//$this->refp=$refp;
		$this->nom=$nom;
		$this->description=$description;
		$this->prix=$prix;
		$this->datep=$datep;
		$this->disponibilite=$disponibilite;
		$this->parfum=$parfum;
		$this->type=$type;
		$this->image=$image;
	}
	
	function getRefp(){
		return $this->refp;
	}
	function getNom(){
		return $this->nom;
	}
	function getDescription(){
		return $this->description;
	}
	function getPrix(){
		return $this->prix;
	}
	function getDisponibilite(){
		return $this->disponibilite;
	}
	function getType(){
		return $this->type;
	}
	function getDatep(){
		return $this->datep;
	}
	function getParfum(){
		return $this->parfum;
	}
	function getImage(){
		return $this->image;
	}
	function setRefp($refp){
		$this->refp=$refp;
	}
	function setNom($nom){
		$this->nom=$nom;
	}
	function setDescription($description){
		$this->description=$description;
	}
	function setPrix($prix){
		$this->prix=$prix;
	}
	function setDisponibilite($disponibilite){
		$this->disponibilite=$disponibilite;
	}
	function setType($type){
		$this->type=$type;
	}
	function setParfum($parfum){
		$this->parfum=$parfum;
	}
	function setDate($datep){
		$this->datep=$datep;
	}
	function setImage($image){
		$this->image=$image;
	}

}
?>