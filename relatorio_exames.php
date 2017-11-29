<?php

include("assets/mpdf60/mpdf.php");
include_once './model/Animal.php';
include_once './tools/DBHelper.php';

$id_animal = $_REQUEST['id_animal'];

$objAnimal = new Animal();
$arrAnimal = array();
$arrAnimal = $objAnimal->SelectById($id_animal);

$titulo = "RELATÓRIO PET";
date_default_timezone_set('America/Sao_Paulo');
$date = date('d/M/Y - H:i');

$nome;
$sexo;
$peso;
$doador;
$tipo_sanguineo;
$data_nasc;
$prenhe;
$cio;
$transfusao;

foreach ($arrAnimal as $valueAnimal) {
    $nome = $valueAnimal['nome'];
    $data_nasc = $valueAnimal['data_nascimento'];
    $sexo;
    if ($valueAnimal['sexo'] == "M") {
        $sexo = "Macho";
    } else if ($valueAnimal['sexo'] == "F") {
        $sexo = "Fêmea";
    }
    $peso = $valueAnimal['peso'];
    if ($valueAnimal['doador'] == 1) {
        $doador = "Sim";
    } else if ($valueAnimal['doador'] == 0) {
        $doador = "Não";
    }

    if ($valueAnimal['tipo_sanguineo'] == "") {
        $tipo_sanguineo = "Não informado";
    } else {
        $tipo_sanguineo = $valueAnimal['tipo_sanguineo'];
    }

    if ($valueAnimal['cio'] == "") {
        $cio = "Não informado";
    } else {
        $cio = $valueAnimal['cio'];
    }

    if ($valueAnimal['prenhe'] == 0) {
        $prenhe = "Não";
    } else {
        $prenhe = "sim";
    }


    $peso = $valueAnimal['peso'];
    $html = "<fieldset>
        <img src='./assets/images/logo_animal.png' style='width:100px;'>
            <h1 style='text-align: center'>$titulo</h1> 
            <p class='center sub-titulo'>
                Nome: <strong>$nome</strong><br/>
                Data Nascimento: <strong>$data_nasc</strong><br/>
                Sexo: <strong>$sexo</strong><br/>
                Peso: <strong>$peso</strong><br/>
                Doador: <strong>$doador</strong><br/>
                Tipo sanguíneo: <strong>$tipo_sanguineo</strong><br/>
                Cio: <strong>$cio</strong><br/>";

    if ($sexo == "Fêmea") {
        $html = $html . "Prenhe: <strong>$prenhe</strong><br/>";
    }

    $html = $html . "</p>
            <p>Data: <strong>$date</strong></p>
            </fieldset>";
}
$mpdf = new mPDF();
$mpdf->SetDisplayMode('fullpage');
//$css = file_get_contents("css/estilo.css");
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html);
$mpdf->Output();

exit;
?>