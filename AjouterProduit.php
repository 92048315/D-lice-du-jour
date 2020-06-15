<?php
include "../core/produitC.php";
include "../entities/produit.php";

if(isset($_POST['nom']) and isset($_POST['prix'])and isset($_POST['disponibilite']) and isset($_POST['datep']) and isset($_POST['type']) and isset($_POST['parfum']) and isset($_POST['description']))
	{
		$target = "images/";
		$target = $target . basename( $_FILES['image']['name']);
		$Filename=basename( $_FILES['image']['name']);

		if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
	{ 
		echo "The file ".basename($_FILES['image']['name'])." has been uploaded, and your information has been added to the directory";
	
	} 
        $produit1=new Produit(/*($_POST['refp']),*/$_POST['nom'] ,$_POST['prix'],$_POST['disponibilite'] ,$_POST['datep'] ,$_POST['type'],$_POST['parfum'] ,$Filename ,$_POST['description']);
        $produitC1=new ProduitC();
        $produitC1->ajouterProduit($produit1);

        $mailto ="syrine.sassi@esprit.tn";
    $mailSub = "Un Nouveau produit";
    $mailMsg = "Nous avons un nouveau produit (".$_POST['nom'].") en stock, venez visiter notre site!";
    require 'PHPMailer-master/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail ->IsSmtp();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail ->SMTPAuth = true;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPSecure = 'tls';
    $mail ->Port = 587; // or 587
    $mail ->IsHTML(true);
    $mail ->Username = "syrine.sassi@esprit.tn";
    $mail ->Password = "181JFT3119";
    $mail ->SetFrom("syrine.sassi@esprit.tn");
    $mail ->Subject = $mailSub;
    $mail ->Body = $mailMsg;
    $mail ->AddAddress($mailto);

    if(!$mail->Send())
    {
    	echo '<body onLoad="alert(\'email non envoyé\')">';
    }
    else
    {
    	echo '<body onLoad="alert(\'email envoyé\')">';
    }

header("location:afficherproduit.php");

	}
else
{
echo '<body onLoad="alert(\'Nom deja existant veuiller changer\')">';
}
