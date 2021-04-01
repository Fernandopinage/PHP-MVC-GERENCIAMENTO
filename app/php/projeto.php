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
                <td scope="col">Codigo</td>
                <td scope="col">Projeto</td>
                <td scope="col">Data de Inicio</td>
                <td scope="col">Data Termino</td>
                <td scope="col">Valor</td>
                <td scope="col">Empresa</td>
                <td scope="col">Participantes</td>
                <td scope="col">Alterar</td>
                <td scope="col">Excluir</td>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($dados as $i => $obj) {
            ?>
                <tr>
                    <td><?php echo $obj->getID(); ?></td>
                    <td><?php echo $obj->getProjeto(); ?></td>
                    <td><?php echo $obj->getDatainicio(); ?></td>
                    <td><?php echo $obj->getDatafim(); ?></td>
                    <td><?php echo $obj->getValor(); ?></td>
                    <td>

                        <?php
                        if ($obj->getEmpresa() == 01) {

                            echo '<option value="01" selected>Baixo</option>';
                        } elseif ($obj->getEmpresa() == 02) {

                            echo '<option value="02">Médio</option>';
                        } else {

                            echo '<option value="03">Alto</option>';
                        }

                        ?>

                    </td>
                    <td><?php echo $obj->getParticipantes(); ?></td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar<?php echo $obj->getID(); ?>">Editar</button></td>
                    <td>Excluir</td>
                </tr>

                <!---------------------------------------------------- Modal Editar ----------------------------------------------------------------->
                <div class="modal fade" id="editar<?php echo $obj->getID() ?>" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editar">Modal title <?php echo $obj->getID() ?></h5>

                            </div>
                            <div class="modal-body">
                                <form class="form-projeto" method='POST'>
                                    <div class="mb-2">
                                        <label for="recipient-name" class="col-form-label">Nome do Projeto:</label>
                                        <input type="text" class="form-control" name="projeto" id="projeto" placeholder="Projeto" value="<?php echo $obj->getProjeto(); ?>">
                                    </div>
                                    <div class="mb-2">
                                        <label for="recipient-name" class="col-form-label">Data de início:</label>
                                        <input type="date" class="form-control" name="datainicio" id="datainicio" placeholder="Litro" value="<?php echo $obj->getDatainicio(); ?>">
                                    </div>
                                    <div class="mb-2">
                                        <label for="recipient-name" class="col-form-label">Data de término:</label>
                                        <input type="date" class="form-control" name="datafim" id="datafim" placeholder="Litro" value="<?php echo $obj->getDatafim(); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Valor do projeto:</label>
                                        <input type="text" class="form-control" name="valor" id="valor" placeholder="R$" value="<?php echo $obj->getValor(); ?>">

                                    </div>
                                    <div class="mb-3">
                                        <select id="empresa" class="form-control" name="empresa">
                                            <?php

                                            if ($obj->getEmpresa() == 01) {

                                                echo '<option value="01" selected>Baixo</option>';
                                            } elseif ($obj->getEmpresa() == 02) {

                                                echo '<option value="02">Médio</option>';
                                            } else {

                                                echo '<option value="03">Alto</option>';
                                            }

                                            ?>

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Participantes:</label>
                                        <input type="text" class="form-control" name="participantes" id="participantes" placeholder="Ex: Carlos ">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancela</button>
                                <input type="submit" class="btn btn-primary" value="Editar Registro" name="editar">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>

<!---------------------------------------------------- Modal FIM ----------------------------------------------------------------->
<?php
            }


?>
</tbody>
</table>


<!------------------------------------------------ Modal Cadastro ------------------------------------------------------------->
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

<!----------------------------------------------------- fim modal -------------------------------------------------------------->



</div>