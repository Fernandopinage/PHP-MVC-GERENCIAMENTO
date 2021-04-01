<?php 

include_once "../dao/Projeto.php";
include_once "../class/classProjeto.php";

if(isset($_POST['editar'])){

    $Projeto = new Projeto();
    $ClassProjeto = new ClassProjeto();

    
    $id = $_POST['id'];
    $projeto = $_POST['projeto'];
    $datainicio = $_POST['datainicio'];
    $datafim = $_POST['datafim'];
    $valor = $_POST['valor'];
    $empresa = $_POST['empresa'];
    $participantes = $_POST['participantes'];

    $ClassProjeto->setID($id);
    $ClassProjeto->setProjeto($projeto);
    $ClassProjeto->setDatainicio($datainicio);
    $ClassProjeto->setDatafim($datafim);
    $ClassProjeto->setValor($valor);
    $ClassProjeto->setEmpresa($empresa);
    $ClassProjeto->setParticipantes($participantes);

    $Projeto->editarProjeto($ClassProjeto);
    
}
