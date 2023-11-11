<?php 

function connexion4(){
    return new PDO('mysql:host=mysql.;dbname=enum; charset=UTF8', "enum", "mdp");
}

function echoStock($x){
    if($x<=15 && $x>1){
        echo "<p style='color: red; position: relative; left: 1000px; top:200px;'>Plus que <strong> ",$x," </strong> exemplaires en stock !</p>";
    }

    if($x==1){
        echo "<p style='color: red; position: relative; left: 1000px; top:200px;'>Plus que <strong> ",$x," </strong> exemplaire en stock !</p>";
    }

    if($x==0){
        echo "<p style='color: red; position: relative; left: 1000px; top:200px;'> <strong> En rupture de stock !</strong></p>";
    }
}

function afficheButton($x){

    if($x==0){
        print("<button style='position: relative; left: 1060px; top:300px;' type='submit' name='btSubmit' disabled>Ajouter au panier</button>");
    }

    if($x>0){
        print("<button style='position: relative; left: 1060px; top:320px;' type='submit' name='btSubmit'>Ajouter au panier</button></br>
        <input style='position: relative; left: 1000px; top:300px;' type='number' min='0' max='".getQuantiteMax()."' step='1' placeholder='Quantité' value='1' name='quantite'>");
    }
}


function showElement($x){
    $dbh=connexion4();
    $statement= $dbh->prepare("SELECT * FROM produits WHERE idproduit=:uidproduit");
    $statement->execute(array(':uidproduit'=>$x));
    $row=$statement->fetch(PDO::FETCH_ASSOC);
    print(" <div class='row'>
                <div class='col-4 align-self-center'>
                    <h3>".$row['categorie']."</h3>
                    <img src='".$row['photo']."' width='350'>
                </div>
                <div class='col-5 align-self-center'>
                    <h2>".$row['nom']."</h2>
                    <h3>".$row['marque']."</h3>
                    <h6>".$row['description']."</h6>
                </div>
                <div class='col-3'> 
                    </br><h3 style='position: relative; left: 10px; top:150px'>".number_format((float)$row['prix'], 2, '.', '')."€</h3>
                    <div class='forobjet'>".echoStock($row['stock'])."</div>
                    <div class='forobjet'>".afficheButton($row['stock'])."</div>
                </div>
            </div>");
}

?>