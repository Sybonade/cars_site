<?php 
include_once 'includes/config.php';
include_once 'includes/functions.php';
include_once 'includes/header.php';

$currentId = $_GET['pageid'];
$row = selectSingleCar($pdo, $currentId);


if(isset($_POST['delete-car'])) {
	$deleteCar=deleteCar($pdo, $currentId);
    echo $deleteCar;
}
?>

<div class="container-fluid text-center ">
    <div class="row m-5">
        <h1> Are you sure you want to remove car listing </h1>
        <h3> To delete car press button below </h3>
        <div>
            <form method="post">
                <a href='editCar.php?pageid=<?php echo $currentId ?>' name='return' class='btn  btn-warning btn-lg align-self-end me-5'  role='button'>Return</a>
                <button name="delete-car" role="button" class="btn btn-danger btn-lg align-self-end">Delete car</button>
            </form>
</div>
</div>
</div>



<?php 
include_once 'includes/footer.php';
?>