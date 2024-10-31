document.addEventListener("DOMContentLoaded", function () {
    // Seleciona o formulário
    const form = document.querySelector("form");

    // Adiciona um evento de 'submit' para validar os campos antes de enviar
    form.addEventListener("submit", function (event) {
        // Pega os valores dos campos
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const details = document.getElementById("details").value.trim();

        // Expressão regular para validar o formato do email
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

        // Verifica se os campos estão preenchidos
        if (name === "" || email === "") {
            alert("Por favor, preencha todos os campos obrigatórios.");
            event.preventDefault(); // Impede o envio do formulário
            return;
        }

        // Verifica o formato do email
        if (!emailPattern.test(email)) {
            alert("Por favor, insira um endereço de email válido.");
            event.preventDefault(); // Impede o envio do formulário
            return;
        }

        // Se tudo estiver OK, exibe uma mensagem de confirmação
        alert("Cadastro realizado com sucesso!");
    });
});
