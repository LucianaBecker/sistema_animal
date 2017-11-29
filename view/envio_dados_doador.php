<?php


$to = "luciana.407@hotmail.com"; //email tutor doador

$assunto = "Dados do tutor - $nome_receptor - $pet_receptor";
$mensagem = "Olá $nome_doador, ficamos felizes que tenha disponibilidade de fazer a doação para um pet que precisa."
        . "Segue os daods do tutor:"
        . "Nome: $nome_receptor"
        . "Endereço: $endereco_receptor"
        . "Email: $email_receptor"
        . "Telefone: $telefone_receptor"
        . "Torcemos para que dê tudo certo."
        . "Em breve você receberá um e-mail onde poderá avaliar no prazo de 1 semana como foi o processo de doação de sangue.";

mail($to, $assunto, $mensagem);

?>