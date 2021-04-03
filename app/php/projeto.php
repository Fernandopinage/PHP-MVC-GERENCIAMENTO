<br><br><br>
<?php
include_once "../class/classProjeto.php";
include_once "../dao/Projeto.php";
session_start();
$Projeto = new Projeto();
$ClassProjeto = new ClassProjeto();
$dados = $Projeto->selectProjeto();

if (isset($_POST['cadastraprojeto'])) {

    $ClassProjeto->setProjeto($_POST['projeto']);
    $ClassProjeto->setDatainicio($_POST['datainicio']);
    $ClassProjeto->setDatafim($_POST['datafim']);
    $ClassProjeto->setValor($_POST['valor']);
    $ClassProjeto->setEmpresa($_POST['empresa']);
    $ClassProjeto->setParticipantes($_POST['participantes']);

    $Projeto->insertProjeto($ClassProjeto);
}

if (isset($_POST['editar'])) {

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



?>


<div class="container">

    <div class="msg">

        <?php
        if (isset($_SESSION["msg"])) {

            if (!empty($_SESSION["msg"])) {

                echo '<div class="alert alert-success" role="alert" id="msg">Registro salvo com sucesso! </div>';
        ?>
                <script>
                    $(document).ready(function() {

                        setTimeout(function() {

                            $("#msg").alert('close');
                        }, 3000);

                    });
                </script>
        <?php

                
            }
        }

        ?>
    </div>

    <!-- Button trigger modal -->
    <div class="text-left">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <img src="../img/outline_add_white_24dp.png">Novo Projeto
        </button>
    </div>
    <br>
    <table class="table table-hover table-sm">
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
                <td scope="col">Simular</td>
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
                    <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editar<?php echo $obj->getID(); ?>"><img src="../img/outline_edit_white_24dp.png">Editar</button></td>
                    <td><a class="btn btn-danger btn-sm" onclick="deletar('<?php echo $obj->getID(); ?>');"> <img src="../img/outline_delete_outline_white_24dp.png"> Deletar</a></td>
                    <td><button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#simular<?php echo $obj->getID(); ?>"><img src="../img/outline_laptop_white_24dp.png">Investimento</button></td>
                    </td>
                </tr>
                <!---------------------------------------------------- Modal Editar -------------------------------------------------------->
                <div class="modal fade" id="editar<?php echo $obj->getID() ?>" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editar"><?php echo $obj->getProjeto() ?></h5>

                            </div>


                            <div class="modal-body">

                                <form class="form-edita" method='POST'>
                                    <input type="hidden" class="form-control" name="id" id="id" placeholder="" value="<?php echo $obj->getID(); ?>">
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
                                        <input type="text" class="form-control" name="participantes" id="participantes" value="<?php echo $obj->getParticipantes(); ?>" placeholder="Ex: Carlos ">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><img src="../img/outline_close_white_24dp.png">Cancela</button>
                                <button type="submit" class="btn btn-primary btn-sm" value="Editar Registro" name="editar"><img src="../img/outline_edit_white_24dp.png">Editar </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>

<!---------------------------------------------------- Modal FIM ----------------------------------------------------------------->
<!---------------------------------------------------- Simular Modal ------------------------------------------------------------->
<div class="modal fade" id="simular<?php echo $obj->getID() ?>" tabindex="-1" role="dialog" aria-labelledby="editar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="simular">Simular Investimento</h5>

            </div>

            <div class="dialogo">

            </div>

            <div class="modal-body">

                <form class="form-simular" method='POST'>
                    <input type="hidden" class="form-control" name="simularid" id="simularid" placeholder="" value="<?php echo $obj->getID(); ?>">
                    <input type="hidden" class="form-control" name="simularprojeto" id="simularprojeto" placeholder="Projeto" value="<?php echo $obj->getProjeto(); ?>">
                    <input type="hidden" class="form-control" name="simularvalor" id="simularvalor" placeholder="R$" value="<?php echo $obj->getValor(); ?>">
                    <div class="mb-2">
                        <label for="recipient-name" class="col-form-label">Valor do investimento:</label>
                        <input type="text" class="form-control" name="simularproposta" id="simularproposta" placeholder="R$" onkeypress='return filtroTeclas(event)'>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><img src="../img/outline_close_white_24dp.png">Cancela</button>
                        <button type="submit" class="btn btn btn-sm" id="calcular" name="calcular" value="Calcular" style="background-color: rgb(253,138,10); color:#fff;"><img src="../img/baseline_calculate_white_24dp.png">Calcular</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------------------------------------------------------------------>


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
                <form action="" class="form-projeto" method='POST'>
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
                        <input type="text" class="form-control" name="valor" id="valor" placeholder="R$" onkeypress='return filtroTeclas(event)'>

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
                        <input type="text" class="form-control" name="participantes" id="participantes" data-role="tagsinput" placeholder="Ex: Carlos ">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><img src="../img/outline_close_white_24dp.png">Cancela</button>
                <button type="submit" class="btn btn-success btn-sm" value="Cadastro Projeto" name="cadastraprojeto"><img src="../img/outline_add_circle_outline_white_24dp.png">Salvar</button>
            </div>
            <script>
                $('input').tagsinput({
                    typeahead: {
                        source: function(query) {
                            return $.getJSON('citynames.json');
                        }
                    }
                });
            </script>
            </form>
        </div>
    </div>
</div>

<!----------------------------------------------------- fim modal -------------------------------------------------------------->
<!----------------------------------------------------- Campo "Valor" aceita so numeros ----------------------------------------------->
<script>
    var filtroTeclas = function(event) {
        return ((event.charCode >= 48 && event.charCode <= 57) || (event.keyCode == 45 || event.charCode == 46))
    }
</script>

<script>
    function deletar(id) {
        var mensagem = 'Deseja deletar esse registro ?';
        if (window.confirm(mensagem)) {
            window.open('http://localhost/gerenciamento/app/ajax/delete.php?id=' + id, '_self');
            return true;
            //window.location = this.window.location;                    
        } else {
            return false;
        }
    }
</script>
<script>
    $(function() {

        $('#calcular').click(function() {

            $.ajax({

                type: 'POST', // Formado de envio
                url: '../ajax/simular.php', // URL para onde vai ser enviados
                data: $('.form-simular'),
                success: function(data) {
                    console.log(msg)
                }


            });
            return false;
        });
    });
</script>

<!----------------------------------------------------- fim ------------------------------------------------------------------------>