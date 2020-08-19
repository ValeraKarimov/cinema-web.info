<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
?>
<?php
    if(isset($_POST['user_name']) AND $_POST['user_name'] !=''){
        $userName = $_POST['user_name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        $conn = connect();

        $sql = "INSERT INTO users (user_name, email, password) VALUES ('".$userName."', '".$email."', MD5('".$pass."'))";
        
        if (mysqli_query($conn, $sql)) {
            setcookie('bd_create_success', 1, time()+10);
            header('Location: /login.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Кінотеатр - Зареєструватися</title>
</head>
<body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<form action="" method="POST" enctype="multipart/form-data">
<div class="container">
    <div class="row">
    <h2>Зареєструватися</h2>
        <form class="col s12" id="add-post" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="user_name" name="user_name" class="validate" required>
                <label class="active" for="user_name">Ваше ім'я</label>
            </div>
            <div class="autocomplete input-field col s12">
                <input type="text" id="email" name="email" class="validate" >
                <label class="active" for="email">Ел.пошта</label>
            </div>  
            <div class="input-field col s12">
                <input type="password" id="password" name="password" class="validate" >
                <label class="active" for="password">Пароль</label>
            </div>
    </div>

    <button class="btn waves-effect waves-light" type="submit" name="action" value="add" >Зареєструватися</button>
    </form>
    </div>
    </div>