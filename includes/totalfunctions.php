<?php
function countFitNation(){
    global $conn;
    $sql = "SELECT * FROM tbl_orders INNER JOIN discount ON 
    tbl_orders.discount_id =  discount.discount_id
    WHERE discount.discount_name = 'Fit Nation'";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    return $count;
}

function countTJ(){
    global $conn;
    $sql = "SELECT * FROM tbl_orders INNER JOIN discount ON 
    tbl_orders.discount_id =  discount.discount_id
    WHERE discount.discount_name = 'TJams'";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    return $count;
}

function countPolish(){
    global $conn;
    $date = date('Y-m-d');
    $sql = "SELECT * FROM tbl_orders WHERE services LIKE '%Polish%' AND DATE_FORMAT(timelogged,'%Y-%m-%d') <= '$date'";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    return $count;
}

function countWashVaccum(){
    global $conn;
    $date = date('Y-m-d');
    $sql = "SELECT * FROM tbl_orders WHERE services LIKE '%Wash Vaccum%' AND DATE_FORMAT(timelogged,'%Y-%m-%d') <= '$date'";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    return $count;
}


function countVaccum(){
    global $conn;
    $date = date('Y-m-d');
    $sql = "SELECT * FROM tbl_orders WHERE services LIKE '%Vaccum Only%' AND DATE_FORMAT(timelogged,'%Y-%m-%d') <= '$date'";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    return $count;
}

function countWashOnly(){
    global $conn;
    $date = date('Y-m-d');
    $sql = "SELECT * FROM tbl_orders WHERE services LIKE '%Wash Only%' AND DATE_FORMAT(timelogged,'%Y-%m-%d') <= '$date'";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    return $count;
}
function countTotalCars(){
    global $conn;
    $sql = "SELECT * FROM tbl_orders";
    $result = $conn->query($sql);
    $count = $result->num_rows;
    return $count;
}
function countRevenue(){
    global $conn;
    $total = 0;
    $date = date('Y-m-d');
    $sql = "SELECT * FROM tbl_orders WHERE DATE_FORMAT(timelogged,'%Y-%m-%d') <= '$date'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $total += $row['amount_paid'];
    }
    return $total;
}

function countDiscount(){
    global $conn;
    $total = 0;
    $date = date('Y-m-d');
    $sql = "SELECT * FROM tbl_orders
    INNER JOIN discount ON tbl_orders.discount_id = discount.discount_id
     WHERE DATE_FORMAT(timelogged,'%Y-%m-%d') <= '$date'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $total += $row['amount'];
    }
    return $total;
}
