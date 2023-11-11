<?php 

function echoIf($x){
    if(isset($x)){
        echo $x;
    }else{
        echo null;
    }
}

function getPrixMax($x){
    $requetePrincipale = "SELECT MAX(prix) AS prixMax FROM produits WHERE categorie=:ucategorie";
    $dbh = connexion();
    $statement = $dbh->prepare($requetePrincipale);
    $statement->bindParam(':ucategorie', $_GET['page']);
    $statement->execute();
    foreach($statement as $rowrow) {
        print(number_format((float)$rowrow['prixMax'], 2, '.', ''));
    }

}

function getPrixMin($x){
    $requetePrincipale = "SELECT MIN(prix) AS prixMin FROM produits WHERE categorie=:ucategorie";
    $dbh = connexion();
    $statement = $dbh->prepare($requetePrincipale);
    $statement->bindParam(':ucategorie', $_GET['page']);
    $statement->execute();
    foreach($statement as $rowrow) {
        print(number_format((float)$rowrow['prixMin'], 2, '.', ''));
    }

}

function getQuantiteMax(){
    $rqt = "SELECT * FROM produits WHERE idproduit=:uidProduit;";
    $dbh = connexion();
    $rqt=$dbh->prepare("SELECT * FROM produits WHERE idproduit=:uidProduit;");
    $rqt->execute(array(':uidProduit'=>$_GET['objet']));
    foreach($rqt as $row){
        $quantimax=$row['stock'];
    }
    return $quantimax;
}

?>