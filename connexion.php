<html>
<head>
<meta charset="utf8">
</head>
<body>
<?php 
include "cnx.php";
//$log="admin";
//$pwd="admin";
/*$servername="localhost";
	$username="root";
	$password="";
	$dbname="dblogin";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", 
	$username, $password);
	$req="select * from users where user_name='$login' && user_pass='$pwd'";
	$rep=$conn->query($req);
	$res=$rep->fetchAll();
	*/
$c=new config();
$conn=$c->getConnexion();
$cnx=new cnx($_POST['login'],$_POST['mdp'],$conn);
$cn=$cnx->Logedin($conn,$_POST['login'],$_POST['mdp']);

	//var_dump($u);
//$logR=$_POST['login'];
//$pwdR=$_POST['pwd'];
$vide=false;
if (!empty($_POST['login']) && !empty($_POST['mdp'])){
	
	foreach($cn as $t){
		$vide=true;
	if ($t['login']==$_POST['login'] && $t['mdp']==$_POST['mdp'] && $t['admin']=="0"){
		
		session_start();
		$_SESSION['l']=$_POST['login'];
		$_SESSION['m']=$_POST['mdp'];
		$_SESSION['a']=$t['admin'];
		header("location:views");
		
		}
		if ($t['login']==$_POST['login'] && $t['mdp']==$_POST['mdp'] && $t['admin']=="1"){
		
		session_start();
		$_SESSION['l']=$_POST['login'];
		$_SESSION['m']=$_POST['mdp'];
		$_SESSION['a']=$t['admin'];
		
		header("location:views_back");

		
		}
	
}
if ($vide==false) { 
         // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
         echo '<body onLoad="alert(\'Membre non reconnu...\')">'; 
         // puis on le redirige vers la page d'accueil
         echo '<meta http-equiv="refresh" content="0;URL=auth.html">'; 
      } 
}	  
 
else { 
      echo "Les variables du formulaire ne sont pas déclarées.<br> Vous devez remplir le formulaire"; 
     ?> <a href="auth.html">Retour au formulaire</a>	 <?php 
}  

?> 
</body>
</html>