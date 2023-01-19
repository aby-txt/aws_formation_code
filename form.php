<?php
    $serveur = "localhost";
    $dbname = "aws_form";
    $user = "phpmyadmin";
    $pass = "M00delP4ssword./";
    
    $nom = $_POST["name"];
    $prenom = $_POST["pname"];
    $num = $_POST["nb"];
    $mail = $_POST["mail"];
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO participant(name, pname, nb, mail)
            VALUES(:name, :pname, :nb, :mail)");
        $sth->bindParam(':name',$nom);
        $sth->bindParam(':pname',$prenom);
        $sth->bindParam(':nb',$num);
        $sth->bindParam(':mail',$mail);
        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:accueil.php");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>