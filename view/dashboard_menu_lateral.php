<div class="top">
    <figure>
        <img src="./assets/user_placeholder.png" alt="">
    </figure>

    <?php
    if ($valueUser['tipo'] == 'f') {
        ?><h1>Olá, <?= $valueUser['nome'] ?>!</h1><?php
    } else if ($valueUser['tipo'] == 'j') {
        ?><h1>Olá, <?= $valueUser['nome_fantasia'] ?>!</h1><?php
    }
    ?>


</div>
<nav class="bottom">
    <span>Main</span>
    <ul>
        <li>
            <a href="dashboard.php?id_usuario=<?= $id_usuario ?>">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                Meu cadastro
            </a>
        </li>
        <li>
            <a href="meus_animais.php?id_usuario=<?= $id_usuario ?>">
                <i class="fa fa-paw" aria-hidden="true"></i>
                Meus animais
            </a>
        </li>
        <li>
            <a href="cadastrar_animal.php?id_usuario=<?= $id_usuario ?>">
                <i class="fa fa-paw" aria-hidden="true"></i>
                Cadastrar animal
            </a>
        </li>
        <?php
        if ($valueUser['tipo'] == 'j') {
            ?>
            <li>
                <a href="meus_conteudos.php?id_usuario=<?= $id_usuario ?>">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    Meus conteúdos
                </a>
            </li>
            <li>
                <a href="cadastro_conteudo.php?id_usuario=<?= $id_usuario ?>">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    Cadastrar conteúdo
                </a>
            </li>
            <?php
        }
        ?>

    </ul>
</nav>



