<?php 
include_once 'includes/config.php';
include_once 'includes/functions.php';
include_once 'includes/header.php';
include_once 'includes/upload.php';
$currentId = $_GET['pageid'];
$row = selectSingleCar($pdo, $currentId);

if(isset($_POST['sell-car'])) {
	$sellCar=sellCar($pdo, $currentId);
    
}

if(isset($_POST['update-page'])) {
	$updateNodeInfo=updateNodeInfo($pdo, $currentId);
    echo basename($_FILES["img"]["name"]);
}

if(isset($updateNodeInfo)) {
    echo $updateNodeInfo;
    header("Refresh: 1");
}

?>

<div class="container-fluid">
    <div class="row">
    <h1> Edit your car here </h2>
        <form action="" method="post" class="ml-5" enctype="multipart/form-data">

        <?php
echo "


    <label for='model'>Car Model:</label><br>
  <input type='text' id='model' name='model' value='{$row['cars_model']}' required='required'><br><br>
  
  <label for='brand'>Car brand:</label><br>
  <input type='text' id='brand' name='brand' value='{$row['cars_brand']}' required='required'><br><br>
  
  <label for='milage'>Car milage:</label><br>
  <input type='text' id='milage' name='milage' value='{$row['cars_milage']}' required='required'><br><br>
  
  <label for='model_year'>Car year model:</label><br>
  <input type='text' id='model_year' name='model_year' value='{$row['cars_model_year']}' required='required'><br><br>
  
  <label for='price'>Price of car:</label><br>
  <input type='text' id='price' name='price' value='{$row['cars_price']}' required='required'><br><br>
  
  <label for='hp'>Horse power:</label><br>
  <input type='text' id='hp' name='hp' value='{$row['cars_hp']}'><br><br>
  
  <label for='dicplacement'>Engine dicplacement:</label><br>
  <input type='text' id='dicplacement' name='dicplacement' value='{$row['cars_dicplacement']}'><br><br>
  
  <label for='licence'>Licence plate:</label><br>
  <input type='text' id='licence' name='licence' value='{$row['cars_licence']}'><br><br>
  
  <label for='inspection_date'>Last inspection date:</label><br>
  <input type='date' id='inspection_date' name='inspection_date' value='{$row['cars_inpsection_date']}'><br><br>
  
  <label for='cunsumption'>Cars cunsumption:</label><br>
  <input type='text' id='cunsumption' name='cunsumption' value='{$row['cars_cunsumption']}'><br><br>
  
  <label for='emission'>Cars emission:</label><br>
  <input type='text' id='emission' name='emission' value='{$row['cars_emission']}'><br><br>
  
  <label for='car_weight'>Total weight of car:</label><br>
  <input type='text' id='car_weight' name='car_weight' value='{$row['cars_weight']}'><br><br>
  
  <label for='car_description'>Give a description of the car:</label><br>
  <textarea type='text' id='car_description' name='car_description' style='width: 250px; height: 100px;' >{$row['cars_description']}</textarea><br><br>
  
  <label for='technical'>All technical info :</label><br>
  <textarea type='text' id='technical' name='technical' style='width: 250px; height: 100px;'>{$row['cars_technical']}</textarea><br><br>
  
  <label for='img'>Img link:</label><br>
  <input type='file' id='img' name='img' value=''><br><br>
  
  "; 
  ?>


  <select name="body_fk">
    <?php $body = fetchBody($pdo);?>
  <select>
  <br>
  <br>
  <select name="drive_fk">
    <?php $body = fetchDrive($pdo);?>
  <select>
  <br>
  <br>
  <select name="fuel_fk">
    <?php $body = fetchFuel($pdo);?>
  <select>
<br>
<br>
  <select name="trans_fk">
    <?php $body = fetchTrans($pdo); ?>
  <select>
  <br><br>
  
  <input class="mb-4" name="update-page" type="submit" value="Submit">
</form> 
</div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end me-5 mb-5">
      <form method="post">
        <?php echo "<a href='' name='sell-car' class='btn btn-warning btn-lg align-self-end me-5'  role='button'>Sell Car</a>";?>
      </form>
    <?php echo "<a href='deleteCar.php?pageid=$currentId' class='btn btn-danger btn-lg align-self-end'  role='button'>Delete Car</a>";?>
    </div>

</div>












<?php 
include_once 'includes/footer.php';
?>