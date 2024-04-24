<?php 
include_once 'includes/config.php';
include_once 'includes/upload.php';
include_once 'includes/functions.php';
include_once 'includes/header.php';

if(isset($_POST['add-customer'])) {
	$orderInsertStatus=newCustomer($pdo);
	echo $orderInsertStatus;
}

if(isset($_POST['add-car'])) {
  echo basename($_FILES["img"]["name"]);
	$orderInsertStatus=newCar($pdo);
  
	echo $orderInsertStatus;
}

$allOwners = getOwners($pdo)

?>


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
    <h2 class="text-center mb-4">Customer Info</h2>
      <form method="post">
        <div class="row mb-3">
          <div class="col">
            <label for="fname" class="form-label">First name: </label>
            <input type="text" name="first_name" class="form-control" id="fname" placeholder="First name">
          </div>
          <div class="col">
            <label for="lname" class="form-label">Last name: </label>
            <input type="text" name="last_name" class="form-control" id="lname" placeholder="Last name">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="adress" class="form-label">Address: </label>
            <input type="text" name="address" class="form-control" id="adress" placeholder="Address">
          </div>
          <div class="col">
            <label for="zip" class="form-label">Zip code: </label>
            <input type="number" name="zip_code" class="form-control" id="zip" placeholder="Zip code">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="city" class="form-label">City: </label>
            <input type="text" name="city" class="form-control" id="city" placeholder="City">
          </div>
          <div class="col">
            <label for="phone" class="form-label">Phone number: </label>
            <input type="text" name="phone_number" class="form-control" id="phone" placeholder="Phone number">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="email" class="form-label">Email: </label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
          </div>
        <div class="row mt-3">
          <div class="col">
            <button type="submit" name="add-customer" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="ml-5">Add new car</h2>
      <form method="post" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
            <label for="owner" class="form-label">Please select your account:</label>
            <select name="owner_fk" class="form-select" id="owner" required="required">
              <?php $populateOwners = populateOwner($stmt_getOweners);?>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="model" class="form-label">Car Model:</label>
            <input type="text" name="model" class="form-control" id="model" value="" required="required">
          </div>
          <div class="col">
            <label for="brand" class="form-label">Car Brand:</label>
            <input type="text" name="brand" class="form-control" id="brand" value="" required="required">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="milage" class="form-label">Car Milage:</label>
            <input type="text" name="milage" class="form-control" id="milage" value="" required="required">
          </div>
          <div class="col">
            <label for="model_year" class="form-label">Car Year Model:</label>
            <input type="text" name="model_year" class="form-control" id="model_year" value="" required="required">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="price" class="form-label">Price of Car:</label>
            <input type="text" name="price" class="form-control" id="price" value="" required="required">
          </div>
          <div class="col">
            <label for="hp" class="form-label">Horse Power:</label>
            <input type="text" name="hp" class="form-control" id="hp" value="">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="dicplacement" class="form-label">Engine Displacement:</label>
            <input type="text" name="dicplacement" class="form-control" id="dicplacement" value="">
          </div>
          <div class="col">
            <label for="licence" class="form-label">Licence Plate:</label>
            <input type="text" name="licence" class="form-control" id="licence" value="">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="inspection_date" class="form-label">Last Inspection Date:</label>
            <input type="date" name="inspection_date" class="form-control" id="inspection_date" value="">
          </div>
          <div class="col">
            <label for="cunsumption" class="form-label">Car Consumption:</label>
            <input type="text" name="cunsumption" class="form-control" id="cunsumption" value="">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="emission" class="form-label">Car Emission:</label>
            <input type="text" name="emission" class="form-control" id="emission" value="">
          </div>
          <div class="col">
            <label for="car_weight" class="form-label">Total Weight of Car:</label>
            <input type="text" name="car_weight" class="form-control" id="car_weight" value="">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="car_description" class="form-label">Description of the Car:</label>
            <textarea name="car_description" class="form-control" id="car_description"></textarea>
          </div>
          <div class="col">
            <label for="technical" class="form-label">All Technical Info:</label>
            <textarea name="technical" class="form-control" id="technical"></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="img" class="form-label">Image Link:</label>
            <input type="file" name="img" class="form-control" id="img" value="">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="trans_fk" class="form-label">Transmission Type:</label>
            <select name="trans_fk" class="form-select" id="trans_fk">
              <?php 
                $trans_types = $pdo->query('SELECT * FROM table_trans_type')->fetchAll();
                foreach ($trans_types as $type) {
                  echo "<option value='{$type['trans_id']}'>{$type['trans_name']}</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="body_style_fk" class="form-label">Body Style:</label>
            <select name="body_style_fk" class="form-select" id="body_style_fk">
              <?php 
                $body_styles = $pdo->query('SELECT * FROM table_body_style')->fetchAll();
                foreach ($body_styles as $style) {
                  echo "<option value='{$style['body_style_id']}'>{$style['body_style_name']}</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="drive_fk" class="form-label">Drive Type:</label>
            <select name="drive_fk" class="form-select" id="drive_fk">
              <?php 
                $drives = $pdo->query('SELECT * FROM table_drivetrain')->fetchAll();
                foreach ($drives as $drive) {
                  echo "<option value='{$drive['drive_id']}'>{$drive['drive_name']}</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="fuel_fk" class="form-label">Fuel Type:</label>
            <select name="fuel_fk" class="form-select" id="fuel_fk">
              <?php 
                $fuels = $pdo->query('SELECT * FROM table_fueltype')->fetchAll();
                foreach ($fuels as $fuel) {
                  echo "<option value='{$fuel['fuel_id']}'>{$fuel['fuel_name']}</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <button type="submit" name="add-car" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>











<?php 
include_once 'includes/footer.php';
?>