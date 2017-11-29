<?php

$random = md5(uniqid(time()));
$to = "luciana.407@hotmail.com"; //email tutor doador

date_default_timezone_set('America/Sao_Paulo');
$date = date('d/m/Y');
$data_expira = date('d/m/Y', strtotime($data . ' + 7 days'));
$datamysql = implode("-", array_reverse(explode("/", $data_expira)));

echo "<br> mysql: " . $datamysql;
$objeto = new Doacao();
if ($objeto->insertRandomAvaliacao($random, $datamysql, $id_animal_doador, $id_animal_receptor)) {

    $link = "http://localhost/SVAT2/avaliacao.php?random=" . $random . "&id_avaliador=" . $id_animal_doador . "&id_avaliado=" . $id_animal_receptor;

    $assunto = "Avalie sua experiencia de doação de sangue";
    $mensagem = "Olá, $nome_doador tudo bem? Agradecemos por ter ajudado um pet que precisa."
            . "Agora gostaríamos que avaliasse o tutor do pet que recebeu o sangue. É um processo rápido que nos ajuda muito."
            . "LINK PARA AVALIAÇÃO: " . $link;

    mail($to, $assunto, $mensagem);
} else {
    
}
?>

