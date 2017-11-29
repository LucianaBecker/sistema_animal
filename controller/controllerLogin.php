<?php

include_once '../model/Usuario.php';
include_once '../model/Login.php';
include_once '../tools/DBHelper.php';

if (isset($_REQUEST['btn_logar'])) {
    $email = $_REQUEST['email'];
    $senha = $_REQUEST['password'];

    $user = new Usuario();
    $res = array();
    $res = $user->AutenticaUser($email, $senha);
    foreach ($res as $value) {
        $idUser = $value['id_usuario'];
    }
    if ($idUser > 0) {
        Login::criaSessao($idUser);
    } else {
        $msg = urlencode('Efetue o login. Erro 1.');
        header("location: ../index.php?msg=$msg");
    }
} else {
    $msg = urlencode('Efetue o login. Erro 2.');
    header("location: ../index.php?msg=$msg");
}
?>