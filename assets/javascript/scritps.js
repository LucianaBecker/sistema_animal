/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//GATOS!!!
var sex = 'F';
var est = 'N';
function showDivS(elem) {
    sex = elem.value;
    showT();
}

function showDivE(elem) {
    est = elem.value;
    showT();
}

function showT(elem) {
    if ((est == 'N') && (sex == 'F')) {
        document.getElementById('efemea').style.display = "block";
    } else {
        document.getElementById('efemea').style.display = "none";
    }

}

//CAES
var sexC = 'F';
var estC = 'N';
function showDivSC(elem) {
    sexC = elem.value;
    showTC();
}

function showDivEC(elem) {
    estC = elem.value;
    showTC();
}

function showTC(elem) {
    if ((estC == 'N') && (sexC == 'F')) {
        document.getElementById('efemeacao').style.display = "block";
    } else {
        document.getElementById('efemeacao').style.display = "none";
    }

}


function deletarConteudo(idConteudo, idUsuario) {
    if (confirm('Realmente deseja excluir?'))
        document.location.href = './controller/ControllerConteudo.php?acao=delete&id_conteudo=' + idConteudo + '&id_usuario=' + idUsuario;
}
