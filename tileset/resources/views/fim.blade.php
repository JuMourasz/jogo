<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Fim do Jogo - Parabéns!</title>
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
      color: #fff;
      text-align: center;
    }
    #end-container {
      background-color: rgba(0, 100, 0, 0.8);  /* Verde escuro para combinar com o tema do jogo */
      padding: 40px;
      border-radius: 10px;
      border: 2px solid #228822;
      box-shadow: 0 0 20px #228822;
      max-width: 600px;
    }
    h1 {
      font-size: 36px;
      margin-bottom: 20px;
      color: #aaffaa;  /* Cor verde clara para destaque */
    }
    p {
      font-size: 24px;
      margin-bottom: 30px;
    }
    button {
      padding: 12px 24px;
      font-size: 20px;
      font-weight: bold;
      background-color: #228822;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    button:hover {
      background-color: #44cc44;
    }
  </style>
</head>
<body>
  <div id="end-container">
    <h1>Parabéns! Você Venceu!</h1>
    <p>Você completou todas as fases de "O Caminho Proibido" e emergiu vitorioso. Sua jornada foi incrível e cheia de desafios. Obrigado por jogar!</p>
    <button id="back-to-menu" aria-label="Voltar ao menu inicial">Voltar ao Menu</button>
  </div>
</body>
<script>
document.getElementById('back-to-menu').addEventListener('click', () => {
  window.location.href = "{{ route('inicio') }}"
});
</script>
</html>