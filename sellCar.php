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

$allOwners = getOwners($pdo);

?>

<h2 class="ml-5" >Customer Info</h2>


<form action="" method="post" class="ml-5">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="John" required="required"><br><br>
  
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe" required="required"><br><br>
  
  <label for="adress">Adress:</label><br>
  <input type="text" id="adress" name="adress" value="Kivipellonkatu 2" required="required"><br><br>
  
  <label for="zip">Zip Code:</label><br>
  <input type="text" id="zip" name="zip" value="10300" required="required"><br><br>
  
  <label for="city">City:</label><br>
  <input type="text" id="city" name="city" value="Karjaa" required="required"><br><br>
  
  <label for="phone">Phone number:</label><br>
  <input type="text" id="phone" name="phone" value="0401234567" required="required"><br><br>
  
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" value="john.doe@example.com"><br><br>
    
  <input name="add-customer" type="submit" value="Submit">
</form> 


<h2 class="ml-5" >Add new car</h2>


<form action="" method="post" class="ml-5" enctype="multipart/form-data">
    <label for="owner_fk">Please select your account: </label>
    <br>
    <br>
    <select name="owner_fk">
      <?php $populateOwners = populateOwner($stmt_getOweners);?>
    </select>
    <br>
    <br>

  <label for="model">Car Model:</label><br>
  <input type="text" id="model" name="model" value="" required="required"><br><br>
  
  <label for="brand">Car brand:</label><br>
  <input type="text" id="brand" name="brand" value="" required="required"><br><br>
  
  <label for="milage">Car milage:</label><br>
  <input type="text" id="milage" name="milage" value="" required="required"><br><br>
  
  <label for="model_year">Car year model:</label><br>
  <input type="text" id="model_year" name="model_year" value="" required="required"><br><br>
  
  <label for="price">Price of car:</label><br>
  <input type="text" id="price" name="price" value="" required="required"><br><br>
  
  <label for="hp">Horse power:</label><br>
  <input type="text" id="hp" name="hp" value=""><br><br>
  
  <label for="dicplacement">Engine dicplacement:</label><br>
  <input type="text" id="dicplacement" name="dicplacement" value=""><br><br>
  
  <label for="licence">Licence plate:</label><br>
  <input type="text" id="licence" name="licence" value=""><br><br>
  
  <label for="inspection_date">Last inspection date:</label><br>
  <input type="date" id="inspection_date" name="inspection_date" value=""><br><br>
  
  <label for="cunsumption">Cars cunsumption:</label><br>
  <input type="text" id="cunsumption" name="cunsumption" value=""><br><br>
  
  <label for="emission">Cars emission:</label><br>
  <input type="text" id="emission" name="emission" value=""><br><br>
  
  <label for="car_weight">Total weight of car:</label><br>
  <input type="text" id="car_weight" name="car_weight" value=""><br><br>
  
  <label for="car_description">Give a description of the car:</label><br>
  <input type="textarea" id="car_description" name="car_description" value=""><br><br>
  
  <label for="technical">All technical info :</label><br>
  <input type="textare" id="technical" name="technical" value=""><br><br>
  
  <label for="img">Img link:</label><br>
  <input type="file" id="img" name="img" value=""><br><br>


  <select name="body_fk">
    <?php $body = $pdo->query('SELECT * FROM table_body_style')->fetchAll();
    foreach ($body as $row) {
    echo "<option value='{$row['body_style_id']}'>{$row['body_style_name']}</option>";
    }?>
  <select>
  <br>
  <br>
  <select name="drive_fk">
    <?php $body = $pdo->query('SELECT * FROM table_drivetrain')->fetchAll();
    foreach ($body as $row) {
    echo "<option value='{$row['drive_id']}'>{$row['drive_name']}</option>";
    }?>
  <select>
  <br>
  <br>
  <select name="fuel_fk">
    <?php $body = $pdo->query('SELECT * FROM table_fueltype')->fetchAll();
    foreach ($body as $row) {
    echo "<option value='{$row['fuel_id']}'>{$row['fuel_name']}</option>";
    }?>
  <select>
<br>
<br>
  <select name="trans_fk">
    <?php $body = $pdo->query('SELECT * FROM table_trans_type')->fetchAll();
    foreach ($body as $row) {
    echo "<option value='{$row['trans_id']}'>{$row['trans_name']}</option>";
    }?>
  <select>
  <br><br>
  
  <input name="add-car" type="submit" value="Submit">
</form> 


<?php 
include_once 'includes/footer.php';
?>