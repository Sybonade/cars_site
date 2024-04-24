<?php 
include_once 'includes/config.php';
include_once 'includes/functions.php';
include_once 'includes/header.php';
//$cars = $pdo->query('SELECT * FROM table_cars')->fetchAll();

$currentId = $_GET['pageid'];
$singeleCar = selectSingleCar($pdo, $currentId);

?>


<div class="container p-5 m-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4"><?php echo "{$singeleCar['cars_model']}, {$singeleCar['cars_brand']}"; ?></h1>
            <h5 class="mb-3"><?php echo $singeleCar['cars_description']; ?></h5>
            <br>
            <p class="mb-4"><?php echo $singeleCar['cars_technical']; ?></p>
            <img class="card-img-top mb-4" id="card_img" src="uploads/<?php echo $singeleCar['cars_img']; ?>" alt="Car Image">
        </div>
    </div>
    <div class="row mb-5 mt-5 p-2 border border-2 border-secondary">
        <div class="col-md-3">
            <h4>Starting Price</h4>
            <h6><?php echo "{$singeleCar['cars_price']}€"; ?></h6>
        </div>
        <div class="col-md-3">
            <h4>Mileage</h4>
            <h6><?php echo "{$singeleCar['cars_milage']}km"; ?></h6>
        </div>
        <div class="col-md-3">
            <h4>Emissions CO2</h4>
            <h6><?php echo "{$singeleCar['cars_emission']} g/KM"; ?></h6>
        </div>
        <div class="col-md-3">
            <h4>Power</h4>
            <h6><?php echo "{$singeleCar['cars_hp']} kw"; ?></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-secondary btn-lg">Contact Seller</button>
        </div>
    </div>
</div>


<?php 
include_once 'includes/footer.php';
?>