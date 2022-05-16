<?php 

class displayDashboard{

    public function showProducts(){
       global $conn;
        $stmt = $conn->prepare("SELECT * FROM product");
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($row = $result->fetch_assoc()){
            $vc = $row['vehicle_code'];
           $service = $row['service_name'];
              $service_price = $row['service_price'];
                $service_id = $row['id'];
                $service_image = $row['service_image'];
                $service_code = $row['service_code'];
            
            echo 
            '
           
            <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                        <img src="assets/images/'.$service_image.'" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                        <div class="media-right">
                            
                        </div>
                        <div class="media-content">
                            <p class="title is-4">'.$service.'</p>
                            <p class="subtitle is-4">$'.number_format($service_price,2).'</p>
                           
                        </div>
                        </div>
                        <form action ="action.php" method = "POST">
                        <input type = "hidden" name = "name" value = "'.$service.'">
                        <input type = "hidden" name = "price" value = "'.$service_price.'">
                        <input type = "hidden" name = "id" value = "'.$service_id.'">
                        <input type = "hidden" name = "code" value = "'.$service_code.'">
                        <input type = "hidden" name = "vc" value = "'.$vc.'">
                        <div class="content">
                        <div class = "buttons">
                        <input type = "submit" class ="button is-link is-fullwidth" name = "submit" value = "Add to Order">
                       
                        </div>
                       
                        </div>
                        </form>
                       
                    </div>
            </div>
        
            
            
            ';


        }
       
    }

public function showCart(){
    // session_start();
    function head(){
        echo "
        <thead>
        <tr>
            <th>Name of Service</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <!-- <th>Discount</th> -->
            <th>Action</th>
        </tr>
        </thead>";
    }
    global $conn;
    $total_price = 0;
    $stmt =$conn->prepare("SELECT * FROM cart");
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
         head();
         while($row = $result->fetch_assoc()){
            $id = $row['id'];
            $name = $row['service_name'];
            $price = $row['service_price'];
            $qty = $row['quantity'];
            $total = $row['total_price'];
            $code = $row['service_code'];
            $total_price = $total_price + $price;


            echo 
            "
            <tbody>
            <tr>
            <td>".$name."</td>
            <td>$".number_format($price,2)."</td>
            <td>".$qty."</td>
            <td>$".number_format($total,2)."</td>
            <form action = 'cart.php' method = 'POST'>
            <input type = 'hidden' name = 'id' value = '".$id."'>
           <td><input class ='button is-danger is-small' name = 'remove' type='submit' value='&#10005'></td>
            </form>
          </tr>
            ";

          
}

echo "<tr>
<td></td>
<td></td>
<td><strong>Total</strong></td>
<td>$".number_format($total_price,2)."</td>
</tr>";
echo "</tbody>";
}else{
    echo "<p class ='subtitle'>No Orders</p>";
}
}



public function totals(){
    global $conn;
    $sql = "SELECT COUNT(*) FROM cart";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $count = $row['COUNT(*)'];
    return $count;
}

public function currentJob(){
    function tb_head(){
        echo 
        "<thead>
                     <tr>
                    <th>Plate #</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Service</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>";
    }
    
    
    global $conn; 
    // $total = 0;
    $sql = $conn->prepare("SELECT * FROM tbl_orders 
    INNER JOIN status ON 
    tbl_orders.status_id = status.status_id
    WHERE status.status_id = 0");
    $sql->execute();
    $result = $sql->get_result();
    // if($row = $result->fetch_assoc() > 0){
        tb_head();
        while($row = $result->fetch_assoc()){
            $plate = $row['plate'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $service['services'] = $row['services'];
            $status = $row['status'];
    
            echo "
            <tbody>
                <tr>
                <td>".$plate."</td>
                <td>".$firstname."</td>
                <td>".$lastname."</td>
                <td>".implode('',$service)."</td>
                
                <td>No Time</td>
                <td>No Time</td>
                <td>".$status."</td>
                <td><a href = 'updatestatus.php?id=$firstname' class = 'button is-warning '>Finish</a></td>
                </tr>
                </tbody>
            ";
    }
}


   
public function completeJob(){
    global $conn;
    $total = 0;
    $date = date('Y-m-d');
    $sql = $conn->prepare("SELECT * FROM tbl_orders 
    INNER JOIN status ON 
    tbl_orders.status = status.status_id
    WHERE status.status_id = 1 AND DATE_FORMAT(timelogged,'%Y-%m-%d') <= '$date'");
    $sql->execute();
    $result = $sql->get_result();
        while($row = $result->fetch_assoc()){
            // $id = $row['id'];
            $plate = $row['plate'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $service['services'] = $row['services'];
            $status = $row['status'];
            $amount = $row['amount_paid'];
            $total += $amount;
            echo "
            <tbody>
                <tr>
                <td>".$plate."</td>
                <td>".$firstname."</td>
                <td>".$lastname."</td>
                <td>".implode('',$service)."</td>
                <td>$".number_format($amount,2)."</td>
                <td>No Time</td>
                <td>No Time</td>
                <td>".$status."</td>
                </tr>
                </tbody>
            ";
    }
   
    echo "
   
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Total</strong></td>
        <td><strong>$".number_format($total,2)."</strong></td>
        </tr>
    ";

}
}//end of class

