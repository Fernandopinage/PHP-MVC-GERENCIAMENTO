<br><br><br>
<?php
include_once "../class/classProjeto.php";
include_once "../dao/Projeto.php";
$Projeto = new Projeto();
$dados = $Projeto->selectProjeto();

if (isset($_POST['cadastraprojeto'])) {

    $ClassProjeto = new ClassProjeto();
    $ClassProjeto->setProjeto($_POST['projeto']);
    $ClassProjeto->setDatainicio($_POST['datainicio']);
    $ClassProjeto->setDatafim($_POST['datafim']);
    $ClassProjeto->setValor($_POST['valor']);
    $ClassProjeto->setEmpresa($_POST['empresa']);
    $ClassProjeto->setParticipantes($_POST['participantes']);

    $Projeto->insertProjeto($ClassProjeto);
}



?>


<div class="container">

    <!-- Button trigger modal -->
    <div class="text-left">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Novo Projeto
        </button>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Projeto</th>
                <th scope="col">Data de Inicio</th>
                <th scope="col">Data Termino</th>
                <th scope="col">Valor</th>
                <th scope="col">Empresa</th>
                <th scope="col">Participantes</th>
                <th scope="col">Alterar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($dados as $i => $obj) {

                echo "<tr>";
                echo "<td>" . $obj->getID() . "</td>";
                echo "<td>" . $obj->getProjeto() . "</td>";
                echo "<td>" . $obj->getDatainicio() . "</td>";
                echo "<td>" . $obj->getDatafim() . "</td>";
                echo "<td>" . $obj->getValor() . "</td>";
                echo "<td>" . $obj->getEmpresa() . "</td>";
                echo "<td>" . $obj->getParticipantes() . "</td>";
                echo "<td> <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editar" .  $obj->getID() . "'> Editar</button></td>";
                echo "<td>";
                echo "</td>";

                echo "</tr>";
            }

            ?>
        </tbody>
    </table>


    <!-- Modal Principal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Projeto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-projeto" method='POST'>
                        <div class="mb-2">
                            <label for="recipient-name" class="col-form-label">Nome do Projeto:</label>
                            <input type="text" class="form-control" name="projeto" id="projeto" placeholder="Projeto">
                        </div>
                        <div class="mb-2">
                            <label for="recipient-name" class="col-form-label">Data de início:</label>
                            <input type="date" class="form-control" name="datainicio" id="datainicio" placeholder="Litro">
                        </div>
                        <div class="mb-2">
                            <label for="recipient-name" class="col-form-label">Data de término:</label>
                            <input type="date" class="form-control" name="datafim" id="datafim" placeholder="Litro">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Valor do projeto:</label>
                            <input type="text" class="form-control" name="valor" id="valor" placeholder="R$">

                        </div>
                        <div class="mb-3">
                            <select id="empresa" class="form-control" name="empresa">
                                <option value="01" selected>Baixo</option>
                                <option value="02">Médio</option>
                                <option value="03">Alto</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Participantes:</label>
                            <input type="text" class="form-control" name="participantes" id="participantes" placeholder="Ex: Carlos ">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancela</button>
                    <input type="submit" class="btn btn-success" value="Cadastro Projeto" name="cadastraprojeto">
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- fim modal -->
    <!-- Modal Editar -->
    <div class="modal fade" id="editar<?php echo $obj->getID()?>" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editar">Modal title <?php echo $obj->getID()?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->


</div>