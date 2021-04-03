<?php 

include_once "../dao/Projeto.php";
$projeto = new Projeto();


   
    @$id = $_POST['simularid'];
    @$projeto = $_POST['simularprojeto'];
    @$valor = $_POST['simularvalor'];
    @$simular = $_POST['simularproposta'];
  
    if($valor > $simular){

        $erro = "Erro";
        echo json_encode($erro);

    }
 
    
       
    
?>