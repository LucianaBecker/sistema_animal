<form id="gato" action="./controller/ControllerCao.php?id_usuario=<?= $id_usuario ?>" method="post" enctype="multipart/form-data" name="cadastro" >
    <div class="info">
        <div class="info-left">
            <span>Sua imagem</span>
            <input type="file" name="foto" />
        </div>
        <div class="info-right">
            <input type="text" name="nome" placeholder="Nome">
            <select name="sexo" onchange="showDivSC(this)">
                <option value="" disabled selected>Selecione o sexo</option>
                <option value="F">Fêmea</option>
                <option value="M">Macho</option>
            </select>
            <input type="text" name="peso" placeholder="Peso">
            <input type="date" name="data_nascimento" placeholder="Data Nascimento">
            <select name="castracao" onchange="showDivEC(this)">
                <option value="" disabled selected>Castrado/Esterelizado</option>
                <option value="S">Sim</option>
                <option value="N">Não</option>
            </select>
            <div id="efemeacao" style="display: none">
                Ultimo cio: <input type="date" name="cio" placeholder="Data Cio">
                <select name="prenhe">
                    <option value="" disabled selected>Está prenhe/gravida?</option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
            </div>
            <select name="tipo_sanguineo">
                <option value="" disabled selected>Tipo sanguineo</option>
                <option value="DEA 1.1">DEA 1.1</option>
                <option value="DEA 1.2">DEA 1.2</option>
                <option value="DEA 1.3">DEA 1.3</option>
                <option value="DEA 3">DEA 3</option>
                <option value="DEA 4">DEA 4</option>
                <option value="DEA 5">DEA 5</option>
                <option value="DEA 7">DEA 7</option>
                <option value="U">Não sei informar</option>
            </select>
            <select name="transfusao">
                <option value="" disabled selected>Seu cão já recebeu sangue (transfusão)?</option>
                <option value="P">Sim</option>
                <option value="N">Não</option>
                <option value="U">Não sei informar</option>
            </select>
            <select name="hemoparasitose">
                <option value="" disabled selected>Seu cão já teve hemoparasitose?</option>
                <option value="P">Sim</option>
                <option value="N">Não</option>
                <option value="U">Não sei informar</option>
            </select>

            Datado ultimo controle de carrapatos: <input type="date" name="controle_carrapatos">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <input type="hidden" name="acao" value="insert" />
        </div>
    </div>
</form>