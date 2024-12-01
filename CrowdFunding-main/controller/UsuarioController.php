<?php

// Inclua os modelos e configurações necessárias
require_once '../models/Usuario.php';

class CadastroController
{
    // Método para exibir o formulário de cadastro
    public function exibirFormulario()
    {
        include '../views/cadastro_form.php';
    }

    // Método para processar os dados do formulário
    public function cadastrar()
    {
        // Verifique se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtenha os dados do formulário
            $nome = trim($_POST['nome']);
            $email = trim($_POST['email']);
            $senha = trim($_POST['senha']);
            
            // Validação simples (você pode adicionar mais validações conforme necessário)
            if (empty($nome) || empty($email) || empty($senha)) {
                echo "Todos os campos são obrigatórios.";
                return;
            }

            // Crie um objeto Usuário
            $usuario = new Usuario();
            $usuario->getEmail($email);
            $usuario->getSenha($senha);
            $usuario->getCnpj($cnpj);
            $usuario->getCpf($cpf);

            // Tente salvar o usuário
            if ($usuario->salvar()) {
                // Redirecione para a página de sucesso
                header("Location: /views/cadastro_sucesso.php");
                exit();
            } else {
                echo "Erro ao cadastrar o usuário.";
            }
        }
    }
}
?>
