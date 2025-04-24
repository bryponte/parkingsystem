<?php  
    require_once "park.class.php";

    $objParking = new Parking;

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $slot_number = isset($_POST['slot_number']);
        $is_available = isset($_POST['is_available']);

        
    

    $objParking->slot_number = $slot_number;
    $objParking->is_available = $is_available;


    if ($objParking->addSlot()){
        header ("Location: park.php");
    } else {
        return false;
    }
}
?>
<a href="park.php">BACK</a>

<h1>Add slot</h1>
<form action="" method="POST">
    <input type="text" name="slot">
    <input type="submit" class="submit" name="submit">
</form>