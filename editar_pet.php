<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Animal | Editar Pet</title>
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

        $id_usuario = $_REQUEST['id_usuario'];
        $id_animal = $_REQUEST['id_pet'];

        $objUsuario = new Usuario();
        $user = array();
        $user = $objUsuario->SelectById($id_usuario);

        $objAnimal = new Animal();
        $arrAnimal = array();
        $arrAnimal = $objAnimal->SelectById($id_animal);

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
                            <h1>Bem-vindo, <?= $valueUser['nome'] ?></h1>
                            <div class="user-experience">
                                <h2>Preencha os dados do seu pet</h2>
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

                    <div class="main-content perfil_usuario perfil_pet">
                        <span class="divisoria"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <div class="bottom-content">
                            <div class="job-description">
                                <div class="header">
                                    <span>Cadastre seu Pet</span>
                                </div>
                                <form id="cadastro_conteudo">
                                    <div class="info">
                                        <div class="info-left">
                                            <span>Sua imagem</span>
                                            <input type="file" name="imagem" value="Imagem">
                                        </div>
                                        <div class="info-right">
                                            <input type="text" name="nome" placeholder="Nome" value="Nome">
                                            <input type="text" name="estado" placeholder="Estado" value="Estado">
                                            <span class="title">Vacinas:</span>
                                            <ul id="vacinas">
                                                <input type="text" name="vacinas" value="Vacina x, Vacina Y">
                                            </ul>
                                            <span class="title">Histórico do pet:</span>
                                            <textarea rows="5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</textarea>
                                            <button class="btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </form>

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