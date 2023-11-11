<?php
function connexion3(){
    return new PDO('mysql:host=mysql.;dbname=enum; charset=UTF8', "enum", "mdp");
}

function getInfoCompte(){
    $dbh = connexion3();
    $rqt_select_client = $dbh->prepare("SELECT * FROM clients WHERE email=:uemail");
    $rqt_select_client->execute(array(':uemail'=>$_SESSION['email']));
    $row=$rqt_select_client->fetch(PDO::FETCH_ASSOC);
    print("
        <div class='container'>
            <div class='row-info'>
                <div class='col-3 align-self-center'>
                    <h3>Bonjour ".$row['nom']." ".$row['prenom']."</h3>
                </div>
                <div class='col-4 align-self-center'>
                    <ul class='infoCompte' aria-labelledby='informations'>
                        <li> Nom : ".$row['nom']."</li></br>
                        <li> Prenom : ".$row['prenom']."</li></br>
                        <li> Email : ".$row['email']."</li></br>
                        <li> Telephone : ".$row['tel']."</li></br>
                    </ul>    
                </div>
            </div>
        </div>");                            
}

function ObjetInPanier(){
    $dbh = connexion3();
    $rqt_select_produits_cmd_encours = $dbh->prepare("SELECT * FROM commandes, lignescommandes, produits WHERE email=:uemail AND etat='En cours' AND commandes.idcommande=lignescommandes.idcommande AND lignescommandes.idproduit=produits.idproduit");
    $rqt_select_produits_cmd_encours->execute(array(':uemail'=>$_SESSION['email']));
    $valeur_total = 0;
    foreach($rqt_select_produits_cmd_encours as $row){
        print("
            <div class='row'>
                <div class='col-3'>
                    <img src='".$row['photo']."' width='90' height='90'>
                </div>
                <div class='col-6'> 
                    <div class='tableau'>
                            <h5>".substr($row['nom'], 0, 40)."</h5>
                    </div>
                </div>
                <div class='col-3'>
                            <h6>Quantité <strong>".$row['quantite']."</strong></h6>
                            <h6>Prix <Strong>".$row['quantite']*$row['prix']."€</strong></h6>
                    <button type='submit' name='".$row['idproduit']."'>Supprimer</button>
                </div>
               </div>
            </br>");
        $valeur_total+=$row['quantite']*$row['prix'];
    }
    print("<div class='row'><h3>Valeur Total:".$valeur_total." </h3></div>");
}

function addInPanier(){
    if($_POST['quantite']>0){
        $dbh = connexion3();
        $rqt_select_command_client = $dbh->prepare("SELECT * FROM commandes WHERE email=:uemail AND etat='En cours'");
        $rqt_select_command_client->bindParam(':uemail', $_SESSION['email']);
        $rqt_select_command_client->execute();
        $row=$rqt_select_command_client->fetch(PDO::FETCH_ASSOC);
        $idcom = $row['idcommande'];
        $rqt_select_produit = $dbh->prepare("SELECT * FROM produits WHERE idproduit=:uidproduit");
        $rqt_select_produit->bindParam(':uidproduit', $_GET['objet']);
        $rqt_select_produit->execute();
        $row2=$rqt_select_produit->fetch(PDO::FETCH_ASSOC);
        $montant = $row2['prix'];
        if(isset($row['idcommande'])){
            $rqt_select_lignecommande = $dbh->prepare("SELECT * FROM lignescommandes WHERE idproduit=:uidproduit AND idcommande=:uidCommande");
            $rqt_select_lignecommande->execute(array(':uidCommande'=>$idcom, ':uidproduit'=>$_GET['objet']));
            $row3=$rqt_select_lignecommande->fetch(PDO::FETCH_ASSOC);
            if(isset($row3['idlignecommande'])){
                $rqt_update_lignecommande = $dbh->prepare("UPDATE lignescommandes SET quantite=:uquantite WHERE idproduit=:uidProduit");
                $rqt_update_lignecommande->execute(array(':uquantite'=>($row3['quantite']+$_POST['quantite']),':uidProduit'=>$_GET['objet']));
            }else{
                $rqt_insert_lignecommande = $dbh->prepare("INSERT INTO lignescommandes (idcommande, idproduit, quantite, montant) VALUES (:uidcommande, :uidproduit, :uquantite, :umontant);");
                $rqt_insert_lignecommande->execute(array(':uidcommande'=>$idcom, ':uidproduit'=>$_GET['objet'], ':uquantite'=>$_POST['quantite'], ':umontant'=>$montant));
            }
        }else{
            $rqt_insert_commande = $dbh->prepare("INSERT INTO commandes (dateC, email, etat) VALUES (NOW(), :uemail, 'En cours');");
            $rqt_insert_commande->bindParam(':uemail', $_SESSION['email']);
            $rqt_insert_commande->execute();
            $rqt_select_commande = $dbh->prepare("SELECT * FROM commandes WHERE email=:uemail AND etat='En cours'");
            $rqt_select_commande->bindParam(':uemail', $_SESSION['email']);
            $rqt_select_commande->execute();
            $row3=$rqt_select_commande->fetch(PDO::FETCH_ASSOC);
            $idcom = $row3['idcommande'];
            $rqt_insert_lignecommande = $dbh->prepare("INSERT INTO lignescommandes (idcommande, idproduit, quantite, montant) VALUES (:uidcommande, :uidproduit, :uquantite, :umontant);");
            $rqt_insert_lignecommande->execute(array(':uidcommande'=>$idcom, ':uidproduit'=>$_GET['objet'], ':uquantite'=>$_POST['quantite'], ':umontant'=>$montant));
        }
    }
}

function validerPanier(){
    $dbh = connexion3();
    $rqt_select_commande = $dbh->prepare("SELECT * FROM commandes WHERE email=:uemail AND etat='En cours'");
    $rqt_select_commande->execute(array(':uemail'=>$_SESSION['email']));
    $row1=$rqt_select_commande->fetch(PDO::FETCH_ASSOC);
    $idcomm=$row1['idcommande'];
    if(isset($row1['idcommande'])){
        $rqt_select_lignecommande = $dbh->prepare("SELECT * FROM lignescommandes WHERE idcommande=:uidCommande");
        $rqt_select_lignecommande->execute(array(':uidCommande'=>$idcomm));
        $i=0;
        foreach($rqt_select_lignecommande as $row){
            $rqt_select_produit = $dbh->prepare("SELECT * FROM produits WHERE idproduit=:uidProduit;");
            $rqt_select_produit->execute(array(':uidProduit'=>$row['idproduit']));
            $row2=$rqt_select_produit->fetch(PDO::FETCH_ASSOC);
            $stock=$row2['stock'];
            $stock=$stock-$row['quantite'];
            $rqt_update_lignecommande = $dbh->prepare("UPDATE produits SET stock=:ustock WHERE idproduit=:uidProduit");
            $rqt_update_lignecommande->execute(array(':ustock'=>$stock,':uidProduit'=>$row['idproduit']));
            $i+=1;
        }
        if($i!=0){
            $rqt_update_commande = $dbh->prepare("UPDATE commandes SET etat='Valide' WHERE idcommande=:uidCommande");
            $rqt_update_commande->execute(array(':uidCommande'=>$idcomm));
        }
    }
}

function supprimerObjet(){
    $dbh = connexion3();
    $rqt_select_commande = $dbh->prepare("SELECT * FROM commandes where email=:uemail AND etat='En cours'");
    $rqt_select_commande->execute(array(':uemail'=>$_SESSION['email']));
    $row=$rqt_select_commande->fetch(PDO::FETCH_ASSOC);
    $idcom=$row['idcommande'];
    if(isset($row['idcommande'])){
        $rqt_select_lignecommande = $dbh->prepare("SELECT * FROM lignescommandes WHERE idcommande=:uidCommande");
        $rqt_select_lignecommande->execute(array(':uidCommande'=>$idcom));
        foreach($rqt_select_lignecommande as $row2){
            $idp=$row2['idproduit'];
            if(isset($_GET[$idp]) || isset($_POST[$idp])){
                $rqt_delete_lignecommande = $dbh->prepare("DELETE FROM lignescommandes WHERE idproduit=:uidProd");
                $rqt_delete_lignecommande->execute(array(':uidProd'=>$row2['idproduit']));
            }
        }
    }
}

function historique(){
    $dbh = connexion3();
    $rqt_select_commandes = $dbh->prepare("SELECT * FROM commandes WHERE email=:uemail AND etat='Valide';");
    $rqt_select_commandes->bindParam(':uemail', $_SESSION['email']);
    $rqt_select_commandes->execute();
    print("<div class='container'>");
    foreach($rqt_select_commandes as $row){
        echo "<div class='row'><h3>Commande du :",$row['dateC'],"</h3>";
        $rqt_select_lignescommandes = $dbh->prepare("SELECT * FROM lignescommandes WHERE idcommande=:uidCommande;");
        $rqt_select_lignescommandes->bindParam(':uidCommande', $row['idcommande']);
        $rqt_select_lignescommandes->execute();
        $prix_total = 0;
        foreach($rqt_select_lignescommandes as $row2){
            $rqt_select_produits = $dbh->prepare("SELECT * FROM produits WHERE idproduit=:uidproduit");
            $rqt_select_produits->bindParam(':uidproduit', $row2['idproduit']);
            $rqt_select_produits->execute();
            foreach($rqt_select_produits as $row3){
                print(" 
                        <div class='row'>
                            <div class='col-4'>
                                <img src='".$row3['photo']."' width='90' height='90'>
                            </div>
                            <div class='col-5'>
                                <h5>".$row3['nom']."</h5>
                            </div>
                            <div class='col-3'>
                                <h5>Prix:".$row3['prix']."€</h5>
                                <h5>Quantite:".$row2['quantite']."</h5>
                                <h5>Prix ligne:".$row2['quantite']*$row3['prix']."€</h5>
                            </div>
                        </div>
                    ");
                $prix_total+=$row2['quantite']*$row3['prix'];
            }
        }
        print("
                        <div class='row'>
                            <h2>Prix Total de la commande :".$prix_total."€</h2>
                        </div>
                    </div></br></br>
        ");
    }
    print("</div>");
}

?>
