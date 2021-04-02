<?php 

include_once "../dao/Projeto.php";
$projeto = new Projeto();

$id = $_POST['apagar'];
$projeto->deleteProjeto($id);


    
?>