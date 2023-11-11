<?php 
function surBarreNav(){
    echo "<nav class='navbar navbar-expand-lg navbar-light bg-secondary'>
            <div class='container-fluid'>
                <a class='navbar-brand' href='1RECHERCHE.php?page=ACCUEIL'>
                    <img src='images/logo.png' alt='' width='30' height='24' class='d-inline-block align-text-top'>
                    Accueil
                </a>
                <div class='collapse navbar-collapse ' id='navbarSupportedContent'>
                    <form class='d-flex justify-content-center'>
                        <input class='form-control' name='page' placeholder='Search' aria-label='Search'>
                        <button class='btn btn-outline-light' type='submit'>Search</button>
                    </form>
                </div>
                <ul class='navbar-nav flex-row flex-wrap ms-md-auto'>
                    <li class='nav-item col-6 col-md-auto'>
                        <div class='collapse navbar-collapse ' id='navbarSupportedContent'>
                            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                            <li class='nav-item dropdown justify-content-end'>
                                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    Mon Compte
                                </a>
                                <ul class='dropdown-menu bg-secondary' aria-labelledby='navbarDropdown'>
                                <li><a class='dropdown-item' href='2INFOCOMPTE.php'>Info Compte</a></li>
                                <li><a class='dropdown-item' href='2HISTORIQUE.php'>Historique</a></li>
                                <li><hr class='dropdown-divider'></li>
                                <li><a class='dropdown-item' href='phpLogin/logout.php'>Deconnexion</a></li>
                                </ul>
                            </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>" ;

}
function afficherBarreNav(){
    echo "<div class='container'> 
            <ul class='nav nav-tabs'>
                <li class='nav-item'>
                    <a class='nav-link' href='1RECHERCHE.php?page=RAM' >RAM</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='1RECHERCHE.php?page=CPU' >CPU</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='1RECHERCHE.php?page=GPU' >GPU</a>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' href='#' aria-expanded='false'>Accesory</a>
                    <ul class='dropdown-menu bg-secondary'>
                        <li><a class='dropdown-item-b' href='1RECHERCHE.php?page=KB' >Keyboard</a></li>
                        <li><a class='dropdown-item-b' href='1RECHERCHE.php?page=MOUSE' >Mouse</a></li>
                    </ul>
                </li>
            <ul class='navbar-nav flex-row flex-wrap ms-md-auto'>
            <li class='nav-item col-6 col-md-auto'>
                <button class='navbar-toggler' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasNavbar' aria-controls='offcanvasNavbar'>
                    Panier
                </button>
                <div class='offcanvas offcanvas-end' tabindex='-1' id='offcanvasNavbar' aria-labelledby='offcanvasNavbarLabel'>
                    <div class='offcanvas-header'>
                        <h5 class='offcanvas-title' id='offcanvasNavbarLabel'>PANIER</h5>
                        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                    </div>
                    <div class='offcanvas-body'>
                        <div>
                            ",ObjetInPanier(),"
                        </div>
                    </div>
                    <div class='offcanvas-body bg-secondary'>
                        <a href='2VALIDECOMMANDE.php'>Commander</a>
                    </div>
                </div>
            </li>
        </ul>
    </ul>";
}

function carrouselAccueil(){
    echo "<div id='carouselExampleCaptions' class='carousel slide' data-bs-ride='carousel'>
            <div class='carousel-indicators'>
                <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
                <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='1' aria-label='Slide 2'></button>
                <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='2' aria-label='Slide 3'></button>
            </div>
            <div class='carousel-inner'>
                <div class='carousel-item active'>
                    <img src='images/carousGPU.jpg' class='d-block w-100' alt='GPUNvidia' style='height:400px;width:200px;'>
                    <div class='carousel-caption d-none d-md-block'>
                        <h5>Nvidia GeForce RTX 3080 Ti</h5>
                        <a href='1OBJET.php?objet=3011'>Parcourir</a>
                    </div>
                </div>
                <div class='carousel-item'>
                    <img src='images/blackwidowv3.jpg' class='d-block w-100' alt'bwv3' style='height:400px;width:200px;'>
                    <div class='carousel-caption d-none d-md-block'>
                        <h5 style='color: white;'>BlackWidow V3</h5>
                        <a href='1OBJET.php?objet=4006'>Parcourir</a>
                    </div>
                </div>
                <div class='carousel-item'>
                    <img src='images/corsair.jpg' class='d-block w-100' alt='corsairv' style='height:400px;width:200px;'>
                    <div class='carousel-caption d-none d-md-block'>
                        <h5 style='color: white;'>Corsair Vengeance</h5>
                        <a href='1OBJET.php?objet=1001'>Parcourir</a>
                    </div>
                </div>
            </div>
            <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='prev'>
                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                <span class='visually-hidden'>Previous</span>
            </button>
            <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='next'>
                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                <span class='visually-hidden'>Next</span>
            </button>
        </div></br>";
}

function footer(){
    echo "<footer class='bd-footer py-5 mt-5 bg-secondary'>
            <div class='container py-5 '>
                <div class='row'>
                    <div class='col-3 align-self-center'>
                        <img src='images/logo.png' style='width: 20%; hight: auto;' alt='logoTechwire'>
                    </div>
                    <div class='col-3 align-self-center'>
                        <strong>Navigation</strong></br>
                        <a href='1RECHERCHE.php'>Accueil</a></br>
                        <a href='2INFOCOMPTE.php'>Compte</a></br>
                        <a href='2VALIDECOMMANDE.php'>Panier</a></br>
                        <a href='2HISTORIQUE.php'>Achats</a></br>
                    </div>
                    <div class='col-3 align-self-center'>
                        <strong>Nos produits</strong></br>
                        <a href='1RECHERCHE.php?page=RAM'>RAM</a></br>
                        <a href='1RECHERCHE.php?page=CPU'>CPU</a></br>
                        <a href='1RECHERCHE.php?page=GPU'>GPU</a></br>
                        <a href='1RECHERCHE.php?page=KB'>Keyboard</a></br>
                        <a href='1RECHERCHE.php?page=MOUSE'>Mouse</a></br>
                    </div>
                    <div class='col-3 align-self-center'>
                        <strong>Nos fournisseurs</strong></br>
                        <a href='https://www.asus.com/fr/?gclid=EAIaIQobChMI9NX23_fi9AIVRJ3VCh1cpwBaEAAYASAAEgINEPD_BwE' target='_blank'>Asus</a></br>
                        <a href='https://www.nvidia.com/fr-fr/' target='_blank'>Nvidia</a></br>
                        <a href='https://www.logitech.fr/fr-fr/campaigns/holiday-special-offers.html?gclid=EAIaIQobChMI2pqLifji9AIVwu5RCh2w3AhjEAAYASAAEgKDtfD_BwE' target='_blank'>Logitech</a></br>
                    </div>
                </div>
            </div>
        </footer>";
}


?>