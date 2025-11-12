<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>O Caminho Proibido - Fase 1: Campo</title>
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
      background: url("https://i.ibb.co/ZPT4NmV/rpg.jpg") no-repeat center/cover;
      overflow: hidden;
      border: 4px solid #333;    
      border-radius: 8px;
      box-shadow: 0 0 20px rgb(30, 60, 30);
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
      background:url("https://i.ibb.co/JFtsNsYv/pessoa-removebg-preview.png") no-repeat center/cover; 
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
    }

    #door {
      position: absolute;
      width: 48px;
      height: 64px;
      top: 268px; 
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
  <div id="game-container" tabindex="0" aria-label="Área do jogo">
    <button id="back-to-menu" aria-label="Voltar ao menu inicial">Voltar ao Menu</button>
    <div id="player" aria-label="Personagem do jogador">
      <img src="https://i.ibb.co/JFtsNsYv/pessoa-removebg-preview.png" alt="Personagem pixel-art com cabelo vermelho e roupa de fantasia" /> 
    </div>
    <div class="enemy" style="top: 220px; left: 300px;" aria-label="Inimigo no mapa">X</div>
    <div class="enemy" style="top: 340px; left: 460px;" aria-label="Inimigo no mapa">X</div>
    <div class="enemy" style="top: 180px; left: 600px;" aria-label="Inimigo no mapa">X</div>
    <div class="enemy" style="top: 420px; left: 690px;" aria-label="Inimigo no mapa">X</div>

    <div id="door" aria-label="Porta para vencer o jogo" title="Porta - objetivo"></div>

    <div id="message-box" role="alert" aria-live="assertive"></div>
    <button id="restart-button" aria-label="Recomeçar o jogo">Recomeçar</button>
  </div>

  <script>
    (function(){
      const container = document.getElementById('game-container');
      const player = document.getElementById('player');
      const messageBox = document.getElementById('message-box');
      const enemies = Array.from(document.getElementsByClassName('enemy'));
      const door = document.getElementById('door');
      const restartButton = document.getElementById('restart-button');

      const gameState = {
        playerX: 20,
        playerY: 532, 
        speed: 10,
        enemyActive: null,
        atDoor: false,
        gameOver: false,
        gameStarted: false, 
        enemies: [],
        enemySpeed: 0.5
      };

      gameState.enemies = enemies.map(enemy => {
        return {
          element: enemy,
          x: parseInt(enemy.style.left, 10),
          y: parseInt(enemy.style.top, 10),
          alive: true
        };
      });

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
          if(enemy.alive) {
            const dx = (gameState.playerX + 24) - (enemy.x + 20);
            const dy = (gameState.playerY + 24) - (enemy.y + 20);
            const dist = Math.sqrt(dx*dx + dy*dy);
            if(dist > 1) {
              const moveX = (dx / dist) * gameState.enemySpeed;
              const moveY = (dy / dist) * gameState.enemySpeed;
              enemy.x += moveX;
              enemy.y += moveY;
            }
          }
        });
        updateEnemiesPos();
      }

      function detectEnemyProximity() {
        if(gameState.enemyActive || gameState.gameOver || gameState.atDoor) return null;
        for(let i=0; i<gameState.enemies.length; i++) {
          const enemy = gameState.enemies[i];
          if(enemy.alive) {
            const dx = (gameState.playerX + 24) - (enemy.x + 20);
            const dy = (gameState.playerY + 24) - (enemy.y + 20);
            const dist = Math.sqrt(dx*dx + dy*dy);
            if(dist < 50) {
              return enemy;
            }
          }
        }
        return null;
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
          top: 268, 
          bottom: 268 + 64
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
battleSound.volume = 0.5; 
battleSound.play();
        messageBox.textContent = "Batalha iniciada! Lutando contra inimigo...";

        setTimeout(() => {
          const playerWins = (Math.random() < 0.6);
          if(playerWins) {
            enemy.alive = false;
            enemy.element.style.display = 'none';
            messageBox.textContent = "Você venceu a batalha! Continue avançando.";
            gameState.enemyActive = null;
            checkDoor();
          } else {
            messageBox.textContent = "Você foi derrotado pelo inimigo. Fim de jogo!";
            gameState.gameOver = true;
            gameState.atDoor = false;
            showRestartButton();
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
        messageBox.textContent = "Parabéns! Você venceu e está indo para a próxima fase!";
const completedPhases = JSON.parse(localStorage.getItem('completedPhases')) || [];
if (!completedPhases.includes('phase1')) {
  completedPhases.push('phase1');
  localStorage.setItem('completedPhases', JSON.stringify(completedPhases));
}
        setTimeout(() => {
          window.location.href = "{{ route('introfase2') }}";; 
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
        gameState.gameOver = false;
        gameState.atDoor = false;
        gameState.enemyActive = null;
        gameState.gameStarted = false; 

        gameState.enemies.forEach((enemy, i) => {
          enemy.alive = true;
          enemy.element.style.display = 'flex';
          switch(i) {
            case 0: enemy.x = 300; enemy.y = 220; break;
            case 1: enemy.x = 460; enemy.y = 340; break;
            case 2: enemy.x = 600; enemy.y = 180; break;
            case 3: enemy.x = 690; enemy.y = 420; break;
          }
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
            e.preventDefault();
            advanceToNextPhase();
          }
          return;
        }

        if(gameState.gameOver) return;

        const leftKey = e.key === "ArrowLeft";
        const rightKey = e.key === "ArrowRight";
        const upKey = e.key === "ArrowUp";
        const downKey = e.key === "ArrowDown";

        let moved = false;

        if (leftKey && gameState.playerX > 0) {
          gameState.playerX -= gameState.speed;
          moved = true;
        }
        if (rightKey && gameState.playerX < 752) { 
          gameState.playerX += gameState.speed;
          moved = true;
        }
        if (upKey && gameState.playerY > 0) {
          gameState.playerY -= gameState.speed;
          moved = true;
        }
        if (downKey && gameState.playerY < 552) { 
          gameState.playerY += gameState.speed;
          moved = true;
        }

        if(moved) {
          e.preventDefault();
          updatePlayerPos();
          gameState.gameStarted = true; 
          const nearbyEnemy = detectEnemyProximity();
          if(nearbyEnemy) {
            battle(nearbyEnemy);
          } else if(!gameState.enemyActive) {
            messageBox.textContent = 'Use as setas do teclado para atravessar o mapa.';
          }
          checkDoor();
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
        if(gameState.gameStarted) {
          checkDoor();
        }
        requestAnimationFrame(gameLoop);
      }

      restartButton.addEventListener('click', () => {
        restartGame();
      });

      updatePlayerPos();
      updateEnemiesPos();
      messageBox.textContent = 'Use as setas do teclado para atravessar o mapa.';

      door.classList.remove('near'); 
      gameState.atDoor = false; 
      container.focus();
      requestAnimationFrame(gameLoop);

    })();
  </script>
</body>
</html>