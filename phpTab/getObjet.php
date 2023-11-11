<?php 

function connexion(){
    return new PDO('mysql:host=mysql.;dbname=enum; charset=UTF8', "enum", "mdp");
}

function split_words($string){ 
    $retour = array(); 
    $delimiteurs = ' .!?, :;(){}[]%+'; 
    $tok = strtok($string, " "); 
    while(strlen(join(" ", $retour)) != strlen($string)) { 
        array_push($retour, $tok); 
        $tok = strtok($delimiteurs); 
    } 
    return $retour; 
}

function getObjet($x){

    if($x=='RAM'||$x=='CPU'||$x=='GPU'||$x=='MOUSE'||$x=='KB'){
        $requetePrincipale = "SELECT * FROM produits WHERE categorie=:ucategorie";
    }else{
        $requetePrincipale = "SELECT * FROM produits WHERE nom LIKE '%";
        $mots = split_words($_GET['page']);
        $i=0;
        while(isset($mots)&&count($mots)>$i){
            if($i==0){
                $requetePrincipale.="".$mots[$i]."%' OR description LIKE '%".$mots[$i]."%' OR marque LIKE '%".$mots[$i]."%' OR categorie LIKE '%".$mots[$i]."%'";
            }else{
                $requetePrincipale.=" OR nom LIKE '%".$mots[$i]."%' OR description LIKE '%".$mots[$i]."%' OR marque LIKE '%".$mots[$i]."%' OR categorie LIKE '%".$mots[$i]."%'";
            }
            $i+=1;
        }
    }

    $som=0;
    if(isset($_POST['marqueCor'])){
        $som+=1;
    }
    if(isset($_POST['marqueCru'])){
        $som+=1;
    }
    if(isset($_POST['marqueHyp'])){
        $som+=1;
    }
    if(isset($_POST['marqueKin'])){
        $som+=1;
    }
    if(isset($_POST['marqueInt'])){
        $som+=1;
    }
    if(isset($_POST['marqueAMD'])){
        $som+=1;
    }
    if(isset($_POST['marqueNvi'])){
        $som+=1;
    }
    if(isset($_POST['marqueLog'])){
        $som+=1;
    }
    if(isset($_POST['marqueRaz'])){
        $som+=1;
    }
    if($som>0){
        $requetePrincipale .=" AND (";
        if(isset($_POST['marqueCor'])){
            $requetePrincipale .= " marque='Corsair' OR";
        }
        if(isset($_POST['marqueCru'])){
            $requetePrincipale .= " marque='Crucial' OR";
        }
        if(isset($_POST['marqueHyp'])){
            $requetePrincipale .= " marque='HyperX' OR";
        }
        if(isset($_POST['marqueKin'])){
            $requetePrincipale .= " marque='Kingston' OR";
        }
        if(isset($_POST['marqueInt'])){
            $requetePrincipale .= " marque='Intel' OR";
        }
        if(isset($_POST['marqueAMD'])){
            $requetePrincipale .= " marque='AMD' OR";
        }
        if(isset($_POST['marqueNvi'])){
            $requetePrincipale .= " marque='Nvidia' OR";
        }
        if(isset($_POST['marqueLog'])){
            $requetePrincipale .= " marque='Logitech' OR";
        }
        if(isset($_POST['marqueRaz'])){
            $requetePrincipale .= "marque='Razer' OR";
        }
        $requetePrincipale = substr($requetePrincipale, 0, -2);
        $requetePrincipale .=")";
    }

    $som2=0;
    if(isset($_POST['Go1'])){
        $som2+=1;
    }
    if(isset($_POST['Go2'])){
        $som2+=1;
    }
    if(isset($_POST['Go3'])){
        $som2+=1;
    }
    if(isset($_POST['Go4'])){
        $som2+=1;
    }
    if(isset($_POST['Go5'])){
        $som2+=1;
    }
    if($som2>0){
        $requetePrincipale .=" AND (";
        if(isset($_POST['Go1'])){
            $requetePrincipale .= " (nom LIKE '% 2GB%' OR nom LIKE '% 2Go%') OR";
        }
        if(isset($_POST['Go2'])){
            $requetePrincipale .= " ((nom LIKE '% 2GB%' OR nom LIKE '% 2Go%') OR (nom LIKE '%4GB%' OR nom LIKE '%4Go%') OR (nom LIKE '%8GB%' OR nom LIKE '%8Go%')) OR";
        }
        if(isset($_POST['Go3'])){
            $requetePrincipale .= " ((nom LIKE '%8GB%' OR nom LIKE '%8Go%') OR (nom LIKE '%16GB%' OR nom LIKE '%16 GB%' OR nom LIKE '%16Go%' OR nom LIKE '%16 Go%')) OR";
        }
        if(isset($_POST['Go4'])){
            $requetePrincipale .= " ((nom LIKE '%16GB%' OR nom LIKE '%16 GB%' OR nom LIKE '%16Go%') OR (nom LIKE '%32GB%' OR nom LIKE '%32Go%')) OR";
        }
        if(isset($_POST['Go5'])){
            $requetePrincipale .= " ((nom LIKE '%32GB%' OR nom LIKE '%32Go%') OR (nom LIKE '%64GB%' OR nom LIKE '%64Go%') OR (nom LIKE '%128GB%' OR nom LIKE '%128Go%')) OR";
        }
        $requetePrincipale = substr($requetePrincipale, 0, -2);
        $requetePrincipale .=")";
    }

    $som3=0;
    if(isset($_POST['Core1'])){
        $som3+=1;
    }
    if(isset($_POST['Core2'])){
        $som3+=1;
    }
    if(isset($_POST['Core3'])){
        $som3+=1;
    }
    if($som3>0){
        $requetePrincipale .=" AND (";
        if(isset($_POST['Core1'])){
            $requetePrincipale .= "";
        }
        if(isset($_POST['Core2'])){
            $requetePrincipale .= " (nom LIKE '%2.9GHz%') OR";
        }
        if(isset($_POST['Core3'])){
            $requetePrincipale .= " (nom LIKE '%3.6GHz%' OR nom LIKE '%3,6GHz%') OR (nom LIKE '%3,8 GHz%') OR";
        }
        $requetePrincipale = substr($requetePrincipale, 0, -2);
        $requetePrincipale .=")";
    }

    if(isset($_POST['wireless'])){
        $requetePrincipale .= " AND (nom LIKE '%Wireless%' OR nom LIKE '%sans Fil%')";
    }
    if(isset($_POST['prixMax'])){
        $requetePrincipale .= " AND prix<=".($_POST['prixMax']+1)."";
    }
    if(isset($_POST['rgb'])){
        $requetePrincipale .= " AND ((nom LIKE '%RGB%' OR nom LIKE '%RVB%') OR (description LIKE '%RGB%' OR description LIKE '%RVB%'))";
    }
    if(isset($_POST['prixCroissant'])){
        $requetePrincipale .= " ORDER BY prix;";
    }

    $dbh = connexion();
    $statement = $dbh->prepare($requetePrincipale);
    if($x=='RAM'||$x=='CPU'||$x=='GPU'||$x=='MOUSE'||$x=='KB'){
        $statement->bindParam(':ucategorie', $_GET['page']);
    }
    $statement->execute();
        foreach($statement as $rowrow) {
            print(" <div class='row'>
                        <div class='col-3 align-self-center'>
                        <a href='1OBJET.php?objet=".$rowrow['idproduit']."'><img class='img-fluid' src='".$rowrow['photo']."'> </a>
                        </div>
                        <div class='col-4 align-self-center'>
                            <p>".substr($rowrow['nom'], 0, 60)."</p>
                            <p>".$rowrow['marque']."</p>
                            <p>".number_format((float)$rowrow['prix'], 2, '.', '')."€</p>
                        </div>
                        <div class='col-5 align-self-center'>".substr($rowrow['description'], 0, 200)."</div>
                    </div></br>");
        }

}

function getObjetDuMoment(){
    $dbh = connexion();
    $rqt_select_produits = $dbh->prepare("SELECT * FROM produits WHERE stock>50;");
    $rqt_select_produits->execute();
    foreach($rqt_select_produits as $row) {
        print(" <div class='col-4'>
                    <div class='col-4 align-self-center'>
                    <a href='1OBJET.php?objet=".$row['idproduit']."'><img class='img-fluid' src='".$row['photo']."'> </a>
                    </div>
                    <div class='col-8 align-self-center'>
                        <p>".substr($row['nom'], 0, 60)."</p>
                        <p>".$row['marque']."</p>
                        <p>".number_format((float)$row['prix'], 2, '.', '')."</p></br>
                    </div>
                </div>");
    }

}






?>