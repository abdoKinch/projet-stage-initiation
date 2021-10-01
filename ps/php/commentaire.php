<?php

try{
    $bdd=new PDO("mysql:host=localhost;dbname=jf","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['a'])){
    $libelle=$_POST['libelle'];
    $date=$_POST['date'];
    $entite=$_POST['entite'];
    $volet=$_POST['volet'];

    $r1=$bdd->prepare('SELECT idEntite FROM entite WHERE nomEntite=?');
    $r1->execute(array($entite));
    $donnee1 =$r1->fetch();
    
    $r2=$bdd->prepare('SELECT idVoletProduction FROM voletproduction WHERE nomVolet=?');
    $r2->execute(array($volet));
    $donnee2 =$r2->fetch();

    $result=$bdd->prepare('INSERT INTO commentaire(libelle,dateCommentaire,idEntite,idVolet) VALUES(?,?,?,?)');
    $result->execute(array($libelle,$date,$donnee1['idEntite'],$donnee2['idVoletProduction']));
}elseif(isset($_POST['s'])){
    $id=$_POST['id'];
    $result=$bdd->prepare('DELETE FROM commentaire WHERE idCommentaire=?');
    $result->execute(array($id));
}elseif(isset($_POST['m'])){
    $id=$_POST['id'];
    $libelle=$_POST['libelle'];
    $date=$_POST['date'];
    $entite=$_POST['entite'];
    $volet=$_POST['volet'];
    
    $r1=$bdd->prepare('SELECT idEntite FROM entite WHERE nomEntite=?');
    $r1->execute(array($entite));
    $donnee1 =$r1->fetch();

    $r2=$bdd->prepare('SELECT idVoletProduction FROM voletproduction WHERE nomVolet=?');
    $r2->execute(array($volet));
    $donnee2 =$r2->fetch();

    $result=$bdd->prepare('UPDATE commentaire SET libelle=?,dateCommentaire=?,idEntite=?,idVolet=? WHERE idCommentaire=?');
    $result->execute(array($libelle,$date,$donnee1['idEntite'],$donnee2['idVoletProduction'],$id));
}

        

    $result=$bdd->query('SELECT * FROM commentaire ');
    $ligne='';
    while($donnee=$result->fetch()){

        $r1=$bdd->prepare('SELECT nomEntite FROM entite WHERE idEntite=?');
        $r1->execute(array($donnee['idEntite']));
        $donnee1 =$r1->fetch();

        $r2=$bdd->prepare('SELECT nomVolet FROM voletproduction WHERE idVoletProduction=?');
        $r2->execute(array($donnee['idVolet']));
        $donnee2 =$r2->fetch();

        $ligne.='<tr>
        <td>'.$donnee['idCommentaire'].'</td>
        <td>'.$donnee['libelle'].'</td>
        <td>'.$donnee['dateCommentaire'].'</td>
        <td>'.$donnee1['nomEntite'].'</td>
        <td>'.$donnee2['nomVolet'].'</td><td>
        <button id="m" class="btn btn-warning btn-fw" >modifier</button></td>
        <td><button id="s" class="btn btn-danger btn-fw" >supprimer</button></td>
        </tr>';
    }
    echo $ligne;


?>