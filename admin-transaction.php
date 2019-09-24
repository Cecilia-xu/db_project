
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

if($_GET['action']=="manager_transaction_search"){
  global $conn;
  $search_transaction_index=$_GET['search_transaction_index'];
  $sql="select * from transactions where order_id='$search_transaction_index' or order_date='$search_transaction_index' or product_id='$search_transaction_index' or product_name='$search_transaction_index' or customer_phone='$search_transaction_index' or customer_name='$search_transaction_index' or customer_address='$search_transaction_index' or order_status='$search_transaction_index' ";
  $res=mysqli_query($conn,$sql);
    
}else{
  $sql = "select * from transactions";  
  $res = mysqli_query($conn,$sql);

  $sql1 = "select count(*) as total_orders, sum(product_total_price) as total_sales from transactions";  
  $res1 = mysqli_query($conn,$sql1);
  $row1=mysqli_fetch_array($res1);
}

?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Transactions</strong></div>
      </div>

      <hr>
      
      <div class="am-g">
        <div class="am-u-sm-6 am-u-md-6">
          <p><span> the total order number is: <?php echo $row1['total_orders'] ?> </span></p>
          <p><span> the total sales is: $ <?php echo $row1['total_sales'] ?> </span></p>
        </div>
        
        <form class="am-form" method="post">
          <div class="am-u-sm-6 am-u-md-6">
            <div class="am-input-group am-input-group-sm">
              
              <input type="text" class="am-form-field" id="search_transaction_index" name="search_transaction_index" placeholder="input order_id,order_date or product_name to find transaction">
              <span class="am-input-group-btn">
                <button class="am-btn am-btn-default" name="manager_search_transaction" id="manager_search_transaction" type="button">Search
                </button>
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
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Quantity</th>
                <th>Total Price($)</th>
                <th>Customer Phone</th>
                <th>Customer Name</th>
                <th>Customer Address</th>
                <th>Order Status</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              
              <?php
                while($row=mysqli_fetch_array($res)){
              ?>

              <tr>
                <td class="product_id"><?php echo $row['order_id'] ?></td>
                <td class="product_id"><?php echo $row['order_date'] ?></td>
                <td class="product_id"><?php echo $row['product_id'] ?></td>
                <td class="product_name"><?php echo $row['product_name'] ?></td>
                <td class="product_kind"><?php echo $row['product_quantity'] ?></td>
                <td class="product_total_price"><?php echo $row['product_total_price'] ?></td>
                <td class="product_kind"><?php echo $row['customer_phone'] ?></td>
                <td class="product_kind"><?php echo $row['customer_name'] ?></td>
                <td class="product_kind"><?php echo $row['customer_address'] ?></td>
                <td class="product_kind"><?php echo $row['order_status'] ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="manager_deliver_order am-btn  am-btn-default am-btn-xs am-text-success" id="manager_deliver_order_id" manager_deliver_order_id_click="<?php echo $row['order_id'] ?>" ><i class="am-icon-shopping-cart"></i>Deliver</button>
                      <button class="manager_delete_order am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" manager_del_order_id_index="<?php echo $row['order_id'] ?>"><span class="am-icon-trash-o"></span>Delete</button>
                      
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
  
  <!-- delete transactions-->
  <div class="am-modal am-modal-alert" tabindex="-1" id="manager_delete_order_modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"><b>Delete Products</b>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            Are you sure to delete product[<span id="manager_delete_order_id_index"></span>]？
        </div>
        <div>
            <small class="am-text-danger am-align-left" id="message11"></small>
        </div>
        <div class="am-modal-footer">
            <div >
                <input style="width: 49%;" type="button" name="manager_confirm_delete_this_order" id="manager_confirm_delete_this_order"  value="Delete" class="am-btn  am-btn-danger am-btn-sm">

                <input style="width: 49%;" type="button" name="manager_cancel_delete_this_order" id="manager_cancel_delete_this_order" value="Cancel" class=" am-btn am-btn-primary  am-btn-sm">
            </div>
        </div>
    </div>
  </div>
  <!-- delete transactions end-->    

  
    

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>



<?php  
  require_once "footer.php";
?>

