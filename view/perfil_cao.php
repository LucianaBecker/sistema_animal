<?php
include_once './model/Cao.php';
$objANCao = new Cao();
$arrANCao = array();
$arrANCao = $objANCao->SelectExamesByIdCao($valueAnimal['id_animal']);

foreach ($arrANCao as $valueCao) {
    
    if ($valueCao['hemoparasitose'] == 'S') {
        ?>
        <li>Hemoparasitose: Positivo</li>
        <?php
    } else if ($valueCao['fiv'] == 'N') {
        ?>
        <li>Hemoparasitose: Negativo</li>
        <?php
    } else {
        ?>
        <li>Hemoparasitose: Sem informação</li>
        <?php
    }
    
    ?>
        <li>Controle Carrpatos: <?= date('d/m/Y', strtotime($valueCao['controle_carrapatos'])) ?></li>
        
        <?php

}
?>