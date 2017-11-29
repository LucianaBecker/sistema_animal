<form id="cadastro_conteudo">
    <div class="info">
        <div class="info-left">
            <?php
            if ($valueAnimal['foto'] != NULL) {
                ?>
                <img src="./assets/upload_images/animal_images/<?= $valueAnimal['foto'] ?>" class="img-responsive" style="max-width: 250px">
                <?php
            } else {
                ?>
                <img src="http://placehold.it/250x250">
                <?php
            }
            ?>

        </div>
        <div class="info-right">
            <div class="relatorio">
                <h3>Informações gerais:</h3>
                <ul>
                    <li>Nome: <?= $valueAnimal['nome'] ?> </li>
                    <?php
                    if ($valueAnimal['sexo'] == 'F') {
                        ?>
                        <li>Sexo: Fêmea </li>
                        <?php
                    } else {
                        ?>
                        <li>Sexo: Macho </li>
                        <?php
                    }
                    ?>
                    <li>Peso: <?= $valueAnimal['peso'] ?> Kg</li>
                    <li>Data Nascimento: <?= date('d/m/Y', strtotime($valueAnimal['data_nascimento'])) ?></li>
                    <?php
                    if ($valueAnimal['castracao'] == 'S') {
                        ?>
                        <li>Castrado: Sim</li>
                        <?php
                    } else {
                        ?>
                        <li>Castrado: Não</li>
                        <?php
                    }

                    if ($valueAnimal['castracao'] == 'N' && $valueAnimal['sexo'] == 'F') {
                        ?>
                        <li>Ultimo cio: <?= date('d/m/Y', strtotime($valueAnimal['cio'])) ?></li>
                        <?php
                        if ($valueAnimal['prenhe'] == 'N') {
                            ?>
                            <li>Está prenha/grávida: Não</li>
                            <?php
                        } else {
                            ?>
                            <li>Está prenha/grávida: Sim</li>
                            <?php
                        }
                    }

                    if ($valueAnimal['id_tipo_animal'] == 1) {
                        include_once './view/perfil_cao.php';
                    } else if ($valueAnimal['id_tipo_animal'] == 2) {
                        include_once './view/perfil_gato.php';
                    }

                    if ($valueAnimal['doador'] == 0) {
                        ?>
                        <li>Possível doador: Não</li>
                        <?php
                    } else {
                        ?>
                        <li>Possível doador: Sim</li>
                        <?php
                    }
                    ?>

                </ul>
            </div>

            <a class="btn btn-default" data-toggle="modal" data-target="#modalAdicionaVacina">Adicionar vacina</a>
            <a class="btn btn-default" href="./relatorio_pet.php?id_animal=<?=$valueAnimal['id_animal']?>">Extrair Relatório</a>
            <a class="btn btn-default" data-toggle="modal" data-target="#myModal">Excluir Pet</a>
        </div>
    </div>
</form>