<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<div class="container">
<div class="row">
    <form class="col s12" id="reg-form">
      <div class="row">
      <h2>Зареєструватися</h2>
        <div class="input-field col s12">
          <input id="user_name" type="text" class="validate" required>
          <label for="user_name">Ім'я</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" required>
          <label for="email">Ел.пошта</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" minlength="6" required>
          <label for="password">Пароль</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <button class="btn btn-large btn-register waves-effect waves-light" type="submit" name="action">Зареєструватися
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
