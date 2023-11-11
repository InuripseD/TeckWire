<?php

session_start();
function connexion2(){
    return new PDO('mysql:host=mysql.après@dansemail;dbname=enum; charset=UTF8', "enum", "mdp");
}

$db = connexion2();
$errors= array();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    if(empty($email)){
        array_push($errors, "Don't forget to enter your email !");
    }
    if(empty($mdp)){
        array_push($errors, "Don't forget to enter your password !");
    }

    if(count($errors)==0){
        $rqt_select_client = $db->prepare("SELECT * FROM clients WHERE email=:uemail AND mdp=:umdp");
        $rqt_select_client->execute(array(':uemail'=>$email,':umdp'=>$mdp));
        $row=$rqt_select_client->fetch(PDO::FETCH_ASSOC);
    
        if($rqt_select_client->rowCount()>0){
            if($email==$row['email']){
                $_SESSION['email']=$email;
                $_SESSION['success']="You are now logged in.";
                header('location: 1RECHERCHE.php');
            }
        } else {
                array_push($errors, "wrong email/password combination :/");
        }
    }
}

?>