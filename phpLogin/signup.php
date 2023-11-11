<?php
session_start();
function connexion2(){
    return new PDO('mysql:host=mysql.après@inemail;dbname=enum; charset=UTF8', "enum", "mdp");
}

$db = connexion2();
$errors= array();
if(isset($_POST['signup'])){
    $nom= $_POST['nom'];
    $prenom= $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $telephone = $_POST['telephone'];

    if(empty($email)){
        array_push($errors, "Don't forget to enter your email !");
    }
    if(empty($mdp)){
        array_push($errors, "Don't forget to enter your password !");
    }
    if(empty($nom)){
        array_push($errors, "Last name required");
    }
    if(empty($prenom)){
        array_push($errors, "Name required");
    }
    if(empty($telephone)){
        array_push($errors, "Phone number required");
    }

    if(count($errors)==0){
        $rqt_select_client = $db->prepare("SELECT * FROM clients where email=:uemail");
        $rqt_select_client->execute(array(':uemail'=>$email));
        $row=$rqt_select_client->fetch(PDO::FETCH_ASSOC);
        if($rqt_select_client->rowCount()==0){

            $rqt_insert_client = $db->prepare("INSERT INTO clients (email, mdp, nom, prenom , tel) VALUES (:email, :mdp, :nom, :prenom, :telephone)");
            $rqt_insert_client->execute(array(':email'=>$email, ':mdp'=>$mdp, ':nom'=>$nom, ':prenom'=>$prenom, ':telephone'=>$telephone));
            $_SESSION['email']=$email;
            $_SESSION['success']="You are now logged in.";
            header('location: 1RECHERCHE.php');

        } else {
                array_push($errors, "this email is already taken");
        }
    }
}

?>