<?php
require_once "config.php";

//customer_register
if($_GET['action']=='customer_register'){
	global $conn;

	$customer_username=$_POST["customer_username"];
    $customer_password=$_POST["customer_password"];
    $customer_name=$_POST["customer_name"];
    $customer_address=$_POST["customer_address"];
	// Run a sql
    if(strlen($customer_username)>0 && strlen($customer_password)>0 && strlen($customer_name)>0 && strlen($customer_address)>0){
        $sql = "insert into customers(customer_username,customer_password,customer_name,customer_address) values('$customer_username','$customer_password','$customer_name','$customer_address')";  
        $res = mysqli_query($conn, $sql);
        $row = mysqli_affected_rows($conn);
        if ($row > 0) { 
            $_SESSION[customer_username] = $customer_username;
            echo "<script>location='customer-instructions.php'</script>";       
        } else {
            echo "failed to register!";
        }

    }else{
        echo "Please fill out all the information!";
    }
	
			
}

//customer login
elseif($_GET['action']=='customer_login'){
	global $conn;
	
	$customer_username=$_POST["customer_username"];
	$customer_password=$_POST["customer_password"];
	

	// Run a sql
	$sql = " select * from customers where customer_username='$customer_username' and customer_password='$customer_password' ";		
	$res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if ($row > 0) {
    	$_SESSION[customer_username] = $customer_username;
        echo "<script>location='customer-instructions.php'</script>";       
    } else {
        echo "failed to login!";
    }
			
}

//customer profile model open

elseif($_GET['action']=="customer_profile_open") {
    $sql = "select customer_username,customer_name,customer_password,customer_address from customers where customer_username='$_SESSION[customer_username]'  ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(array("customer_email" => 0));
    }
}


//customer profile update
elseif($_GET['action']=="customer_profile_update"){
    global $conn;
    extract($_POST);
    $sql="update customers set customer_username='$customer_username',customer_name='$customer_name',customer_password='$customer_password',customer_address='$customer_address' where customer_username='$_SESSION[customer_username]' ";
    mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);

    if ($row>=0) {
        echo "Update Successfully";
        return 1;
    } else {
        echo "Failed to update!";
        return 0;
    }
}

//add product to transaction modal open
elseif($_GET['action']=="customer_add_to_transaction_model_open") {
    $sql = "select customer_username,customer_name,customer_address from customers where customer_username='$_SESSION[customer_username]'  ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(array("customer_email" => 0));
    }
}


//add product to transaction
elseif($_GET['action']=='product_to_transaction'){
	global $conn;
	extract($_POST);
    $product_quantity=(int)$product_quantity ;
	// Run a sql

    if($product_quantity >0 && strlen($customer_name)>0 && strlen($customer_name)>0 && strlen($customer_phone)>0 && strlen($customer_address)>0){
        $sql = "insert into transactions(order_id,order_date,product_id,product_name,product_quantity,product_total_price,customer_username,customer_name,customer_phone,customer_address,order_status) values('$order_id',NOW(),'$product_id','$product_name','$product_quantity','$product_unitprice'*'$product_quantity','$customer_username', '$customer_name','$customer_phone','$customer_address','unpaid') ";   
        $res = mysqli_query($conn, $sql);
        $row = mysqli_affected_rows($conn);

        if ($row>0) {
        echo "add successfully";

        } else {
        echo "Failed to add!";

        }
    }else{
        echo "Please choose at least 1 product or fill out your information completely!";
    }
    
			
}

//pay the order
elseif($_GET['action']=='customer_pay_order'){
	global $conn;
	$customer_pay_order_id=$_GET['customer_pay_order_id'];
	// Run a sql
	$sql = " update transactions set order_status='paid' where order_id='$customer_pay_order_id' and order_status='unpaid' ";	
	$res = mysqli_query($conn, $sql);
    $row = mysqli_affected_rows($conn);
    if ($row>0) {
        echo "Paid successfully!";

    } else {
        echo "Failed to pay!";

    }
			
}

elseif($_GET['action']=="customer_order_delete"){
    global $conn;
    $customer_delete_order_id_index=$_GET['customer_delete_order_id_index'];
    $sql="delete from transactions where order_id='$customer_delete_order_id_index' and order_status='unpaid' ";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>0){
        echo "Delete successfully!";
    }else{
        echo "Failed to delete!";
    }
}

$conn=null;

?>
