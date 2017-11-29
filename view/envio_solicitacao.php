<?php

include_once '../tools/mostrar_erros.php';
include_once '../tools/DBHelper.php';
include_once '../model/Animal.php';
include_once '../model/Usuario.php';
include_once '../model/UsuarioFisico.php';
include_once '../model/UsuarioJuridico.php';
include_once '../model/Doacao.php';

$id_animaldoador = $_REQUEST['id_pet_doador'];
$id_animalreceptor = $_REQUEST['id_pet_receptor'];
$id_usuarioreceptor = $_REQUEST['id_usuario'];

$objAnimal = new Animal();
$arrAnimal = array();
$arrAnimal = $objAnimal->SelectById($id_animaldoador);

$objUser = new Usuario();
$arrUser = array();

$pet; //nome pet doador
$nome; //nome tutor doador
$email; //email do tutor doador
date_default_timezone_set('America/Sao_Paulo');
$date = date('d/m/Y');
$data_expira = date('d/m/Y', strtotime($data . ' + 3 days'));

foreach ($arrAnimal as $valueAnimal) {
    $pet = $valueAnimal['nome'];
    $arrUser = $objUser->SelectById($valueAnimal['id_usuario']);
    foreach ($arrUser as $valueUser) {
        if ($valueUser['tipo'] == 'f') {
            $nome = $valueUser['nome'] . " " . $valueUser['sobrenome'];
        } else if ($valueUser['tipo'] == 'j') {
            $nome = $valueUser['nome_fantasia'];
        }
        $email = $valueUser['email'];
    }
}

$random = md5(uniqid(time()));
$to = "luciana.407@hotmail.com"; //email tutor doador
echo "<br> Animal doador: " . $id_animaldoador;
echo "<br> Animal receptor: " . $id_animalreceptor;
echo "<br> Tutor receptor: " . $id_usuarioreceptor;
echo "<br> Tipo tutor receptor: " . $tipo;
echo "<br> Nome tutor doador: " . $nome;
echo "<br> Nome pet doador: " . $pet;
echo "<br> E-mail doador: " . $email;
echo "<br> random: " . $random;

$datamysql = implode("-", array_reverse(explode("/", $data_expira)));
echo "<br> mysql: " . $datamysql;
$objeto = new Doacao();
if ($objeto->insertRandomDoacao($random, $datamysql, $id_animaldoador, $id_animalreceptor)) {

    $link = "http://localhost/SVAT2/confirma_doacao.php?random=" . $random . "&id_animaldoador=" . $id_animaldoador . "&id_animalreceptor=" . $id_animalreceptor;

    $assunto = "Solicitação de Doacao de Sangue - $pet";
    $mensagem = "Olá, $nome tudo bem? Há um pet precisando de doação de sangue. Você pode ajudar?"
            . "Caso o seu pet $pet possa doar sangue, e você esteja disponível para isto. Peço que clique no link abaixo e confirme a solicitação."
            . "Após a confirmação você receberá um e-mail com os dados do tutor que solicitou a doação, para que possam se comunicar e combinar como será o processo de doação."
            . "Importante: Ao clicar no botão confirmar você concorda que o tutor do animal que solicitou doação de sangue  tenha acesso aos seus dados como telefone, e-mail, endereço e outros."
            . "LINK PARA CONFIRMAÇÃO: " . $link;

    mail($to, $assunto, $mensagem);
    ?>
    <script>
        alert("SOLICITAÇÃO REALIZADA!");
    </script>
    <?php

    header("Location: ../meus_animais.php?id_usuario=$id_usuarioreceptor&tipo_user=$tipo");
} else {
    ?>
    <script>
        alert("ERRO!");
    </script>
    <?php

}
?>