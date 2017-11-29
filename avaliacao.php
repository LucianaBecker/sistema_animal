<!DOCTYPE html>
<?php
include_once './view/conf_head.php';
include_once './tools/mostrar_erros.php';
include_once './model/Doacao.php';
include_once './model/Avaliacao.php';
include_once './model/Animal.php';
include_once './model/Usuario.php';
include_once './tools/DBHelper.php';

$id_animal_avaliador = $_REQUEST['id_avaliador'];
$id_animal_avaliado = $_REQUEST['id_avaliado'];
$random = $_REQUEST['random'];


$objramdom = new Avaliacao();
$arrRandom = array();
$arrRandom = $objramdom->selectRandomAvaliacao($random);

$id_avaliador;
$nome_avaliador;
$id_avaliado;
$nome_avaliado;
$objUsuario = new Usuario();
$arrAvaliador = array();
$arrAvaliado = array();

$objAnimal = new Animal();
$arrAnimal = array();
$arrAnimal = $objAnimal->SelectById($id_animal_avaliador);

foreach ($arrAnimal as $valueAnimal) {
    $arrAvaliador = $objUsuario->SelectById($valueAnimal['id_usuario']);
}
$arrAnimal = $objAnimal->SelectById($id_animal_avaliado);
foreach ($arrAnimal as $valueAnimal) {
    $arrAvaliado = $objUsuario->SelectById($valueAnimal['id_usuario']);
}

foreach ($arrAvaliado as $valueAvaliado) {
    $id_avaliado = $valueAvaliado['id_usuario'];
    if ($valueAvaliado['tipo'] == 'j') {
        $nome_avaliado = $valueAvaliado['nome_fantasia'];
    } else if ($valueAvaliado['tipo'] == 'f') {
        $nome_avaliado = $valueAvaliado['nome'] . " " . $valueAvaliado['sobrenome'];
    }
}
foreach ($arrAvaliador as $valueAvaliador) {
    $id_avaliador = $valueAvaliador['id_usuario'];
    if ($valueAvaliador['tipo'] == 'j') {
        $nome_avaliador = $valueAvaliador['nome_fantasia'];
    } else if ($valueAvaliador['tipo'] == 'f') {
        $nome_avaliador = $valueAvaliador['nome'] . " " . $valueAvaliador['sobrenome'];
    }
}

date_default_timezone_set('America/Sao_Paulo');
$date = date('d/m/Y');
$datamysql = implode("-", array_reverse(explode("/", $date)));
?>
<html>
    <head>
        <title>Sistema Animal | Avaliação simples</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include_once './view/conf_head.php'; ?>
    </head>
    <body class="avaliacao_simples">
        <div class="form-wrap">
            <?php
            foreach ($arrRandom as $valuer) {
                if (
                        $valuer['tipo'] == 'A' &&
                        $valuer['marcador'] == 0 &&
                        ($valuer['id_animal_doador'] == $id_animal_avaliado || $valuer['id_animal_doador'] == $id_animal_avaliador) &&
                        ($valuer['id_animal_receptor'] == $id_animal_avaliado || $valuer['id_animal_receptor'] == $id_animal_avaliador) &&
                        $valuer['data_expira'] >= $datamysql
                ) {
                    ?>
                    <h1>Avalie sua experiência no Sistema Animal</h1>
                    <form id="avaliacao_simples" method="POST" action="controller/ControllerAvaliacao.php?&random=<?= $random ?>&id_avaliado=<?= $id_avaliado ?>&id_avaliador=<?= $id_avaliador ?>">
                        <input type="text" name="avaliador" placeholder="Avaliador" value="<?= $nome_avaliador ?>">
                        <input type="text" name="avaliado" placeholder="Avaliado" value="<?= $nome_avaliado ?>">
                        <span>Sua classificação: </span>
                        <div class="estrelas">
                            <input type="radio" id="cm_star-empty" name="nota" value="" checked/>
                            <label for="cm_star-1"><i class="fa"></i></label>
                            <input type="radio" id="cm_star-1" name="nota" value="1"/>
                            <label for="cm_star-2"><i class="fa"></i></label>
                            <input type="radio" id="cm_star-2" name="nota" value="2"/>
                            <label for="cm_star-3"><i class="fa"></i></label>
                            <input type="radio" id="cm_star-3" name="nota" value="3"/>
                            <label for="cm_star-4"><i class="fa"></i></label>
                            <input type="radio" id="cm_star-4" name="nota" value="4"/>
                            <label for="cm_star-5"><i class="fa"></i></label>
                            <input type="radio" id="cm_star-5" name="nota" value="5"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Avaliar</button>
                        <input type="hidden" name="acao" value="insert" />
                    </form>
                    <?php
                } else if ($valuer['marcador'] == 1) {
                    ?>
                    <h1>Você já fez sua avaliação. Obrigado!</h1>
                    <?php
                } else if ($valuer['data_expira'] < $datamysql) {
                    ?>
                    <h1>Link expirado. A avaliação só é valida até 7 dias após a solicitação.</h1>
                    <?php
                }
            }
            ?>
        </div>
    </body>
</html>