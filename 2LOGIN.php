
<!DOCTYPE html>
<html lang="fr">

<link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/67239/animate.min.css" rel="stylesheet" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="look.css">
<head>
<?php 
    include("phpLogin/login.php");       
?>
<meta charset="utf-8">
    <title> Techwire - Login </title>
    <link rel="shortcut icon" href="images/logo1.png">
</head>
<body>

<div class="out-panel login-panel animated bounceInDown">
    <img src="images/logo1.png" alt="logoT" width='150' height='150'>
</div>

<div class="overlay">
    <div class="ui-panel login-panel animated bounceInDown">
        <div class="left-logo">
            <span>Tech</span>Wire
        </div>     

        <div class="login-form">
            <div class="title"> <h2> Log in </h2> </div> 
                <form method="post" action="2LOGIN.php">
                <?php include("phpLogin/errors.php"); ?>
                <div class="insertion_group">
                    <label> Email </label>
                    <input type="text" name="email" value="<?php if(isset($email)){echo $email;} ?>" >
                </div>
                </br>
                <div class="insertion_group">
                    <label> Mot de passe </label>
                    <input type="password" name="mdp">
                </div>
                </br>
                <button class='btn btn-outline-success' type='submit' name="login">Log in</button>
                <p> Not signed up yet? <a href="2SIGNUP.php"> Sign up now ! </a> </p>

                </form>
        </div>
</div>

    <script type="text/javascript" src="//use.typekit.net/psm0wvc.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</div>

</body>

</html>