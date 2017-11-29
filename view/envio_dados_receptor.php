<?php


$to = "luciana.407@hotmail.com"; //email tutor doador

$assunto = "Dados do tutor - $nome_doador - $pet_doador";
$mensagem = "Olá $nome_receptor, o tutor do $pet_doador concordou em realizar a doação de sangue. Segue abaixo os dados:"
        . "Segue os dados do tutor:"
        . "Nome: $nome_doador"
        . "Endereço: $endereco_doador"
        . "Email: $email_doador"
        . "Telefone: $telefone_doador"
        . "Torcemos para que dê tudo certo. Muita saúde para o seu pet!"
        . "Em breve você receberá um e-mail onde poderá avaliar no prazo de 1 semana como foi o processo de doação de sangue.";

mail($to, $assunto, $mensagem);
?>