<?php

try{
    $bdd=new PDO("mysql:host=localhost;dbname=jf","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

    $result=$bdd->query('SELECT idVoletProduction,nomVolet FROM voletproduction');
    $option='<option value="">Sélectionnez le volet</option>';
    while($donnee=$result->fetch()){
        $option.='<option value="'.$donnee['nomVolet'].'" >'.$donnee['nomVolet'].'</option>';
    }
    echo $option;


?>