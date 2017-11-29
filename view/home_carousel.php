<div class="owl-carousel owl-theme">

    <?php
    include_once './tools/mostrar_erros.php';
    include_once './tools/DBHelper.php';
    include_once './model/Conteudo.php';

    $objTodoAnuncio = new Conteudo();
    $arrTodoAnuncio = array();
    $arrTodoAnuncio = $objTodoAnuncio->SelectByAnuncio();

    foreach ($arrTodoAnuncio as $valueAI) {
        ?>
        <div class = "item">
            <img src="http://placehold.it/1200x520" class="img-responsive" alt="<?= $valueAI['titulo'] ?>">
            <div class="carousel-caption">
                <h3><?= $valueAI['titulo'] ?></h3>
                <p><?= $valueAI['descricao'] ?></p>
            </div>
        </div>
        <?php
    }
    ?>
</div>