<?php
include_once '../model/Usuario.php';
include_once '../model/UsuarioJuridico.php';
include_once '../tools/Utils.php';

switch ($_REQUEST['acao']) {
    case 'insertimg':

        $foto = $_FILES['foto'];
        $id_usuario = $_REQUEST['id_usuario'];
        $objUJ = new UsuarioJuridico();
        $objUJ->id_usuario = $_REQUEST['id_usuario'];
        $caminho_f = "user_images";

        ####################################
        #  seleciona foto atual do usuario #
        ####################################

        $foto_antiga;

        $objUJFoto = new UsuarioJuridico();
        $arrUJFoto = array();
        $arrUJFoto = $objUJFoto->selecionaFoto($id_usuario);

        foreach ($arrUJFoto as $valueUJFoto) {
            $foto_antiga = $valueUJFoto['foto'];
        }

        ####################################
        #    inclui nova foto do usuario   #
        ####################################
        if (!empty($foto["name"])) {

            include_once './ControllerImagem.php';
            // Se não houver nenhum erro
            if (count($error) == 0) {
                $objUJ->id_usuario = $_REQUEST['id_usuario'];
                $objUJ->foto = $nome_imagem;
                if ($objUJ->alteraImagem($id_usuario)) {
                    echo "Sua foto foi cadastrada com sucesso";
                    if ($foto_antiga != "") {
                        unlink("../assets/upload_images/$caminho_f/$foto_antiga");
                    }
                }
            }
        } else {
            ?>
            <script type="text/javascript">
                alert('Erro. Selecione uma foto.');
                history.go(-1);
            </script>
            <?php
        }

        break;

    case 'insert':
        if (
                (!(empty($_REQUEST['uj_senha']))) &&
                (!(empty($_REQUEST['uj_confimasenha']))) && ($_REQUEST['uj_confimasenha'] = $_REQUEST['uj_confimasenha'])
        ) {
            if (
                    (!(empty($_REQUEST['nome_fantasia']))) &&
                    (!(empty($_REQUEST['uj_email']))) &&
                    (!(empty($_REQUEST['uj_telefone']))) &&
                    (!(empty($_REQUEST['cnpj']))) &&
                    (!(empty($_REQUEST['razao_social']))) &&
                    (!(empty($_REQUEST['uj_senha']))) &&
                    (!(empty($_REQUEST['uj_confimasenha']))) &&
                    (!(empty($_REQUEST['uj_pais']))) &&
                    (!(empty($_REQUEST['uj_estado']))) &&
                    (!(empty($_REQUEST['uj_bairro']))) &&
                    (!(empty($_REQUEST['uj_cep']))) &&
                    (!(empty($_REQUEST['uj_endereco']))) &&
                    (!(empty($_REQUEST['uj_endereco_n'])))
            ) {

                $objUJ = new UsuarioJuridico();
                $objUJ->nome_fantasia = $_REQUEST['nome_fantasia'];
                $objUJ->email = $_REQUEST['uj_email'];
                $objUJ->cnpj = $_REQUEST['cnpj'];
                $objUJ->telefone = $_REQUEST['uj_telefone'];
                $objUJ->razao_social = $_REQUEST['razao_social'];
                $objUJ->senha = $_REQUEST['uj_senha'];
                $objUJ->pais = $_REQUEST['uj_pais'];
                $objUJ->estado = $_REQUEST['uj_estado'];
                $objUJ->cidade = $_REQUEST['uj_cidade'];
                $objUJ->bairro = $_REQUEST['uj_bairro'];
                $objUJ->cep = $_REQUEST['uj_cep'];
                $objUJ->endereco = $_REQUEST['uj_endereco'];
                $objUJ->endereco_n = $_REQUEST['uj_endereco_n'];
                $objUJ->tipo = 'j';


                if ($objUJ->Insert()) {
                    ?>
                    <script type="text/javascript">
                        alert('Cadastro efetuado com sucesso!');
                    </script>
                    <?php
                    header("Location: ../index.php");
                } else {
                    ?>
                    <script type="text/javascript">
                        alert('Houve um problema ao cadastrar!');
                        history.go(-1);
                    </script>
                    <?php
                }
            } else {
                ?>
                <script type="text/javascript">
                    alert('Insira as informações corretamente!');
                    history.go(-1);
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert('As senhas não são iguais!');
                history.go(-1);
            </script>
            <?php
        }

        break;

    case 'update';
        if (
                (!(empty($_REQUEST['id_usuario']))) &&
                (!(empty($_REQUEST['nome_fantasia']))) &&
                (!(empty($_REQUEST['razao_social']))) &&
                (!(empty($_REQUEST['cnpj']))) &&
                (!(empty($_REQUEST['email']))) &&
                (!(empty($_REQUEST['telefone']))) &&
                (!(empty($_REQUEST['pais']))) &&
                (!(empty($_REQUEST['estado']))) &&
                (!(empty($_REQUEST['cidade']))) &&
                (!(empty($_REQUEST['cep']))) &&
                (!(empty($_REQUEST['bairro']))) &&
                (!(empty($_REQUEST['endereco']))) &&
                (!(empty($_REQUEST['endereco_n'])))
        ) {

            $objUJ = new UsuarioJuridico();
            $objUJ->id_usuario = $_REQUEST['id_usuario']; //
            $objUJ->cnpj = $_REQUEST['cnpj']; //
            $objUJ->nome_fantasia = $_REQUEST['nome_fantasia']; //
            $objUJ->razao_social = $_REQUEST['razao_social']; //
            $objUJ->telefone = $_REQUEST['telefone'];
            $objUJ->email = $_REQUEST['email']; //
            $objUJ->pais = $_REQUEST['pais']; //
            $objUJ->estado = $_REQUEST['estado']; //
            $objUJ->cidade = $_REQUEST['cidade']; //
            $objUJ->cep = $_REQUEST['cep']; //
            $objUJ->bairro = $_REQUEST['bairro']; //
            $objUJ->endereco = $_REQUEST['endereco']; //
            $objUJ->endereco_n = $_REQUEST['endereco_n']; //
            
            $foto = $_FILES["foto"];

            if (!empty($foto["name"])) {
                echo 'ENTROU AQUI!!!!';
                $id_usuario = $_REQUEST['id_usuario'];
                $caminho_f = "user_images";

                ####################################
                #  seleciona foto atual do usuario #
                ####################################

                $foto_antiga = "";


                $objUJFoto = new UsuarioJuridico();
                $arrUJFoto = array();
                $arrUJFoto = $objUJFoto->selecionaFoto($id_usuario);

                foreach ($arrUJFoto as $valueUJFoto) {
                    $foto_antiga = $valueUJFoto['foto'];
                }


                ####################################
                #    inclui nova foto do usuario   #
                ####################################
                include_once './ControllerImagem.php';

                // Se não houver nenhum erro
                if (count($error) == 0) {
                    $objUJ->foto = $nome_imagem;
                    if ($objUJ->alteraImagem($id_usuario)) {
                        if ($foto_antiga != "") {
                            unlink("../assets/upload_images/$caminho_f/$foto_antiga");
                        }
                    }
                } else {
                    ?>
                    <script type="text/javascript">
                        alert("A imagem não deve ultrapassar 500x500 pixels");
                    </script>
                    <?php
                }
            }

            if ($objUJ->Update()) {
                header("Location: ../dashboard.php?id_usuario=$objUJ->id_usuario");
            } else {
                ?>
                <script type="text/javascript">
                    alert('Houve um problema ao atualizar os dados do seu cadastro!');
                    history.go(-1);
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert('Insira as informações corretamente!');
                history.go(-1);
            </script>
            <?php
        }
        break;

    case 'delete':
        if (isset($_REQUEST['id_usuario'])) {
            $objUJ = new UsuarioJuridico();

            $objUJ->id_usuario = $_REQUEST['id_usuario'];

            if ($objUJ->Delete()) {
                ?>
                <script type="text/javascript">
                    alert('Excluído com sucesso!');
                    var x = <?= $objUJ->id_usuario ?>;
                    location.href = '';

                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert('Erro ao excluir. Tente novamente!');
                    history.go(-1);
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
                alert('Erro ao excluir. Tente novamente!');
                history.go(-1);
            </script>
            <?php
        }
        break;
}
?>