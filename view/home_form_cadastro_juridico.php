<form method="POST"  action="./controller/ControllerUsuarioJuridico.php" id="pessoa-juridica">

    <h4>Pessoa jurídica</h4>
    <div class="form-group">
        <label>Informe o nome fantasia:</label>
        <input type="text" name="nome_fantasia" class="form-control" placeholder="Seu nome fantasia">
    </div>
    <div class="form-group">
        <label>Informe seu e-mail:</label>
        <input type="text" name="uj_email" class="form-control" placeholder="Seu e-mail">
    </div>
    <div class="form-group">
        <label>Informe seu telefone:</label>
        <input type="text" name="uj_telefone" class="form-control" placeholder="Seu telefone">
    </div>
    <div class="form-group">
        <label>Informe seu CNPJ:</label>
        <input type="text" name="cnpj" class="form-control" placeholder="Seu CNPJ">
    </div>
    <div class="form-group">
        <label>Informe sua razão social:</label>
        <input type="text" name="razao_social" class="form-control" placeholder="Sua razão social">
    </div>
    <div class="form-group">
        <label>Informe seu país:</label>
        <input type="text" name="uj_pais" class="form-control" placeholder="Seu país">
    </div>
    <div class="form-group">
        <label>Informe seu estado:</label>
        <input type="text" name="uj_estado" class="form-control" placeholder="Seu estado">
    </div>
    <div class="form-group">
        <label>Informe seu cidade:</label>
        <input type="text" name="uj_cidade" class="form-control" placeholder="Sua cidade">
    </div>
    <div class="form-group">
        <label>Informe seu bairro:</label>
        <input type="text" name="uj_bairro" class="form-control" placeholder="Seu bairro">
    </div>
    <div class="form-group">
        <label>Informe seu CEP:</label>
        <input type="text" name="uj_cep" class="form-control" placeholder="Seu CEP">
    </div>
    <div class="form-group">
        <label>Informe seu endereço:</label>
        <input type="text" name="uj_endereco" class="form-control" placeholder="Seu endereço">
    </div>
    <div class="form-group">
        <label>Informe seu número de endereço:</label>
        <input type="text" name="uj_endereco_n" class="form-control" placeholder="Seu número de endereço">
    </div>
    <div class="form-group">
        <label>Informe sua senha:</label>
        <input type="password" name="uj_senha" class="form-control" placeholder="Sua senha">
    </div>
    <div class="form-group">
        <label>Confirme sua senha:</label>
        <input type="password" name="uj_confimasenha" class="form-control" placeholder="Confirme a senha">
    </div>
    <button type="submit" class="btn btn-default" value="Inserir" name="btnInserir">Cadastrar</button>
    <input type="hidden" name="acao" value="insert" />
</form>