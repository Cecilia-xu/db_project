
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin table Examples</title>
  <meta name="description" content="这是一个 table 页面">
  <meta name="keywords" content="table">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<!-- headbar start -->
<?php 
  require_once "admin-header.php";
?>
<!-- headbar end -->

<div class="am-cf admin-main">
<!-- sidebar start -->
<?php
  include "admin-leftside.php";
?>
<!-- sidebar end -->

<!-- Run a sql -->
<?php 
global $conn;

//run a sql
if($_GET['action']=='search_customer'){
  global $conn;
  $search_customer_index=$_GET['search_customer_index'];
  $sql="select * from customers where customer_username='$search_customer_index' or customer_name='$search_customer_index' or customer_address='$search_customer_index' " ;
  $res = mysqli_query($conn,$sql);

}else{
  $sql = "select * from customers";  
  $res=mysqli_query($conn,$sql);

  $sql1 = "select count(*) as customer_total_numbers from customers";  
  $res1 = mysqli_query($conn,$sql1);
  $row1=mysqli_fetch_array($res1);
}

?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Customers</strong></div>
      </div>

      <hr>
      
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button id="add_customer" name="add_customer" type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span>Add New Customer</button><br>
              <p>the total number of customers is: <?php echo $row1['customer_total_numbers'] ?></p>
              
            </div>
          </div>
        </div>
        
        <form class="am-form" method="post" name="display_customer" id="display_customer" action="admin-customer_management.php?action=display_customer">
          <div class="am-u-sm-12 am-u-md-6">
            <div class="am-input-group am-input-group-sm">
              <input type="text" class="am-form-field" id="search_customer_index" name="search_customer_index" placeholder="input username,name,address to find customer">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-default" type="button" name="search_customer" id="search_customer">Search</button>
            </span>

            </div>
          </div>
        </form>

      </div>

      <div class="am-g">
        <div class="am-u-sm-12">
          
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-id">Username(Phone)</th>
                <th class="table-title">Name</th>
                <th class="table-type">Address</th>
                <th class="table-type">Password</th>
                
              </tr>
              </thead>
              <tbody>
              
              <?php
                while($row=mysqli_fetch_array($res)){
              ?>

              <tr>
                
                <td class="customer_username"><?php echo $row['customer_username'] ?></td>
                <td class="customer_name"><?php echo $row['customer_name'] ?></td>
                <td class="customer_address"><?php echo $row['customer_address'] ?></td>
                <td class="customer_password"><?php echo $row['customer_password'] ?></td>
                
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="edit_customer am-btn  am-btn-default am-btn-xs am-text-secondary" customer_username_click="<?php echo $row['customer_username'] ?>"><span class="am-icon-pencil-square-o"></span>Edit</button>
                      <button class="delete_customer am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" del_customer_username="<?php echo $row['customer_username'] ?>"><span class="am-icon-trash-o"></span>Delete</button>
                    </div>
                  </div>
                </td>

              </tr>
              <?php } ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  <!-- content end -->
      
  <!-- add customer -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="add_customer_modal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>Add Customers</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="customer_modal_add" name="customer_modal_add" action="manager.php?action=customer_modal_add" >

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="customer_username" id="customer_username" placeholder='customer username(phone)'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="customer_name" id="customer_name" placeholder='customer name'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="customer_address" id="customer_address" placeholder='customer address'>
                </div><br>

                <div class="am-input-group am-input-group-danger">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="customer_password" id="customer_password" placeholder='customer password'>
                </div><br>


                <div>
                  <small class="am-text-danger am-align-left" id="message4"></small>
                </div>

                <div class="am-left">
                  <p>plus：Please check the customer information in detail</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="submit_add_customer" value="Add Customer" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" value="Cancel" id="cancel_submit_add_customer" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- add customer end -->

  <!-- edit customers -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="edit_customer_modal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>Edit Customer</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="customer_update" name="customer_update" action="manager.php?action=customer_update">
                
                <div class="am-input-group am-input-group-warning">
                    <input type="hidden" class="index_customer_username" name="index_customer_username" id=index_customer_username>
                </div><br>

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="customer_username" id="customer_username" placeholder='customer username(phone)'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="customer_name" id="customer_name" placeholder='customer name'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="customer_address" id="customer_address" placeholder='customer address'>
                </div><br>

                <div class="am-input-group am-input-group-danger">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="customer_password" id="customer_password" placeholder='customer password'>
                </div><br>

                <div>
                  <small class="am-text-danger am-align-left" id="message5"></small>
                </div>
                <div class="am-left">
                    <p>plus：Please check the customer information in detail</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="submit_edit_customer" name="submit_edit_customer" value="Update" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancel_submit_edit_customer" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- edit customers end -->
    
  <!-- delete customers-->
  <div class="am-modal am-modal-alert" tabindex="-1" id="delete_customer_modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"><b>Delete Customers</b>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            Are you sure to delete customer[<span id="delete_customer_username_index"></span>]？
        </div>
        <div>
            <small class="am-text-danger am-align-left" id="message6"></small>
        </div>
        <div class="am-modal-footer">
            <div >
                <input style="width: 49%;" type="button" name="delete_this_customer" id="delete_this_customer"  value="Delete" class="am-btn  am-btn-danger am-btn-sm">

                <input style="width: 49%;" type="button" name="cancel_delete_this_customer" id="cancel_delete_this_customer" value="Cancel" class=" am-btn am-btn-primary  am-btn-sm">
            </div>
        </div>
    </div>
</div>
 <!-- delete customers end-->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>



<?php 
  $conn=null;
  require_once "footer.php";
?>

</body>
</html>