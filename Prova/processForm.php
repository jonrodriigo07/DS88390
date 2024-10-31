<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $details = htmlspecialchars(trim($_POST["details"]));

    // Verifica se os campos estão preenchidos
    if (empty($name) || empty($email)) {
        echo "<h2>Por favor, preencha todos os campos obrigatórios.</h2>";
    } else {
        // Exibe uma mensagem de sucesso
        echo "<h2>Obrigado, $name! Seu cadastro foi realizado com sucesso.</h2>";
        echo "<p>Email cadastrado: $email</p>";
        echo "<p>Detalhes: $details</p>";

        // Aqui você pode adicionar o código para salvar no banco de dados, enviar email, etc.
    }
} else {
    // Caso o usuário tente acessar o script diretamente sem enviar o formulário
    echo "<h2>Acesso inválido.</h2>";
}
?>
