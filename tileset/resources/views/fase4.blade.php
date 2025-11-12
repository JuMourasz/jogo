<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>O Caminho Proibido - Fase 4: Abismo das Almas</title>
  <style>
    #back-to-menu, #select-phases {
  position: absolute;
  top: 10px;
  padding: 5px 10px;
  font-size: 12px;
  font-weight: bold;
  background-color: #228822;
  color: white;
  border: none;
  border-radius: 4px; 
  cursor: pointer;
  z-index: 100;
  user-select: none;
  transition: background-color 0.3s ease;
}
#back-to-menu:hover, #select-phases:hover {
  background-color: #44cc44;
}
#back-to-menu {
  right: 30px;
}
#select-phases {
  right: 10px;
}
    html, body {
      margin:0; padding:0; height:100%;
      background: #000;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
      user-select: none;
    }
    #game-container {
      position: relative;
      width: 800px;
      height: 600px;
      background: url("https://i.ibb.co/TDWZP1V6/fundo4.jpg") no-repeat center/cover; /* Substitua por uma nova imagem */
      overflow: hidden;
      border: 4px solid #333;
      border-radius: 8px;
      box-shadow: 0 0 20px rgb(50, 50, 50);
    }

    #player {
      position: absolute;
      width: 48px;
      height: 48px;
      left: 20px;
      top: 532px;
      image-rendering: pixelated;
      transition: left 0.1s linear, top 0.1s linear;
      z-index: 10;
      background: url("https://i.ibb.co/JFtsNsYv/pessoa-removebg-preview.png") no-repeat center/cover;
    }
    #player img {
      width: 100%;
      height: 100%;
      image-rendering: pixelated;
      pointer-events: none;
      user-select: none;
    }

    .enemy {
      position: absolute;
      width: 40px;
      height: 40px;
      background-color: rgba(255,0,0,0.6);
      border: 2px solid red;
      border-radius: 6px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      color: white;
      font-size: 32px;
      cursor: default;
      user-select: none;
      z-index: 9;
      transition: top 0.1s linear, left 0.1s linear;
      background: url("https://i.ibb.co/YBnGcrNh/inimigo1-removebg-preview.png") no-repeat center/cover;
    }

    .patrol {
      background-color: rgba(255,165,0,0.7);
      border: 2px solid orange;
      font-size: 28px;
      background: url("https://i.ibb.co/s9G4VnXk/inimigo-removebg-preview.png") no-repeat center/cover;
    }

    .elite {
      width: 60px;
      height: 60px;
      background-color: rgba(139,0,0,0.8);
      border: 3px solid #ff0000;
      font-size: 24px;
      color: #ffaaaa;
      background: url("https://i.ibb.co/zhSBMwL5/boss-removebg-preview.png") no-repeat center/cover;
    }

    .potion {
      position: absolute;
      width: 24px;
      height: 24px;
      background-color: #ff4444;
      border: 2px solid #ff0000;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      color: white;
      font-size: 18px;
      cursor: default;
      user-select: none;
      z-index: 5;
      transition: opacity 0.3s ease;
      background: url("https://i.ibb.co/G4ghd5Jp/po-o-removebg-preview.png") no-repeat center/cover;
    }

    .wall {
      position: absolute;
      background-color: rgba(0,100,0,0.7);
      border: 2px solid #006600;
      z-index: 5;
      user-select: none;
      background: url("https://i.ibb.co/hxX1v3DC/maisobstaculos-removebg-preview.png") no-repeat center/cover;
    }
    .wall1 {
      position: absolute;
      background-color: rgba(0,100,0,0.7);
      border: 2px solid #006600;
      z-index: 5;
      user-select: none;
      background: url("https://i.ibb.co/YK8HGR0/madera-removebg-preview.png") no-repeat center/cover;
    }
    .wall2 {
      position: absolute;
      background-color: rgba(0,100,0,0.7);
      border: 2px solid #006600;
      z-index: 5;
      user-select: none;
      background: url("https://i.ibb.co/q3RHr5jd/preda-removebg-preview.png") no-repeat center/cover;
    }
    .wall3 {
      position: absolute;
      background-color: rgba(0,100,0,0.7);
      border: 2px solid #006600;
      z-index: 5;
      user-select: none;
      background: url("https://i.ibb.co/2QDh0Ls/cervo-removebg-preview.png") no-repeat center/cover;
    }
    .wall4 {
      position: absolute;
      background-color: rgba(0,100,0,0.7);
      border: 2px solid #006600;
      z-index: 5;
      user-select: none;
      background: url("https://i.ibb.co/XfQwBc6R/image-removebg-preview.png") no-repeat center/cover;
    }

    .spike {
      position: absolute;
      width: 32px;
      height: 32px;
      background-color: rgba(128,0,128,0.8);
      border: 2px solid #8B008B;
      border-radius: 4px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      color: yellow;
      font-size: 20px;
      z-index: 5;
      user-select: none;
      background: url("https://i.ibb.co/fYLRMJVv/armadilha-removebg-preview.png") no-repeat center/cover;
    }

    #door {
      position: absolute;
      width: 48px;
      height: 64px;
      top: 300px;
      left: 740px;
      background: url('https://i.ibb.co/zTW6QnXX/porta-removebg-preview.png') no-repeat center/contain;
      border: 2px solid #228822;
      border-radius: 6px;
      box-shadow: 0 0 10px #22aa22;
      cursor: default;
      user-select: none;
      z-index: 8;
      transition: border-color 0.5s ease;
    }

    #door.near {
      border-color: #ffff00;
      box-shadow: 0 0 20px #ffff00;
      animation: pulse 1s infinite;
    }

    @keyframes pulse {
      0% { opacity: 1; }
      50% { opacity: 0.5; }
      100% { opacity: 1; }
    }

    #message-box {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      background-color: rgba(0,0,0,0.75);
      border: 2px solid #228822;
      border-radius: 8px;
      padding: 12px 20px;
      color: #aaffaa;
      font-weight: bold;
      font-size: 18px;
      max-width: 90%;
      text-align: center;
      pointer-events: none;
      user-select: none;
      z-index: 20;
      min-height: 40px;
    }

    #lives-display {
      position: absolute;
      top: 10px;
      left: 10px;
      color: #ff0000;
      font-size: 24px;
      font-weight: bold;
      z-index: 25;
      user-select: none;
    }

    #restart-button {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 12px 24px;
      font-size: 20px;
      font-weight: bold;
      background-color: #228822;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      display: none;
      z-index: 30;
      user-select: none;
    }
    #restart-button:hover {
      background-color: #44cc44;
    }
  </style>
