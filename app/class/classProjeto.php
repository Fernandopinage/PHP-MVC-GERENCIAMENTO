<?php 
include_once "../dao/dao.php";
class ClassProjeto{

    private $id;
    private $projeto;
    private $datainicio;
    private $datafim;
    private $valor;
    private $empresa;
    private $participantes;


    public function setID($id){
        $this->id = $id;

    }
    public function getID(){
        return $this->id;

    }

    public function setProjeto($projeto){
        $this->projeto = $projeto;

    }
    public function getProjeto(){
        return $this->projeto;

    }
    public function setDatainicio($datainicio){
        $this->datainicio = $datainicio;

    }
    public function getDatainicio(){
        return $this->datainicio;

    }
    public function setDatafim($datafim){
        $this->datafim = $datafim;

    }
    public function getDatafim(){
        return $this->datafim;

    }


    public function setValor($valor){
        $this->valor = $valor;

    }
    public function getValor(){
        return $this->valor;

    }
    public function setEmpresa($empresa){
        $this->empresa = $empresa;

    }
    public function getEmpresa(){
        return $this->empresa;

    }
    public function setParticipantes($participantes){
        $this->participantes = $participantes;

    }
    public function getParticipantes(){
        return $this->participantes;

    }

}


?>