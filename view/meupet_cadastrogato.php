<form id="gato" action="./controller/ControllerGato.php?id_usuario=<?= $id_usuario ?>" method="post" enctype="multipart/form-data" name="cadastro" >
    <div class="info">
        <div class="info-left">
            <span>Sua imagem</span>
            <input type="file" name="foto" />
        </div>
        <div class="info-right">
            <input type="text" name="nome" placeholder="Nome">
            <select name="sexo" onchange="showDivS(this)">
                <option value="" disabled selected>Selecione o sexo</option>
                <option value="F">Fêmea</option>
                <option value="M">Macho</option>
            </select>
            <input type="text" name="peso" placeholder="Peso">
            <input type="date" name="data_nascimento" placeholder="Data Nascimento">
            <select name="castracao" onchange="showDivE(this)">
                <option value="" disabled selected>Castrado/Esterelizado</option>
                <option value="S">Sim</option>
                <option value="N">Não</option>
            </select>
            <div id="efemea" style="display: none">
                Ultimo cio: <input type="date" name="cio" placeholder="Data Cio">
                <select name="prenhe">
                    <option value="" disabled selected>Está prenhe/gravida?</option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
            </div>
            <select name="tipo_sanguineo" selected>
                <option value="" disabled  selected>Tipo sanguineo</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="U">Não sei informar</option>
            </select>
            <select name="transfusao">
                <option value="" disabled selected>Seu gato já recebeu sangue (transfusão)?</option>
                <option value="P">Sim</option>
                <option value="N">Não</option>
                <option value="U">Não sei informar</option>
            </select>
            <select name="felv">
                <option value="" disabled selected>Seu gato tem FeLV?</option>
                <option value="P">Positivo</option>
                <option value="N">Negativo</option>
                <option value="U">Não testado</option>
            </select>
            <select name="fiv">
                <option value="" disabled selected>Seu gato tem FIV?</option>
                <option value="P">Positivo</option>
                <option value="N">Negativo</option>
                <option value="U">Não testado</option>
            </select>
            <select name="micoplasma">
                <option value="" disabled selected>Seu gato tem/teve micoplasma?</option>
                <option value="P">Sim</option>
                <option value="N">Não</option>
                <option value="U">Não sei informar</option>
            </select>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <input type="hidden" name="acao" value="insert" />
        </div>
    </div>
</form>