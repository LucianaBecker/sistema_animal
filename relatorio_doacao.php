<?php

include("assets/mpdf60/mpdf.php");
include_once './model/Animal.php';
include_once './tools/DBHelper.php';

$id_animal = 51;

$objAnimal = new Animal();
$arrAnimal = array();
$arrAnimal = $objAnimal->SelectById($id_animal);

$titulo = "RELATÓRIO DE DOAÇÃO E RECEPÇÃO";
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
    $data_nasc = date('d/m/Y', strtotime($valueAnimal['data_nascimento']));
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
        $cio = date('d/m/Y', strtotime($valueAnimal['cio']));
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
                Cio: <strong>$cio</strong><br/>
            </p>";

    if ($sexo == "Fêmea") {
        $html = $html . "Prenhe: <strong>$prenhe</strong><br/>";
    }

    include_once './model/Doacao.php';
    $objDR = new Doacao();
    $arrDR = array();
    $arrDR = $objDR->SelectByIdDoador($id_animal);

    $html = $html . "<br/><strong>Doações de Sangue: </strong><br /> 
                       <table>
                        <tr>
                          <th>Data: </th>
                          <th>Receptor: </th>
                        </tr>";
    foreach ($arrDR as $valueDR) {
        $data_doacao = date('d/m/Y', strtotime($valueDR['data_doacao']));
        $nome_doador = $valueDR['nome_doador'];
        $html = $html . "
                        <tr>
                          <td>$data_doacao</td>
                          <td>$nome_doador</td>
                        </tr>
                      ";
    }

    $html = $html . "</table><br />";

    $arrDR = $objDR->SelectByIdReceptor($id_animal);

    $html = $html . "<br/><strong>Recepções de Sangue: </strong><br /> 
                      <table>
                        <tr>
                          <th>Data: </th>
                          <th>Doador: </th>
                        </tr> ";

    foreach ($arrDR as $valueDR) {
        $data_doacao = date('d/m/Y', strtotime($valueDR['data_doacao']));
        $nome_receptor = $valueDR['nome_receptor'];
        $html = $html . "
                        <tr>
                          <td>$data_doacao</td>
                          <td>$nome_receptor</td>
                        </tr>
                      ";
    }


    $html = $html . "</table><br /><br /><p style='text-align: right;'>Data de emissão do relatório: <strong>$date</strong></p>
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