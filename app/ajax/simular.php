<?php 

include_once "../dao/Projeto.php";
$projeto = new Projeto();


   
    @$id = $_POST['simularid'];
    @$projeto = $_POST['simularprojeto'];
    @$valor = $_POST['simularvalor'];
    @$simular = $_POST['simularproposta'];
  
    
    if($simular < $valor){
        $msg = '<div class="alert alert-danger" role="alert">Errooo</div>';
        echo json_encode($msg);
    }
    
       
    
?>