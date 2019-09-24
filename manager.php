<?php
require_once "config.php";

//manager register
if($_GET['action']=='manager_register'){
    global $conn;

    $manager_name=$_POST["manager_name"];
    $manager_email=$_POST["manager_email"];
    $manager_password=$_POST["manager_password"];
    

    // Run a sql
    $sql = "insert into managers(manager_name,manager_email,manager_password) values('$manager_name','$manager_email','$manager_password')";    
    $res = mysqli_query($conn, $sql);
    $row = mysqli_affected_rows($conn);
    if ($row > 0) { 

        $_SESSION['manager_email'] = $manager_email;
        $_SESSION['manager_name'] = $manager_name;
        $_SESSION['manager_password'] = $manager_password;
        
        echo "<script>location='admin-instructions.php'</script>";       
    } else {
        echo "failed to register!";
    }
            
}

//manager login
elseif($_GET['action']=='manager_login'){
	global $conn;
	
	$manager_email=$_POST["manager_email"];
	$manager_password=$_POST["manager_password"];
	

	// Run a sql
	$sql = " select * from managers where manager_email='$manager_email' and manager_password='$manager_password' ";		
	$res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if ($row > 0) {

        $_SESSION['manager_email'] = $manager_email;
        $_SESSION['manager_name'] = $manager_name;
        $_SESSION['manager_password'] = $manager_password;
        echo "<script>location='admin-instructions.php'</script>";       
    } else {
        echo "failed to login!";
    }
			
}


//manager profile model open

elseif($_GET['action']=="manager_profile_open") {
    $sql = "select manager_email,manager_name,manager_password from managers where manager_email='$_SESSION[manager_email]'  ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(array("manager_email" => 0));
    }
}


//manager profile update
elseif($_GET['action']=="manager_profile_update"){
    global $conn;
    extract($_POST);
    $sql="update managers set manager_email='$manager_email',manager_name='$manager_name',manager_password='$manager_password' where manager_email='$_SESSION[manager_email]'";
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


//customer management part
elseif($_GET['action']=="customer_modal_add"){
    global $conn;
    extract($_POST);
    if(strlen($customer_username)>0 && strlen($customer_name)>0 &&strlen($customer_address)>0 && strlen($customer_password)>0){
    $sql="insert into customers(customer_username,customer_name,customer_address,customer_password) VALUES ('$customer_username','$customer_name','$customer_address','$customer_password')";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
        if ($row>=0) {
            echo "Add successfully!";

        } else {
            echo "Failed to add!";

        }
    }else{
        echo "Please fill out all the information!";
    }
    
}

elseif($_GET['action']=="customer_update"){
    global $conn;
    extract($_POST);
    $index_customer_username=$_POST['index_customer_username'];

    $sql="update customers set customer_username='$customer_username',customer_name='$customer_name',customer_address='$customer_address',customer_password='$customer_password' where customer_username='$index_customer_username' ";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>=0){
        echo "update successfully!";
    }else{
        echo "Failed to update!";
    }
}

elseif($_GET['action']=="customer_delete"){
    global $conn;
    $delete_customer_username_index=$_GET['delete_customer_username_index'];
    $sql="delete from customers where customer_username='$delete_customer_username_index'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>0){
        echo "Delete successfully!";
    }else{
        echo "Failed to delete!";
    }
}


//product management part

elseif($_GET['action']=="product_modal_add"){
    global $conn;
    extract($_POST);
    if(strlen($product_id)>0 && strlen($product_name)>0 && strlen($product_kind)>0 && strlen($product_name)>0 && strlen($product_unitprice)>0){
        $sql="insert into products(product_id,product_kind,product_name,product_unitprice) VALUES ('$product_id','$product_kind','$product_name','$product_unitprice')";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_affected_rows($conn);

        if ($row>=0) {
            echo "Add successfully!";

        } else {
            echo "Failed to add!";

        }
    }else{
        echo "Please fill out all the information!";
    }
    
}



elseif($_GET['action']=="product_update"){
    global $conn;
    extract($_POST);

    $sql="update products set product_id='$product_id',product_kind='$product_kind',product_name='$product_name',product_unitprice='$product_unitprice' where product_id='$index_product_id' ";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>=0){
        echo "update successfully!";
    }else{
        echo "Failed to update!";
    }
}

elseif($_GET['action']=="product_delete"){
    global $conn;
    $delete_product_id_index=$_GET['delete_product_id_index'];
    $sql="delete from products where product_id='$delete_product_id_index'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>0){
        echo "Delete successfully!";
    }else{
        echo "Failed to delete!";
    }
}

//transation management part

elseif($_GET['action']=='manager_deliver_order'){
    global $conn;
    $manager_deliver_order_id=$_GET['manager_deliver_order_id'];
    // Run a sql
    $sql = "update transactions set order_status='delivered' where order_id='$manager_deliver_order_id' and order_status='paid' "; 
    $res = mysqli_query($conn, $sql);
    $row = mysqli_affected_rows($conn);
    if ($row>0) {
        echo "Deliver successfully!";

    } else {
        echo "Something wrong!";

    }
            
}

