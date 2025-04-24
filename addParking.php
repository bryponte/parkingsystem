<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Park Vehicle</title>
</head>
<body>
    <?php 
    include_once "function.php";
    include_once "park.class.php";
    $obj = new Parking;

    $vehicle_plate = $parking_slot_id = $remarks ='';
    $vehicle_plateErr = $parking_slot_idErr = $remarksErr ='';
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $vehicle_plate = clean_input($_POST["vehicle_plate"]);
        $parking_slot_id = clean_input($_POST["parking_slot_id"]);
        $remarks = clean_input($_POST["remarks"]);
        if(empty($vehicle_plate)){
            $vehicle_plateErr = "Vehicle plate is required";
        }
        if(empty($parking_slot_id)){
            $parking_slot_idErr = "Parking slot is required";
        }
        if(empty($remarks)){
            $remarksErr = "Please describe your vehicle";
        }
        if(empty($vehicle_plateErr) && empty($parking_slot_idErr) && empty($remarksErr)){ 
            $obj->vehicle_plate = $vehicle_plate;
            $obj->parking_slot_id = $parking_slot_id;
            $obj->remarks = $remarks;
            $obj->addParking();
            echo "Parking Added!";
            header("refresh: 2, url=park.php");
            exit;
        }
    }
    ?>
    <a href="park.php">View Parking</a>
    <a href="">Transaction</a>
    <h3>Park Vehicle</h3>
    <form action="" method="post">
        <label for="vehicle_plate">Vehicle Plate: </label>
        <!-- <span style="color: red;"><?= $vehicle_plateErr ?></span> -->
        <input type="text" name="vehicle_plate" id="vehicle_plate" value="<?= $vehicle_plate ?>">
        <br><label for="parking_slot_id">Parking Slot:</label><span style="color: red;"><?= $parking_slot_id ?></span>
        <select name="parking_slot_id" id="parking_slot_id">
            <option value="">Select Parking Slot</option>
            <?php 
            foreach($obj->fetchCourse() as $crs){
            ?>
                <option value="<?= $crs["is_available"] ?>"><?= $crs["slot_number"] ?></option>
            <?php 
            }
            ?>
        </select>
        
        <br><label for="remarks">Remarks:</label><br>
        <span style="color: red;"><?= $remarksErr ?></span>
        <input type="text" name="remarks" id="remarks" value="<?= $remarks ?>"><br>
       <input type="submit" name="submit" value="Add Parking">  

        
    </form>
</body>
</html>