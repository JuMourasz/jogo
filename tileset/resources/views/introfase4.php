<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Introdução - Abismo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://i.ibb.co/TDWZP1V6/fundo4.jpg');
            background-size: cover;
            background-position: center;
            color: #ffffff;
            text-align: center;
            padding: 50px;
            margin: 0;
        }
        .intro-box {
            background: rgba(0,0,0,0.7);
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
        }
        h1 { margin-bottom: 20px; }
        p { line-height: 1.5; }
        button {
            padding: 10px 20px;
            margin: 10px;
            background: #333;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover { background: #555; }
    </style>
</head>
<body>
    <div class="intro-box">
        <h1>Abismo - Fase 4</h1>
        <p>O Abismo é o desafio final, com teleportes aleatórios e mais inimigos! Prepare-se para o caos. Dica: Use buffs estrategicamente e mantenha foco para sobreviver.</p>
        <p>Objetivo: Complete a jornada e vença o jogo.</p>
        <button onclick="startPhase()">Começar Fase</button>
    </div>
    <script>
        function startPhase() { window.location.href = 'fase4.html'; }
    </script>
</body>
</html>