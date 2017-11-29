<?php

include_once '../model/Doacao.php';
include_once '../tools/Utils.php';

switch ($_REQUEST['acao']) {
    case 'insert':
        if (
                (!(empty($_REQUEST['id_animal_doador']))) &&
                (!(empty($_REQUEST['id_animal_receptor'])))
        ) {

            $date = date('d/m/Y');
            $data_doacao = implode("-", array_reverse(explode("/", $date)));

            $objDoacao = new Doacao();
            $objDoacao->id_animal_doador = $_REQUEST['id_animal_doador'];
            $objDoacao->id_animal_receptor = $_REQUEST['id_animal_receptor'];
            $objDoacao->data_doacao = $data_doacao;
            $random_doacao = $_REQUEST['random'];
            $id_animal_doador = $objDoacao->id_animal_doador;
            $id_animal_receptor = $objDoacao->id_animal_receptor;

            echo "$objDoacao->data_doacao";

            if ($objDoacao->Insert()) {
                include_once '../view/pega_dados_doador_receptor.php';
                include_once '../view/envio_dados_doador.php';
                include_once '../view/envio_dados_receptor.php';
                include_once '../view/envio_avaliacao_doador.php';
                include_once '../view/envio_avaliacao_receptor.php';
                $objD = new Doacao();
                $doacao = $objDoacao->updateRandomDoacao($random_doacao);
                header("Location: ../index.php");
            } else {
                ?>
                <script type="text/javascript">
                    alert('Houve um problema ao confirmar sua doação!');
                    history.go(-1);
                </script>
                <?php

            }
        } else {
            ?>
            <script type="text/javascript">
                alert('Houve um problema na doação!');
                history.go(-1);
            </script>
            <?php

        }

        break;
}
?>