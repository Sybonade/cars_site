<?php 
include_once 'includes/config.php';
include_once 'includes/functions.php';
include_once 'includes/header.php';
$cars = getCars($pdo);
?>

<div class="container-fluid">
<div class='row mt-5'>
    <?php
    $populateCars = populateCars($stmt_getCars);
    ?>
  
</div>
</div>





<?php 
include_once 'includes/footer.php';
?>