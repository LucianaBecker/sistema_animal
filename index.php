<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Animal | Home</title>
        <?php include_once './view/conf_head.php'; ?>
    </head>
    <body>
        <header>

            <?php
            include_once './view/home_header.php';
            include_once './tools/mostrar_erros.php';
            ?>
        </header>
        <main>
            <section id="main-banner">
                <?php
                include_once './view/home_carousel.php';
                ?>
            </section>
            <div class="container">
                <section class="more-info">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <figure>
                                <img src="assets/images/doacao_sangue2.jpg" class="img-responsive">
                                <!--<img src="http://placehold.it/750x750" class="img-responsive">-->
                            </figure>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="inner-info">
                                <h3>
                                    Doação de sangue. Seja parte de algo maravilhoso!
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                                <ul>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</li>
                                </ul>
                                <a href="#" class="btn-action">Saiba mais</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <section class="banner-other">
                <figure>
                    <img src="assets/images/banner_baixo2.png">
                    <!--<img src="http://placehold.it/1500x720">-->
                </figure>
            </section>
            <div class="container">
                <section class="quote">
                    <div class="row flex-between">
                        <?php include_once './view/home_mostra_conteudoinformativo.php'; ?>
                    </div>		
                </section>
            </div>
        </main>
        <footer>
            <?php include_once './view/home_footer.php'; ?>
        </footer>


        <?php
        include_once './view/conf_js.php';
        include_once './view/home_modal_login_cadastro.php';
        ?>


    </body>
</html>