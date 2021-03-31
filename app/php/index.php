<?php include_once "../layout/header.php";?>


<div class="container">

<?php

if(isset($_GET['p'])){

    $pagina = $_GET['p'];

    switch ($pagina) {
        case 'home/':
            include_once "../php/home.php";
            break;

         case 'projeto/':
            include_once "../php/projeto.php";
            break;
  

        default:
            # code...
            break;
    }

}


?>



</div>



<?php include_once "../layout/footer.php";?>