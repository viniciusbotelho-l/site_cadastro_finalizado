<?php
include("valida.php");
?>
<html>
<head>    
    <title>Cadastro de Gêneros</title>
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

        /* Menu fixo lateral esquerdo */
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
            <li><a href="cadastroGeneros.php">Cadastro de Gêneros</a></li>
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
                <h2>Cadastrar Gêneros</h2>
                <form method="post" action="inserirGeneros.php" autocomplete="off" onsubmit="return validarCadastro()">
                    GÊNERO: <input type="text" name="genero"><br>
                    DESCRIÇÃO: <input type="text" name="descricao"><br>
                    <input type="submit" value="Inserir">
                </form>

                <script>
                function validarCadastro() {
                    const generoInput = document.querySelector('form[action="inserirGeneros.php"] input[name="genero"]');
                    const descricaoInput = document.querySelector('form[action="inserirGeneros.php"] input[name="descricao"]');

                    const genero = generoInput.value.trim();
                    const descricao = descricaoInput.value.trim();

                    if (genero.length === 0) {
                        alert("O campo Gênero não pode ficar vazio.");
                        generoInput.focus();
                        return false;
                    }

                    if (descricao.length === 0) {
                        alert("O campo Descrição não pode ficar vazio.");
                        descricaoInput.focus();
                        return false;
                    }

                    return true;
                }
                </script>

                <hr>

                <?php
                include("conexao.php");
                
                $sql = "select genero, descricao from generos";
                if(!$resultado = $conn->query($sql)){
                    die("erro");
                }
                ?>

                <table>
                    <tr>
                        <td>GÊNERO</td>
                        <td>DESCRIÇÃO</td>    
                        <td>ALTERAR</td>
                        <td>EXCLUIR</td>
                    </tr>
                    <?php
                    while($row = $resultado->fetch_assoc()){
                    ?>
                    <tr>
                        <form method="post" action="alterarGeneros.php" onsubmit="return validarAlteracao(this)">
                            <input type="hidden" name="generoAnterior" value="<?=$row['genero'];?>">
                            <td><input type="text" name="genero" value="<?=$row['genero'];?>"></td>
                            <td><input type="text" name="descricao" value="<?=$row['descricao'];?>"></td>    
                            <td><input type="submit" value="Alterar"></td>
                        </form>
                        <form method="post" action="apagarGeneros.php">
                            <input type="hidden" name="genero" value="<?=$row['genero'];?>">
                            <td><input type="submit" value="Apagar"></td>
                        </form>
                    </tr>
                    <?php
                    }
                    ?>
                </table>

                <script>
                function validarAlteracao(form) {
                    const genero = form.genero.value.trim();
                    const descricao = form.descricao.value.trim();

                    if(genero.length === 0) {
                        alert("Gênero não pode ficar vazio.");
                        form.genero.focus();
                        return false;
                    }

                    if(descricao.length === 0) {
                        alert("Descrição não pode ficar vazia.");
                        form.descricao.focus();
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