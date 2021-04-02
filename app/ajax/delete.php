<?php 

include_once "../dao/Projeto.php";
$projeto = new Projeto();
if(isset($_GET['p'])){

    $id = $_GET['p'];
    $projeto->deleteProjeto($id);
    echo json_encode($id);

}


    
?>