<?php
include("valida.php");
?>
<html>
<head>    
    <title>Página Principal</title>
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
            min-height: 500px;
        }

        .conteudo h2 {
            color: #2a2a2a;
            margin-bottom: 20px;
            border-bottom: 2px solid #666666;
            padding-bottom: 10px;
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
                <h2>Página Principal</h2>
                <p>Bem-vindo ao sistema de gerenciamento, <strong><?=$_SESSION['nome'];?></strong>!</p>
            </div>
        </div>
    </div>
</body>
</html>