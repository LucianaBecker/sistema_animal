<?php

include_once '../model/Avaliacao.php';
include_once '../model/Doacao.php';
include_once '../tools/Utils.php';
include_once '../tools/DBHelper.php';

switch ($_REQUEST['acao']) {
    case 'insert':
        echo "<br> " . $_REQUEST['id_avaliador'];
        echo "<br> " . $_REQUEST['id_avaliado'];
        echo "<br> " . $_REQUEST['nota'];
        if (
                (!(empty($_REQUEST['id_avaliador']))) &&
                (!(empty($_REQUEST['id_avaliado']))) &&
                (!(empty($_REQUEST['nota']))) &&
                (!(empty($_REQUEST['random'])))
        ) {

            $objAvaliacao = new Avaliacao();
            $objAvaliacao->id_avaliador = $_REQUEST['id_avaliador'];
            $objAvaliacao->id_avaliado = $_REQUEST['id_avaliado'];
            $objAvaliacao->nota = $_REQUEST['nota'];
            $random = $_REQUEST['random'];
            
            if ($objAvaliacao->Insert()) {
                $objD = new Doacao();
                $upD = $objD->updateRandomDoacao($random);
                ?>
                <script type="text/javascript">
                    alert('Avaliação realizada com sucesso');
                </script>
                <?php

                header("Location: ../index.php");
            } else {
                ?>
                <script type="text/javascript">
                    alert('Houve um problema ao cadastrar sua avaliação!');
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
}
?>