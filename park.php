<?php  
    require_once "park.class.php";
        $objPark = new Parking;
        $arr = $objPark->viewAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking System</title>
</head>
<body>
    <a href="addParking.php">Park Vehicle</a>
    <a href="addSlot.php">Add Slot</a>

    <table border="1px">
        <tr>
            <th>No.</th>
            <th>Vehicle Plate No.</th>
            <th>Entry Time</th>
            <th>Exit Time</th>
            <th>Parking Slot</th>
            <th>Remark</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php 
        $i = 1;
        foreach($arr as $ar){
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $ar["vehicle_plate"] ?></td>
            <td><?= $ar["entry_time"] ?></td>
            <td><?= $ar["exit_time"] ?></td>
            <td><?= $ar["parking_slot_id"] ?></td>
            <td><?= $ar["remarks"] ?></td>
            <td><?= $ar["status"] ?></td>
            <td><?= $ar["Created_at"] ?></td>
            <td>
                <a href="">Exit now</a>
            </td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>
</body>
</html>