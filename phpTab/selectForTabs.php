<?php 
function GPUselect(){
    echo "</br>Selection des critères : </br>
    <label for='rangePrixGPU' class='form-label'>Prix Min-Max:(",getPrixMin($_GET['page']),"-",getPrixMax($_GET['page']),")</label>
    <input type='range' value='",echoIf($_POST['prixMax']),"' class='form-range' min='",getPrixMin($_GET['page']),"' max='",getPrixMax($_GET['page']),"' step='1' id='rangePrixGPU' name='prixMax'></br>

    </br>Marque :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueNvi' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            Nvidia
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueAMD' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckChecked'>
            AMD
        </label>
    </div></br>

    </br>Go RAM :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Go1' id='GoSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            0.5Go à 2Go
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Go2' id='GoSelect'>
        <label class='form-check-label' for='flexCheckChecked'>
            2Go à 8Go
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Go3' id='GoSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            8Go et plus
        </label>
    </div></br>

    </br>RBG :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='rgb' id='rgb'>
        <label class='form-check-label' for='flexCheckChecked'>
            Oui
        </label>
    </div>

    </br>Trier prix croissant :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='prixCroissant' id='prixCroissant'>
        <label class='form-check-label' for='prixCroissant'>
            Oui
        </label>
    </div>
    
    </br>Valider Selection</br>
    <button type='submit' class='btn btn-primary'>Filtrer</button></br>";
}

function CPUselect(){
    echo "</br>Selection des critères : </br>
    <label for='rangePrixGPU' class='form-label'>Prix Min-Max:(",getPrixMin($_GET['page']),"-",getPrixMax($_GET['page']),")</label>
    <input type='range' class='form-range' value='",echoIf($_POST['prixMax']),"' class='form-range' min='",getPrixMin($_GET['page']),"' max='",getPrixMax($_GET['page']),"' step='1' id='rangePrixCPU' name='prixMax'></br>

    </br>Marque :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueInt' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            Intel
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueAMD' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckChecked'>
            AMD
        </label>
    </div></br>

    </br>Vitesse :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Core1' id='SpeedSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            0.5 à 1.8 GHz
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Core2' id='SpeedSelect'>
        <label class='form-check-label' for='flexCheckChecked'>
            1.9 à 3 GHz
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Core3' id='SpeedSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            plus de 6 GHz
        </label>
    </div></br>

    </br>Trier prix croissant :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='prixCroissant' id='prixCroissant'>
        <label class='form-check-label' for='prixCroissant'>
            Oui
        </label>
    </div>
    
    </br>Valider Selection</br>
    <button type='submit' class='btn btn-primary'>Filtrer</button></br>";
}


function RAMselect(){
    echo "</br>Selection des critères : </br>
    <label for='rangePrixGPU' class='form-label'>Prix Min-Max:(",getPrixMin($_GET['page']),"-",getPrixMax($_GET['page']),")</label>
    <input type='range' value='",echoIf($_POST['prixMax']),"' class='form-range' min='",getPrixMin($_GET['page']),"' max='",getPrixMax($_GET['page']),"' step='1' id='rangePrixRAM' name='prixMax'></br>

    </br>Marque :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueCor' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            Corsair
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueCru' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckChecked'>
            Crucial
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueHyp' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckChecked'>
            HyperX
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueKin' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckChecked'>
            Kingston Technology
        </label>
    </div></br>

    </br>Go RAM :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Go1' id='GoSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            0.5Go à 2Go
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Go2' id='GoSelect'>
        <label class='form-check-label' for='flexCheckChecked'>
            2Go à 8Go
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Go3' id='GoSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            8Go à 16Go
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Go4' id='GoSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            16Go à 32Go 
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='Go5' id='GoSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            plus de 32Go 
        </label>
    </div></br>

    </br>RBG :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='rgb' id='rgb'>
        <label class='form-check-label' for='flexCheckChecked'>
            Oui
        </label>
    </div>

    </br>Trier prix croissant :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='prixCroissant' id='prixCroissant'>
        <label class='form-check-label' for='prixCroissant'>
            Oui
        </label>
    </div>
    
    </br>Valider Selection</br>
    <button type='submit' class='btn btn-primary'>Filtrer</button></br>";
}

function MOUSEselect(){
    echo "</br>Selection des critères : </br>
    <label for='rangePrixGPU' class='form-label'>Prix Min-Max:(",getPrixMin($_GET['page']),"-",getPrixMax($_GET['page']),")</label>
    <input type='range' class='form-range' value='",echoIf($_POST['prixMax']),"' class='form-range' min='",getPrixMin($_GET['page']),"' max='",getPrixMax($_GET['page']),"' step='1' id='rangePrixMOUSE' name='prixMax'></br>

    </br>Marque :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueLog' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            Logitech
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueRaz' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckChecked'>
            Razer
        </label>
    </div></br>

    </br>Wireless :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='wireless' id='wireless'>
        <label class='form-check-label' for='flexCheckChecked'>
            Oui
        </label>
    </div>

    </br>RBG :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='rgb' id='rgb'>
        <label class='form-check-label' for='flexCheckChecked'>
            Oui
        </label>
    </div>

    </br>Trier prix croissant :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='prixCroissant' id='prixCroissant'>
        <label class='form-check-label' for='prixCroissant'>
            Oui
        </label>
    </div>
    
    </br>Valider Selection</br>
    <button type='submit' class='btn btn-primary'>Filtrer</button></br>";
}

function KBselect(){
    echo "</br>Selection des critères : </br>
    <label for='rangePrixGPU' class='form-label'>Prix Min-Max:(",getPrixMin($_GET['page']),"-",getPrixMax($_GET['page']),")</label>
    <input type='range' class='form-range' value='",echoIf($_POST['prixMax']),"' class='form-range' min='",getPrixMin($_GET['page']),"' max='",getPrixMax($_GET['page']),"' step='1' id='rangePrixKB' name='prixMax'></br>

    </br>Marque :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueLog' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckDefault'>
            Logitech
        </label>
    </div>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='marqueRaz' id='marqueSelect'>
        <label class='form-check-label' for='flexCheckChecked'>
            Razer
        </label>
    </div></br>

    </br>Wireless :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='wireless' id='wireless'>
        <label class='form-check-label' for='flexCheckChecked'>
            Oui
        </label>
    </div>

    </br>RBG :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='rgb' id='rgb'>
        <label class='form-check-label' for='flexCheckChecked'>
            Oui
        </label>
    </div>

    </br>Trier prix croissant :</br>
    <div class='form-check'>
        <input class='form-check-input' type='checkbox' name='prixCroissant' id='prixCroissant'>
        <label class='form-check-label' for='prixCroissant'>
            Oui
        </label>
    </div>
    
    </br>Valider Selection</br>
    <button type='submit' class='btn btn-primary'>Filtrer</button></br>";
}

?>