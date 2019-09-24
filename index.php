<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="jquery-ui.css">
</head>
<body>
  <header>
    <div class="logo"> 
      <img src="./images/Лого.png" />
    </div>
    <div class="numbers">
      <a href="tel:8-800-100-5005">8-800-100-5005</a>
      <br />
      <a href="tel:+7(3452)-522-000">+7(3452)-522-000</a>
    </div>
  </header>
  <nav>
    <ul>
      <li><a href="">Кредитные карты</a></li>
      <li><a class="active" href="">Вклады</a></li>
      <li><a href="">Дебетовая карта</a></li>
      <li><a href="">Страхование</a></li>
      <li><a href="">Друзья</a></li>
      <li><a href="">Интернет-банк</a></li>
    </ul>
  </nav>
  <div>
    <form action="./calc.php" method="POST">
      <h1>Калькулятор</h1>
      <div class="field">
        <label for="depositDate">Дата оформления вклада</label>
        <input type="date" id="depositDate" name="depositDate" required>
      </div>
      <div class="field">
        <label for="depositAmount">Сумма вклада</label>
        <input type="number"
                id="depositAmount"
                name="depositAmount"
                value="10000"
                min="1000"
                max="3000000"
                oninput ="updateDepositAmountSliderInput(this.value);" 
                required
        />
        <input type="range"
                id="depositAmountSlider"
                value="10000"
                min="1000"
                max="3000000"
                oninput ="updateDepositAmountTextInput(this.value);" 
        />
        <div id="slider"></div>
      </div>
      <div class="field">
        <label for="depositTerm">Срок вклада</label>
        <select id="depositTerm" name="depositTerm" required>
          <option>1 год</option>
          <option>2 года</option>
          <option>3 года</option>
          <option>4 года</option>
          <option>5 лет</option>
        </select>
      </div>
      <div class="field">
        <label for="depositReplenishment">Пополнение вклада</label>
        <input type="radio" id="depositReplenishmentYes" name="depositReplenishment">Да
        <input type="radio" checked id="depositReplenishmentNo" name="depositReplenishment">Нет
      </div>
      <div class="field">
        <label for="depositReplenishmentAmount">Сумма пополнения вклада</label>
        <input type="number"
                id="depositReplenishmentAmount"
                name="depositReplenishmentAmount"
                value="10000"
                min="1000"
                max="3000000"
                oninput="updateDepositReplenishmentAmountSliderInput(this.value);"
                required
        />
        <input type="range"
                id="depositReplenishmentAmountSlider"
                value="10000"
                min="1000"
                max="3000000"
                oninput ="updateDepositReplenishmentAmountTextInput(this.value);" 
        />
      </div>
      <input type="submit" id="submitBut" value="Рассчитать">
      <label id="result">Результат: </label>
    </form>
  </div>
  <footer>
    <ul>
      <li><a href="">Кредитные карты</a></li>
      <li><a href="">Вклады</a></li>
      <li><a href="">Дебетовая карта</a></li>
      <li><a href="">Страхование</a></li>
      <li><a href="">Друзья</a></li>
      <li><a href="">Интернет-банк</a></li>
    </ul>
  </footer>

  <script src="./jquery-3.4.1.min.js"></script>
  <script src="./jquery-ui.min.js"></script>
  <script src="./scripts.js"></script>
</body>
</html>