
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
  include "customer-header.php";
?>
<!-- headbar end -->

<div class="am-cf admin-main">
<!-- sidebar start -->
  <?php
    require_once "customer-leftside.php";
  ?>
<!-- sidebar end -->

<!-- Run a sql -->
<?php 
global $conn;

if($_GET['action']=="product_search"){
  global $conn;
  $search_product_index=$_GET['search_product_index'];

  $sql="select * from products where product_id='$search_product_index' or product_kind='$search_product_index' or product_name='$search_product_index' ";
  $res=mysqli_query($conn,$sql);
    
}else{
  $sql = "select * from products";  
  $res = mysqli_query($conn,$sql);
}

?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Products</strong></div>
      </div>

      <hr>
      
      <div class="am-g">
        <div class="am-u-sm-6 am-u-md-6">
              <p></p>
        </div>
        
        <form class="am-form" method="post" name="display_product" id="display_product" action="customer-products.php?action=display_product">
          <div class="am-u-sm-6 am-u-md-6">
            <div class="am-input-group am-input-group-sm">
              <input type="text" class="am-form-field" id="search_product_index" name="search_product_index" placeholder="input id,name,kind to find product">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-default" name="customer_search_product" id="customer_search_product" type="button">Search</button>
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
                <th class="table-id">ID</th>
                <th class="table-title">Kind</th>
                <th class="table-type">Name</th>
                <th class="table-author am-hide-sm-only">Unit Price($)</th>
                <th class="table-set"></th>
              </tr>
              </thead>
              <tbody>
              
              <?php
                while($row=mysqli_fetch_array($res)){
              ?>
              <tr>
                
                <td class="product_id"><?php echo $row['product_id'] ?></td>
                <td class="product_kind"><?php echo $row['product_kind'] ?></td>
                <td class="product_name"><?php echo $row['product_name'] ?></td>
                <td class="product_unitprice"><?php echo $row['product_unitprice'] ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="add_to_transaction am-btn  am-btn-default am-btn-xs am-text-success" product_id_click="<?php echo $row['product_id'] ?>" ><i class="am-icon-shopping-cart"></i>Add to Transaction</button>
                      
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
      

  <!-- add products to transaction -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="add_product_to_transaction_modal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>Add Product to Transaction</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="product_to_transaction" name="product_to_transaction" action="customer.php?action=product_to_transaction">

                <input type="hidden" class="am-form-field" readonly="true" name="customer_username" id="customer_username" value="<?php echo $_SESSION[customer_username]?>">
                
                <div class="am-input-group am-input-group-warning">
                    <input type="hidden" class="am-form-field" name="order_id" id="order_id">
                </div>

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-lock"></i></span>
                    <input type="text" class="am-form-field" readonly="true" name="product_id" id="product_id">
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-lock"></i></span>
                    <input type="text" class="am-form-field" readonly="true" name="product_name" id="product_name">
                </div>

                <div class="am-input-group am-input-group-success">
                    <input type="hidden" class="am-form-field" readonly="true" name="product_unitprice" id="product_unitprice">
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="product_quantity" id="product_quantity" placeholder="input the quantity of this product you want to buy">
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="customer_name" id="modal_customer_name" placeholder="input your name">
                </div><br>

                <div class="am-input-group am-input-group-danger">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-phone"></i></span>
                    <input type="text" class="am-form-field" name="customer_phone" id="modal_customer_phone" placeholder="input your phone">
                </div><br>

                <div class="am-input-group">
                    <span class="am-input-group-label"><i class="am-icon-user am-warning am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="customer_address" id="modal_customer_address" placeholder="input your address(street/city/state)">
                </div><br>

                <div>
                  <small class="am-text-danger am-align-left" id="message7"></small>
                </div>
                <div class="am-left">
                    <p>plus：Please check the order information in detail</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="submit_add_product_to_transaction" name="submit_add_product_to_transaction" value="Add to Transaction" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancel_submit_add_product_to_transaction" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- add products to transaction modal end -->
    

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>



<?php 
  
  require_once "footer.php";
  $conn=null;
?>

