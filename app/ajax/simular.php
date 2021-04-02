<?php 

include_once "../dao/Projeto.php";
$projeto = new Projeto();


   
    $id = $_POST['simularid'];
    $projeto = $_POST['simularprojeto'];
    $valor = $_POST['simularvalor'];
    $simular = $_POST['simularproposta'];
  
    $projeto->Calcular($id,$projeto,$valor,$simular);
    
 
    
       
    
?>