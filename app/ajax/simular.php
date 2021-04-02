<?php 

include_once "../dao/Projeto.php";

$id = $_POST['simularid'];
$projeto = $_POST['simularprojeto'];
$valor = $_POST['simularvalor'];

$projeto = new Projeto();
$projeto->Calcular($id, $projeto, $valor);

?>