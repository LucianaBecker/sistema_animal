<?php
include_once './model/Gato.php';
$objANGato = new Gato();
$arrANGato = array();
$arrANGato = $objANGato->SelectExamesByIdGato($valueAnimal['id_animal']);

foreach ($arrANGato as $valueGato) {
    
    if ($valueGato['fiv'] == 'S') {
        ?>
        <li>FIV: Positivo</li>
        <?php
    } else if ($valueGato['fiv'] == 'N') {
        ?>
        <li>FIV: Negativo</li>
        <?php
    } else {
        ?>
        <li>FIV: Não testado</li>
        <?php
    }

    if ($valueGato['felv'] == 'S') {
        ?>
        <li>FeLV: Positivo</li>
        <?php
    } else if ($valueGato['felv'] == 'N') {
        ?>
        <li>FeLV: Negativo</li>
        <?php
    } else {
        ?>
        <li>FeLV: Não testado</li>
        <?php
    }

    if ($valueGato['micoplasma'] == 'S') {
        ?>
        <li>Micoplasma: Positivo</li>
        <?php
    } else if ($valueGato['micoplasma'] == 'N') {
        ?>
        <li>Micoplasma: Negativo</li>
        <?php
    } else {
        ?>
        <li>Micoplasma: Sem informação</li>
        <?php
    }
}
?>