<?php

include_once './../tools/DBHelper.php';
include_once 'Usuario.php';

abstract class Login {

    private static function GetConexao() {
        $db = new DBHelper();
        return $db->Connect();
    }

    private static function VerificaLogin($login, $senha) {
        $user = new Usuario();
        $array = $user->AutenticaUser($login, $senha);
        $id_usuario = $array['idusuario'];
        self::criaSessao($id_usuario);
    }

    public static function CriaSessao($objUser, $objTipo) {
        self::acessaSessao();
        $_SESSION['status'] = 'logado';
        $_SESSION['id_usuario'] = $objUser;
        header("Location: ../dashboard.php?id_usuario=$objUser");
    }

    public static function DestroySessao() {
        session_start();
        session_destroy();
    }

    public static function VerificaSessao() {
        self::acessaSessao();

        if (!isset($_SESSION['status']) || ($_SESSION['status'] != 'logado')) {
            //$msg = urlencode('Efetue o login.');
            ?>
            <script type="text/javascript">
                alert('Efetue o login.');
                location.href = '/petagenda/view/home.php';
            </script>
            <?php

            //header("location: ../view/home.php?msg=$msg");
        } else {
            ?>
            <script type="text/javascript">
                alert('ESTA LOGADO');
            </script>
            <?php

            return TRUE;
        }
    }

    public static function acessaSessao() {
        session_start();
    }

}
?>
