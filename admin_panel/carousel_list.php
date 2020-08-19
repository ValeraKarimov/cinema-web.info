<?php

$conn = connect();

$data = selectCarousel($conn);
close($conn);
?>
<body>
<div class="container-tabl">
    <div class="row">
        <div class="col-lg-12">
    <?php
echo   $flash;
echo '<h2>Баннери фільмів</h2>';
echo '<div><a href="/admin_create.php"><button class="btn waves-effect waves-light">Додати елемент</button></a></div>';
    $out = '<table class="striped">';
    $out .='<tr><th>ID</th>';
    $out .='<th>Назва</th>';
    $out .='<th>Постер</th>';
    $out .='<th>ID запису в таблиці з фільмами</th>';
    $out .='<th>Обновити запис</th>';
    $out .='<th>Видалити запис</th></tr>';
for ($i=0; $i < count($data); $i++){
    $out .="<tr><td>{$data[$i]['car_id']}</td>";
    $out .="<td>{$data[$i]['car_title']}</td>";
    $out .="<td><img src='{$data[$i]['car_image']}'  width='40'></td>";
    $out .="<td>{$data[$i]['car_article_id']}</td>";
    $out .="<td><a class='material-icons' href='/admin_update.php?id={$data[$i]['car_id']}'>edit</p></td>";
    $out .="<td><p class='check-delete material-icons' data='{$data[$i]['car_id']}'>delete</p></td></tr>";
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