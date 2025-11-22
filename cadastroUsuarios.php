<?php
include("valida.php");
?>
<html>
<head>    
    <title>Cadastro de Filmes</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #e0e0e0;
            display: flex;
        }

   
        .menu-lateral {
            width: 220px;
            background: #2a2a2a;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
        }

        .menu-lateral ul {
            list-style: none;
            padding: 20px 0;
        }

        .menu-lateral li {
            margin: 0;
        }

        .menu-lateral a {
            color: #ffffff;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
            transition: background 0.3s ease;
        }

        .menu-lateral a:hover {
            background: #444444;
        }

     
        .container {
            margin-left: 220px;
            width: calc(100% - 220px);
            padding: 20px;
        }

        .conteudo-wrapper {
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            background: #3a3a3a;
            color: white;
            padding: 15px 20px;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header .sair {
            background: #666666;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background 0.3s ease;
        }

        .header .sair:hover {
            background: #555555;
        }

        .header a {
            color: white;
            text-decoration: none;
        }

 
        .conteudo {
            background: #f5f5f5;
            padding: 30px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .conteudo h2 {
            color: #2a2a2a;
            margin-bottom: 20px;
            border-bottom: 2px solid #666666;
            padding-bottom: 10px;
        }


        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #999999;
            border-radius: 3px;
            margin: 5px 10px 5px 5px;
            width: 250px;
        }

        input[type="submit"] {
            background: #4a4a4a;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #333333;
        }

        hr {
            border: none;
            border-top: 1px solid #cccccc;
            margin: 20px 0;
        }

   
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table tr {
            border-bottom: 1px solid #dddddd;
        }

        table tr:first-child {
            background: #4a4a4a;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background: #ffffff;
        }

        table tr:nth-child(odd) {
            background: #fafafa;
        }

        table td {
            padding: 10px;
        }

        table tr:first-child td {
            padding: 12px 10px;
        }

        table input[type="text"] {
            width: 100%;
            margin: 0;
        }

        table input[type="submit"] {
            padding: 6px 15px;
        }
    </style>
</head>
<body>
 
    <nav class="menu-lateral">
        <ul>
            <li><a href="principal.php">Início</a></li>
            <li><a href="cadastroUsuarios.php">Cadastro de Usuários</a></li>
            <li><a href="cadastroGeneros.php">Cadastro de Generos</a></li>
            <li><a href="cadastroFilmes.php">Cadastro de Filmes</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="conteudo-wrapper">

            <div class="header">
                <span>Olá <?=$_SESSION['nome'];?></span>
                <span class="sair"><a href="sair.php">SAIR</a></span>
            </div>

         
            <div class="conteudo">
                <h2>Cadastrar Usuários</h2>
                <form method="post" action="inserirUsuarios.php" autocomplete="off" onsubmit="return validarCadastro()">
                    CPF: <input type="text" name="cpf"><br>
                    SENHA: <input type="text" name="senha"><br>
                    NOME: <input type="text" name="nome"><br>
                    <input type="submit" value="Inserir">
                </form>

                <script>
                function validarCadastro() {
                    const cpfInput = document.querySelector('form[action="inserirUsuarios.php"] input[name="cpf"]');
                    const senhaInput = document.querySelector('form[action="inserirUsuarios.php"] input[name="senha"]');
                    const nomeInput = document.querySelector('form[action="inserirUsuarios.php"] input[name="nome"]');

                    const cpf = cpfInput.value.trim();
                    const senha = senhaInput.value;
                    const nome = nomeInput.value.trim();

                    const cpfNumeros = cpf.replace(/\D/g, '');
                    if (cpfNumeros.length !== 11) {
                        alert("O CPF deve conter exatamente 11 dígitos.");
                        cpfInput.focus();
                        return false;
                    }

                    const senhaRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{6,}$/;
                    if (!senhaRegex.test(senha)) {
                        alert("A senha deve ter no mínimo 6 caracteres e conter:\n- 1 letra maiúscula\n- 1 número\n- 1 caractere especial");
                        senhaInput.focus();
                        return false;
                    }

                    if (nome.length === 0) {
                        alert("O campo Nome não pode ficar vazio.");
                        nomeInput.focus();
                        return false;
                    }

                    return true;
                }
                </script>

                <hr>

                <?php
                include("conexao.php");
                
                $sql = "select nome,cpf,senha from usuarios";
                if(!$resultado = $conn->query($sql)){
                    die("erro");
                }
                ?>

                <table>
                    <tr>
                        <td>CPF</td>
                        <td>SENHA</td>
                        <td>NOME</td>    
                        <td>ALTERAR</td>
                        <td>EXCLUIR</td>
                    </tr>
                    <?php
                    while($row = $resultado->fetch_assoc()){
                    ?>
                    <tr>
                        <form method="post" action="alterarUsuario.php" onsubmit="return validarAlteracao(this)">
                            <input type="hidden" name="cpfAnterior" value="<?=$row['cpf'];?>">
                            <td><input type="text" name="cpf" value="<?=$row['cpf'];?>"></td>
                            <td><input type="text" name="senha" value="<?=$row['senha'];?>"></td>
                            <td><input type="text" name="nome" value="<?=$row['nome'];?>"></td>    
                            <td><input type="submit" value="Alterar"></td>
                        </form>
                        <form method="post" action="apagarUsuario.php">
                            <input type="hidden" name="cpf" value="<?=$row['cpf'];?>">
                            <td><input type="submit" value="Apagar"></td>
                        </form>
                    </tr>
                    <?php
                    }
                    ?>
                </table>

                <script>
                function validarAlteracao(form) {
                    const cpf = form.cpf.value.replace(/\D/g, '');
                    if(cpf.length !== 11) {
                        alert("CPF deve ter 11 dígitos.");
                        form.cpf.focus();
                        return false;
                    }

                    const senha = form.senha.value;
                    if(senha.length < 6) {
                        alert("Senha deve ter no mínimo 6 caracteres.");
                        form.senha.focus();
                        return false;
                    }
                    const regexSenha = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).+$/;
                    if(!regexSenha.test(senha)) {
                        alert("Senha deve conter pelo menos uma letra maiúscula, um número e um caractere especial.");
                        form.senha.focus();
                        return false;
                    }

                    return true;
                }
                </script>
            </div>
        </div>
    </div>
</body>
</html>