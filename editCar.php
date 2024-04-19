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
echo "
<div class='container mt-5'>
    <div class='row justify-content-center'>
        <div class='col-md-8'>
        <h1 class='text-center mb-4'> Edit your car here </h2>
            <h2 class='text-center mb-4'>Car Information</h2>
            <form action='' method='post' enctype='multipart/form-data'>
            <!-- Row for Car Model and Brand -->
                <div class='row g-3'>
                    <div class='col-md-6'>
                        <label for='model' class='form-label'>Car Model:</label>
                        <input type='text' class='form-control' id='model' name='model' value='{$row['cars_model']}' required>
                    </div>
                    <div class='col-md-6'>
                        <label for='brand' class='form-label'>Car Brand:</label>
                        <input type='text' class='form-control' id='brand' name='brand' value='{$row['cars_brand']}' required>
                    </div>
                </div>

                <!-- Row for Mileage and Model Year -->
                <div class='row g-3'>
                    <div class='col-md-6'>
                        <label for='milage' class='form-label'>Car Mileage:</label>
                        <input type='text' class='form-control' id='milage' name='milage' value='{$row['cars_milage']}' required>
                    </div>
                    <div class='col-md-6'>
                        <label for='model_year' class='form-label'>Car Year Model:</label>
                        <input type='text' class='form-control' id='model_year' name='model_year' value='{$row['cars_model_year']}' required>
                    </div>
                </div>

                <!-- Row for Price and Horse Power -->
                <div class='row g-3'>
                    <div class='col-md-6'>
                        <label for='price' class='form-label'>Price of Car:</label>
                        <input type='text' class='form-control' id='price' name='price' value='{$row['cars_price']}' required>
                    </div>
                    <div class='col-md-6'>
                        <label for='hp' class='form-label'>Horse Power:</label>
                        <input type='text' class='form-control' id='hp' name='hp' value='{$row['cars_hp']}'>
                    </div>
                </div>

                <!-- Row for Engine Displacement and Licence Plate -->
                <div class='row g-3'>
                    <div class='col-md-6'>
                        <label for='dicplacement' class='form-label'>Engine Displacement:</label>
                        <input type='text' class='form-control' id='dicplacement' name='dicplacement' value='{$row['cars_dicplacement']}'>
                    </div>
                    <div class='col-md-6'>
                        <label for='licence' class='form-label'>Licence Plate:</label>
                        <input type='text' class='form-control' id='licence' name='licence' value='{$row['cars_licence']}'>
                    </div>
                </div>

                <!-- Row for Inspection Date and Car Consumption -->
                <div class='row g-3'>
                    <div class='col-md-6'>
                        <label for='inspection_date' class='form-label'>Last Inspection Date:</label>
                        <input type='date' class='form-control' id='inspection_date' name='inspection_date' value='{$row['cars_inpsection_date']}'>
                    </div>
                    <div class='col-md-6'>
                        <label for='cunsumption' class='form-label'>Car Consumption:</label>
                        <input type='text' class='form-control' id='cunsumption' name='cunsumption' value='{$row['cars_cunsumption']}'>
                    </div>
                </div>

                <!-- Row for Car Emission and Total Weight -->
                <div class='row g-3'>
                    <div class='col-md-6'>
                        <label for='emission' class='form-label'>Car Emission:</label>
                        <input type='text' class='form-control' id='emission' name='emission' value='{$row['cars_emission']}'>
                    </div>
                    <div class='col-md-6'>
                        <label for='car_weight' class='form-label'>Total Weight of Car:</label>
                        <input type='text' class='form-control' id='car_weight' name='car_weight' value='{$row['cars_weight']}'>
                    </div>
                </div>

                <!-- Larger fields for description and technical info -->
                <div class='mb-3'>
                    <label for='car_description' class='form-label'>Give a Description of the Car:</label>
                    <textarea class='form-control' id='car_description' name='car_description' style='height: 100px;'>{$row['cars_description']}</textarea>
                </div>

                <div class='mb-3'>
                    <label for='technical' class='form-label'>All Technical Info:</label>
                    <textarea class='form-control' id='technical' name='technical' style='height: 100px;'>{$row['cars_technical']}</textarea>
                </div>

                <div class='mb-3'>
                    <label for='img' class='form-label'>Image Link:</label>
                    <input type='file' class='form-control' id='img' name='img'>
                </div>

            
";?>
         

                <!-- Row for Transmission Type and Body Style -->
                <div class='row g-3'>
                    <div class='col-md-6'>
                        <label for='trans_fk' class='form-label'>Drive Type: </label>
                        <select name='trans_fk' class='form-select' id='trans_fk'>
                            <?php $transmission = fetchDrive($pdo); ?>
                        </select>
                    </div>
                    <div class='col-md-6'>
                        <label for='body_style_fk' class='form-label'>Body Style:</label>
                        <select name='body_style_fk' class='form-select' id='body_style_fk'>
                            <?php $body = fetchBody($pdo); ?>
                        </select>
                    </div>
                </div>

                <!-- Row for Drive Type and Fuel Type -->
                <div class='row g-3'>
                    <div class='col-md-6'>
                        <label for='drive_fk' class='form-label'>Fuel Type:</label>
                        <select name='drive_fk' class='form-select' id='drive_fk'>
                            <?php $drive = fetchFuel($pdo); ?>
                        </select>
                    </div>
                    <div class='col-md-6'>
                        <label for='fuel_fk' class='form-label'>Transmission Type: </label>
                        <select name='fuel_fk' class='form-select' id='fuel_fk'>
                            <?php $fuel = fetchTrans($pdo); ?>
                        </select>
                    </div>
                </div>

                <!-- Additional rows and fields as needed -->

                <!-- Form submit button -->
                <div class='row mt-3'>
                    <div class='col text-center'>
                        <button type='submit' name='update-page' class='btn btn-primary'>Update Info</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




        <!-- Delete and sell car buttons -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-5  mb-5">
      <form method="post">
        <?php echo "<button name='sell-car' class='btn btn-warning btn-lg align-self-end me-5'  role='button'>Sell Car</button>";?>
      </form>
    <?php echo "<a href='deleteCar.php?pageid=$currentId' class='btn btn-danger btn-lg align-self-end'  role='button'>Delete Car</a>";?>
    </div>

</div>
</div>
<?php



    /*<label for='model'>Car Model:</label><br>
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
  


  <select name="body_fk">
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

</div>*/
?>












<?php 
include_once 'includes/footer.php';
?>