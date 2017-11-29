<div class="header">
    <span>Meu perfil</span>
</div>
<form id="cadastro_conteudo" action="./controller/ControllerUsuarioFisico.php?id_usuario=<?= $valueUser['id_usuario'] ?>" method="post" enctype="multipart/form-data" name="cadastro" >
      <div class="info">
        <div class="info-left">
            <span><img src="./assets/upload_images/user_images/<?= $valueUser["foto"] ?>" class="img-responsive" style="max-width: 250px" /></span>
            <input type="file" name="foto" />
        </div>
        <div class="info-right">
            <input type="text" name="nome" value="<?= $valueUser["nome"] ?>">
            <input type="text" name="sobrenome" value="<?= $valueUser["sobrenome"] ?>">
            <select name="sexo">
                <option value="" disabled >Sexo</option>
                <option value="F" <?php if ($valueUser["sexo"] == 'F') { ?> selected <?php } ?>>Feminino</option>
                <option value="M" <?php if ($valueUser["sexo"] == 'M') { ?> selected <?php } ?>>Masculino</option>
            </select>
            <input type="text" name="cpf" value="<?= $valueUser["cpf"] ?>">
            <input type="text" name="email" value="<?= $valueUser["email"] ?>">
            <input type="text" name="telefone" value="<?= $valueUser["telefone"] ?>">
            <input type="text" name="pais" value="<?= $valueUser["pais"] ?>">
            <input type="text" name="estado" value="<?= $valueUser["estado"] ?>">
            <input type="text" name="cidade" value="<?= $valueUser["cidade"] ?>">
            <input type="text" name="cep" value="<?= $valueUser["cep"] ?>">
            <input type="text" name="bairro" value="<?= $valueUser["bairro"] ?>">
            <input type="text" name="endereco" value="<?= $valueUser["endereco"] ?>">
            <input type="text" name="endereco_n" value="<?= $valueUser["endereco_numero"] ?>">

            <button class="btn btn-primary" type="submit">Salvar</button>
            <input type="hidden" name="acao" value="update" />
        </div>
    </div>
</form>
