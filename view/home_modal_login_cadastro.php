<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="./controller/controllerLogin.php" id="login">
                    <div class="form-group">
                        <label>Informe seu e-mail:</label>
                        <input type="text" name="email" class="form-control" placeholder="Seu e-mail">
                    </div>
                    <div class="form-group">
                        <label>Informe sua senha:</label>
                        <input type="password" name="password" class="form-control" placeholder="Sua senha">
                    </div>
                    <button type="submit" class="btn btn-default" name="btn_logar">Entrar</button>
                    <button type="button" class="btn btn-default novoUsuario">Ainda não é cadastrado?</button>
                </form>
                <div class="cadastro">
                    <label for="fisica">Pessoa física</label>
                    <input type="radio" checked="checked" name="tipo" id="fisica">
                    <label for="juridica">Pessoa jurídica</label>
                    <input type="radio" name="tipo" id="juridica">

                    <form method="POST" action="./controller/ControllerUsuarioFisico.php" id="pessoa-fisica">

                        <h4>Pessoa física</h4>
                        <div class="form-group">
                            <label>Informe seu nome:</label>
                            <input type="text" name="name" class="form-control" placeholder="Seu nome">
                        </div>
                        <div class="form-group">
                            <label>Informe seu sobrenome:</label>
                            <input type="text" name="sobrenome" class="form-control" placeholder="Seu sobrenome">
                        </div>
                        <div class="form-group">
                            <label>Informe seu e-mail:</label>
                            <input type="text" name="uf_email" class="form-control" placeholder="Seu e-mail">
                        </div>
                        <div class="form-group">
                            <label>Informe seu telefone:</label>
                            <input type="text" name="uf_telefone" class="form-control" placeholder="Seu telefone">
                        </div>
                        <div class="form-group">
                            <label>Informe seu CPF:</label>
                            <input type="text" name="cpf" class="form-control" placeholder="Seu CPF">
                        </div>
                        <div class="form-group">
                            <label>Sexo:</label>
                            <select name="sexo" class="form-control">
                                <option value="Feminino">Feminino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Informe seu país:</label>
                            <input type="text" name="uf_pais" class="form-control" placeholder="Seu país">
                        </div>
                        <div class="form-group">
                            <label>Informe seu estado:</label>
                            <input type="text" name="uf_estado" class="form-control" placeholder="Seu estado">
                        </div>
                        <div class="form-group">
                            <label>Informe seu cidade:</label>
                            <input type="text" name="uf_cidade" class="form-control" placeholder="Sua cidade">
                        </div>
                        <div class="form-group">
                            <label>Informe seu bairro:</label>
                            <input type="text" name="uf_bairro" class="form-control" placeholder="Seu bairro">
                        </div>
                        <div class="form-group">
                            <label>Informe seu CEP:</label>
                            <input type="text" name="uf_cep" class="form-control" placeholder="Seu CEP">
                        </div>
                        <div class="form-group">
                            <label>Informe seu endereço:</label>
                            <input type="text" name="uf_endereco" class="form-control" placeholder="Seu endereço">
                        </div>
                        <div class="form-group">
                            <label>Informe seu número de endereço:</label>
                            <input type="text" name="uf_endereco_n" class="form-control" placeholder="Seu número de endereço">
                        </div>
                        <div class="form-group">
                            <label>Informe sua senha:</label>
                            <input type="password" name="uf_senha" class="form-control" placeholder="Sua senha">
                        </div>
                        <div class="form-group">
                            <label>Confirme sua senha:</label>
                            <input type="password" name="uf_confimasenha" class="form-control" placeholder="Confirme a senha">
                        </div>
                        <button type="submit" class="btn btn-default" value="Inserir" name="btnInserir">Cadastrar</button>
                        <input type="hidden" name="acao" value="insert" />
                    </form>
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
                </div>
            </div>
        </div>
    </div>
</div>