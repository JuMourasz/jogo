<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>O Caminho Proibido</title>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      background: #000 url("https://i.ibb.co/ZPT4NmV/rpg.jpg") no-repeat center/cover;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
      user-select: none;
    }

    .menu-container {
      position: relative;
      width: 800px;
      height: 600px;
      background: rgba(0, 0, 0, 0.7);
      border: 4px solid #333;
      border-radius: 8px;
      box-shadow: 0 0 20px rgb(30, 60, 30);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: #aaffaa;
    }

    .title {
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 40px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
      color: #ffffaa;
    }

    .subtitle {
      font-size: 24px;
      margin-bottom: 60px;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
    }

    .start-button {
      padding: 20px 40px;
      font-size: 28px;
      font-weight: bold;
      background-color: #228822;
      color: white;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      user-select: none;
    }

    .start-button:hover {
      background-color: #44cc44;
      transform: scale(1.05);
    }

    .instructions {
      margin-top: 40px;
      font-size: 16px;
      max-width: 600px;
      line-height: 1.5;
      opacity: 0.9;
    }
  </style>
</head>
<body>
  <div class="menu-container">
  <h1 class="title">O Caminho Proibido</h1>
  <p class="subtitle">Uma aventura épica espera por você!</p>
  <button class="start-button" onclick="startGame()">Iniciar Jogo</button>
  <button class="start-button" onclick="selectPhases()" style="margin-top: 20px;">Selecionar Fase</button>  <!-- Novo botão -->
  <div class="instructions">
    <p>Use as setas do teclado para mover seu personagem pelo mapa.</p>
    <p>Aproxime-se dos inimigos (X) para iniciar batalhas. Derrote-os para avançar!</p>
    <p>Chegue à porta verde para vencer e prosseguir para a próxima fase.</p>
  </div>
</div>

  <script>
    function startGame() {
      window.location.href = "{{ route('historia') }}";
    }

    document.addEventListener('selectstart', function(e) { e.preventDefault(); });
    document.addEventListener('contextmenu', function(e) { e.preventDefault(); });
    function selectPhases() {
  
}
  </script>
</body>
</html>
