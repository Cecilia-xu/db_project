
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

if($_GET['action']=="product_search"){
  global $conn;
  $search_product_index=$_GET['search_product_index'];

  $sql="select * from products where product_id='$search_product_index' or product_kind='$search_product_index' or product_name='$search_product_index' ";
  $res=mysqli_query($conn,$sql);
  
    
}else{
  $sql = "select * from products";  
  $res = mysqli_query($conn,$sql);

  $sql1 = "select count(*) as product_total_numbers from products";  
  $res1 = mysqli_query($conn,$sql1);
  $row1=mysqli_fetch_array($res1);
  
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
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button id="add_product" name="add_product" type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span>Add New Product</button><br>
              <p>the total number of products is: <?php echo $row1['product_total_numbers'] ?></p>
            </div>
          </div>
        </div>
        
        <form class="am-form" method="post" name="product_search" id="product_search">
          <div class="am-u-sm-12 am-u-md-6">
            <div class="am-input-group am-input-group-sm">
              <input type="text" class="am-form-field" id="search_product_index" name="search_product_index" placeholder="input id,name,kind to find product" value="<?php if(isset($_GET['search_product_index'])){ echo $_GET['search_product_index'];} ?>">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-default" name="search_product" id="search_product" type="button">Search</button>
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
                      <button class="edit_product am-btn  am-btn-default am-btn-xs am-text-secondary" product_id_click="<?php echo $row['product_id'] ?>" ><span class="am-icon-pencil-square-o"></span>Edit</button>
                      <button class="delete_product am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" del_product_id="<?php echo $row['product_id'] ?>"><span class="am-icon-trash-o"></span>Delete</button>
                    </div>
                  </div>
                </td>

              </tr>
              <?php } ?>
              </tbody>
            </table>

            <div class="am-cf">
              <div class="am-fr">
                <ul class="am-pagination">
                  <li class="am-disabled"><a href="#">&raquo;</a></li>
                  <li class="am-active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
 
        </div>
      </div>
    </div>
  </div>
  <!-- content end -->
      
  <!-- add produdct -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="add_product_modal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>Add Products</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="product_modal_add" name="product_modal_add" action="manager.php?action=product_modal_add" >

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="product_id" id="product_id" placeholder='product id(12 digits)'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="product_kind" id="product_kind" placeholder='product kind'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="product_name" id="product_name" placeholder='product name'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="product_unitprice" id="product_unitprice" placeholder='unit price'>
                </div><br>

                <div>
                  <small class="am-text-danger am-align-left" id="message1"></small>
                </div>

                <div class="am-left">
                  <p>plus：Please check the product information in detail</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="submit_add_product" value="Add Product" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancel_submit_add_product" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- add produdct end -->

  <!-- edit products -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="edit_product_modal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>Edit Product</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="product_update" name="product_update" action="manager.php?action=product_update">
                
                <div class="am-input-group am-input-group-warning">
                    <input type="hidden" class="index_product_id" name="index_product_id" id=index_product_id>
                </div><br>

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text"  class="am-form-field" name="product_id" id="product_id" placeholder='product id(12 digits)'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="product_kind" id="product_kind" placeholder='product kind'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="product_name" id="product_name" placeholder='product name'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="product_unitprice" id="product_unitprice" placeholder='unit price'>
                </div><br>

                <div>
                  <small class="am-text-danger am-align-left" id="message2"></small>
                </div>
                <div class="am-left">
                    <p>plus：Please check the product information in detail</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="submit_edit_product" name="submit_edit_product" value="Update" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancel_submit_edit_product" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- edit products end -->
    
  <!-- delete products-->
  <div class="am-modal am-modal-alert" tabindex="-1" id="delete_product_modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"><b>Delete Products</b>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            Are you sure to delete product[<span id="delete_product_id_index"></span>]？
        </div>
        <div>
            <small class="am-text-danger am-align-left" id="message3"></small>
        </div>
        <div class="am-modal-footer">
            <div >
                <input style="width: 49%;" type="button" name="delete_this_product" id="delete_this_product"  value="Delete" class="am-btn  am-btn-danger am-btn-sm">

                <input style="width: 49%;" type="button" name="cancel_delete_this_product" id="cancel_delete_this_product" value="Cancel" class=" am-btn am-btn-primary  am-btn-sm">
            </div>
        </div>
    </div>
</div>
 <!-- delete products end-->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>



<?php 
  
  require_once "footer.php";
  $conn=null;
?>

