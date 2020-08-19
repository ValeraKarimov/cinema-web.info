<?php

$conn = connect();

$data = select($conn);
close($conn);
?>
</head>
<body>
<div class="container-tabl">
    <div class="row">
        <div class="col-lg-12">
    <?php
echo   $flash;
echo '<h2>Список фільмів</h2>';
echo '<div><a href="/admin_create.php"><button class="btn waves-effect waves-light">Додати елемент</button></a></div>';
    $out = '<table class="striped">';
    $out .='<tr><th>ID</th>';
    $out .='<th>Назва</th>';
    // $out .='<th>Країна</th>';
    $out .='<th>Жанр</th>';
    $out .='<th>Формат</th>';
    $out .='<th>Вікові обмеження</th>';
    $out .='<th>Тривалість</th>';
    $out .='<th>У прокаті з</th>';
    $out .='<th>У прокаті до</th>';
    $out .='<th>Час сеансів</th>';
    $out .='<th>Сюжет</th>';
    $out .='<th>Постер</th>';
    $out .='<th>Обновити запис</th>';
    $out .='<th>Видалити запис</th></tr>';
for ($i=0; $i < count($data); $i++){
    $out .="<tr><td>{$data[$i]['mov_id']}</td>";
    $out .="<td>{$data[$i]['mov_title']}</td>";
    // $out .="<td>{$data[$i]['mov_country']}</td>";
    $out .="<td>{$data[$i]['mov_genre']}</td>";
    $out .="<td>{$data[$i]['mov_format']}</td>";
    $out .="<td>{$data[$i]['mov_age']}</td>";
    $out .="<td>{$data[$i]['mov_timelong']}</td>";
    $out .="<td>{$data[$i]['mov_startroll']}</td>";
    $out .="<td>{$data[$i]['mov_endroll']}</td>";
    $out .="<td>{$data[$i]['mov_timesession']}</td>";
    $out .="<td><p>{$data[$i]['mov_description']}</p></td>";
    $out .="<td><img src='/images/{$data[$i]['mov_image']}'  width='40'></td>";
    $out .="<td><a class='material-icons' href='/admin_update.php?id={$data[$i]['mov_id']}'>edit</p></td>";
    $out .="<td><p class='check-delete material-icons' data='{$data[$i]['mov_id']}'>delete</p></td></tr>";
}
$out .='</table></div></div></div>';

echo $out;
?>
<script>
    window.onload= function(){
        let checkDelete = document.querySelectorAll('.check-delete');
        checkDelete.forEach(function(element){
            element.onclick = checkDeleteFunction;
        })
        function checkDeleteFunction(event){
            event.preventDefault();
            let a = confirm('Do you want delete');
            if (a == true) {
                location.href = '/admin_delete.php?id='+this.getAttribute('data');
            }
            return false;
        }
    }
</script>