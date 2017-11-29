<?php
include_once './tools/mostrar_erros.php';
include_once './model/Doacao.php';
include_once './tools/DBHelper.php';

$random = $_REQUEST['random'];
$id_animal_doador = $_REQUEST['id_animaldoador'];
$id_animal_receptor = $_REQUEST['id_animalreceptor'];

$objramdom = new Doacao();
$arrRandom = array();
$arrRandom = $objramdom->selectRandomDoacao($random);

date_default_timezone_set('America/Sao_Paulo');
$date = date('d/m/Y');
$datamysql = implode("-", array_reverse(explode("/", $date)));
?>


<html>
    <head>
        <title>confirma doação</title>
    </head>
    <body>
        <?php
        foreach ($arrRandom as $valuer) {
            if (
                    $valuer['id_animal_doador'] == $id_animal_doador &&
                    $valuer['id_animal_receptor'] == $id_animal_receptor &&
                    $valuer['tipo'] == 'D' &&
                    $valuer['marcador'] == 0 &&
                    $valuer['data_expira'] >= $datamysql
            ) {
                ?>

                <button onclick="window.location.href = './controller/controllerDoacao.php?acao=insert&id_animal_doador=<?= $id_animal_doador ?>&id_animal_receptor=<?= $id_animal_receptor ?>&random=<?= $random ?>'">CONFIRMA!</button>
                <button>RECUSA!</button>
                <?php
            } else {
                ?>
                <p>LINK EXPIROU</p>
                <?php
            }
        }
        ?>


    </body>
</html>
