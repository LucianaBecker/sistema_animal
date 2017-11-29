<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Animal | Listagem de conteúdo</title>
        <?php include_once './view/conf_head.php'; ?>
    </head>
    <body>

        <?php
        include_once './tools/mostrar_erros.php';
        include_once './tools/DBHelper.php';
        include_once './model/Login.php';
        include_once './model/Usuario.php';
        include_once './model/UsuarioJuridico.php';
        include_once './model/Conteudo.php';

        $id_usuario = $_REQUEST['id_usuario'];
        ;

        $objUsuario = new Usuario();
        $user = array();
        $user = $objUsuario->SelectById($id_usuario);

        $objConteudo = new Conteudo();
        $arrConteudo = array();
        $arrConteudo = $objConteudo->ListConteudoByUser($id_usuario);

        $res_count_conteudo = 0;
        foreach ($arrConteudo as $valueConteudo) {
            $res_count_conteudo++;
        }

        $arrConteudo = $objConteudo->ListConteudoByUser($id_usuario);


        foreach ($user as $valueUser) {
            ?>

            <div class="dashboard-wrap">
                <section class="dash-menu is-open">
                    <?php
                    include_once './view/dashboard_menu_lateral.php';
                    ?>
                </section>
                <section class="home">
                    <div class="top">
                        <div class="utils">
                            <div class="one">
                                <span><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                            </div>
                            <div class="two">
                                <span><i class="fa fa-compress" aria-hidden="true"></i></span>
                            </div>
                            <div class="three">
                                <span><i class="fa fa-bars" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="user-info">
                        <div class="left">
                            <h1>Listagem de conteúdo</h1>
                            <div class="user-experience">
                                <?php
                                if ($res_count_conteudo < 1) {
                                    ?>
                                    <h2>Você nao possui nenhum conteúdo cadastrado! Cadastre seu conteúdo <a href="#">aqui!</a></h2>
                                    <?php
                                } elseif ($res_count_conteudo == 1) {
                                    ?>
                                    <h2>Mostrando <?= $res_count_conteudo ?> resultado para conteúdos cadastrados:</h2>
                                    <?php
                                } else {
                                    ?>
                                    <h2>Mostrando <?= $res_count_conteudo ?> resultados para conteúdos cadastrados:</h2>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="right">
                            <div class="buttons">
                                <div class="msg">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="btn-one">
                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                </div>
                                <div class="btn-two">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="main-content listagem_conteudo">
                        <span class="divisoria"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <div class="bottom-content">
                            <div class="job-description col-xs-12">
                                <?php
                                foreach ($arrConteudo as $valueConteudo) {
                                    ?>
                                    <div class = "col-sm-6 col-md-4">
                                        <div class = "header">
                                            <span><?= $valueConteudo['titulo'] ?></span>
                                        </div>
                                        <div class = "info">
                                            <div class = "info-top">
                                                <figure>
                                                    <?php
                                                    if ($valueConteudo['imagem'] == NULL) {
                                                        ?>
                                                        <img src = "http://placehold.it/250x250" class = "center-block img-responsive">
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src = "./assets/upload_images/conteudo_imagens/<?= $valueConteudo['imagem'] ?>" class = "center-block img-responsive">
                                                        <?php
                                                    }
                                                    ?>
                                                </figure>
                                            </div>
                                            <div class = "info-bottom">
                                                <b>Título:</b> <p><?= $valueConteudo['titulo'] ?></p>
                                                <b>Tipo:</b> <p><?= $valueConteudo['tipo'] ?></p>
                                                <b>Conteúdo:</b> <p><?= $valueConteudo['descricao'] ?></p>
                                                <button onclick="javascript:deletarConteudo(<?= $valueConteudo['id_conteudo'] ?>,<?= $valueConteudo['id_usuario'] ?>)" class="btn btn-primary">Excluir</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="pagination">
                            <ul>
                                <li><a href="#">anterior</a></li>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">próxima</a></li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>


            <?php
        }
        include_once './view/conf_js.php';
        ?>
    </body>
</html>