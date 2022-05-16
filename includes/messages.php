<?php 

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

?>