<?php 

include_once "../dao/Projeto.php";
$projeto = new Projeto();


   
    @$id = $_POST['simularid'];
    @$projeto = $_POST['simularprojeto'];
    @$valor = $_POST['simularvalor'];
    @$simular = $_POST['simularproposta'];
    @$empresa = $_POST['simularempresa'];
    
    if($simular < $valor){
        
        $result = 1;
        echo json_encode($result);
    }else{

        if($empresa == 01){
            
            $total = ($simular*5)/100;
            $valor = $simular+$total;
            echo json_encode($valor);
            
        }
        if($empresa == 02){
            
            $total = ($simular*10)/100;
            $valor = $simular+$total;
            echo json_encode($valor);
            
        }
        if($empresa == 02){
            
            $total = ($simular*20)/100;
            $valor = $simular+$total;
            echo json_encode($valor);
            
        }
        
    }
