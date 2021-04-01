<?php 

include_once "../dao/dao.php";
include_once "../class/classProjeto.php";

class Projeto  extends Dao{


    public function insertProjeto(ClassProjeto $ClassProjeto){

        $sql = "INSERT INTO `projeto`(`projeto_id`, `projeto_projeto`, `projeto_datainicio`, `projeto_datafim`, `projeto_valor`, `projeto_empresa`, `projeto_participantes`) 
        VALUES (null, :projeto, :datainicio, :datafim, :valor, :empresa, :participantes)";
        $insert = $this->con->prepare($sql);
        $insert->bindValue(":projeto", $ClassProjeto->getProjeto());
        $insert->bindValue(":datainicio", $ClassProjeto->getDatainicio());
        $insert->bindValue(":datafim", $ClassProjeto->getDatafim());
        $insert->bindValue(":valor", $ClassProjeto->getValor());
        $insert->bindValue(":empresa",$ClassProjeto->getEmpresa());
        $insert->bindValue(":participantes",$ClassProjeto->getParticipantes());
        $insert->execute();

    }

    public function selectProjeto(){

        $sql = "SELECT * FROM `projeto`";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();
        while($row = $select->fetch(PDO::FETCH_ASSOC)){

            $ClassProjeto = new ClassProjeto();

            $ClassProjeto->setID($row['projeto_id']);
            $ClassProjeto->setProjeto($row['projeto_projeto']);
            $ClassProjeto->setDatainicio($row['projeto_datainicio']);
            $ClassProjeto->setDatafim($row['projeto_datafim']);
            $ClassProjeto->setValor($row['projeto_valor']);
            $ClassProjeto->setEmpresa($row['projeto_empresa']);
            $ClassProjeto->setParticipantes($row['projeto_participantes']);

            $array[] = $ClassProjeto;
        }
        return $array;
    }

}


?>