<?php 

function showAll(){
    global $conn;
    $total = 0;
    $total_discount = 0;
    $date = date('Y-m-d');
    $stmt = $conn->prepare("SELECT * from tbl_orders 
    INNER JOIN discount ON tbl_orders.discount_id = discount.discount_id 
    INNER JOIN status ON tbl_orders.status_id = status.status_id 
    WHERE DATE_FORMAT(timelogged,'%Y-%m-%d') = '$date' AND status.status_id = 1");
    $stmt->execute();
    $result = $stmt->get_result();
    echo "

        <thead>
        <tr>
            <th>Plate #</th>
            <th>Customer</th>
            <th>Gender</th>
            <th>Service</th>
            <th>Amount Paid</th>
            <th>Discount</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Status</th>
            
        </tr>
        </thead>
        
        ";
        while($row = $result->fetch_assoc()){
            $plate = $row['plate'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $service = $row['services'];
            $amount = $row['amount_paid'];
            $status = $row['status'];
            $gender = $row['gender'];
            $discount = $row['discount_name'];
            $total_discount += $row['amount'];
            $total += $amount;


            echo "
            
            <tbody>
                <tr>
                <td>".$plate."</td>
                <td>".$firstname." ".$lastname."</td>
                <td>".$gender."</td>
                <td>".$service."</td>
                <td>$".number_format($amount,2)."</td>
                <td>".$discount."</td>
                <td>No Time</td>
                <td>No Time</td>
                <td>".$status."</td>

                </tr>
           
            </tbody>
            
            ";
        }

        $net = 0;
        $net = $total - $total_discount;
        echo 

    "
    <tr>
    <td colspan = '4'><strong>Total</strong></td>
    <td><strong>$".number_format($total,2)."</strong></td>
    </tr>
    <tr>
    <td colspan = '4'><strong>Total Discount</strong></td>
    <td><strong>$".number_format($total_discount,2)."</strong></td>
    </tr>";

    }

function filter($filter){
    global $conn;
    if(isset($_GET['filter'])){
        $total = 0;
        $date = date('Y-m-d');
        $filter = $_GET['filter'];
        $stmt = $conn->prepare("SELECT * from tbl_orders 
        INNER JOIN status ON
        tbl_orders.status_id = status.status_id
        INNER JOIN discount ON tbl_orders.discount_id = discount.discount_id
        WHERE gender = '$filter' AND DATE_FORMAT(timelogged,'%Y-%m-%d') <= '$date'");
        $stmt->execute();
        $result = $stmt->get_result();
        echo "
        <thead>
        <tr>
            <th>Plate #</th>
            <th>Customer</th>
            <th>Gender</th>
            <th>Service</th>
            <th>Amount Paid</th>
            <th>Discount</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Status</th>
            
        </tr>
        </thead>
        
        ";
        while($row = $result->fetch_assoc()){
            $plate = $row['plate'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $service = $row['services'];
            $amount = $row['amount_paid'];
            $status = $row['status'];
            $gender = $row['gender'];
            $discount = $row['discount_name'];
            $total += $amount;
            echo "
            <tbody>
                <tr>
                <td>".$plate."</td>
                <td>".$firstname." ".$lastname."</td>
                <td>".$gender."</td>
                <td>".$service."</td>
                <td>$".number_format($amount,2)."</td>
                <td>".$discount."</td>
                <td>No Time</td>
                <td>No Time</td>
                <td>".$status."</td>

                </tr>
           
            </tbody>
            
            ";
        }

    }else{
        showAll();
    } 
}

function message(){
    if(isset($_GET['message'])){
        if($_GET['message'] == 'success'){
            echo '
            <div class="notification is-success" id = "message">
            <button class="delete"></button>
           Service was added to your order!
            </div>
            ';
        }
        if($_GET['message'] == 'Finished'){
            echo '
            <div class="notification is-success" id = "message">
            <button class="delete"></button>
           The customer car is finished. 
            </div>
            ';
        }
        if($_GET['message'] == 'failed'){
            echo '
            <div class="notification is-danger" id ="message">
            <button class="delete"></button>
           Service is already on the order!
            </div>
            ';
        }
    }

}

function isLoggedin(){
    if($_SESSION['username']==NULL){
      header('Location:index.php?message=notloggedin');
    }
   
}

?>