<?php
include_once '../model/Conteudo.php';
include_once '../tools/Utils.php';

switch ($_REQUEST['acao']) {
    case 'insert':
        if (
                (!(empty($_REQUEST['id_usuario']))) &&
                (!(empty($_REQUEST['titulo']))) &&
                (!(empty($_REQUEST['descricao']))) &&
                (!(empty($_REQUEST['tipo'])))
        ) {

            $objConteudo = new Conteudo();
            $objConteudo->id_usuario = $_REQUEST['id_usuario'];
            $objConteudo->titulo = $_REQUEST['titulo'];
            $objConteudo->descricao = $_REQUEST['descricao'];
            $objConteudo->tipo = $_REQUEST['tipo'];

            $foto = $_FILES["foto"];

            if (!empty($foto["name"])) {

                $caminho_f = "conteudo_imagens";

                ####################################
                #    inclui nova foto do usuario   #
                ####################################
                include_once './ControllerImagem.php';

                if (count($error) == 0) {
                    $objConteudo->imagem = $nome_imagem;
                    
                    if ($objConteudo->InsertImg()) {
                        ?>
                        <script type="text/javascript">
                            alert('Cadastro de conteúd realizado com sucesso!');
                        </script>
                        <?php
                        header("Location: ../meus_conteudos.php?id_usuario=$objConteudo->id_usuario");
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

                if ($objConteudo->Insert()) {
                    ?>
                    <script type="text/javascript">
                        alert('Cadastro de conteúd realizado com sucesso!');
                    </script>
                    <?php
                    header("Location: ../meus_conteudos.php?id_usuario=$objConteudo->id_usuario");
                } else {
                    ?>
                    <script type="text/javascript">
                        alert('Houve um problema ao cadastrar seu conteudo!');
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
        if (isset($_REQUEST['id_conteudo'])) {
            $objConteudo = new Conteudo();

            $objConteudo->id_conteudo = $_REQUEST['id_conteudo'];
            $objConteudo->id_usuario = $_REQUEST['id_usuario'];

            if ($objConteudo->Delete()) {
                ?>
                <script type="text/javascript">
                    alert('Excluído com sucesso!');
                </script>
                
                <?php
                header("Location: ../meus_conteudos.php?id_usuario=$objConteudo->id_usuario");
                
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