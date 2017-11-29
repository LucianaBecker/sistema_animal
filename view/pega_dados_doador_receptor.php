<?php

include_once '../tools/mostrar_erros.php';
include_once '../tools/DBHelper.php';
include_once '../model/Animal.php';
include_once '../model/Usuario.php';
include_once '../model/UsuarioFisico.php';
include_once '../model/UsuarioJuridico.php';

///ANIMAL DOADOR
$id_animal_doador = $_REQUEST['id_animal_doador'];
$objAnimalDoador = new Animal();
$arrAnimalDoador = array();
$arrAnimalDoador = $objAnimalDoador->SelectById($id_animal_doador);

$id_tutor_doador;
$pet_doador;
$nome_doador;
$endereco_doador;
$email_doador;
$telefone_doador;

foreach ($arrAnimalDoador as $valueAnimalDoador) {
    $pet_doador = $valueAnimalDoador['nome'];
    $objUserDoador = new Usuario();
    $arrUserDoador = array();
    $arrUserDoador = $objUserDoador->SelectById($valueAnimalDoador['id_usuario']);
    foreach ($arrUserDoador as $valueUser) {
        if ($valueUser['tipo'] == 'f') {
            $nome_doador = $valueUser['nome'] . " " . $valueUser['sobrenome'];
        } else if ($valueUser['tipo'] == 'j') {
            $nome_doador = $valueUser['nome_fantasia'];
        }
        $email_doador = $valueUser['email'];
        $endereco_doador = $valueUser['pais'] . " - " . $valueUser['estado'] . " - " . $valueUser['cidade'] . " - " . $valueUser['bairro'] . " - " . $valueUser['endereco'] . " - " . $valueUser['endereco_numero'];
        $telefone_doador = $valueUser['telefone'];
        $id_tutor_doador = $valueUser['id_usuario'];
    }
}


///ANIMAL RECEPTOR
$id_animal_receptor = $_REQUEST['id_animal_receptor'];
$objAnimalReceptor = new Animal();
$arrAnimalReceptor = array();
$arrAnimalReceptor = $objAnimalReceptor->SelectById($id_animal_receptor);

$id_tutor_receptor;
$pet_receptor;
$nome_receptor;
$endereco_receptor;
$email_receptor;
$telefone_receptor;

foreach ($arrAnimalReceptor as $valueAnimalReceptor) {
    $pet_receptor = $valueAnimalReceptor['nome'];
    $objUserReceptor = new Usuario();
    $arrUserReceptor = array();
    $arrUserReceptor = $objUserReceptor->SelectById($valueAnimalReceptor['id_usuario']);

    foreach ($arrUserReceptor as $valueUserR) {
        if ($valueUserR['tipo'] == 'f') {
            $nome_receptor = $valueUserR['nome'] . " " . $valueUserR['sobrenome'];
        } else if ($valueUserR['tipo'] == 'j') {
            $nome_receptor = $valueUserR['nome_fantasia'];
        }

        $email_receptor = $valueUserR['email'];
        $endereco_receptor = $valueUserR['pais'] . " - " . $valueUserR['estado'] . " - " . $valueUserR['cidade'] . " - " . $valueUserR['bairro'] . " - " . $valueUserR['endereco'] . " - " . $valueUserR['endereco_numero'];
        $telefone_receptor = $valueUserR['telefone'];
        $id_tutor_receptor = $valueUser['id_usuario'];
    }
}
echo "<br><br>";
echo "<br> Doador - id_animal - " . $id_animal_doador;
echo "<br> Doador - pet - " . $pet_doador;
echo "<br> Doador - doador - " . $nome_doador;
echo "<br> Doador - endereco - " . $endereco_doador;
echo "<br> Doador - email - " . $email_doador;
echo "<br> Doador - tel - " . $telefone_doador;
echo "<br> Receptor - id_animal - " . $id_animal_receptor;
echo "<br> Receptor - pet - " . $pet_receptor;
echo "<br> Receptor - nome - " . $nome_receptor;
echo "<br> Receptor - end - " . $endereco_receptor;
echo "<br> Receptor - email - " . $email_receptor;
echo "<br> Receptor - telefone - " . $telefone_receptor;
?>