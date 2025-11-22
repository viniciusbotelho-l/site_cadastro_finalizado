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

        /* Container principal */
        .container {
            margin-left: 220px;
            width: calc(100% - 220px);
            padding: 20px;
        }

        .conteudo-wrapper {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Cabeçalho com saudação */
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

        /* Conteúdo principal */
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

        /* Formulário */
        form {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="number"], select {
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

        /* Tabela */
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

        table input[type="text"], table input[type="number"], table select {
            width: 100%;
            margin: 0;
        }

        table input[type="submit"] {
            padding: 6px 15px;
        }
    </style>
</head>
<body>
    <!-- Menu lateral esquerdo -->
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
            <!-- Cabeçalho com saudação -->
            <div class="header">
                <span>Olá <?=$_SESSION['nome'];?></span>
                <span class="sair"><a href="sair.php">SAIR</a></span>
            </div>

            <!-- Conteúdo principal -->
            <div class="conteudo">
                <h2>Cadastrar Filmes</h2>
                <form method="post" action="inserirFilme.php" autocomplete="off" onsubmit="return validarCadastro()">
                    NOME: <input type="text" name="nome"><br>
                    ANO: <input type="number" name="ano"><br>
                    GÊNERO: 
                    <select name="genero">
                        <option value="">Selecione...</option>
                        <?php
                        include("conexao.php");
                        $sqlGeneros = "select genero, descricao from generos order by descricao";
                        $resultGeneros = $conn->query($sqlGeneros);
                        while($genRow = $resultGeneros->fetch_assoc()){
                            echo "<option value='".$genRow['genero']."'>".$genRow['descricao']."</option>";
                        }
                        ?>
                    </select><br>
                    <input type="submit" value="Inserir">
                </form>

                <script>
                function validarCadastro() {
                    const nomeInput = document.querySelector('form[action="inserirFilme.php"] input[name="nome"]');
                    const anoInput = document.querySelector('form[action="inserirFilme.php"] input[name="ano"]');
                    const generoSelect = document.querySelector('form[action="inserirFilme.php"] select[name="genero"]');

                    const nome = nomeInput.value.trim();
                    const ano = anoInput.value;
                    const genero = generoSelect.value;

                    if (nome.length === 0) {
                        alert("O campo Nome não pode ficar vazio.");
                        nomeInput.focus();
                        return false;
                    }

                    if (ano.length === 0) {
                        alert("O campo Ano não pode ficar vazio.");
                        anoInput.focus();
                        return false;
                    }

                    if (genero === "") {
                        alert("Selecione um gênero.");
                        generoSelect.focus();
                        return false;
                    }

                    return true;
                }
                </script>

                <hr>

                <?php
                $sql = "select f.filme, f.nome, f.ano, f.genero, g.descricao 
                        from filmes f 
                        inner join generos g on f.genero = g.genero 
                        order by f.filme";
                if(!$resultado = $conn->query($sql)){
                    die("erro");
                }
                ?>

                <table>
                    <tr>
                        <td>NOME</td>
                        <td>ANO</td>
                        <td>GÊNERO</td>    
                        <td>ALTERAR</td>
                        <td>EXCLUIR</td>
                    </tr>
                    <?php
                    while($row = $resultado->fetch_assoc()){
                    ?>
                    <tr>
                        <form method="post" action="alterarFilme.php" onsubmit="return validarAlteracao(this)">
                            <input type="hidden" name="filmeId" value="<?=$row['filme'];?>">
                            <td><input type="text" name="nome" value="<?=$row['nome'];?>"></td>
                            <td><input type="number" name="ano" value="<?=$row['ano'];?>"></td>
                            <td>
                                <select name="genero">
                                    <?php
                                    $sqlGeneros2 = "select genero, descricao from generos order by descricao";
                                    $resultGeneros2 = $conn->query($sqlGeneros2);
                                    while($genRow2 = $resultGeneros2->fetch_assoc()){
                                        $selected = ($genRow2['genero'] == $row['genero']) ? 'selected' : '';
                                        echo "<option value='".$genRow2['genero']."' $selected>".$genRow2['descricao']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>    
                            <td><input type="submit" value="Alterar"></td>
                        </form>
                        <form method="post" action="apagarFilme.php">
                            <input type="hidden" name="filme" value="<?=$row['filme'];?>">
                            <td><input type="submit" value="Apagar"></td>
                        </form>
                    </tr>
                    <?php
                    }
                    ?>
                </table>

                <script>
                function validarAlteracao(form) {
                    const nome = form.nome.value.trim();
                    const ano = form.ano.value;
                    const genero = form.genero.value;

                    if(nome.length === 0) {
                        alert("Nome não pode ficar vazio.");
                        form.nome.focus();
                        return false;
                    }

                    if(ano.length === 0) {
                        alert("Ano não pode ficar vazio.");
                        form.ano.focus();
                        return false;
                    }

                    if(genero === "") {
                        alert("Selecione um gênero.");
                        form.genero.focus();
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