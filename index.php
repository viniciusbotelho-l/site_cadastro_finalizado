<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #e0e0e0;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-wrapper {
            text-align: center;
        }

        h1 {
            color: #2a2a2a;
            margin-bottom: 30px;
        }

        .login-container {
            width: 400px;
            background-color: #f5f5f5;
            border: 1px solid #999999;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .login-container label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #2a2a2a;
            font-weight: bold;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #999999;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4a4a4a;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-container input[type="submit"]:hover {
            background-color: #333333;
        }

        footer {
            margin-top: 30px;
            color: #666666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <h1>Seja bem-vindo</h1>
        <div class="login-container">
            <form action="login.php" method="post" autocomplete="off" onsubmit="return validarFormulario()">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <input type="submit" value="Entrar">
            </form>
        </div>
        <footer>
            &copy; 2025 Sistema de Gerenciamento. Todos os direitos reservados.
        </footer>
    </div>

    <script>
    function validarFormulario() {
        const cpf = document.getElementById("cpf").value.trim();
        const senha = document.getElementById("senha").value;

        const cpfNumeros = cpf.replace(/\D/g, ""); 
        if (cpfNumeros.length !== 11) {
            alert("O CPF deve conter exatamente 11 dígitos.");
            return false; 
        }

        const senhaRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{6,}$/;
        if (!senhaRegex.test(senha)) {
            alert("A senha deve ter no mínimo 6 caracteres e conter:\n- 1 letra maiúscula\n- 1 número\n- 1 caractere especial");
            return false; 
        }

        return true;
    }
    </script>
</body>
</html>

    <script>
    function validarFormulario() {
        const cpf = document.getElementById("cpf").value.trim();
        const senha = document.getElementById("senha").value;

        const cpfNumeros = cpf.replace(/\D/g, ""); 
        if (cpfNumeros.length !== 11) {
            alert("O CPF deve conter exatamente 11 dígitos.");
            return false; 
        }

        const senhaRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{6,}$/;
        if (!senhaRegex.test(senha)) {
            alert("A senha deve ter no mínimo 6 caracteres e conter:\n- 1 letra maiúscula\n- 1 número\n- 1 caractere especial");
            return false; 
        }

        return true;
    }
    </script>
</body>
</html>