<?php
include_once '../model/Animal.php';
include_once '../model/Cao.php';
include_once '../tools/Utils.php';

switch ($_REQUEST['acao']) {
    case 'insert':
        echo "<br> usuario: " . $_REQUEST['id_usuario'];
        echo "<br> nome: " . $_REQUEST['nome'];
        echo "<br> sexo: " . $_REQUEST['sexo'];
        echo "<br> peso: " . $_REQUEST['peso'];
        echo "<br> nasc: " . $_REQUEST['data_nascimento'];
        echo "<br> cast: " . $_REQUEST['castracao'];
        echo "<br> sang: " . $_REQUEST['tipo_sanguineo'];
        echo "<br> hemo: " . $_REQUEST['hemoparasitose'];
        echo "<br> carr: " . $_REQUEST['controle_carrapatos'];
        if (
                (!(empty($_REQUEST['id_usuario']))) &&
                (!(empty($_REQUEST['nome']))) &&
                (!(empty($_REQUEST['sexo']))) &&
                (!(empty($_REQUEST['peso']))) &&
                (!(empty($_REQUEST['data_nascimento']))) &&
                (!(empty($_REQUEST['castracao']))) &&
                (!(empty($_REQUEST['tipo_sanguineo']))) &&
                (!(empty($_REQUEST['transfusao']))) &&
                (!(empty($_REQUEST['hemoparasitose']))) &&
                (!(empty($_REQUEST['controle_carrapatos'])))
        ) {

            $objCao = new Cao();

            if ($_REQUEST['sexo'] == 'M') {
                $objCao->prenhe = NULL;
                $objCao->cio = NULL;
            } else if ($_REQUEST['sexo'] == 'F' && $_REQUEST['castracao'] == 'S') {
                $objCao->prenhe = NULL;
                $objCao->cio = NULL;
            } else if ($_REQUEST['sexo'] == 'F' && $_REQUEST['castracao'] == 'N') {
                if ($_REQUEST['cio'] != NULL || $_REQUEST['cio'] != '') {
                    $objCao->cio = $_REQUEST['cio'];
                } else {
                    $objCao->cio = NULL;
                }
                if ($_REQUEST['prenhe'] != NULL || $_REQUEST['prenhe'] != '') {
                    $objCao->prenhe = $_REQUEST['prenhe'];
                } else {
                    $objCao->prenhe = NULL;
                }
            }

            $objCao->id_usuario = $_REQUEST['id_usuario']; //
            $objCao->nome = $_REQUEST['nome']; //
            $objCao->peso = $_REQUEST['peso'];
            $objCao->sexo = $_REQUEST['sexo'];
            $objCao->data_nascimento = $_REQUEST['data_nascimento']; //
            $objCao->tipo_sanguineo = $_REQUEST['tipo_sanguineo'];
            $objCao->castracao = $_REQUEST['castracao']; //
            $objCao->transfusao = $_REQUEST['transfusao']; //
            $objCao->hemoparasitose = $_REQUEST['hemoparasitose'];
            $objCao->controle_carrapatos = $_REQUEST['controle_carrapatos'];

            $data = $objCao->data_nascimento;
            list($ano, $mes, $dia) = explode('-', $data);
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
            $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

            $data = $objCao->controle_carrapatos;
            list($ano, $mes, $dia) = explode('-', $data);
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
            $controle_carrpatos = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

            $peso = $objCao->peso;
            $hemoparasitose = $objCao->hemoparasitose;
            $transfusao = $objCao->transfusao;

            if (
                    $peso > 24 &&
                    ($hemoparasitose == 'N' || $hemoparasitose == 'U') &&
                    ($controle_carrpatos <= 1) &&
                    ($transfusao == 'N' || $transfusao == 'U') &&
                    ($idade >= 1 && $idade <= 8)
            ) {
                $objCao->doador = 1;
            } else {
                $objCao->doador = 0;
            }


            $foto = $_FILES["foto"];

            if (!empty($foto["name"])) {

                $caminho_f = "animal_images";

                ####################################
                #    inclui nova foto do usuario   #
                ####################################
                include_once './ControllerImagem.php';

                if (count($error) == 0) {
                    $objCao->foto = $nome_imagem;

                    if ($objCao->InsertImg()) {
                        ?>
                        <script type="text/javascript">
                            alert('Cadastro de conteúd realizado com sucesso!');
                        </script>
                        <?php
                        header("Location: ../meus_animais.php?id_usuario=$objCao->id_usuario");
                    } else {
                        ?>
                        <script type="text/javascript">
                            alert('Houve um problema ao cadastrar seu conteudo!');
                            history.go(-1);
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
            } else {

                if ($objCao->Insert()) {
                    ?>
                    <script type="text/javascript">
                        alert('Cadastro de conteúd realizado com sucesso!');
                    </script>
                    <?php
                    header("Location: ../meus_animais.php?id_usuario=$objCao->id_usuario");
                } else {
                    ?>
                    <script type="text/javascript">
                        alert('Houve um problema ao cadastrar seu animal!');
                        history.go(-1);
                    </script>
                    <?php
                }
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
        if (isset($_REQUEST['id_animal'])) {
            $objCao = new Cao();

            $objCao->id_animal = $_REQUEST['id_animal'];
            $objCao->id_usuario = $_REQUEST['id_usuario'];

            if ($objCao->Delete()) {
                ?>
                <script type="text/javascript">
                    alert('Excluído com sucesso!');
                    var x = <?= $objCao->id_usuario ?>;
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