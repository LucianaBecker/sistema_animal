<?php

include_once '../model/Login.php';
Login::destroySessao();
header('location: ../index.php');
?>
