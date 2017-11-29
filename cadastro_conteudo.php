<!DOCTYPE html>
<html>
    <head>
        <title>Sistema Animal | Cadastro de conteúdo</title>
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
                            <h1>Cadastro de conteúdo</h1>
                            <div class="user-experience">
                                <h2><?= $valueUser['nome_fantasia'] ?></h2>
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

                    <div class="main-content cadastro_conteudo">
                        <span class="divisoria"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                        <div class="bottom-content">
                            <div class="job-description">
                                <div class="header">
                                    <span>Cadastro de conteúdo - home</span>
                                </div>
                                <form id="cadastro_conteudo" method="POST" action="./controller/ControllerConteudo.php?<?=$valueUser['id_usuario']?>" method="post" enctype="multipart/form-data" name="cadastro" >
                                    <div class="info">
                                        <div class="info-left">
                                            <select name="tipo">
                                                <option value="" disabled selected>Tipo de conteúdo</option>
                                                <option value="Informativo">Conteúdo</option>
                                                <option value="Anuncio">Anúncio</option>
                                            </select>
                                        </div>
                                        <div class="info-right">
                                            <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>" />
                                            <input type="text" name="titulo" placeholder="Título">
                                            <textarea name="descricao" placeholder="Descrição"></textarea>
                                            <input type="file" name="foto" />
                                            <button type="submit"  class="btn btn-primary">Cadastrar</button>
                                            <input type="hidden" name="acao" value="insert" />
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="social-links">
                                <div>
                                    <p>Você possui <span><?= $res_count_conteudo ?></span> conteúdos cadastrados</p>   
                                </div>
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