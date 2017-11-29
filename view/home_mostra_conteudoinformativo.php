<?php
include_once './tools/DBHelper.php';
include_once './model/Conteudo.php';

$objTodoInformativo = new Conteudo();
$arrTodoInormativo = array();
$arrTodoInformativo = $objTodoInformativo->SelectByInformativo();
$arrdeId = array();

foreach ($arrTodoInformativo as $valueID){
    array_push($arrdeId,$valueID['id_conteudo']);
}

$rand_keys = array_rand($arrdeId, 2);
$info1 = $arrdeId[$rand_keys[0]];
$info2 = $arrdeId[$rand_keys[1]];

$objConteudo = new Conteudo();
$arrConteudoInfo = array();
$arrConteudoInfo = $objConteudo->SelectByTipo("Informativo", $info1);

foreach ($arrConteudoInfo as $valueCI) {
    ?>
    <div class="col-xs-12 col-md-4">
        <div class="inner left">
            <div class="icon-wrap">
                <i class="fa fa-quote-left" aria-hidden="true"></i>
                <i class="fa fa-quote-right" aria-hidden="true"></i>	
            </div>
            <h3><?= $valueCI['titulo'] ?></h3>
            <blockquote>
                <?= $valueCI['descricao'] ?>
            </blockquote>
            <a href="#">Veja mais</a>
        </div>					
    </div>

    <?php
}

$arrConteudoInfo = $objConteudo->SelectByTipo("Informativo", $info2);
foreach ($arrConteudoInfo as $valueCI) {
    ?>
    <div class="col-xs-12 col-md-4">
        <div class="inner right">
            <div class="icon-wrap">
                <i class="fa fa-heart" aria-hidden="true"></i>
            </div>
            <h3><?= $valueCI['titulo'] ?></h3>
            <blockquote>
                <?= $valueCI['descricao'] ?>
            </blockquote>
            <a href="#">Veja mais</a>
        </div>					
    </div>
    <?php
}
?>
