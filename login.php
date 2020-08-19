<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();

if (isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT id, password FROM users WHERE email='".$email."' LIMIT 1");
    $row = mysqli_fetch_assoc($query);
    //var_dump($row);
    if ($row['password'] == md5($_POST['password'])){
        $hash = generateHash(20);
        mysqli_query($conn, "UPDATE users SET hash='".$hash."' WHERE id=".$row['id']);
        setcookie('id', $row['id'], time()+30*24*60*60);
        setcookie('hash', $hash, time()+30*24*60*60, null, null, null, true);
        header("Location: admin.php");
        exit();
    }
    else {

    }
}
?>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
<form method="POST">
<div class="container">
    <div class="row">
        <form class="col s12" id="reg-form">
            <div class="row">
            <h2>Увійти</h2>
                <div class="input-field col s12">
                    <input type="text" id="email" name="email" class="validate" required>
                    <label class="active" for="email">Ел.пошта</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" id="pass" name="password" class="validate" required>
                    <label class="active" for="pass">Пароль</label>
                </div>
            </div>
                <!-- <input type="submit" class="btn waves-effect waves-light red lighten-2" value="login"> -->

    <button class="btn waves-effect waves-light" type="submit" name="action" value="login">Увійти</button>
        </div>
    </div>
</div>

</form>


