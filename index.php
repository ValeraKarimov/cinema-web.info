<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
$data = selectMain($conn);
$datacar = selectCarousel($conn);
$countPage = paginationCount($conn);
close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"
></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/app.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="stylecss.css"> -->
    <style>
        p {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    <title>Кінотеатр - Головна</title>
</head>
<body>
<?php
require_once 'temp/nav.php';
?>
<?php
	$out = '<div class="carousel carousel-slider" data-indicators="true">';
	    for ($i=0; $i < count($datacar); $i++){
		    $out .='<a href="/arcticle.php?id='.$datacar[$i]['car_article_id'].'" class="carousel-item"><img src="'.$datacar[$i]['car_image'].'"></a>';
	    }
	$out .='</div>';
	echo $out;
?>
<?php
$out = '';
for ($i=0; $i < count($data); $i++){
    $out .="<div class='container'>
    <div class='col s12 m6'>
    <div class='card horizontal hoverable'>
        <div class='card-image'>
            <img src='/images/{$data[$i]['mov_image']}' width='50%'>
        </div>
        <div class='card-stacked'>
            <div class='card-content'>
            <h2>{$data[$i]['mov_title']}</h2>
            <p><b>Країна: </b>{$data[$i]['mov_country']}</p>
            <p><b>Жанр: </b>{$data[$i]['mov_genre']}</p>
            <p><b>Режисер: </b>{$data[$i]['mov_director']}</p>
            <p><b>Актори: </b>{$data[$i]['mov_actors']}</p>
            <p><b>Формат: </b>{$data[$i]['mov_format']}</p>
            <p><b>Вікове обмеження: </b>{$data[$i]['mov_age']}</p>
            <p><b>Тривалість: </b>{$data[$i]['mov_timelong']} хвилин</p>
            <p><b>У прокаті з: </b>{$data[$i]['mov_startroll']}</p>
            <p><b>У прокаті по: </b>{$data[$i]['mov_endroll']}</p>
            <p><b>Час сеансів: </b>{$data[$i]['mov_timesession']}</p>
            <p><b>Сюжет: </b>{$data[$i]['mov_description']}</p>
            </div><div class='card-action'>";
            $out .='<p><a href="/arcticle.php?id='.$data[$i]['mov_id'].'">Детальніше...</a></p>';
            $out .=" </div>
        </div>
    </div>
    </div>
 </div>";
//     $out .="<h2>{$data[$i]['mov_title']}</h2>";
//     $out .="<p><b>Країна: </b>{$data[$i]['mov_country']}</p>";
//     $out .="<p><b>Жанр: </b>{$data[$i]['mov_genre']}</p>";
//     $out .="<p><b>Режисер: </b>{$data[$i]['mov_director']}</p>";
//     $out .="<p><b>Актори: </b>{$data[$i]['mov_actors']}</p>";
//     $out .="<p><b>Формат: </b>{$data[$i]['mov_format']}</p>";
//     $out .="<p><b>Вікове обмеження: </b>{$data[$i]['mov_age']}</p>";
//     $out .="<p><b>Тривалість: </b>{$data[$i]['mov_timelong']} хвилин</p>";
//     $out .="<p><b>У прокаті з: </b>{$data[$i]['mov_startroll']}</p>";
//     $out .="<p><b>У прокаті по: </b>{$data[$i]['mov_endroll']}</p>";
//     $out .="<p><b>Час сеансів: </b>{$data[$i]['mov_timesession']}</p>";
//     $out .="<p><b>Сюжет: </b>{$data[$i]['mov_description']}</p>";
//     $out .='<p><a href="/arcticle.php?id='.$data[$i]['mov_id'].'">Детальніше...</a></p>';
//     $out.='<hr>';
}
echo $out;

for ($i=0; $i < $countPage; $i++){
    $j = $i+1;
    echo "<a href='/index.php?page={$i}' style='padding: 5px;'>{$j}</a>";
}
?>
<?php
require_once 'temp/footer.php';
?>
