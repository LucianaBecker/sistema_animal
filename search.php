<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Animal | Busca</title>
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

        $id_animal = $_REQUEST['id_pet'];
        $id_usuario = $_REQUEST['id_usuario'];

        $objUsuario = new Usuario();
        $user = array();


        //CONTADOR
        $objAnimalC = new Animal();
        $arrAnimalC = array();
        $arrAnimalC = $objAnimalC->SelectById($id_animal);

        $objBuscaC = new Animal();
        $arrBuscaC = array();

        foreach ($arrAnimalC as $valueAnimalC) {
            $arrBuscaC = $objBuscaC->SelectDoador($valueAnimalC['id_tipo_animal'], $id_animal, $id_usuario);
        }
        $contaResultado;
        foreach ($arrBuscaC as $valueC) {
            $contaResultado++;
        }
        //FIM DO CONTADOR

        $objAnimal = new Animal();
        $arrAnimal = array();
        $arrAnimal = $objAnimal->SelectById($id_animal);

        $objBusca = new Animal();
        $arrBusca = array();

        $tipo;
        foreach ($arrAnimal as $valueAnimal) {
            $arrBusca = $objBusca->SelectDoador($valueAnimal['id_tipo_animal'], $id_usuario);
            $tipo = $valueAnimal['id_tipo_animal'];
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
                                <span><i class="fa fa-compress" aria-hidden="true"></i></span>
                            </div>
                            <div class="three">
                                <span><i class="fa fa-bars" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="user-info">
                        <div class="left">
                            <h1>Buscar</h1>
                            <div class="user-experience">
                                <?php
                                if ($contaResultado == 0) {
                                    ?><h2>Resultado busca: Nenhum animal compatível com o perfil do seu pet foi encontrado</h2><?php
                                } else if ($contaResultado == 1) {
                                    ?><h2>Mostrando <?= $contaResultado ?> resultado para a busca de animais doadores compatíveis ao perfil do seu pet:</h2><?php
                                } else if ($contaResultado > 1) {
                                    ?><h2>Mostrando <?= $contaResultado ?> resultados para a busca de animais doadores compatíveis ao perfil do seu pet:</h2><?php
                                }
                                ?>

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

                    <div class="main-content">
                        <span class="divisoria"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <div class="bottom-content">
                            <div class="job-description">
                                <?php
                                foreach ($arrBusca as $valueBusca) {
                                    ?>
                                    <div class="header">
                                        <span><?= $valueBusca['nome'] ?></span>
                                    </div>
                                    <div class="info">
                                        <div class="info-left">
                                            <figure>
                                                <img src="assets/upload_images/animal_images/<?= $valueBusca['foto'] ?>">
                                            </figure>
                                        </div>
                                        <div class="info-right">
                                            <ul>
                                                <li>Endereço: <?= $valueBusca['pais'] ?> - <?= $valueBusca['estado'] ?> - <?= $valueBusca['cidade'] ?> - <?= $valueBusca['bairro'] ?> - <?= $valueBusca['endereco'] ?></li>
                                                <?php
                                                if($valueBusca['tipo_user']=='f'){
                                                ?>
                                                <li>Nome do tutor: <?= $valueBusca['nome_user'] ?> <?= $valueBusca['sobrenome'] ?></li>
                                                <?php    
                                                } else if ($valueBusca['tipo_user']=='j'){
                                                ?>
                                                <li>Nome do tutor: <?= $valueBusca['nome_fantasia'] ?></li>
                                                <?php    
                                                }
                                                ?>
                                                <li>Classificação: 4/5
                                                    <ul class="paws">
                                                        <li>
                                                            <img src="assets/images/patinha.png">
                                                        </li>
                                                        <li>
                                                            <img src="assets/images/patinha.png">
                                                        </li>
                                                        <li>
                                                            <img src="assets/images/patinha.png">
                                                        </li>
                                                        <li>
                                                            <img src="assets/images/patinha.png">
                                                        </li>
                                                        <li class="opacity">
                                                            <img src="assets/images/patinha.png">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <?php
                                                if ($tipo == 1) {
                                                    if ($valueBusca['hemoparasitose'] == 'N') {
                                                        ?> 
                                                        <li>Hemoparasitose: Negativo </li>   
                                                        <?php
                                                    } else if ($valueBusca['hemoparasitose'] == 'U') {
                                                        ?> 
                                                        <li>Hemoparasitose: Não informado </li>   
                                                        <?php
                                                    }
                                                    ?>
                                                    <li>Controle Carrpatos: <?= $valueBusca['controle_carrapatos'] ?>  </li>
                                                    <?php
                                                } else if ($tipo == 2) {
                                                    if ($valueBusca['fiv'] == 'N') {
                                                        ?> 
                                                        <li>FIV: Negativo </li>   
                                                        <?php
                                                    } else if ($valueBusca['fiv'] == 'U') {
                                                        ?> 
                                                        <li>FIV: Não informado </li>   
                                                        <?php
                                                    }
                                                    if ($valueBusca['felv'] == 'N') {
                                                        ?> 
                                                        <li>FeLV: Negativo </li>   
                                                        <?php
                                                    } else if ($valueBusca['felv'] == 'U') {
                                                        ?> 
                                                        <li>FeLV: Não informado </li>   
                                                        <?php
                                                    }
                                                    if ($valueBusca['micoplasma'] == 'N') {
                                                        ?> 
                                                        <li>Micoplasma: Negativo </li>   
                                                        <?php
                                                    } else if ($valueBusca['micoplasma'] == 'U') {
                                                        ?> 
                                                        <li>Micoplasma: Não informado </li>   
                                                        <?php
                                                    }
                                                }
                                                ?>

                                                <!--<li>A 7km do seu endereço</li>-->
                                                <li><button class="btn btn-primary" data-toggle="modal" data-target="#modalCS<?= $valueBusca['id_animal'] ?>">Solicitar Doação</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php
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
            include_once './view/modal_confirmasolicitacao.php';
        }
        include_once './view/conf_js.php';
        ?>

    </body>
</html>