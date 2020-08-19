<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
$data = selectArticle($conn);
?>
<?php
    if(isset($_POST['title']) AND $_POST['title'] !=''){
        $title = $_POST['title'];
        $country = $_POST['country'];
        $genre = $_POST['genre'];
        $director = $_POST['director'];
        $actors = $_POST['actors'];
        $format = $_POST['format'];
        $age = $_POST['age'];
        $timelong = $_POST['timelong'];
        $startroll = $_POST['startroll'];
        $endroll = $_POST['endroll'];
        $timesession = $_POST['timesession'];
        $description = $_POST['description'];
        $trailer = $_POST['trailer'];
        
        
        $conn = connect();
        if($_FILES['image']['name']!=''){
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name']);
            
        $sql = "UPDATE films set mov_title = '".$title."', mov_country = '".$country."', mov_genre = '".$genre."', mov_director = '".$director."', mov_actors = '".$actors."', mov_format = '".$format."', mov_age = '".$age."', mov_timelong = '".$timelong."', mov_startroll = '".$startroll."', mov_endroll = '".$endroll."', mov_timesession = '".$timesession."', mov_description = '".$description."', mov_image = '".$_FILES['image']['name']."', mov_trailer = '".$trailer."' WHERE mov_id=".$_GET['id'];
        } 
        else{
            $sql = "UPDATE films set mov_title = '".$title."', mov_country = '".$country."', mov_genre = '".$genre."', mov_director = '".$director."', mov_actors = '".$actors."', mov_format = '".$format."', mov_age = '".$age."', mov_timelong = '".$timelong."', mov_startroll = '".$startroll."', mov_endroll = '".$endroll."', mov_timesession = '".$timesession."', mov_description = '".$description."', mov_trailer = '".$trailer."' WHERE mov_id=".$_GET['id'];
        }

        
        if (mysqli_query($conn, $sql)) {
            setcookie('bd_create_success', 1, time()+10);
            header('Location: /admin.php');
            // echo "New record created successfully";
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<!-- <link rel="stylesheet" href="style.css"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Кінотеатр - Афіша</title>
</head>
<body>
<div class="container">
    <div class="row">
<form class="col s12" id="update-post" action="" method="POST" enctype="multipart/form-data">
<h2>Змінити запис: <?php echo $data['mov_title'];?></h2>
    <div class="row">
        <div class="input-field col s12">
            <input type="text" id="title" name="title" class="validate" value="<?php echo $data['mov_title']?>" required>
            <label class="active" for="title">Назва фільму</label>
        </div>
        <div class="input-field col s12">
            <input type="text" id="country" name="country" class="validate" value="<?php echo $data['mov_country'];?>">
            <label class="active" for="country">Країна</label>
        </div>
        <div class="input-field col s12">
            <input type="text" id="genre" name="genre" class="validate" value="<?php echo $data['mov_genre'];?>">
            <label class="active" for="genre">Жанр</label>
        </div>
        <div class="input-field col s12">
            <input type="text" id="director" name="director" class="validate" value="<?php echo $data['mov_director'];?>">
            <label class="active" for="director">Режисер</label>
        </div>
        <div class="input-field col s12">
            <input type="text" id="actors" name="actors" class="validate" value="<?php echo $data['mov_actors'];?>">
            <label class="active" for="actors">Актори</label>
        </div>
        <div class="input-field col s12">
            <input type="text" id="format" name="format" class="validate" value="<?php echo $data['mov_format'];?>">
            <label class="active" for="format">Формат</label>
        </div>
        <div class="input-field col s12">
            <input type="text" id="age" name="age" class="validate" value="<?php echo $data['mov_age'];?>">
            <label class="active" for="age">Вікове обмеження</label>
        </div>
        <div class="input-field col s12">
            <input type="text" id="timelong" name="timelong" class="validate" value="<?php echo $data['mov_timelong'];?>">
            <label class="active" for="timelong">Тривалість</label>
        </div>
        <div class="input-field col s6">
            <input type="text" id="startroll" name="startroll" class="validate" value="<?php echo $data['mov_startroll'];?>">
            <label class="active" for="startroll">У прокаті з</label>
        </div>
        <div class="input-field col s6">
            <input type="text" id="endroll" name="endroll" class="validate" value="<?php echo $data['mov_endroll'];?>">
            <label class="active" for="endroll">У прокаті по</label>
        </div>
        <div class="input-field col s12">
            <input type="text" id="timesession" name="timesession" class="validate" value="<?php echo $data['mov_timesession'];?>">
            <label class="active" for="timesession">Час сеансів</label>
        </div>
        <div class="input-field col s12">
            <textarea id="description" name="description" class="materialize-textarea" ><?php echo $data['mov_description'];?></textarea>
            <label class="active" for="timesession">Сюжет</label>
        </div>
        <div class="input-field col s12">
            <input type="text" id="trailer" name="trailer" class="validate" value="<?php echo $data['mov_trailer'];?>">
            <label class="active" for="trailer">Трейлер фільму</label>
        </div>
        </div>
        <p><img src="/images/<?php echo $data['mov_image'];?>" alt="" width='100'></p>
        <div class="file-field input-field">
      <div class="btn">
        <span>Файл</span>
        <input type="file" name="image">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" name="image" placeholder="Виберіть інший файл з постером фільму">
      </div>
    </div>
  
    <!-- <p>Назва фільму: <input type="text" name="title" value="<?php echo $data['mov_title']?>"><p> -->
    <!-- <p>Країна: <input type="text" name="country" value="<?php echo $data['mov_country'];?>"></p> -->
    <!-- <p>Жанр: <input type="text" name="genre" value="<?php echo $data['mov_genre'];?>"></p> -->
    <!-- <p>Режисер: <input type="text" name="director" value="<?php echo $data['mov_director'];?>"></p> -->
    <!-- <p>Актори: <input type="text" name="actors" value="<?php echo $data['mov_actors'];?>"></p> -->
    <!-- <p>Формат: <input type="text" name="format" value="<?php echo $data['mov_format'];?>"></p> -->
    <!-- <p>Вікове обмеження: <input type="text" name="age" value="<?php echo $data['mov_age'];?>"></p> -->
    <!-- <p>Тривалість: <input type="text" name="timelong" value="<?php echo $data['mov_timelong'];?>"></p> -->
    <!-- <p>У прокаті з: <input type="text" name="startroll" value="<?php echo $data['mov_startroll'];?>"></p> -->
    <!-- <p>У прокаті по: <input type="text" name="endroll" value="<?php echo $data['mov_endroll'];?>"></p> -->
    <!-- <p>Час сеансів: <input type="text" name="timesession" value="<?php echo $data['mov_timesession'];?>"></p> -->
    
    <!-- <p>Сюжет:</p> -->
    <!-- <textarea name="description"><?php echo $data['mov_description'];?></textarea> -->
    <!-- <p><img src="/images/<?php echo $data['mov_image'];?>" alt="" width='100'></p> -->
    <!-- <p>Постер фільму: <input type="file" name="image"  value="<?php echo $data['mov_image'];?>"></p> -->

    <!-- <p>Трейлер фільму: <input type="text" name="trailer" value="<?php echo $data['mov_trailer'];?>"></p> -->
    
    <!-- <p><input class="btn waves-effect waves-light" type="submit" value="update"></p> -->
    <button class="btn waves-effect waves-light" type="submit" value="update">Обновити запис</button>
</form>
</div>
</div>