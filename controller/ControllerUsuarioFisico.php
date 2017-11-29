<?php
include_once '../model/Usuario.php';
include_once '../model/UsuarioFisico.php';
include_once '../tools/Utils.php';

switch ($_REQUEST['acao']) {
    case 'insert':

        if (
                (!(empty($_REQUEST['uf_senha']))) &&
                (!(empty($_REQUEST['uf_confimasenha']))) && ($_REQUEST['uf_confimasenha'] = $_REQUEST['uf_confimasenha'])
        ) {
            if (
                    (!(empty($_REQUEST['name']))) &&
                    (!(empty($_REQUEST['sobrenome']))) &&
                    (!(empty($_REQUEST['sexo']))) &&
                    (!(empty($_REQUEST['cpf']))) &&
                    (!(empty($_REQUEST['uf_email']))) &&
                    (!(empty($_REQUEST['uf_telefone']))) &&
                    (!(empty($_REQUEST['uf_senha']))) &&
                    (!(empty($_REQUEST['uf_confimasenha']))) &&
                    (!(empty($_REQUEST['uf_pais']))) &&
                    (!(empty($_REQUEST['uf_estado']))) &&
                    (!(empty($_REQUEST['uf_bairro']))) &&
                    (!(empty($_REQUEST['uf_cep']))) &&
                    (!(empty($_REQUEST['uf_endereco']))) &&
                    (!(empty($_REQUEST['uf_endereco_n'])))
            ) {

                $objUF = new UsuarioFisico();
                $objUF->nome = $_REQUEST['name']; //
                $objUF->sobrenome = $_REQUEST['sobrenome']; //
                $objUF->senha = $_REQUEST['uf_senha']; //
                $objUF->sexo = $_REQUEST['sexo']; //
                $objUF->cpf = $_REQUEST['cpf']; //
                $objUF->email = $_REQUEST['uf_email']; //
                $objUF->telefone = $_REQUEST['uf_telefone']; //
                $objUF->pais = $_REQUEST['uf_pais'];
                $objUF->estado = $_REQUEST['uf_estado'];
                $objUF->cidade = $_REQUEST['uf_cidade'];
                $objUF->cep = $_REQUEST['uf_cep']; //
                $objUF->bairro = $_REQUEST['uf_bairro'];
                $objUF->endereco = $_REQUEST['uf_endereco']; //
                $objUF->endereco_n = $_REQUEST['uf_endereco_n']; //
                $objUF->tipo = 'f'; //

                if ($objUF->Insert()) {
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

//        echo "ID: ". $_REQUEST['id_usuario'] . "<br>";
//        echo $_REQUEST['nome'] . "<br>";
//        echo $_REQUEST['sobrenome'] . "<br>";
//        echo $_REQUEST['sexo'] . "<br>";
//        echo $_REQUEST['cpf'] . "<br>";
//        echo $_REQUEST['email'] . "<br>";
//        echo $_REQUEST['telefone'] . "<br>";
//        echo $_REQUEST['pais'] . "<br>";
//        echo $_REQUEST['estado'] . "<br>";
//        echo $_REQUEST['cidade'] . "<br>";
//        echo $_REQUEST['cep'] . "<br>";
//        echo $_REQUEST['bairro'] . "<br>";
//        echo $_REQUEST['endereco'] . "<br>";
//        echo $_REQUEST['endereco_n'] . "<br>";
//        echo "---------------------------<br>";

        if (
                (!(empty($_REQUEST['id_usuario']))) &&
                (!(empty($_REQUEST['nome']))) &&
                (!(empty($_REQUEST['sobrenome']))) &&
                (!(empty($_REQUEST['sexo']))) &&
                (!(empty($_REQUEST['cpf']))) &&
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

            $objUF = new UsuarioFisico();
            $objUF->id_usuario = $_REQUEST['id_usuario']; //
            $objUF->nome = $_REQUEST['nome']; //
            $objUF->sobrenome = $_REQUEST['sobrenome']; //
            $objUF->sexo = $_REQUEST['sexo']; //
            $objUF->cpf = $_REQUEST['cpf']; //
            $objUF->email = $_REQUEST['email']; //
            $objUF->telefone = $_REQUEST['telefone']; //
            $objUF->pais = $_REQUEST['pais'];
            $objUF->estado = $_REQUEST['estado'];
            $objUF->cidade = $_REQUEST['cidade'];
            $objUF->cep = $_REQUEST['cep']; //
            $objUF->bairro = $_REQUEST['bairro'];
            $objUF->endereco = $_REQUEST['endereco']; //
            $objUF->endereco_n = $_REQUEST['endereco_n']; //


            $foto = $_FILES["foto"];

            if (!empty($foto["name"])) {
                $id_usuario = $_REQUEST['id_usuario'];
                $caminho_f = "user_images";

                ####################################
                #  seleciona foto atual do usuario #
                ####################################

                $foto_antiga = "";


                $objUFFoto = new UsuarioFisico();
                $arrUFFoto = array();
                $arrUFFoto = $objUFFoto->selecionaFoto($id_usuario);

                foreach ($arrUFFoto as $valueUFFoto) {
                    $foto_antiga = $valueUFFoto['foto'];
                }


                ####################################
                #    inclui nova foto do usuario   #
                ####################################
                include_once './ControllerImagem.php';

                // Se não houver nenhum erro
                if (count($error) == 0) {
                    $objUF->foto = $nome_imagem;
                    if ($objUF->alteraImagem($id_usuario)) {
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
            } else {
                ?>
                <script type="text/javascript">
                    alert("A imagem não deve ultrapassar 500x500 pixels");
                </script>
                <?php
            }

            if ($objUF->Update()) {
                header("Location: ../dashboard.php?id_usuario=$objUF->id_usuario");
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
            $objUF = new UsuarioFisico();

            $objUF->id_usuario = $_REQUEST['id_usuario'];

            if ($objUF->Delete()) {
                ?>
                <script type="text/javascript">
                    alert('Excluído com sucesso!');
                    var x = <?= $objUF->id_usuario ?>;
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