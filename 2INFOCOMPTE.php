<?php 
      include("phpLogin/login.php");
      if((!isset($_SESSION['email']))){
        header('location: 2LOGIN.php');
      }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php include("phpTab/DecoEtUtil.php");?>
<!-- BootStrap -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="look.css">

    <title>Techwire-Information du compte</title>
    <link rel="shortcut icon" href="images/logo1.png">
</head>

<body>
    <header>

    <?php include("phpTab/histoInfo.php"); ?>

    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <?php surBarreNav(); ?>
    <div class="container">
    <div class="row">
        <div class="col-12">
            <?php getInfoCompte(); ?>
        </div>
    </div>
    <div class="rowfooter">
    <?php footer(); ?>
    </div>
    </div>
</body>
</html> 