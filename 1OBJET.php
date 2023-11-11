<?php 
  include("phpLogin/login.php");
  if((!isset($_SESSION['email']))){
    header('location: 2LOGIN.php');
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>

<?php   
  include("phpTab/printt.php");
  include("phpTab/DecoEtUtil.php");
  include("phpTab/getObjet.php");
  include("phpTab/selectForTabs.php");
  include("phpTab/showElement.php");
  include("phpTab/histoInfo.php");
  include("phpTab/utilitaireRequete.php");

  if(isset($_GET['btSubmit'])||isset($_POST['btSubmit'])){
    addInPanier();
  }
  supprimerObjet();
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="look.css">

<title>Techwire</title>
<link rel="shortcut icon" href="images/logo1.png">
</head>

<body> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <?php 
    surBarreNav(); 
  ?>

  <form method="POST" action="#"> 

  <?php
    afficherBarreNav(); 
  ?>

  <?php
  if(isset($_GET['objet'])){
    showElement($_GET['objet']); 
  }
  ?>

  </form>
  <div class="rowfooter">
  <?php footer(); ?>
  </div>
<body>
</html>
