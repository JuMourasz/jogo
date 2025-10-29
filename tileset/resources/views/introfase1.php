<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Introdução - Campo</title>
    <style>
        body { font-family: Arial, sans-serif; background-image: url('https://i.ibb.co/ZPT4NmV/rpg.jpg'); /* Fundo temático */ background-size: cover; color: white; text-align: center; padding: 50px; }
        .intro-box { background: rgba(0,0,0,0.7); padding: 20px; border-radius: 10px; max-width: 600px; margin: auto; }
        button { padding: 10px 20px; margin: 10px; background: #333; color: white; border: none; cursor: pointer; }
        button:hover { background: #555; }
    </style>
</head>
<body>
    <div class="intro-box">
        <h1>Campo - Fase 1</h1>
        <p>Bem-vindo ao Campo, o início da sua jornada! Enfrente inimigos básicos e colete poções para buffs. Dica: Use as setas para mover e evite os spikes para não perder vidas.</p>
        <p>Objetivo: Derrote todos os inimigos e alcance a porta para avançar.</p>
        <button onclick="startPhase()">Começar Fase</button>
    </div>
    <script>
        function startPhase() { window.location.href = 'fase1.html'; }
    </script>
</body>
</html>