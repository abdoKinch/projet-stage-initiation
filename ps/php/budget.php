<?php

try{
    $bdd=new PDO("mysql:host=localhost;dbname=jf","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['a'])){
    $bm=$_POST['bm'];
    $ba=$_POST['ba'];
    $da=$_POST['da'];
    $p=$_POST['p'];
    $e=$_POST['e'];

    $r=$bdd->prepare('SELECT idProduit FROM produit WHERE nomProduit=?');
    $r->execute(array($p));
    $donnee =$r->fetch();
    
    $r1=$bdd->prepare('SELECT idEntite FROM entite WHERE nomEntite=?');
    $r1->execute(array($e));
    $donnee1 =$r1->fetch();

    $result=$bdd->prepare('INSERT INTO budget(budgetMois,budgetAnnee,dateAssocie,idProduit,idEntite) VALUES(?,?,?,?,?)');
    $result->execute(array($bm,$ba,$da,$donnee['idProduit'],$donnee1['idEntite']));
}elseif(isset($_POST['id']) && isset($_POST['s'])){
    $id=$_POST['id'];
    $result=$bdd->prepare('DELETE FROM budget WHERE idBudget=?');
    $result->execute(array($id));
}elseif(isset($_POST['m'])){
    $id=$_POST['id'];
    $bm=$_POST['bm'];
    $ba=$_POST['ba'];
    $da=$_POST['da'];
    $p=$_POST['p'];
    $e=$_POST['e'];

    $r=$bdd->prepare('SELECT idProduit FROM produit WHERE nomProduit=?');
    $r->execute(array($p));
    $donnee =$r->fetch();
    
    $r1=$bdd->prepare('SELECT idEntite FROM entite WHERE nomEntite=?');
    $r1->execute(array($e));
    $donnee1 =$r1->fetch();

    $result=$bdd->prepare('UPDATE budget SET budgetMois=?,budgetAnnee=?,dateAssocie=?,idProduit=?,idEntite=? WHERE idBudget=?');
    $result->execute(array($bm,$ba,$da,$donnee['idProduit'],$donnee1['idEntite'],$id));
}

        

    $result=$bdd->query('SELECT * FROM budget ');
    $ligne='';
    while($donnee=$result->fetch()){

        $r1=$bdd->prepare('SELECT nomProduit FROM produit WHERE idProduit=?');
        $r1->execute(array($donnee['idProduit']));
        $donnee1 =$r1->fetch();

        $r2=$bdd->prepare('SELECT nomEntite FROM entite WHERE idEntite=?');
        $r2->execute(array($donnee['idEntite']));
        $donnee2 =$r2->fetch();

        $ligne.='<tr>
        <td>'.$donnee['idBudget'].'</td>
        <td>'.$donnee['budgetMois'].'</td>
        <td>'.$donnee['budgetAnnee'].'</td>
        <td>'.$donnee['dateAssocie'].'</td>
        <td>'.$donnee1['nomProduit'].'</td>
        <td>'.$donnee2['nomEntite'].'</td><td>
        <button id="mb" class="btn btn-warning btn-fw" >modifier</button></td>
        <td><button id="sb" class="btn btn-danger btn-fw" >supprimer</button></td>
        </tr>';
    }
    echo $ligne;


?>