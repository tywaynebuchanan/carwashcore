<?php

class showCars{
    public function showCars(){
        global $conn;
        $stmt = $conn->prepare("SELECT * from cars");
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
            $car_make = $row['car_make'];
            return "<option value =".$car_make.">".$car_make."</option>";
        
        }
    }
}