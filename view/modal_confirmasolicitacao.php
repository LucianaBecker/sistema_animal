<?php
$objAnimal = new Animal();
$arrAnimal = array();
$arrAnimal = $objAnimal->SelectById($id_animal);

$objBusca = new Animal();
$arrBusca = array();

$tipo;
foreach ($arrAnimal as $valueAnimal) {
    $arrBusca = $objBusca->SelectDoador($valueAnimal['id_tipo_animal'], $id_animal, $id_usuario);
    $tipo = $valueAnimal['id_tipo_animal'];
}

foreach ($arrBusca as $valueBusca) {
    ?>
    <div id="modalCS<?= $valueBusca['id_animal'] ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmar solicitação de doação de sangue - <?= $valueBusca['nome'] ?></h4>
                </div>
                <div class="modal-body">
                    <form method="POST" id="login">
                        <div class="form-group">
                            <p>Ao clicar no botão confirmar você concorda que o tutor do animal <?= $valueBusca['nome'] ?>  tenha acesso aos seus dados
                                como telefone, e-mail, endereço e outros. </p>
                            <p>Após a confirmação o tutor do animal <?= $valueBusca['nome'] ?>, <?= $valueBusca['tutor'] ?>, receberá um e-mail sobre sua solicitação
                                e confirmará a possibilidade da doação. Em seguida, ambos receberão o e-mail com contato para poderem combinar como será feita a doação.</p>
                            <?php
                            if ($tipo == 1) {
                                if ($valueBusca['hemoparasitose'] == 'U') {
                                    ?>
                                    <p>AVISO: O tutor não soube informar se o animal é positivo ou não para hemoparasitose, o exame pode ser solicitado no ato da doação. Converse com o tutor do animal doador e o veterinário do seu cão.</p>
                                    <?php
                                }
                            } else if ($tipo == 2) {
                                if ($valueBusca['fiv'] == 'U' || $valueBusca['felv'] == 'U' || $valueBusca['micoplasma'] == 'U') {
                                    ?>
                                    <p>AVISO: O tutor não soube informar algum dos exames (FIV/FeLV ou micoplasma) na hora do preenchimento do cadastro. Os exames podem ser solicitados no ato da doação. Converse com o tutor do animal doador e o veterinário do seu gato.</p>
                                    <?php
                                }
                            }
                            ?>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href=
                               "./view/envio_solicitacao.php?id_pet_doador=<?= $valueBusca['id_animal'] ?>&id_pet_receptor=<?= $id_animal ?>&id_usuario=<?= $id_usuario ?>" 
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
