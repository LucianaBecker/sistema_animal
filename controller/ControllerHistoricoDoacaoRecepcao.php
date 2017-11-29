<?php
include_once '../model/HistoricoDoacaoRecepcao.php';
include_once '../tools/Utils.php';

switch ($_REQUEST['acao']) {
    case 'insert':
        if (
                (!(empty($_REQUEST['id_historico_dr']))) &&
                (!(empty($_REQUEST['id_animal']))) &&
                (!(empty($_REQUEST['tipo']))) &&
                (!(empty($_REQUEST['data'])))
        ) {

            $objHistoricoDR = new HistoricoDoacaoRecepcao();
            $objHistoricoDR->id_historico_dr = $_REQUEST['id_historico_dr'];
            $objHistoricoDR->id_animal = $_REQUEST['id_animal'];
            $objHistoricoDR->tipo = $_REQUEST['tipo'];
            $objHistoricoDR->data = $_REQUEST['data'];

            if ($objHistoricoDR->Insert()) {
                ?>
                <script type="text/javascript">
                    var x = <?= $objHistoricoDR->id_historico_dr ?>;
                    location.href = '';
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert('Houve um problema ao cadastrar seu historico!');
                    history.go(-1);
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert('Insira as informações corretamente!');
                history.go(-1);
            </script>
            <?php
        }

        break;

    case 'update';

        if (
                (!(empty($_REQUEST['id_historico_dr']))) &&
                (!(empty($_REQUEST['id_animal']))) &&
                (!(empty($_REQUEST['tipo']))) &&
                (!(empty($_REQUEST['data'])))
        ) {

            $objHistoricoDR = new HistoricoDoacaoRecepcao();
            $objHistoricoDR->id_historico_dr = $_REQUEST['id_historico_dr'];
            $objHistoricoDR->id_animal = $_REQUEST['id_animal'];
            $objHistoricoDR->tipo = $_REQUEST['tipo'];
            $objHistoricoDR->data = $_REQUEST['data'];

            if ($objHistoricoDR->Update()) {
                ?>
                <script type="text/javascript">
                    var x = <?= $objHistoricoDR->id_historico_dr ?>;
                    location.href = '';
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert('Houve um problema ao atualizar os dados do seu historico!');
                    history.go(-1);
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert('Insira as informações corretamente!');
                history.go(-1);
            </script>
            <?php
        }
        break;

    case 'delete':
        if (isset($_REQUEST['id_historico_dr'])) {
            $objHistoricoDR = new HistoricoDoacaoRecepcao();

            $objHistoricoDR->id_historico_dr = $_REQUEST['id_historico_dr'];
            $objHistoricoDR->id_usuario = $_REQUEST['id_usuario'];

            if ($objHistoricoDR->Delete()) {
                ?>
                <script type="text/javascript">
                    alert('Excluído com sucesso!');
                    var x = <?= $objHistoricoDR->id_historico_dr ?>;
                    location.href = '';

                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert('Erro ao excluir. Tente novamente!');
                    history.go(-1);
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert('Erro ao excluir. Tente novamente!');
                history.go(-1);
            </script>
            <?php
        }
        break;
}
?>