<?php 
    function success(){ 
         if(isset($_SESSION['success'])){
            echo $_SESSION['success'];
        }
    }

    function findWhatSelect($x){
        switch ($x) {
            case 'RAM':
                RAMselect();
                break;
            case 'CPU':
                CPUselect();
                break;
            case 'GPU':
                GPUselect();
                break;
            case 'KB':
                KBselect();
                break;
            case 'MOUSE':
                MOUSEselect();
                break;
        }
    }

    function showPlace($x){
        if($x == "ACCUEIL"){
            echo '<div class="row">
                    <div class="col-12">',
                        carrouselAccueil(),'
                    </div>
                    <div class="row">',
                        getObjetDuMoment(),'
                    </div>
                  </div>';
        }else{
            echo "<div class='row'>
                    <div class='col-3'>
                        ",findWhatSelect($x),"
                    </div>
                    <div class='col-9'>
                        ",getObjet($x),"
                    </div>
                  </div>";
        }
    }
?>