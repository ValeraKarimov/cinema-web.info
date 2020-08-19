<?php
require_once 'core/config.php';
require_once 'core/function.php';
require_once 'temp/nav.php';

$conn = connect();



if (isset($_COOKIE['id']) AND isset($_COOKIE['hash'])){
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id=".$_COOKIE['id']." LIMIT 1");
    $user = mysqli_fetch_assoc($query);
    if ($user['hash']!== $_COOKIE['hash']){
        mysqli_query($conn, "UPDATE users SET hash='".$hash."' WHERE id=".$row['id']);
        setcookie('id', $row['id'], time()-30*24*60*60, "/");
        setcookie('hash', $hash, time()-30*24*60*60,  "/");
        header("Location: login.php");
    }
}
else {
    setcookie('id', $row['id'], time()-30*24*60*60, "/");
    setcookie('hash', $hash, time()-30*24*60*60,  "/");
    header("Location: login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Кінотеатр - Панель адміна</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<style>
    p {
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
    }
    .container-tabl {
    background: white;
    padding: auto;
    border: 1px solid black;
    width: auto;
    height: auto;
    box-sizing: border-box;
    position: relative;
    }
    .container {
    animation: showUp 0.5s cubic-bezier(0.18, 1.3, 1, 1) forwards;
    }
</style>
<!-- Tab links -->
<style type="text/css">
.tabcontent {
    animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

  .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>

<div class="tab">
	<button class="tablinks" onclick="openCity(event, 'films_tab')" id="defaultOpen">Список фільмів</button>
	<button class="tablinks" onclick="openCity(event, 'car_tab')">Баннери фільмів</button>
</div>

<!-- Tab content -->
<div id="car_tab" class="tabcontent">
    <?php
        require_once 'admin_panel/carousel_list.php';
    ?>
</div>

<div id="films_tab" class="tabcontent">
    <?php
        require_once 'admin_panel/film_list.php';
    ?>
</div>
<script type="text/javascript">
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>


<?php
require_once 'temp/footer.php';