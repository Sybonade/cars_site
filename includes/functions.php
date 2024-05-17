<?php
include_once 'config.php';

function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addAttribute($pdo) {

    if (empty($_POST['fuel'])) {$fuel = NULL;} else {$fuel = cleanInput($_POST['fuel']);}
    if (empty($_POST['trans'])) {$trans = NULL;} else {$trans = cleanInput($_POST['trans']);}
    if (empty($_POST['body'])) {$body = NULL;} else {$body = cleanInput($_POST['body']);}
    if (empty($_POST['drive'])) {$drive = NULL;} else {    $drive = cleanInput($_POST['drive']);}


    $addFuelType = $pdo->prepare("INSERT INTO table_fueltype (fuel_name) VALUES (:fuel)");
    $addFuelType->bindParam(":fuel", $fuel, PDO::PARAM_STR);
    if($addFuelType->execute()) {
         echo "Succes";
    }else {
         echo "Something went wrong";
    }

    $addDriveType = $pdo->prepare("INSERT INTO table_drivetrain (drive_name) VALUES (:drive)");
    $addDriveType->bindParam(":drive", $drive, PDO::PARAM_STR);
    if($addDriveType->execute()) {
    echo "Succes";
}else {
     echo "Something went wrong";
}



    $addBodyType = $pdo->prepare("INSERT INTO table_body_style (body_style_name) VALUES (:body)");
    $addBodyType->bindParam(":body", $body, PDO::PARAM_STR);
    if($addBodyType->execute()) {
    echo "Succes";
}else {
     echo "Something went wrong";
}



    $addTransType = $pdo->prepare("INSERT INTO table_trans_type (trans_name) VALUES (:trans)");
    $addTransType->bindParam(":trans", $trans, PDO::PARAM_STR);
    if($addTransType->execute()) {
    echo "Succes";
}else {
     echo "Something went wrong";
}


}

