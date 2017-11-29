<?php
foreach ($arrAnimal2 as $valueAnimal) {
    ?>
    <div id="modalCP<?= $valueAnimal['id_animal'] ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmar solicitação</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" id="login">
                        <div class="form-group">
                            <p>Ao confirmar a solicitação você irá ser redirecionado para uma página de buscar onde serão selecionados os
                                animais com perfil mais próximos ao do seu. Para proceguir clique em confirmar, caso contrário clique em cancelar.</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href=
                               "search.php?id_pet=<?= $valueAnimal['id_animal'] ?>&id_usuario=<?= $id_usuario ?>" 
                               class="btn btn-default">
                                Confirmar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>