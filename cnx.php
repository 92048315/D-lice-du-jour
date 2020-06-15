<?php 
include 'config.php';
class cnx{
	private $login;
    private $mdp;
	private $admin;
    public $conn;	

	public function __construct($login,$mdp,$conn)
	{
		$this->login=$login;
		$this->mdp=$mdp;
		$c=new config();
		$this->conn=$c->getConnexion();
		
	}
	function getLog()
	{
		return $this->login;
	}
    function getMdp()
	{
		return $this->mdp;
		
	}
	 function getAdmin()
	{
		return $this->admin;
		
	}

	public function Logedin($conn,$login,$mdp)
	{
		$req="select * from cnx where login='$login' && mdp='$mdp'";
		$rep=$conn->query($req);
		return $rep->fetchAll();
	}

	}
	
	

	?>