function newCustomer($pdo) {

    $fname = cleanInput($_POST['fname']);
    $lanme = cleanInput($_POST['lanme']);
    $adress = cleanInput($_POST['adress']);
    $zip = cleanInput($_POST['zip']);
    $city = cleanInput($_POST['city']);
    $phone = cleanInput($_POST['phone']);
    $email = cleanInput($_POST['email']);

    $stmt_newCustomer = $pdo->prepare('INSERT INTO table_owner (owner_fname, owner_lname, owner_adress, owner_city, owner_zip, owner_phone, owner_email) 
    VALUES (:fname, :lname, :adress, :city, :zip, :phone, :email)');

    $stmt_newCustomer->bindParam(':fname' ,$fname , PDO::PARAM_STR);
    $stmt_newCustomer->bindParam(':lname' , $lanem, PDO::PARAM_STR);
    $stmt_newCustomer->bindParam(':adress' , $adress, PDO::PARAM_STR);
    $stmt_newCustomer->bindParam(':zip' , $zip, PDO::PARAM_STR);
    $stmt_newCustomer->bindParam(':city' , $city, PDO::PARAM_STR);
    $stmt_newCustomer->bindParam(':phone' , $phone, PDO::PARAM_STR);
    $stmt_newCustomer->bindParam(':email' , $email, PDO::PARAM_STR);
    $stmt_newCustomer->execute();



}

function newCar($pdo) {

        $model = cleanInput($_POST['model']);
        $brand = cleanInput($_POST['brand']);
        $milage = cleanInput($_POST['milage']);
        $model_year = cleanInput($_POST['model_year']);
        $price = cleanInput($_POST['price']);
        $hp = cleanInput($_POST['hp']);
        $dicplacement = cleanInput($_POST['dicplacement']);
        $licence = cleanInput($_POST['licence']);
        $inspection_date = cleanInput($_POST['inspection_date']);
        $cunsumption = cleanInput($_POST['cunsumption']);
        $emission = cleanInput($_POST['emission']);
        $car_weight = cleanInput($_POST['car_weight']);
        $car_description = cleanInput($_POST['car_description']);
        $technical = cleanInput($_POST['technical']);
        $owner_fk = cleanInput($_POST['owner_fk']);
        $fuel_fk = cleanInput($_POST['fuel_fk']);
        $trans_fk = cleanInput($_POST['trans_fk']);
        $body_fk = cleanInput($_POST['body_style_fk']);
        $drive_fk = cleanInput($_POST['drive_fk']);


        $car_img = cleanInput(basename($_FILES["img"]["name"]));
        
    $stmt_newCar = $pdo->prepare('INSERT INTO table_cars (cars_model, cars_brand, cars_milage, cars_model_year, cars_price, cars_hp, cars_dicplacement,
    cars_licence, cars_inpsection_date, cars_cunsumption, cars_emission, cars_weight, cars_description, cars_technical, cars_img, cars_owner_fk, cars_fuel_fk,
    cars_trans_fk, cars_body_fk, cars_drive_fk) 

    VALUES (:model, :brand, :milage, :model_year, :price, :hp, :dicplacement, :licence, :inspection_date, :cunsumption, :emission, 
    :car_weight, :car_description,
    :technical, :img, :user, :fuel_fk, :trans_fk, :body_fk, :drive_fk)');
    $stmt_newCar->bindParam(':model' ,$model , PDO::PARAM_STR);
    $stmt_newCar->bindParam(':brand' ,$brand , PDO::PARAM_STR);
    $stmt_newCar->bindParam(':milage' ,$milage , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':model_year' ,$model_year , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':price' ,$price , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':hp' ,$hp , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':dicplacement' ,$dicplacement , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':licence' ,$licence , PDO::PARAM_STR);
    $stmt_newCar->bindParam(':inspection_date' ,$inspection_date , PDO::PARAM_STR);
    $stmt_newCar->bindParam(':cunsumption' ,$cunsumption , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':emission' ,$emission , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':car_weight' ,$car_weight , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':car_description' ,$car_description , PDO::PARAM_STR);
    $stmt_newCar->bindParam(':technical' ,$technical , PDO::PARAM_STR);
    $stmt_newCar->bindParam(':img' , $car_img, PDO::PARAM_STR);
    $stmt_newCar->bindParam(':user' ,$owner_fk , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':fuel_fk' ,$fuel_fk , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':trans_fk' ,$trans_fk , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':body_fk' ,$body_fk , PDO::PARAM_INT);
    $stmt_newCar->bindParam(':drive_fk' ,$drive_fk , PDO::PARAM_INT);
    $stmt_newCar->execute();

}


function getOwners($pdo) {
    global $stmt_getOweners;
    $stmt_getOweners = $pdo->query("SELECT * FROM table_owner");
}

function populateOwner($stmt_getOweners) {
    foreach($stmt_getOweners as $owner) {
        echo "<option value='{$owner['owner_id']}' >{$owner['owner_fname']} {$owner['owner_lname']}</option>";
      }

    return;
}

function getCars($pdo) {
    $carSold = 0;
    global $stmt_getCars;
    $stmt_getCars = $pdo->prepare("SELECT * FROM table_cars WHERE cars_sold_status = :sold");
    $stmt_getCars->bindParam(':sold', $carSold, PDO::PARAM_INT);
    $stmt_getCars->execute();



}

function populateCars($stmt_getCars) {
    foreach ($stmt_getCars as $row) {
    echo "<div class='col-4' style='padding-rigth: 0px !important;'>
    <div style='min-height: 400px !important;' class='card mb-3'>
    <img class='card-img-top same-size-car-img' id='card_img' src='uploads/{$row['cars_img']}' alt='Card image cap'>
    <div class='card-body'>
      <h5 class='card-title'>{$row['cars_brand']}, {$row['cars_model']}</h5>
      <h6>{$row['cars_milage']}</h6>
      <p class='card-text'>Milage: {$row['cars_milage']}, Price: {$row['cars_price']}€ , Horse Power: {$row['cars_hp']}</p>
      <div class='row'>
      <div class='col-4 align-self-start'>
      <a href='singleCar.php?pageid={$row['cars_id']}' class='btn btn-secondary'>More info</a>
      </div>
      <div class='col-4 align-self-end'>
      <a href='editCar.php?pageid={$row['cars_id']}'  type='button' class='btn btn-info'>Edit cars</a>
      </div>
      </div>
  
      
    </div>
  </div>
    
    </div>";}
    return;
}


function selectSingleCar($pdo, $currentId) {
	$stmt_getSingleCar = $pdo->prepare('SELECT * FROM table_cars WHERE cars_id = :id');
	$stmt_getSingleCar->bindParam(':id', $currentId, PDO::PARAM_INT);
	$stmt_getSingleCar->execute();
	return $stmt_getSingleCar->fetch();
}

function updateNodeInfo($pdo, $currentId) {

    $model = cleanInput($_POST['model']);
    $brand = cleanInput($_POST['brand']);
    $milage = cleanInput($_POST['milage']);
    $model_year = cleanInput($_POST['model_year']);
    $price = cleanInput($_POST['price']);
    $hp = cleanInput($_POST['hp']);
    $dicplacement = cleanInput($_POST['dicplacement']);
    $licence = cleanInput($_POST['licence']);
    $inspection_date = cleanInput($_POST['inspection_date']);
    $cunsumption = cleanInput($_POST['cunsumption']);
    $emission = cleanInput($_POST['emission']);
    $car_weight = cleanInput($_POST['car_weight']);
    $car_description = cleanInput($_POST['car_description']);
    $technical = cleanInput($_POST['technical']);
    $fuel_fk = cleanInput($_POST['fuel_fk']);
    $trans_fk = cleanInput($_POST['trans_fk']);
    $body_fk = cleanInput($_POST['body_fk']);
    $drive_fk = cleanInput($_POST['drive_fk']);

    $car_img = cleanInput(basename($_FILES["img"]["name"]));

	$stmt_updateNodeInfo = $pdo->prepare('UPDATE table_cars SET cars_model = :model, cars_brand = :brand, cars_milage = :milage, cars_model_year = :modelYear, cars_price = :price, cars_hp = :power, cars_dicplacement = :dicpl,
    cars_licence = :licence, cars_inpsection_date = :inspection, cars_cunsumption = :cunsumption, cars_emission = :emission, cars_weight = :weigth, cars_description = :descript, cars_technical = :technical, cars_img = :img, cars_fuel_fk = :fuelfk,
    cars_trans_fk = :transfk, cars_body_fk = :bodyfk, cars_drive_fk = :drivefk WHERE cars_id = :id');
	$stmt_updateNodeInfo->bindParam(':id', $currentId, PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':model' ,$model , PDO::PARAM_STR);
    $stmt_updateNodeInfo->bindParam(':brand' ,$brand , PDO::PARAM_STR);
    $stmt_updateNodeInfo->bindParam(':milage' ,$milage , PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':model_year' ,$model_year , PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':price' ,$price , PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':hp' ,$hp , PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':dicplacement' ,$dicplacement , PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':licence' ,$licence , PDO::PARAM_STR);
    $stmt_updateNodeInfo->bindParam(':inspection_date' ,$inspection_date , PDO::PARAM_STR);
    $stmt_updateNodeInfo->bindParam(':cunsumption' ,$cunsumption , PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':emission' ,$emission , PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':car_weight' ,$car_weight , PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':car_description' ,$car_description , PDO::PARAM_STR);
    $stmt_updateNodeInfo->bindParam(':technical' ,$technical , PDO::PARAM_STR);
    $stmt_updateNodeInfo->bindParam(':img' , $car_img, PDO::PARAM_STR);
    $stmt_updateNodeInfo->bindParam(':fuel_fk' ,$fuel_fk , PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':trans_fk' ,$trans_fk , PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':body_fk' ,$body_fk , PDO::PARAM_INT);
    $stmt_updateNodeInfo->bindParam(':drive_fk' ,$drive_fk , PDO::PARAM_INT);
	if($stmt_updateNodeInfo->execute()){
		return "<h2 style='color: green;'>Status Updated</h2>";
		}
	else {
		return "<h2 style='color: red;'>Status did not update</h2>";
	}
	

}

function fetchBody($pdo) {
    $body = $pdo->query('SELECT * FROM table_body_style')->fetchAll();
    foreach ($body as $row) {
        echo "<option value='{$row['body_style_id']}'>{$row['body_style_name']}</option>";
        }
    return $row;

}

function fetchDrive($pdo) {
    $body = $pdo->query('SELECT * FROM table_drivetrain')->fetchAll();
        foreach ($body as $row) {
            echo "<option value='{$row['drive_id']}'>{$row['drive_name']}</option>";
        }
    return $row;

}

function fetchFuel($pdo) {
    $body = $pdo->query('SELECT * FROM table_fueltype')->fetchAll();    foreach ($body as $row) {
        echo "<option value='{$row['fuel_id']}'>{$row['fuel_name']}</option>";
    }
    return $row;

}

function fetchTrans($pdo) {
    $body = $pdo->query('SELECT * FROM table_trans_type')->fetchAll();
        foreach ($body as $row) {
            echo "<option value='{$row['trans_id']}'>{$row['trans_name']}</option>";
    }
    return $row;

}

function deleteCar($pdo, $currentId) {
    $stmt_deleteCar = $pdo->prepare("DELETE FROM table_cars WHERE cars_id = '$currentId'");
    if($stmt_deleteCar->execute()){
		return header("Location: index.php");
        exit();
		}
	else {
		return "<h2 class='text-center' style='color: red;'>Something went wrong</h2>";
	}

}

function sellCar($pdo, $currentId) {

    $soldCar = 1;

    $stmt_sellCar = $pdo->prepare("UPDATE table_cars SET cars_sold_status = :carstatus WHERE cars_id = '$currentId'");
    $stmt_sellCar->bindParam(':carstatus' , $soldCar, PDO::PARAM_INT);
    if($stmt_sellCar->execute()){
		return header("Location: index.php");
        exit();
		}
	else {
		return "<h2 class='text-center' style='color: red;'>Something went wrong</h2>";
	}

}

?>