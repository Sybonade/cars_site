<?php 
include_once 'includes/config.php';
include_once 'includes/functions.php';
include_once 'includes/header.php';


if(isset($_POST['add-attribute'])) {
    $addAttribute=addAttribute($pdo);
	

}

?>
    <div class="container">
        <div class="row mt-5 mb-5">
        <h2>Form with 4 Columns</h2>
        <form method="post">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="body" class="form-label">Add Body style</label>
                    <input type="text" class="form-control" name="body" id="body" placeholder="Enter text">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="drive" class="form-label">Add drivetrain type</label>
                    <input type="text" name="drive" class="form-control" id="drive" placeholder="Enter text">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="fuel" class="form-label">Add fueltype</label>
                    <input type="text" name="fuel" class="form-control" id="fuel" placeholder="Enter text">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="trans" class="form-label">Add transmission type</label>
                    <input type="text" name="trans" class="form-control" id="trans" placeholder="Enter text">
                </div>
            </div>
            <button type="submit" name="add-attribute" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>



<?php
include_once 'includes/footer.php';
?>