<?php
include_once '../model/Animal.php';
include_once '../model/Gato.php';
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
        echo "<br> felv: " . $_REQUEST['felv'];
        echo "<br> fiv: " . $_REQUEST['fiv'];
        echo "<br> mico: " . $_REQUEST['micoplasma'];
        echo "<br> trans: " . $_REQUEST['transfusao'];

        if (
                (!(empty($_REQUEST['id_usuario']))) &&
                (!(empty($_REQUEST['nome']))) &&
                (!(empty($_REQUEST['sexo']))) &&
                (!(empty($_REQUEST['peso']))) &&
                (!(empty($_REQUEST['data_nascimento']))) &&
                (!(empty($_REQUEST['transfusao']))) &&
                (!(empty($_REQUEST['castracao']))) &&
                (!(empty($_REQUEST['tipo_sanguineo']))) &&
                (!(empty($_REQUEST['felv']))) &&
                (!(empty($_REQUEST['fiv']))) &&
                (!(empty($_REQUEST['micoplasma'])))
        ) {

        
            
            $objGato = new Gato();

            if ($_REQUEST['sexo'] == 'M') {
                $objGato->prenhe = NULL;
                $objGato->cio = NULL;
            } else if ($_REQUEST['sexo'] == 'F' && $_REQUEST['castracao'] == 'S') {
                $objGato->prenhe = NULL;
                $objGato->cio = NULL;
            } else if ($_REQUEST['sexo'] == 'F' && $_REQUEST['castracao'] == 'N') {
                if ($_REQUEST['cio'] != NULL || $_REQUEST['cio'] != '') {
                    $objGato->cio = $_REQUEST['cio'];
                } else {
                    $objGato->cio = NULL;
                }
                if ($_REQUEST['prenhe'] != NULL || $_REQUEST['prenhe'] != '') {
                    $objGato->prenhe = $_REQUEST['prenhe'];
                } else {
                    $objGato->prenhe = NULL;
                }
            }

            $objGato->id_usuario = $_REQUEST['id_usuario']; //
            $objGato->nome = $_REQUEST['nome']; //
            $objGato->peso = $_REQUEST['peso'];
            $objGato->sexo = $_REQUEST['sexo'];
            $objGato->data_nascimento = $_REQUEST['data_nascimento']; //
            $objGato->tipo_sanguineo = $_REQUEST['tipo_sanguineo'];
            $objGato->castracao = $_REQUEST['castracao']; //
            $objGato->transfusao = $_REQUEST['transfusao']; //
            $objGato->fiv = $_REQUEST['fiv'];
            $objGato->felv = $_REQUEST['felv'];
            $objGato->micoplasma = $_REQUEST['micoplasma'];

            $data = $objGato->data_nascimento;
            list($ano, $mes, $dia) = explode('-', $data);
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
            $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

            $peso = $objGato->peso;
            $fiv = $objGato->fiv;
            $felv = $objGato->felv;
            $micoplasma = $objGato->micoplasma;
            $transfusao = $objGato->transfusao;

            if (
                    $peso > 4 &&
                    ($fiv == 'N' || $fiv == 'U') &&
                    ($felv == 'N' || $felv == 'U') &&
                    ($micoplasma == 'N' || $micoplasma == 'U') &&
                    ($transfusao == 'N' || $transfusao == 'U') &&
                    ($idade >= 1 && $idade <= 8)
            ) {
                $objGato->doador = 1;
            } else {
                $objGato->doador = 0;
            }

            $foto = $_FILES["foto"];

            if (!empty($foto["name"])) {

                $caminho_f = "animal_images";

                ####################################
                #    inclui nova foto do usuario   #
                ####################################
                include_once './ControllerImagem.php';

                if (count($error) == 0) {
                    $objGato->foto = $nome_imagem;

                    if ($objGato->InsertImg()) {
                        ?>
                        <script type="text/javascript">
                            alert('Cadastro de conteúd realizado com sucesso!');
                        </script>
                        <?php
                        header("Location: ../meus_animais.php?id_usuario=$objGato->id_usuario");
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

                if ($objGato->Insert()) {
                    ?>
                    <script type="text/javascript">
                        alert('Cadastro de conteúd realizado com sucesso!');
                    </script>
                    <?php
                    header("Location: ../meus_animais.php?id_usuario=$objGato->id_usuario");
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

    case 'update';

        if (
                (!(empty($_REQUEST['id_animal']))) &&
                (!(empty($_REQUEST['id_usuario']))) &&
                (!(empty($_REQUEST['nome']))) &&
                (!(empty($_REQUEST['data_nascimento']))) &&
                (!(empty($_REQUEST['castracao'])))
        ) {

            $objGato = new Gato();
            $objGato->id_animal = $_REQUEST['id_animal']; //
            $objGato->id_usuario = $_REQUEST['id_usuario']; //
            $objGato->nome = $_REQUEST['nome']; //
            $objGato->foto = $_REQUEST['foto'];
            $objGato->peso = $_REQUEST['peso'];
            $objGato->data_nascimento = $_REQUEST['data_nascimento']; //
            $objGato->tipo_sanguineo = $_REQUEST['tipo_sanguineo'];
            $objGato->vacinas = $_REQUEST['vacinas'];
            $objGato->castracao = $_REQUEST['castracao']; //
            $objGato->vermifugos = $_REQUEST['vermifugo'];
            $objGato->prenhe = $_REQUEST['prenhe'];
            $objGato->cio = $_REQUEST['cio'];
            $objGato->transfusao = $_REQUEST['transfusao'];
            $objGato->doador = $_REQUEST['doador'];
            $objGato->hemoparasitose = $_REQUEST['hemoparasitose'];
            $objGato->controle_carrapatos = $_REQUEST['controle_carrapatos'];

            if ($objGato->Update()) {
                ?>
                <script type="text/javascript">
                    var x = <?= $objGato->id_animal ?>;
                    location.href = '../view/agendapet.php?id_animal=' + x;
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    alert('Houve um problema ao atualizar os dados do seu animal!');
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
        if (isset($_REQUEST['id_animal'])) {
            $objGato = new Gato();

            $objGato->id_animal = $_REQUEST['id_animal'];
            $objGato->id_usuario = $_REQUEST['id_usuario'];

            if ($objGato->Delete()) {
                ?>
                <script type="text/javascript">
                    alert('Excluído com sucesso!');
                    var x = <?= $objGato->id_usuario ?>;
                    location.href = '../view/minhaagenda.php?id_usuario=' + x;

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