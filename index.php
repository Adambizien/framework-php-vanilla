<?php
    require_once './configs/bootstrap.php';
    // require_once  './src/toolkit.php'; pour l'appeller une seule fois 
    // include  './src/toolkit.php'; include quand c'est pas obliger de mettre sa 
    // include_once "./templates/html_layout.php";
    // dd($_GET);

    ob_start();
    fromInc("menu");
    // foreach($_GET as $key => $get){
    //     if($get == "accueil" && $key == "page"){
    //         fromInc("accueil");
    //     }

    // }
    
    if( isset($_GET["page"]) ){
            fromInc($_GET['page']);
    }
    $pageContent = ob_get_clean();
    include "./templates/layouts/".$_GET['layout'].".layout.php";

   
?>