<?php 

include_once "../dao/Projeto.php";
$projeto = new Projeto();

if(isset($_GET['id'])){
    $id = filter_input(INPUT_GET, 'id');    
    $projeto->deleteProjeto($id);
    echo "<script>alert('REGISTRO DELETADO COM SUCESSO');window.location = 'http://localhost/gerenciamento/app/php/index.php?p=projeto/';</script>";
 
    
};

  
?>