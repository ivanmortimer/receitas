<?php
// Define o endereço de destino do e-mail
$destinatario = "ivanmortimer@yahoo.com.br"; // Substitua pelo seu e-mail

// Coleta os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['e_mail'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

// Verifica se todos os campos obrigatórios foram preenchidos
if (empty($nome) || empty($email) || empty($cep) || empty($rua) || empty($numero) || empty($complemento) || empty($cidade) || empty($estado)) {
    echo "Por favor, preencha todos os campos.";
    exit;
}

// Formata o corpo do e-mail
$mensagem = "
    Nome: $nome
    E-mail: $email
    CEP: $cep
    Rua: $rua
    Número: $numero
    Complemento: $complemento
    Cidade: $cidade
    Estado: $estado
";

// Define os cabeçalhos do e-mail
$headers = "From: $email" . "\r\n" .
           "Reply-To: $email" . "\r\n" .
           "X-Mailer: PHP/" . phpversion();

// Envia o e-mail
if (mail($destinatario, "Novo Cadastro - $nome", $mensagem, $headers)) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Ocorreu um erro ao enviar o e-mail. Tente novamente mais tarde.";
}
?>