elseif($_GET['action']=="manager_order_delete"){
    global $conn;
    $manager_delete_order_id_index=$_GET['manager_delete_order_id_index'];
    $sql="delete from transactions where order_id='$manager_delete_order_id_index' ";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>0){
        echo "Delete successfully!";
    }else{
        echo "Failed to delete!";
    }
}

//salesman management part

elseif($_GET['action']=="salesman_modal_add"){
    global $conn;
    extract($_POST);
    if(strlen($salesman_id)>0 && strlen($salesman_firstname)>0 && strlen($salesman_lastname)>0 && strlen($salesman_Cityid)>0 && strlen($salesman_address)>0){
        $sql="insert into salesman(salesman_id,salesman_firstname,salesman_lastname,salesman_Cityid,salesman_address) VALUES ('$salesman_id','$salesman_firstname','$salesman_lastname','$salesman_Cityid','$salesman_address')";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_affected_rows($conn);

        if ($row>=0) {
            echo "Add successfully!";

        } else {
            echo "Failed to add!";

        }

    }else{
        echo "Please fill out all the information!";
    }
    
}



elseif($_GET['action']=="salesman_update"){
    global $conn;
    extract($_POST);
    $index_salesman_id=$_POST['index_salesman_id'];

    $sql="update salesman set salesman_id='$salesman_id',salesman_firstname='$salesman_firstname',salesman_lastname='$salesman_lastname',salesman_Cityid='$salesman_Cityid',salesman_address='$salesman_address' where salesman_id='$index_salesman_id' ";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>=0){
        echo "update successfully!";
    }else{
        echo "Failed to update!";
    }
}

elseif($_GET['action']=="salesman_delete"){
    global $conn;
    $delete_salesman_id_index=$_GET['delete_salesman_id_index'];
    $sql="delete from salesman where salesman_id='$delete_salesman_id_index'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>0){
        echo "Delete successfully!";
    }else{
        echo "Failed to delete!";
    }
}

//store management part

elseif($_GET['action']=="store_modal_add"){
    global $conn;
    extract($_POST);
    if(strlen($store_id)>0 && strlen($store_boss)>0 && strlen($store_address)>0 && strlen($store_city)>0 && strlen($store_state)>0 && strlen($store_zipcode)>0){
        $sql="insert into stores(store_id,store_boss,store_address,store_city,store_state,store_zipcode) VALUES ('$store_id','$store_boss','$store_address','$store_city','$store_state','$store_zipcode')";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_affected_rows($conn);

        if ($row>=0) {
            echo "Add successfully!";

        } else {
            echo "Failed to add!";

        }

    }else{
        echo "Please fill out all the information!";
    }
    
}



elseif($_GET['action']=="store_update"){
    global $conn;
    extract($_POST);
    $index_store_id=$_POST['index_store_id'];

    $sql="update salesman set store_id='$store_id',store_boss='$store_boss',store_address='$store_address',store_city='$store_city',store_state='$store_state',store_zipcode='$store_zipcode' where store_id='$index_store_id' ";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>=0){
        echo "update successfully!";
    }else{
        echo "Failed to update!";
    }
}

elseif($_GET['action']=="store_delete"){
    global $conn;
    $delete_store_id_index=$_GET['delete_store_id_index'];
    $sql="delete from stores where store_id='$delete_store_id_index'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>0){
        echo "Delete successfully!";
    }else{
        echo "Failed to delete!";
    }
}

//supplier management

elseif($_GET['action']=="supplier_modal_add"){
    global $conn;
    extract($_POST);
    if(strlen($supplier_id)>0 && strlen($supplier_name)>0 && strlen($supplier_phone)>0 && strlen($supplier_email)>0){
        $sql="insert into supplier(supplier_id,supplier_name,supplier_phone,supplier_email) VALUES ('$supplier_id','$supplier_name','$supplier_phone','$supplier_email')";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_affected_rows($conn);

        if ($row>=0) {
            echo "Add successfully!";

        } else {
            echo "Failed to add!";

        }
    }else{
        echo "Please fill out all the information!";
    }
    
}



elseif($_GET['action']=="supplier_update"){
    global $conn;
    extract($_POST);
    $index_supplier_id=$_POST['index_supplier_id'];

    $sql="update products set supplier_id='$supplier_id',supplier_name='$supplier_name',supplier_phone='$supplier_phone',supplier_email='$supplier_email' where supplier_id='$index_supplier_id' ";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_affected_rows($conn);
    if($row>=0){
        echo "update successfully!";
    }else{
        echo "Failed to update!";
    }
}

elseif($_GET['action']=="supplier_delete"){
    global $conn;
    $delete_supplier_id_index=$_GET['delete_supplier_id_index'];
    $sql="delete from supplier where supplier_id='$delete_supplier_id_index'";
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
