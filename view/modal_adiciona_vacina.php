<div id="modalAdicionaVacina" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastrar vacina</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="login">
                    <div class="form-group">
                        <label>Informe a vacina:</label>
                        <input type="text" name="vacina" class="form-control" placeholder="Nome da vacina">
                        
                        <input type="date" name="data_vacina" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>