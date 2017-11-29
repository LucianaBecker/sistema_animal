<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Animal | Dashboard</title>
        <?php include_once './view/conf_head.php'; ?>
    </head>
    <body>

        <?php
        include_once './tools/mostrar_erros.php';
        include_once './tools/DBHelper.php';
        include_once './model/Login.php';
        include_once './model/Usuario.php';
        include_once './model/UsuarioFisico.php';
        include_once './model/UsuarioJuridico.php';
        include_once './model/Animal.php';
        include_once './model/Conteudo.php';

        $id_usuario = $_REQUEST['id_usuario'];

        $objUsuario = new Usuario();
        $user = array();
        $user = $objUsuario->SelectById($id_usuario);

        $objAnimal = new Animal();
        $arrAnimal = array();
        $arrAnimal = $objAnimal->ListAnimalsByUser($id_usuario);

        foreach ($user as $valueUser) {
            if ($valueUser['tipo'] == 'j') {
                $objConteudo = new Conteudo();
                $arrConteudo = array();
                $arrConteudo = $objConteudo->ListConteudoByUser($id_usuario);
            }
        }

        $user = $objUsuario->SelectById($id_usuario);

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
                                <a href="./controller/controllerLogout.php" /><span><i class="fa fa-compress" aria-hidden="true"></i></span></a>
                            </div>

                        </div>
                    </div>
                    <div class="user-info">
                        <div class="left">
                            <h1>Bem-vindo</h1>
                            <div class="user-experience">
                                <h2>Seus dados</h2>
                            </div>
                            <address>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <?= $valueUser["pais"] ?> - <?= $valueUser["estado"] ?> - <?= $valueUser["cidade"] ?> - <?= $valueUser["bairro"] ?> - <?= $valueUser["cep"] ?> - <?= $valueUser["endereco"] ?>, <?= $valueUser["endereco_numero"] ?>
                            </address>
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

                    <div class="main-content perfil_usuario">
                        <span class="divisoria"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <div class="bottom-content">
                            <div class="job-description">
                                <?php
                                if ($valueUser['tipo'] == 'f')  {
                                    include_once './view/dashboard_meuperfilfisico.php';
                                } else if ($valueUser['tipo'] == 'j')  {
                                    include_once './view/dashboard_meuperfiljuridico.php';
                                }
                                ?>
                            </div>
                            <div class="social-links">
                                <?php
                                include_once './view/perfil_social_link.php';
                                ?>
                            </div>
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