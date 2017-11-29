<?php

include("assets/mpdf60/mpdf.php");
include_once './model/Animal.php';
//include_once './model/Cao.php';
//include_once './model/Gato.php';
include_once './tools/DBHelper.php';

$id_animal = $_REQUEST['id_animal'];

date_default_timezone_set('America/Sao_Paulo');
$date = date('d/M/Y - H:i');

$objAnimal = new Animal();
$arrAnimal = array();
$arrAnimal = $objAnimal->SelectById($id_animal);

$objCao = new Animal();
$arrCao = array();
$arrCao = $objCao->SelectExamesByIdCao($id_animal);

$objGato = new Animal();
$arrGato = array();
$arrGato = $objGato->SelectExamesByIdGato($id_animal);

$titulo;
$nome;
$sexo;
$peso;
$doador;
$tipo_sanguineo;
$data_nasc;
$prenhe;
$cio;
$transfusao;
$foto;
$fiv;
$felv;
$micoplasma;
$hemoparasitose;
$controle_carrpatos;
$tipo;
$aviso = 0;
$avisofinal = "Esse relatório é gerado a partir de informações fornecidas pelo tutor do animal, não serve como documento comprobatório de atestado de saúde ou vacinação.";
foreach ($arrAnimal as $valueAnimal) {
    $nome = $valueAnimal['nome'];
    $titulo = strtoupper("RELATÓRIO DO PET $nome");

    $data_nasc = date('d/m/Y', strtotime($valueAnimal['data_nascimento']));
    $sexo;
    $peso = $valueAnimal['peso'];

    if ($valueAnimal['sexo'] == "M") {
        $sexo = "Macho";
    } else if ($valueAnimal['sexo'] == "F") {
        $sexo = "Fêmea";
    }

    if ($valueAnimal['doador'] == 1) {
        $doador = "Sim";
    } else if ($valueAnimal['doador'] == 0) {
        $doador = "Não";
    }

    if ($valueAnimal['tipo_sanguineo'] == 'U') {
        $tipo_sanguineo = "Não informado";
    } else {
        $tipo_sanguineo = $valueAnimal['tipo_sanguineo'];
    }

    if ($valueAnimal['tipo_sanguineo'] == 'U') {
        $transfusao = "Não informado";
    } else if ($valueAnimal['tipo_sanguineo'] == 'N') {
        $transfusao = "Não";
    } else {
        $transfusao = "Sim";
    }

    if ($valueAnimal['castracao'] == 'S') {
        $castracao = "Sim";
    } else {
        $castracao = "Não";
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

    if ($valueAnimal['id_tipo_animal'] == 1) {
        $tipo = "Canino";
        foreach ($arrCao as $valueCao) {
            if ($valueCao['hemoparasitose'] == 'S') {
                $hemoparasitose = "Postivo";
            } else if ($valueCao['fiv'] == 'N') {
                $hemoparasitose = "Negativo";
            } else {
                $hemoparasitose = "Não informado";
            }
            $controle_carrpatos = date('d/m/Y', strtotime($valueCao['controle_carrapatos']));
        }
        if ($valueCao['hemoparasitose'] == 'U') {
            $aviso = "Seu cão é um possível doador de sangue, mas pela falta de informações
                    sobre hemoparasitose, o exame pode ser solicitado no ato da doação.";
        }
    } else if ($valueAnimal['id_tipo_animal'] == 2) {
        $tipo = "Felino";
        foreach ($arrGato as $valueGato) {
            if ($valueGato['fiv'] == 'S') {
                $fiv = "Postivo";
            } else if ($valueGato['fiv'] == 'N') {
                $fiv = "Negativo";
            } else {
                $fiv = "Não testado";
            }

            if ($valueGato['felv'] == 'S') {
                $felv = "Postivo";
            } else if ($valueGato['felv'] == 'N') {
                $felv = "Negativo";
            } else {
                $felv = "Não testado";
            }

            if ($valueGato['micoplasma'] == 'S') {
                $micoplasma = "Postivo";
            } else if ($valueGato['micoplasma'] == 'N') {
                $micoplasma = "Negativo";
            } else {
                $micoplasma = "Sem informação";
            }
        }
        if ($valueGato['fiv'] = 'U' || $valueGato['felv'] = 'U' || $valueGato['micoplasma'] = 'U') {
            $aviso = "Seu gato é um possível doador de sangue, mas pela falta de informações sobre FIV/FeLV ou Micoplasma
                o exame pode ser solicitado no ato da doação.";
        }
    }


    $html = "<fieldset>
        <img src='./assets/images/logo_animal.png' style='width:100px;'>
            <h1 style='text-align: center'>$titulo</h1> 
            <p class='center sub-titulo'>
                Nome: <strong>$nome</strong><br/>
                Data Nascimento: <strong>$data_nasc</strong><br/>
                Sexo: <strong>$sexo</strong><br/>
                Especie: <strong>$tipo</strong><br/>
                Peso: <strong>$peso kg</strong><br/>
                Doador: <strong>$doador</strong><br/>
                Tipo sanguíneo: <strong>$tipo_sanguineo</strong><br/>
                Tipo sanguíneo: <strong>$castracao</strong><br/>
            </p>";

    if ($sexo == "Fêmea" && $castracao == "Não") {
        $html = $html . "Prenhe: <strong>$prenhe</strong><br/>";
        $html = $html . "Cio: <strong>$cio</strong><br/>";
    }

    if ($tipo == "Canino") {
        $html = $html . "Hemoparasitose: <strong>$hemoparasitose</strong><br/>";
        $html = $html . "Controle de Carrapatos: <strong>$controle_carrpatos</strong><br/>";
    } else if ($tipo == "Felino") {
        $html = $html . "FIV: <strong>$fiv</strong><br/>";
        $html = $html . "FeLV: <strong>$felv</strong><br/>";
        $html = $html . "Micoplasma: <strong>$micoplasma</strong><br/>";
    }
    if ($aviso != 0) {
        $html = $html . "Aviso: <strong>$aviso</strong><br/>";
    }

//    include_once './model/HistoricoExamesVacinas.php';
    $objV = new Animal();
    $arrV = array();
    $arrV = $objV->ToListVacinasByAnimal($id_animal);
    $html = $html . "<br/><strong>Vacinas: </strong><br /> 
                      <table>
                        <tr>
                          <th>Data: </th>
                          <th>Vacina: </th>
                        </tr>
                        ";
    foreach ($arrV as $valueV) {
        $data_vacina = $valueV['data_vacina'];
        $vacina = $valueV['descricao'];
        $html = $html . "<tr><td>$data_vacina</td><td>$vacina</td></tr>";
    }
    $html = $html . "</table><br />";
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


    $html = $html . "</table><br /><br /><p>$avisofinal</p><p style='text-align: right;'>Data de emissão do relatório: <strong>$date</strong></p>
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