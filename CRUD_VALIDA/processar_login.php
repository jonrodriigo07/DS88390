<?php
// Configurações do banco de dados
$servername = "localhost"; // Servidor do banco de dados
$username = "root"; // Usuário do banco de dados
$password = "";   // Senha do banco de dados
$dbname = "dados_pessoas";  // Nome do banco de dados

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtendo os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Prepara e executa a consulta
$sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $senha); // "ss" indica que ambos os parâmetros são strings
$stmt->execute();
$result = $stmt->get_result();

// Verifica se o usuário foi encontrado
if ($result->num_rows > 0) {
    // Inicia a sessão
    session_start();
    $_SESSION['email'] = $email; // Armazena o email na sessão
    echo "<div style='background-color: #003366; color: white; padding: 20px; text-align: center;'>
            Login realizado com sucesso! Você será redirecionado para a página inicial.
          </div>";
    header("refresh:3; cad.html"); // Redireciona após 3 segundos
} else {
    echo "<div style='background-color: #FF0000; color: white; padding: 20px; text-align: center;'>
            Login falhou! Email ou senha incorretos. Você será redirecionado para a página de login.
          </div>";
    header("refresh:3; index.html"); // Redireciona após 3 segundos
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>