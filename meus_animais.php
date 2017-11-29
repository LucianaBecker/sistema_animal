<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Animal | Listagem de animais</title>
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

        $objUsuario = new Usuario();
        $user = array();
        $user = $objUsuario->SelectById($id_usuario);

        $objAnimal = new Animal();
        $arrAnimal = array();
        $arrAnimal = $objAnimal->ListAnimalsByUser($id_usuario);
        $objAnimal2 = new Animal();
        $arrAnimal2 = array();
        $arrAnimal2 = $objAnimal2->ListAnimalsByUser($id_usuario);

        $res_count_animal = 0;
        foreach ($arrAnimal as $valueAnimal) {
            $res_count_animal++;
        }
        $arrAnimal = $objAnimal->ListAnimalsByUser($id_usuario);

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
                            <h1>Listagem de animais</h1>
                            <div class="user-experience">
                                <?php
                                if ($res_count_animal < 1) {
                                    ?>
                                    <h2>Você nao possui nenhum animal cadastrado! Cadastre seu pet <a href="#">aqui!</a></h2>
                                    <?php
                                } elseif ($res_count_animal == 1) {
                                    ?>
                                    <h2>Mostrando <?= $res_count_animal ?> resultado para a listagem de animais cadastrados:</h2>
                                    <?php
                                } else {
                                    ?>
                                    <h2>Mostrando <?= $res_count_animal ?> resultados para a listagem de animais cadastrados:</h2>
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

                    <div class="main-content listagem_animais">
                        <span class="divisoria"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <div class="bottom-content">
                            <div class="job-description">
                                <div class="col-xs-12">
                                    <?php
                                    foreach ($arrAnimal as $valueAnimal) {
                                        ?>
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="header">
                                                <span><?= $valueAnimal['nome'] ?></span>
                                            </div>
                                            <div class="info">
                                                <div class="info-left">
                                                    <figure>
                                                        <?php
                                                        if ($valueAnimal[foto] == NULL) {
                                                            ?>
                                                            <img src="http://placehold.it/150x150">
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src="assets/upload_images/animal_images/<?= $valueAnimal['foto'] ?>">
                                                            <?php
                                                        }
                                                        ?>
                                                    </figure>
                                                </div>
                                                <div class="info-right">
                                                    <h2><b>Nome:</b><a href="perfil_pet.php?id_usuario=<?= $id_usuario ?>&id_animal=<?= $valueAnimal['id_animal'] ?>"> <?= $valueAnimal['nome'] ?></a></h2>
                                                    <div class="button-wrap">
                                                        <button onclick="window.location.href = 'editar_pet.php?id_pet=<?= $valueAnimal['id_animal'] ?>&id_usuario=<?= $id_usuario ?>'" class="btn btn-default">Editar</button>
                                                        <button  class="btn btn-default"  data-toggle="modal" data-target="#modalCP<?= $valueAnimal['id_animal'] ?>">Solicitar Doação</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <?php
            include_once './view/modal_confirmapedido.php';
        }
        include_once './view/conf_js.php';
        ?>

    </body>
</html>