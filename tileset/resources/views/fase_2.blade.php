<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>O Caminho Proibido - Fase 2: Floresta Sombria</title>
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
      background: url("https://i.ibb.co/Sbf6zyH/fase2.jpg") no-repeat center/cover; 
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
    }
  

    .boss { 
      width: 60px;
      height: 60px;
      background-color: rgba(139,0,0,0.8);
      border: 3px solid #ff0000;
      font-size: 24px;
      color: #ffaaaa;
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
    }

    .wall { 
      position: absolute;
      background-color: rgba(0,100,0,0.7);
      border: 2px solid #006600;
      z-index: 5;
      user-select: none;
      background: url("https://i.ibb.co/BHxb9xb4/teto-removebg-preview.png") no-repeat center/cover;
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
  <div id="game-container" tabindex="0" aria-label="Área do jogo - Fase 2">
    <button id="back-to-menu" aria-label="Voltar ao menu inicial">Voltar ao Menu</button>
    <div id="player" aria-label="Personagem do jogador">
      <img src="https://i.ibb.co/JFtsNsYv/pessoa-removebg-preview.png" alt="Personagem pixel-art" /> 
    </div>

    <div class="enemy" style="top: 150px; left: 200px;" aria-label="Inimigo">X</div>
    <div class="enemy" style="top: 300px; left: 250px;" aria-label="Inimigo">X</div>
    <div class="enemy" style="top: 450px; left: 150px;" aria-label="Inimigo">X</div>
    <div class="enemy" style="top: 100px; left: 400px;" aria-label="Inimigo">X</div>
    <div class="enemy boss" style="top: 250px; left: 700px;" aria-label="Boss perto da porta">B</div>

    <div class="potion" style="top: 100px; left: 400px;" aria-label="Poção">P</div>
    <div class="potion" style="top: 400px; left: 500px;" aria-label="Poção">P</div>
    <div class="potion" style="top: 200px; left: 100px;" aria-label="Poção">P</div>

    <div class="wall" style="width: 80px; height: 120px; top: 200px; left: 350px;"></div>
    <div class="wall" style="width: 60px; height: 100px; top: 350px; left: 500px;"></div>
    <div class="wall" style="width: 100px; height: 80px; top: 100px; left: 600px;"></div>

    <div id="door" aria-label="Porta para vencer a fase" title="Porta - objetivo"></div>

    <div id="message-box" role="alert" aria-live="assertive"></div>
    <button id="restart-button" aria-label="Recomeçar a fase">Recomeçar Fase</button>
  </div>

  <script>
    (function(){
      const container = document.getElementById('game-container');
      const player = document.getElementById('player');
      const messageBox = document.getElementById('message-box');
      const enemies = Array.from(document.getElementsByClassName('enemy'));
      const potions = Array.from(document.getElementsByClassName('potion'));
      const walls = Array.from(document.getElementsByClassName('wall'));
      const door = document.getElementById('door');
      const restartButton = document.getElementById('restart-button');

      const gameState = {
        playerX: 20,
        playerY: 532,
        speed: 10,
        buffTimer: 0, 
        buffType: null, 
        enemyActive: null,
        atDoor: false,
        gameOver: false,
        gameStarted: false,
        enemies: [],
        potions: [],
        walls: [],
        enemySpeed: 0.8
      };

      gameState.enemies = enemies.map(enemy => ({
        element: enemy,
        x: parseInt(enemy.style.left, 10),
        y: parseInt(enemy.style.top, 10),
        alive: true,
        isBoss: enemy.classList.contains('boss'),
        speed: enemy.classList.contains('boss') ? 1 : gameState.enemySpeed
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
            const centerX = enemy.isBoss ? 30 : 20;
            const dx = (gameState.playerX + 24) - (enemy.x + centerX);
            const dy = (gameState.playerY + 24) - (enemy.y + centerX);
            const dist = Math.sqrt(dx*dx + dy*dy);
            if(dist > 1) {
              const moveX = (dx / dist) * enemy.speed;
              const moveY = (dy / dist) * enemy.speed;
              enemy.x += moveX;
              enemy.y += moveY;
            }
          }
        });
        updateEnemiesPos();
      }

      function collidesWithWall(newX, newY) {
        const playerRect = {
          left: newX,
          right: newX + 48,
          top: newY,
          bottom: newY + 48
        };
        return gameState.walls.some(wall => !(
          playerRect.right < wall.left ||
          playerRect.left > wall.right ||
          playerRect.bottom < wall.top ||
          playerRect.top > wall.bottom
        ));
      }

      function detectEnemyProximity() {
        if(gameState.enemyActive || gameState.gameOver || gameState.atDoor) return null;
        for(let enemy of gameState.enemies) {
          if(enemy.alive) {
            const centerX = enemy.isBoss ? 30 : 20;
            const dx = (gameState.playerX + 24) - (enemy.x + centerX);
            const dy = (gameState.playerY + 24) - (enemy.y + centerX);
            const dist = Math.sqrt(dx*dx + dy*dy);
            const proximity = enemy.isBoss ? 60 : 50;
            if(dist < proximity) {
              return enemy;
            }
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
              potion.element.style.opacity = 0;
              gameState.buffType = potion.type;
              gameState.buffTimer = 600; 
              const buffMsg = potion.type === 'speed' ? 'velocidade' : 'força';
              messageBox.textContent = `Poção coletada! Buff de ${buffMsg} por 10s.`;
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
battleSound.volume = 0.5; // Volume baixo
battleSound.play();
        messageBox.textContent = `Batalha iniciada! Lutando contra ${enemy.isBoss ? 'boss' : 'inimigo'}...`;

        setTimeout(() => {
          let winChance = 0.6;
          if(gameState.buffType === 'strength' && gameState.buffTimer > 0) {
            winChance = 0.8;
          }
          if(enemy.isBoss) {
            winChance *= 0.666; 
          }
          const playerWins = (Math.random() < winChance);
          if(playerWins) {
            enemy.alive = false;
            enemy.element.style.display = 'none';
            messageBox.textContent = `Você venceu a batalha contra ${enemy.isBoss ? 'o boss' : 'o inimigo'}! Continue avançando.`;
            gameState.enemyActive = null;
            checkDoor();
          } else {
            messageBox.textContent = `Você foi derrotado pelo ${enemy.isBoss ? 'boss' : 'inimigo'}. Fim de fase!`;
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
        messageBox.textContent = "Fase 2 Concluída! Parabéns, você venceu e está indo para a Fase 3!";
        const completedPhases = JSON.parse(localStorage.getItem('completedPhases')) || [];
if (!completedPhases.includes('phase2')) {
  completedPhases.push('phase2');
  localStorage.setItem('completedPhases', JSON.stringify(completedPhases));
}
        setTimeout(() => {
          window.location.href = "{{ route('introfase3') }}";; 
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

        gameState.enemies.forEach((enemy, i) => {
          enemy.alive = true;
          enemy.element.style.display = 'flex';
          switch(i) {
            case 0: enemy.x = 200; enemy.y = 150; break;
            case 1: enemy.x = 250; enemy.y = 300; break;
            case 2: enemy.x = 150; enemy.y = 450; break;
            case 3: enemy.x = 400; enemy.y = 100; break;
            case 4: enemy.x = 700; enemy.y = 250; break; 
          }
        });

        gameState.potions.forEach((potion, i) => {
          potion.collected = false;
          potion.element.style.opacity = 1;
          switch(i) {
            case 0: potion.x = 400; potion.y = 100; break;
            case 1: potion.x = 500; potion.y = 400; break;
            case 2: potion.x = 100; potion.y = 200; break;
          }
        });

        updatePlayerPos();
        updateEnemiesPos();
        door.classList.remove('near');
        messageBox.textContent = 'Use as setas do teclado para atravessar o mapa. Colete poções para buffs!';
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

        if(gameState.gameOver || gameState.enemyActive) return;

        const leftKey = e.key === "ArrowLeft";
        const rightKey = e.key === "ArrowRight";
        const upKey = e.key === "ArrowUp";
        const downKey = e.key === "ArrowDown";

        let moved = false;
        const currentSpeed = (gameState.buffType === 'speed' && gameState.buffTimer > 0) ? gameState.speed * 1.5 : gameState.speed;
        const step = currentSpeed; 

        if (leftKey) {
          const newX = gameState.playerX - step;
          if(newX > 0 && !collidesWithWall(newX, gameState.playerY)) {
            gameState.playerX = newX;
            moved = true;
          }
        }
        if (rightKey) {
          const newX = gameState.playerX + step;
          if(newX < 752 && !collidesWithWall(newX, gameState.playerY)) { 
            gameState.playerX = newX;
            moved = true;
          }
        }
        if (upKey) {
          const newY = gameState.playerY - step;
          if(newY > 0 && !collidesWithWall(gameState.playerX, newY)) {
            gameState.playerY = newY;
            moved = true;
          }
        }
        if (downKey) {
          const newY = gameState.playerY + step;
          if(newY < 552 && !collidesWithWall(gameState.playerX, newY)) { 
            gameState.playerY = newY;
            moved = true;
          }
        }

        if(moved) {
          e.preventDefault();
          updatePlayerPos();
          gameState.gameStarted = true; 

          detectPotionOverlap();

          const nearbyEnemy = detectEnemyProximity();
          if(nearbyEnemy) {
            battle(nearbyEnemy);
          } else if(!gameState.enemyActive) {
            messageBox.textContent = 'Use as setas do teclado para atravessar o mapa. Colete poções para buffs!';
          }

          checkDoor();
        }
      });

      function gameLoop() {
        if(gameState.buffTimer > 0) {
          gameState.buffTimer--;
          if(gameState.buffTimer <= 0) {
            gameState.buffType = null;
            if(!gameState.enemyActive && !gameState.atDoor && !gameState.gameOver) {
              messageBox.textContent = 'Buff acabou! Use as setas para continuar.';
              setTimeout(() => {
                messageBox.textContent = 'Use as setas do teclado para atravessar o mapa. Colete poções para buffs!';
              }, 2000);
            }
          }
        }

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
      door.classList.remove('near');
      gameState.atDoor = false; 
      messageBox.textContent = 'Use as setas do teclado para atravessar o mapa. Colete poções para buffs!';
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