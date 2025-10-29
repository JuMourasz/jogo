<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Introdução - Caverna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://i.ibb.co/67DKCVHQ/de7120fd518fc6ed6cf00f0ff9b3f8f1.jpg');
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
        <h1>Caverna - Fase 3</h1>
        <p>Na Caverna, enfrente elites mais fortes e gerencie suas vidas com cuidado. Dica: Colete poções de força para batalhas mais fáceis e evite perdas desnecessárias.</p>
        <p>Objetivo: Vença os desafios e avance para o próximo nível.</p>
        <button onclick="startPhase()">Começar Fase</button>
    </div>
    <script>
        function startPhase() { window.location.href = 'fase3.html'; }
    </script>
</body>
</html>