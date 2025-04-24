<?php
require_once "database.class.php"; 
class Parking{
    //parking_transaction
    public $id;
    public $vehicle_plate;
    public $entry_time;
    public $exit_time;
    public $parking_slot_id;
    public $remarks;
    public $status;
    public $created_at;


    //parking_slots
    public $slot_id;
    public $slot_number;
    public $is_available;

    protected $db;

    function __construct()
    {
        $this->db = new Database;
    }

    function addParking(){
        $sql = "INSERT INTO parking (vehicle_plate, parking_slot_id, remarks) VALUES (:vehicle_plate, :parking_slot_id, :remarks)";
        $q = $this->db->connect()->prepare($sql);
        $q->bindParam(":vehicle_plate",$this->vehicle_plate);
        $q->bindParam(":parking_slot_id",$this->parking_slot_id);
        $q->bindParam(":remarks",$this->remarks);
        return $q->execute();
    }

    function addSlot(){
        $sql = "INSERT INTO slot (slot_number, is_available) VALUES (:slot_number, :is_available)";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(":slot_number", $this->slot_number);
        $query->bindParam(":is_available", $this->is_available);

        if  ($query->execute()){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    function fetchCourse(){
        $sql = "SELECT * FROM parking_slots";
        $q = $this->db->connect()->prepare($sql);
        if($q->execute()){
            $data = $q->fetchAll(); 
        }
        return $data;
    }

    function viewAll(){
        $sql = "SELECT * FROM  parking";
        $q = $this->db->connect()->prepare($sql);
        if($q->execute()){
            $data = $q->fetchAll(); 
        }
        return $data;
    }
}
