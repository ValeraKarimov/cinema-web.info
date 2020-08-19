<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
$data = selectArticle($conn);
close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Опис</title>
</head>
<body>
<?php
$out = '';
$out .="<h1>{$data['mov_title']}</h1>";
$out .="<img src='/images/{$data['mov_image']}'>";
$out .="<p><b>Країна: </b>{$data['mov_country']}</p>";
$out .="<p><b>Жанр: </b>{$data['mov_genre']}</p>";
$out .="<p><b>Режисер: </b>{$data['mov_director']}</p>";
$out .="<p><b>Актори: </b>{$data['mov_actors']}</p>";
$out .="<p><b>Формат: </b>{$data['mov_format']}</p>";
$out .="<p><b>Вікове обмеження: </b>{$data['mov_age']}</p>";
$out .="<p><b>Тривалість: </b>{$data['mov_timelong']} хвилин</p>";
$out .="<p><b>У прокаті з: </b>{$data['mov_startroll']}</p>";
$out .="<p><b>У прокаті по: </b>{$data['mov_endroll']}</p>";
$out .="<p><b>Час сеансів: </b>{$data['mov_timesession']}</p>";
$out .="<div><b>Сюжет: </b>{$data['mov_description']}</div>";
$out .='<iframe width="560" height="315" src="'.$data['mov_trailer'].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
 echo $out;

echo '<hr>';
?>