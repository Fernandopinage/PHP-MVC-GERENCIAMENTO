<?php 

include_once "../dao/Projeto.php";
$projeto = new Projeto();


   
    @$id = $_POST['simularid'];
    @$projeto = $_POST['simularprojeto'];
    @$valor = $_POST['simularvalor'];
    @$simular = $_POST['simularproposta'];
  
    
    if($simular < $valor){
        
        $result = 1;
        echo json_encode($result);
    }
    if($simular > $valor){
        $result = 2;
        echo json_encode($result);
    }
    
       
    
?>