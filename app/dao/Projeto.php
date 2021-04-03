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

        $_SESSION["msg"] = "REGISTRO SALVO COM SUCESSO";
      
        header('location: http://localhost/gerenciamento/app/php/index.php?p=projeto/');
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
            $ClassProjeto->setDatainicio($row['projeto_datainicio'] = date("d/m/Y")  );
            $ClassProjeto->setDatafim($row['projeto_datafim'] = date("d/m/Y"));
            $ClassProjeto->setValor($row['projeto_valor']);
            $ClassProjeto->setEmpresa($row['projeto_empresa']);
            $ClassProjeto->setParticipantes($row['projeto_participantes']);

            $array[] = $ClassProjeto;
        }
        return $array;
    }

    public function editarProjeto(ClassProjeto $ClassProjeto){
       
        $sql ="UPDATE `projeto` SET `projeto_projeto`=:projeto,`projeto_datainicio`=:datainicio, `projeto_datafim`=:datafim, `projeto_valor`=:valor, `projeto_empresa`=:empresa, `projeto_participantes`=:participantes WHERE `projeto_id`=:id";
        
        $update = $this->con->prepare($sql);
        $update->bindValue(":id", $ClassProjeto->getID());
        $update->bindValue(":projeto", $ClassProjeto->getProjeto());
        $update->bindValue(":datainicio", $ClassProjeto->getDatainicio());
        $update->bindValue(":datafim", $ClassProjeto->getDatafim());
        $update->bindValue(":valor", $ClassProjeto->getValor());
        $update->bindValue(":empresa",$ClassProjeto->getEmpresa());
        $update->bindValue(":participantes",$ClassProjeto->getParticipantes());
        $update->execute();
        header('location: http://localhost/gerenciamento/app/php/index.php?p=projeto/');
    }

    public function deleteProjeto($id){
        
        $sql = "DELETE FROM `projeto` WHERE `projeto_id` ='$id'";
        $delete = $this->con->prepare($sql);
        $delete->execute();
 
    }

    public function Calcular($id,$projeto,$valor,$simular){

        $msg = array();
        if($simular < $valor){
            $msg[] = 'Erro';
            
        }
     
        return json_encode($msg);
    }

}



?>