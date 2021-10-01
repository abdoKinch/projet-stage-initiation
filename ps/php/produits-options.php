<?php

try{
    $bdd=new PDO("mysql:host=localhost;dbname=jf","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

    $result=$bdd->query('SELECT idProduit,nomProduit FROM produit');
    $option='<option value="">Sélectionnez le produit</option>';
    while($donnee=$result->fetch()){
        $option.='<option value="'.$donnee['nomProduit'].'" >'.$donnee['nomProduit'].'</option>';
    }
    echo $option;


?>