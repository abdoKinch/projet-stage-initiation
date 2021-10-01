<?php

try{
    $bdd=new PDO("mysql:host=localhost;dbname=jf","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['np']) && isset($_POST['up']) && isset($_POST['qp'])){
    $np=$_POST['np'];
    $up=$_POST['up'];
    $qp=$_POST['qp'];
    $result=$bdd->prepare('INSERT INTO produit(nomProduit,unite,qualite) VALUES(?,?,?)');
    $result->execute(array($np,$up,$qp));
}elseif(isset($_POST['id']) && isset($_POST['s'])){
    $id=$_POST['id'];
    $result=$bdd->prepare('DELETE FROM produit WHERE idProduit=?');
    $result->execute(array($id));
}elseif(isset($_POST['m'])){
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $unite=$_POST['unite'];
    $qualite=$_POST['qualite'];
    $result=$bdd->prepare('UPDATE produit SET nomProduit=?,unite=?,qualite=? WHERE idProduit=?');
    $result->execute(array($nom,$unite,$qualite,$id));
}

    $result=$bdd->query('SELECT * FROM produit ');
    $ligne='';
    while($donnee=$result->fetch()){
        $ligne.='<tr><td>'.$donnee['idProduit'].'</td><td>'.$donnee['nomProduit'].'</td><td>'.$donnee['unite'].'</td><td>'.$donnee['qualite'].'</td><td><button id="mp" class="btn btn-warning btn-fw" >modifier</button></td><td><button id="sp" class="btn btn-danger btn-fw" >supprimer</button></td></tr>';
    }
    echo $ligne;


?>