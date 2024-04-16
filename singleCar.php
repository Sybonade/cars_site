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
    <?php echo "<h1 class='mb-4'>{$singeleCar['cars_model']}, {$singeleCar['cars_brand']}</h1>";?>
    <?php echo "<h5 class='mb-3'> {$singeleCar['cars_description']}</h5>";?>
    <br>
    <?php echo "<p class='mb-4'>{$singeleCar['cars_technical']}</p>";?>
  <?php echo "<img style='max-width: 500px !important;' class='card-img-top' id='card_img' src='uploads/{$singeleCar['cars_img']}' alt='Card image cap'>";?>
<div class="container mb-5 mt-5 p-2" style="border-style: ridge;">
  <div class="row mb-3">
    <div class="col-3 align-self-start">
      <h4 class="">Starting Price</h4>
    </div>
    <div class="col-3 align-self-start">
      <h4>Milage </h4>
    </div>
    <div class="col-3 align-self-center">
      <h4>Emissioins CO2 </h4>
    </div>
    <div class="col-3 align-self-end">
      <h4>Power </h4>
    </div>
</div>
<div class="row">
    <div class="col-3 align-self-start">
    <?php echo " <h6 >{$singeleCar['cars_price']}€</h6>";?>
    </div>
    <div class="col-3 align-selft-start">
    <?php echo " <h6>{$singeleCar['cars_milage']}km</h6>";?>
    </div>
    <div class="col-3 align-self-center">
    <?php echo " <h6>{$singeleCar['cars_emission']} g/KM</h6>";?>
    </div>
    <div class="col-3 align-self-end">
      <?php echo "<h6>{$singeleCar['cars_hp']} kw</h6>";?>
    </div>
</div>
</div>
</div>
    <div class="text-center">
      <button type="button" class="btn btn-secondary btn-lg">Contact Seller</button>
    </div>
</div>



<?php 
include_once 'includes/footer.php';
?>