<?php
include "../core/promotionsC.php";

if (isset($_POST["taux"]) and isset($_POST["datefin"]) and isset($_POST["nom"]) and isset($_POST["produit"]))
{
    $f=new promotionC();
    $f->ajouterpromotion($_POST["taux"],$_POST["produit"],$_POST["datefin"],$_POST["nom"]);

    
	$mailto ="syrine.sassi@esprit.tn"; 
    $mailSub = "Une Nouvelle promotion";
    $mailMsg = "Nous avons un nouvelle promotion, venez visiter notre site!";
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


    header("location:AfficherProm.php");


}
else
{
    echo"thabet rou7ek".$_POST["taux"].$_POST["produit"].$_POST["datefin"].$_POST["nom"]."";
}
