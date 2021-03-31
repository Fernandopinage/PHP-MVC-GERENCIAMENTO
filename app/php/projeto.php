<br><br><br>



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
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Projeto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-2">
                            <label for="recipient-name" class="col-form-label">Nome do Projeto:</label>
                            <input type="text" class="form-control" id="agua-name" placeholder="Projeto">
                        </div>
                        <div class="mb-2">
                            <label for="recipient-name" class="col-form-label">Data de início:</label>
                            <input type="date" class="form-control" id="agua-name" placeholder="Litro">
                        </div>
                        <div class="mb-2">
                            <label for="recipient-name" class="col-form-label">Data de término:</label>
                            <input type="date" class="form-control" id="alcool-name" placeholder="Litro">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Valor do projeto:</label>
                            <input type="text" class="form-control"  id="valor" placeholder="">
                            
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
                            <input type="text" class="form-control" id="fragrancia-name" placeholder="Ex: Carlos ">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancela</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

</div>