</head>
<body>
  <div id="game-container" tabindex="0" aria-label="Área do jogo - Fase 4">
    <button id="back-to-menu" aria-label="Voltar ao menu inicial">Voltar ao Menu</button>
    <div id="player" aria-label="Personagem do jogador">
      <img src="https://i.ibb.co/JFtsNsYv/pessoa-removebg-preview.png" alt="Personagem pixel-art" />
    </div>

    <div class="enemy" style="top: 50px; left: 100px;" aria-label="Inimigo normal"></div>
    <div class="enemy" style="top: 150px; left: 200px;" aria-label="Inimigo normal"></div>
    <div class="enemy" style="top: 250px; left: 300px;" aria-label="Inimigo normal"></div>
    <div class="enemy" style="top: 350px; left: 400px;" aria-label="Inimigo normal"></div>
    <div class="enemy" style="top: 450px; left: 500px;" aria-label="Inimigo normal"></div>
    <div class="enemy" style="top: 100px; left: 600px;" aria-label="Inimigo normal"></div>
    <div class="enemy" style="top: 200px; left: 700px;" aria-label="Inimigo normal"></div>
    <div class="enemy" style="top: 300px; left: 150px;" aria-label="Inimigo normal"></div>
    <div class="enemy patrol" style="top: 400px; left: 250px;" aria-label="Inimigo patrulheiro"></div>
    <div class="enemy patrol" style="top: 100px; left: 350px;" aria-label="Inimigo patrulheiro"></div>
    <div class="enemy patrol" style="top: 500px; left: 450px;" aria-label="Inimigo patrulheiro"></div>
    <div class="enemy elite" style="top: 200px; left: 650px;" aria-label="Elite"></div>
    <div class="enemy elite" style="top: 400px; left: 750px;" aria-label="Elite"></div>
    <div class="enemy elite" style="top: 300px; left: 500px;" aria-label="Elite"></div>

    <div class="potion" style="top: 120px; left: 180px;" aria-label="Poção"></div>
    <div class="potion" style="top: 320px; left: 480px;" aria-label="Poção"></div>
    <div class="potion" style="top: 420px; left: 280px;" aria-label="Poção"></div>

    <div class="wall" style="width: 80px; height: 100px; top: 200px; left: 300px;"></div>
    <div class="wall1" style="width: 45px; height: 70px; top: 150px; left: 400px;"></div>
    <div class="wall2" style="width: 150px; height: 80px; top: 350px; left: 200px;"></div>
    <div class="wall3" style="width: 70px; height: 90px; top: 50px; left: 100px;"></div>
    <div class="wall4" style="width: 100px; height: 100px; top: 450px; left: 500px;"></div>
    <div class="wall" style="width: 120px; height: 80px; top: 250px; left: 600px;"></div>
    <div class="wall1" style="width: 90px; height: 60px; top: 100px; left: 700px;"></div>

    <div class="spike" style="top: 180px; left: 220px;" aria-label="Spike perigoso"></div>
    <div class="spike" style="top: 320px; left: 520px;" aria-label="Spike perigoso"></div>
    <div class="spike" style="top: 80px; left: 420px;" aria-label="Spike perigoso"></div>
    <div class="spike" style="top: 480px; left: 150px;" aria-label="Spike perigoso"></div>
    <div class="spike" style="top: 200px; left: 600px;" aria-label="Spike perigoso"></div>
    <div class="spike" style="top: 400px; left: 300px;" aria-label="Spike perigoso"></div>
    <div class="spike" style="top: 250px; left: 450px;" aria-label="Spike perigoso"></div>

    <div id="door" aria-label="Porta para vencer a fase" title="Porta - objetivo"></div>

    <div id="message-box" role="alert" aria-live="assertive"></div>
    <div id="lives-display">Vidas: ❤️❤️</div>
    <button id="restart-button" aria-label="Recomeçar a fase">Recomeçar Fase</button>
  </div>

  <script>
    (function(){
      const container = document.getElementById('game-container');
      const player = document.getElementById('player');
      const messageBox = document.getElementById('message-box');
      const livesDisplay = document.getElementById('lives-display');
      const enemies = Array.from(document.getElementsByClassName('enemy'));
      const potions = Array.from(document.getElementsByClassName('potion'));
      const walls = Array.from(document.getElementsByClassName('wall'));
      const spikes = Array.from(document.getElementsByClassName('spike'));
      const door = document.getElementById('door');
      const restartButton = document.getElementById('restart-button');

      const gameState = {
        playerX: 20,
        playerY: 532,
        speed: 10,
        buffTimer: 180,  // Buff dura 3 segundos (em frames, assumindo 60fps)
        buffType: null,
        enemyActive: null,
        atDoor: false,
        gameOver: false,
        gameStarted: false,
        lives: 2,
        enemies: [],
        potions: [],
        walls: [],
        spikes: [],
        enemySpeed: 1.5
      };

      gameState.enemies = enemies.map(enemy => ({
        element: enemy,
        x: parseInt(enemy.style.left, 10),
        y: parseInt(enemy.style.top, 10),
        alive: true,
        isPatrol: enemy.classList.contains('patrol'),
        isElite: enemy.classList.contains('elite'),
        patrolDir: 'right',
        patrolRange: 200,
        patrolStartX: parseInt(enemy.style.left, 10),
        speed: enemy.classList.contains('elite') ? 1.8 : (enemy.classList.contains('patrol') ? 1.5 : gameState.enemySpeed)
      }));

      gameState.potions = potions.map(potion => ({
        element: potion,
        x: parseInt(potion.style.left, 10),
        y: parseInt(potion.style.top, 10),
        collected: false,
        type: Math.random() > 0.5 ? 'speed' : 'strength'
      }));

      gameState.walls = walls.map(wall => ({
        left: parseInt(wall.style.left, 10),
        top: parseInt(wall.style.top, 10),
        right: parseInt(wall.style.left, 10) + parseInt(wall.style.width, 10),
        bottom: parseInt(wall.style.top, 10) + parseInt(wall.style.height, 10)
      }));

      gameState.spikes = spikes.map(spike => ({
        left: parseInt(spike.style.left, 10),
        top: parseInt(spike.style.top, 10),
        right: parseInt(spike.style.left, 10) + 32,
        bottom: parseInt(spike.style.top, 10) + 32
      }));

      function updateLivesDisplay() {
        const hearts = '❤️'.repeat(gameState.lives);
        livesDisplay.textContent = `Vidas: ${hearts}`;
      }

      function updatePlayerPos() {
        player.style.left = gameState.playerX + "px";
        player.style.top = gameState.playerY + "px";
      }

      function updateEnemiesPos() {
        gameState.enemies.forEach(enemy => {
          if(enemy.alive) {
            enemy.element.style.left = enemy.x + "px";
            enemy.element.style.top = enemy.y + "px";
          }
        });
      }

      function moveEnemiesTowardsPlayer() {
        if(gameState.gameOver || gameState.atDoor) return;
        gameState.enemies.forEach(enemy => {
          if(enemy.alive && !enemy.isPatrol) {
            const centerX = enemy.isElite ? 30 : 20;
            const dx = (gameState.playerX + 24) - (enemy.x + centerX);
            const dy = (gameState.playerY + 24) - (enemy.y + centerX);
                       const dist = Math.sqrt(dx*dx + dy*dy);
            if(dist > 1) {
              const moveX = (dx / dist) * enemy.speed;
              const moveY = (dy / dist) * enemy.speed;
              enemy.x += moveX;
              enemy.y += moveY;
            }
          } else if(enemy.alive && enemy.isPatrol) {
            if(enemy.patrolDir === 'right') {
              enemy.x += enemy.speed;
              if(enemy.x > enemy.patrolStartX + enemy.patrolRange) enemy.patrolDir = 'left';
            } else {
              enemy.x -= enemy.speed;
              if(enemy.x < enemy.patrolStartX) enemy.patrolDir = 'right';
            }
          }
        });
        updateEnemiesPos();
      }

      function collidesWithWall(newX, newY) {
        const playerRect = { left: newX, right: newX + 48, top: newY, bottom: newY + 48 };
        return gameState.walls.some(wall => !(
          playerRect.right < wall.left ||
          playerRect.left > wall.right ||
          playerRect.bottom < wall.top ||
          playerRect.top > wall.bottom
        ));
      }

      function collidesWithSpike(newX, newY) {
        const playerRect = { left: newX, right: newX + 48, top: newY, bottom: newY + 48 };
        return gameState.spikes.some(spike => !(
          playerRect.right < spike.left ||
          playerRect.left > spike.right ||
          playerRect.bottom < spike.top ||
          playerRect.top > spike.bottom
        ));
      }

      function detectEnemyProximity() {
        if(gameState.enemyActive || gameState.gameOver || gameState.atDoor) return null;
        for(let enemy of gameState.enemies) {
          if(enemy.alive) {
            const centerX = enemy.isElite ? 30 : 20;
            const dx = (gameState.playerX + 24) - (enemy.x + centerX);
            const dy = (gameState.playerY + 24) - (enemy.y + centerX);
            const dist = Math.sqrt(dx*dx + dy*dy);
            const proximity = enemy.isElite ? 70 : 50;
            if(dist < proximity) return enemy;
          }
        }
        return null;
      }

      function detectPotionOverlap() {
        const playerRect = {
          left: gameState.playerX,
          right: gameState.playerX + 48,
          top: gameState.playerY,
          bottom: gameState.playerY + 48
        };
        for(let potion of gameState.potions) {
          if(!potion.collected) {
            const potionRect = {
              left: potion.x,
              right: potion.x + 24,
              top: potion.y,
              bottom: potion.y + 24
            };
            const overlap = !(
              playerRect.right < potionRect.left ||
              playerRect.left > potionRect.right ||
              playerRect.bottom < potionRect.top ||
              playerRect.top > potionRect.bottom
            );
            if(overlap) {
              potion.collected = true;
              // som
const collectSound = new Audio('shine-193240.mp3');
collectSound.play();
              potion.element.style.opacity = 0;
              gameState.buffType = potion.type;
              gameState.buffTimer = 180;  // Duração reduzida para 3 segundos
              const buffMsg = potion.type === 'speed' ? 'velocidade' : 'força';
              messageBox.textContent = `Poção coletada! Buff de ${buffMsg} por 3s.`;
              setTimeout(() => {
                if(!gameState.enemyActive && !gameState.atDoor && !gameState.gameOver) {
                  messageBox.textContent = 'Use as setas do teclado para atravessar o mapa.';
                }
              }, 2000);
              return true;
            }
          }
        }
        return false;
      }

      function detectDoorOverlap() {
        const playerRect = {
          left: gameState.playerX,
          right: gameState.playerX + 48,
          top: gameState.playerY,
          bottom: gameState.playerY + 48
        };
        const doorRect = {
          left: 740,
          right: 740 + 48,
          top: 300,  // Posição atualizada
          bottom: 300 + 64
        };

        const overlap = !(
          playerRect.right < doorRect.left ||
          playerRect.left > doorRect.right ||
          playerRect.bottom < doorRect.top ||
          playerRect.top > doorRect.bottom
        );

        const nearDoor = (
          playerRect.right > doorRect.left - 20 &&
          playerRect.left < doorRect.right + 20 &&
          playerRect.bottom > doorRect.top - 20 &&
          playerRect.top < doorRect.bottom + 20
        );

        if (nearDoor && !overlap) {
          door.classList.add('near');
        } else {
          door.classList.remove('near');
        }

        return overlap;
      }

      function battle(enemy) {
        gameState.enemyActive = enemy;
        //som
        const battleSound = new Audio('draw-sword1-44724.mp3');
battleSound.volume = 0.5; // Volume baixo
battleSound.play();
        messageBox.textContent = `Batalha iniciada! Lutando contra ${enemy.isElite ? 'elite' : 'inimigo'}...`;

        setTimeout(() => {
          let winChance = 0.5; 
          if(gameState.buffType === 'strength' && gameState.buffTimer > 0) {
            winChance += 0.15; 
          }
          if(enemy.isElite) {
            winChance *= 0.6; 
          }
          const playerWins = Math.random() < winChance;
          if(playerWins) {
            enemy.alive = false;
            enemy.element.style.display = 'none';
            messageBox.textContent = `Você venceu a batalha contra ${enemy.isElite ? 'a elite' : 'o inimigo'}! Continue avançando.`;
            gameState.enemyActive = null;
            checkDoor();
          } else {
            gameState.lives -= 1;
            updateLivesDisplay();
            messageBox.textContent = `Você foi derrotado! Perdeu 1 vida. Vidas restantes: ${gameState.lives}`;
            gameState.enemyActive = null;
            if(gameState.lives <= 0) {
              gameState.gameOver = true;
              messageBox.textContent = 'Game Over! Você perdeu todas as vidas.';
              showRestartButton();
            } else {
              // Teleporte para posição aleatória ao perder vida
              gameState.playerX = Math.random() * 700;  // Posição aleatória
              gameState.playerY = Math.random() * 500;
              updatePlayerPos();
            }
          }
        }, 1200);
      }

      function checkDoor() {
        if(!gameState.gameStarted || gameState.gameOver || gameState.enemyActive) return;
        const overlap = detectDoorOverlap();
        if(overlap && !gameState.atDoor) {
          gameState.atDoor = true;
          gameState.gameOver = true;
          messageBox.textContent = "Você chegou na porta! Aperte Enter para continuar e passar de fase.";
          door.classList.remove('near');
        } else if(!overlap && gameState.atDoor) {
          gameState.atDoor = false;
          gameState.gameOver = false;
        }
      }

      function advanceToNextPhase() {
        //som
      const victorySound = new Audio('goodresult-82807.mp3');
victorySound.play();
        messageBox.textContent = "Fase 4 Concluída! Parabéns, você venceu!";
        const completedPhases = JSON.parse(localStorage.getItem('completedPhases')) || [];
if (!completedPhases.includes('phase4')) {
  completedPhases.push('phase4');
  localStorage.setItem('completedPhases', JSON.stringify(completedPhases));
}
        setTimeout(() => {
          window.location.href = "{{ route('fim') }}";  
        }, 2000);
      }

      function showRestartButton() {
        restartButton.style.display = 'block';
        restartButton.focus();
      }

      function hideRestartButton() {
        restartButton.style.display = 'none';
      }

      function restartGame() {
        gameState.playerX = 20;
        gameState.playerY = 532;
        gameState.speed = 10;
        gameState.buffTimer = 0;
        gameState.buffType = null;
        gameState.gameOver = false;
        gameState.atDoor = false;
        gameState.enemyActive = null;
        gameState.gameStarted = false;
        gameState.lives = 2;  // Mantém as 2 vidas
        updateLivesDisplay();

        gameState.enemies.forEach(enemy => {
          enemy.alive = true;
          enemy.element.style.display = 'flex';
          enemy.x = parseInt(enemy.element.style.left, 10);
          enemy.y = parseInt(enemy.element.style.top, 10);
        });

        gameState.potions.forEach(potion => {
          potion.collected = false;
          potion.element.style.opacity = 1;
        });

        updatePlayerPos();
        updateEnemiesPos();
        door.classList.remove('near');
        messageBox.textContent = 'Use as setas do teclado para atravessar o mapa.';
        hideRestartButton();
        container.focus();
      }
      document.getElementById('back-to-menu').addEventListener('click', () => {
  window.location.href = "{{ route('inicio') }}"
});
      window.addEventListener('keydown', (e) => {
        if(gameState.atDoor) {
          if(e.key === "Enter") {
            advanceToNextPhase();
          }
          return;
        }
        if(gameState.gameOver || gameState.enemyActive) return;

        const currentSpeed = (gameState.buffType === 'speed' && gameState.buffTimer > 0) ? gameState.speed * 1.2 : gameState.speed;
        let moved = false;

        if(e.key === "ArrowLeft" && gameState.playerX > 0) {
          const newX = gameState.playerX - currentSpeed;
          if(!collidesWithWall(newX, gameState.playerY) && !collidesWithSpike(newX, gameState.playerY)) {
            gameState.playerX = newX;
            moved = true;
          }
        }
        if(e.key === "ArrowRight" && gameState.playerX < 752) {
          const newX = gameState.playerX + currentSpeed;
          if(!collidesWithWall(newX, gameState.playerY) && !collidesWithSpike(newX, gameState.playerY)) {
            gameState.playerX = newX;
            moved = true;
          }
        }
        if(e.key === "ArrowUp" && gameState.playerY > 0) {
          const newY = gameState.playerY - currentSpeed;
          if(!collidesWithWall(gameState.playerX, newY) && !collidesWithSpike(gameState.playerX, newY)) {
            gameState.playerY = newY;
            moved = true;
          }
        }
        if(e.key === "ArrowDown" && gameState.playerY < 552) {
          const newY = gameState.playerY + currentSpeed;
          if(!collidesWithWall(gameState.playerX, newY) && !collidesWithSpike(gameState.playerX, newY)) {
            gameState.playerY = newY;
            moved = true;
          }
        }

        if(moved) {
          updatePlayerPos();
          gameState.gameStarted = true;
          if(collidesWithSpike(gameState.playerX, gameState.playerY)) {
            gameState.lives -= 1;
            updateLivesDisplay();
            messageBox.textContent = `Tocou em um spike! Perdeu 1 vida. Vidas restantes: ${gameState.lives}`;
            if(gameState.lives <= 0) {
              gameState.gameOver = true;
              messageBox.textContent = 'Game Over! Você perdeu todas as vidas.';
              showRestartButton();
            } else {
              // Teleporte para posição aleatória
              gameState.playerX = Math.random() * 700;
              gameState.playerY = Math.random() * 500;
              updatePlayerPos();
            }
          } else {
            detectPotionOverlap();
            const nearbyEnemy = detectEnemyProximity();
            if(nearbyEnemy) {
              battle(nearbyEnemy);
            }
            checkDoor();
          }
        }
      });

      function gameLoop() {
        if(!gameState.gameOver && !gameState.atDoor && !gameState.enemyActive) {
          moveEnemiesTowardsPlayer();
          if(gameState.gameStarted) {
            const nearbyEnemy = detectEnemyProximity();
            if(nearbyEnemy) {
              battle(nearbyEnemy);
            }
          }
        }
        if(gameState.buffTimer > 0) gameState.buffTimer--;
        if(gameState.gameStarted) checkDoor();
        requestAnimationFrame(gameLoop);
      }

      restartButton.addEventListener('click', restartGame);
      updateLivesDisplay();
      updatePlayerPos();
      updateEnemiesPos();
      messageBox.textContent = 'Use as setas do teclado para atravessar o mapa.';
      //som
      const bgMusic = new Audio('sounds/background.mp3');
      bgMusic.volume = 0.2;
      bgMusic.loop = true; 
      bgMusic.play();
      //som
      container.focus();
      requestAnimationFrame(gameLoop);
    })();
  </script>
</body>
</html>