<?php
include_once '../model/HistoricoExamesVacinas.php';
include_once '../tools/Utils.php';

switch ($_REQUEST['acao']) {
    case 'insert':
        if (
                (!(empty($_REQUEST['id_historico_ev']))) &&
                (!(empty($_REQUEST['id_animal']))) &&
                (!(empty($_REQUEST['tipo']))) &&
                (!(empty($_REQUEST['data'])))
        ) {

            $objHistoricoEV = new HistoricoDoacaoRecepcao();
            $objHistoricoEV->id_historico_ev = $_REQUEST['id_historico_ev'];
            $objHistoricoEV->id_animal = $_REQUEST['id_animal'];
            $objHistoricoEV->tipo = $_REQUEST['tipo'];
            $objHistoricoEV->data = $_REQUEST['data'];

            if ($objHistoricoEV->Insert()) {
                ?>
                <script type="text/javascript">
                    var x = <?= $objHistoricoEV->id_historico_ev ?>;
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
                (!(empty($_REQUEST['id_historico_ev']))) &&
                (!(empty($_REQUEST['id_animal']))) &&
                (!(empty($_REQUEST['tipo']))) &&
                (!(empty($_REQUEST['data'])))
        ) {

            $objHistoricoEV = new HistoricoDoacaoRecepcao();
            $objHistoricoEV->id_historico_ev = $_REQUEST['id_historico_ev'];
            $objHistoricoEV->id_animal = $_REQUEST['id_animal'];
            $objHistoricoEV->tipo = $_REQUEST['tipo'];
            $objHistoricoEV->data = $_REQUEST['data'];

            if ($objHistoricoEV->Update()) {
                ?>
                <script type="text/javascript">
                    var x = <?= $objHistoricoEV->id_historico_ev ?>;
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
        if (isset($_REQUEST['id_historico_ev'])) {
            $objHistoricoEV = new HistoricoDoacaoRecepcao();

            $objHistoricoEV->id_historico_ev = $_REQUEST['id_historico_ev'];
            $objHistoricoEV->id_usuario = $_REQUEST['id_usuario'];

            if ($objHistoricoEV->Delete()) {
                ?>
                <script type="text/javascript">
                    alert('Excluído com sucesso!');
                    var x = <?= $objHistoricoEV->id_historico_ev ?>;
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