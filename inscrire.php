<?php

include_once "../config.php";

if (isset($_POST["login"]) and isset($_POST["mdp"]) and isset($_POST["admin"]))
{


    $login=$_POST["login"];
    $mdp=$_POST["mdp"];
    $admin=$_POST["admin"];
    $sql2="insert into dbpatisserie.cnx (login, mdp, admin) values ('$login','$mdp','$admin')";

    $db=config::getConnexion();
    try
    {
        $db->query($sql2);

    }
    catch (Exception $e)
    {
        echo 'error :'.$e->getMessage();
    }
    header("location: ../views");


}
else
{
    echo"thabet rou7ek".$_POST["login"].$_POST["mdp"].$_POST["admin"]."";
}
