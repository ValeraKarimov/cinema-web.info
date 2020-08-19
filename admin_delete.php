<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();

$data = deleteArticle($conn, $_GET['id']);
?>
<div class="container">
    <div class="ro">
        <div class="col-lg-12">
            <?php
                if ($data === true) {
                    echo 'Record was deleted';
                    echo '<p><a href="admin.php">Return to admin panel</a></p>';
                }
                else {
                    echo 'Error!'.$data;
                }
            ?>
        </div>
    </div>
</div>
<?php
close($conn);