<div>
    <span>Seus pets</span>
    <ul>
        <?php
        foreach ($arrAnimal as $valueAnimal) {
            ?>

            <div class = "pet">
                <li>
                    <img src="http://placehold.it/50x50">
                    <a href="#"><?= $valueAnimal['nome'] ?></a>
                </li>
            </div>
            <?php
        }
        ?>
    </ul>
</div>

<?php
if ($valueUser['tipo'] == 'j')  {
    ?>
    <div>
        <span>Seus posts</span>
        <ul>
            <?php
            foreach ($arrConteudo as $valueConteudo) {
                ?>

                <div class="post">
                    <li>
                        <a href="#"><?= $valueConteudo['titulo'] ?></a>
                    </li>
                </div>

                <?php
            }
            ?>
        </ul>
    </div>

    <?php
}
?>