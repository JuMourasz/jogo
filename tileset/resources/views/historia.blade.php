<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>O Caminho Proibido - História em Quadrinhos</title>
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
      overflow: hidden; 
    }

    .comic-container {
      position: relative;
      width: 800px;
      height: 600px;
      background: rgba(0, 0, 0, 0.9);
      border: 4px solid #333;
      border-radius: 8px;
      box-shadow: 0 0 20px rgb(30, 60, 30);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: #aaffaa;
      padding: 20px;
    }

    .panel {
      position: absolute;
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      opacity: 0;
      transform: scale(0.8);
      transition: opacity 1s ease, transform 1s ease;
      background: rgba(0, 0, 0, 0.8);
      border-radius: 8px;
      padding: 20px;
    }

    .panel.active {
      opacity: 1;
      transform: scale(1);
    }

    .character {
      width: 120px;
      height: 120px;
      background: url("https://i.ibb.co/JFtsNsYv/pessoa-removebg-preview.png") no-repeat center/cover;
      margin-bottom: 20px;
      border-radius: 8px;
      border: 2px solid #228822;
      animation: float 2s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    .speech-bubble {
      background: #ffffaa;
      color: #000;
      padding: 15px;
      border-radius: 15px;
      position: relative;
      max-width: 600px;
      font-size: 18px;
      line-height: 1.5;
      text-shadow: none;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .speech-bubble::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 0;
      border-left: 10px solid transparent;
      border-right: 10px solid transparent;
      border-top: 10px solid #ffffaa;
    }

    .narrative-text {
      font-size: 16px;
      color: #aaffaa;
      max-width: 700px;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
      animation: typewriter 3s steps(40, end) forwards;
      overflow: hidden;
      white-space: nowrap;
      border-right: 2px solid #aaffaa;
    }

    @keyframes typewriter {
      from { width: 0; }
      to { width: 100%; }
    }

    .back-button {
      position: absolute;
      bottom: 20px;
      right: 20px;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      background-color: #228822;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      user-select: none;
      opacity: 0;
      animation: fadeIn 1s ease 5s forwards; 
    }

    .back-button:hover {
      background-color: #44cc44;
      transform: scale(1.05);
    }

    @keyframes fadeIn {
      to { opacity: 1; }
    }

    .skip-button {
      position: absolute;
      top: 20px;
      right: 20px;
      padding: 8px 16px;
      font-size: 14px;
      background-color: #ff4444;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .skip-button:hover {
      background-color: #ff6666;
    }
  </style>
</head>
<body>
  <div class="comic-container" role="main" aria-label="História em quadrinhos do jogo">
    <!-- Painel 1 -->
    <div class="panel active" id="panel1">
      <div class="character"></div>
      <div class="speech-bubble">
        <p>"Eu sou um aventureiro solitário, atraído por lendas antigas. Hoje, enfrento o Caminho Proibido..."</p>
      </div>
      <div class="narrative-text">Em um mundo de mistérios, você descobre um portal antigo que leva a reinos proibidos.</div>
    </div>

    <!-- Painel 2 -->
    <div class="panel" id="panel2">
      <div class="character" style="transform: scaleX(-1);"></div> <!-- Virado para a direita -->
      <div class="speech-bubble">
        <p>"Inimigos espreitam no campo aberto. Devo derrotá-los para avançar!"</p>
      </div>
      <div class="narrative-text">No Campo, enfrente inimigos básicos e alcance a primeira porta.</div>
    </div>

    <!-- Painel 3 -->
    <div class="panel" id="panel3">
      <div class="character"></div>
      <div class="speech-bubble">
        <p>"A Floresta Sombria é traiçoeira. Poções me darão força!"</p>
      </div>
      <div class="narrative-text">Na Floresta, colete buffs e derrote bosses para prosseguir.</div>
    </div>

    <!-- Painel 4 -->
    <div class="panel" id="panel4">
      <div class="character" style="filter: brightness(0.7);"></div> <!-- Mais escuro para "sombras" -->
      <div class="speech-bubble">
        <p>"Nas Cavernas das Sombras, elites e armadilhas me aguardam. Não posso falhar!"</p>
      </div>
      <div class="narrative-text">Nas Cavernas, navegue obstáculos e enfrente desafios maiores.</div>
    </div>

    <!-- Painel 5 -->
    <div class="panel" id="panel5">
      <div class="character" style="animation: shake 0.5s infinite;"></div> <!-- Tremendo para tensão -->
      <div class="speech-bubble">
        <p>"O Abismo das Almas é o fim. Teleportes e inimigos implacáveis... Estou pronto?"</p>
      </div>
      <div class="narrative-text">No Abismo, teste sua habilidade final e vença o jogo!</div>
    </div>

    <button class="skip-button" onclick="skipStory()" aria-label="Pular história e ir para a fase 1">Pular</button>
    <button class="back-button" onclick="window.location.href = "{{ route('inicio') }};" aria-label="Voltar ao menu inicial">Voltar ao Menu</button>
  </div>

  <script>
    let currentPanel = 1;
    const totalPanels = 5;
    const panelDuration = 4000; // 4 segundos por painel

    function showPanel(panelNumber) {
      const panels = document.querySelectorAll('.panel');
      panels.forEach(panel => panel.classList.remove('active'));
      document.getElementById(`panel${panelNumber}`).classList.add('active');
    }

    function nextPanel() {
      if (currentPanel < totalPanels) {
        currentPanel++;
        showPanel(currentPanel);
        setTimeout(nextPanel, panelDuration);
      }
    }

    function skipStory() {
      // Redireciona diretamente para a fase 1
      window.location.href = "{{ route('introfase1') }}";
    }

    // Inicia a sequência
    setTimeout(nextPanel, panelDuration);

    // Previne seleção e menu de contexto
    document.addEventListener('selectstart', function(e) { e.preventDefault(); });
    document.addEventListener('contextmenu', function(e) { e.preventDefault(); });

    // Animação extra para o último painel
    setTimeout(() => {
      const lastCharacter = document.querySelector('#panel5 .character');
      if (lastCharacter) {
        lastCharacter.style.animation = 'shake 0.5s infinite';
      }
    }, panelDuration * 4);
  </script>
</body>
</html>