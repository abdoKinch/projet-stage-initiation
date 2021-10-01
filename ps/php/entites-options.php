<?php

try{
    $bdd=new PDO("mysql:host=localhost;dbname=jf","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

    $result=$bdd->query('SELECT idEntite,nomEntite FROM entite');
    $option='<option value="" >Sélectionnez l\'entité</option>';
    while($donnee=$result->fetch()){
        $option.='<option value="'.$donnee['nomEntite'].'" >'.$donnee['nomEntite'].'</option>';
    }
    echo $option;


?>