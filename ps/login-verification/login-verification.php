<?php


    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $result=$bdd->prepare('SELECT nom,email,mdp,company FROM agents WHERE email=? AND mdp =?');
    $result->execute(array($email,$password));
    $donnee=$result->fetch();

    if($donnee!=false){
        $_SESSION['nom']=$donnee['nom'];
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        $_SESSION['company']=$donnee['company'];
        header("Location:dashboard/produit.php");
    }else{
        $message='mdp ou email incorrecte';
    }


?>