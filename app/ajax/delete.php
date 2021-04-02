<?php 

include_once "../dao/Projeto.php";
$projeto = new Projeto();

$a = $_POST['apagar'];
echo json_encode($a)

    
?>