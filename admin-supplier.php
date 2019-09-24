
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

if($_GET['action']=="supplier_search"){
  global $conn;
  $search_supplier_index=$_GET['search_supplier_index'];

  $sql="select * from supplier where supplier_id='$search_supplier_index' or supplier_name='$search_supplier_index' or supplier_phone='$search_supplier_index' or supplier_email='$search_supplier_index' ";
  $res=mysqli_query($conn,$sql);
  
    
}else{
  $sql = "select * from supplier";  
  $res = mysqli_query($conn,$sql);
  
}

?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Suppliers</strong></div>
      </div>

      <hr>
      
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button id="add_supplier" name="add_supplier" type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span>Add New Supplier</button>
              
            </div>
          </div>
        </div>
        
        <form class="am-form" method="post" name="supplier_search" id="supplier_search">
          <div class="am-u-sm-12 am-u-md-6">
            <div class="am-input-group am-input-group-sm">
              <input type="text" class="am-form-field" id="search_supplier_index" name="search_supplier_index" placeholder="input id,name,email or phone to find supplier">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-default" name="search_supplier" id="search_supplier" type="button">Search</button>
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
                <th class="table-title">Name</th>
                <th class="table-type">Phone</th>
                <th class="table-author am-hide-sm-only">Email</th>
                <th class="table-set"></th>
              </tr>
              </thead>
              <tbody>
              
              <?php
                while($row=mysqli_fetch_array($res)){
              ?>



              <tr>
                
                <td class="supplier_id"><?php echo $row['supplier_id'] ?></td>
                <td class="supplier_name"><?php echo $row['supplier_name'] ?></td>
                <td class="supplier_phone"><?php echo $row['supplier_phone'] ?></td>
                <td class="supplier_email"><?php echo $row['supplier_email'] ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="edit_supplier am-btn  am-btn-default am-btn-xs am-text-secondary" supplier_id_click="<?php echo $row['supplier_id'] ?>" ><span class="am-icon-pencil-square-o"></span>Edit</button>
                      <button class="delete_supplier am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" del_supplier_id="<?php echo $row['supplier_id'] ?>"><span class="am-icon-trash-o"></span>Delete</button>
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
      
  <!-- add supplier -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="add_supplier_modal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>Add Suppliers</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="supplier_modal_add" name="supplier_modal_add" action="manager.php?action=supplier_modal_add" >

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="supplier_id" id="supplier_id" placeholder='supplier id'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="supplier_name" id="supplier_name" placeholder='supplier name'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="supplier_phone" id="supplier_phone" placeholder='supplier phone'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="supplier_email" id="supplier_email" placeholder='supplier email'>
                </div><br>

                <div>
                  <small class="am-text-danger am-align-left" id="message17"></small>
                </div>

                <div class="am-left">
                  <p>plus：Please check the supplier information in detail</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="submit_add_supplier" value="Add Supplier" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancel_submit_add_supplier" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- add supplier end -->

  <!-- edit supplier -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="edit_supplier_modal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>Edit Supplier</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="supplier_update" name="supplier_update" action="manager.php?action=supplier_update">
                
                <div class="am-input-group am-input-group-warning">
                    <input type="hidden" class="index_supplier_id" name="index_supplier_id" id=index_supplier_id>
                </div><br>

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="supplier_id" id="supplier_id" placeholder='supplier id'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="supplier_name" id="supplier_name" placeholder='supplier name'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="supplier_phone" id="supplier_phone" placeholder='supplier phone'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="supplier_email" id="supplier_email" placeholder='supplier email'>
                </div><br>

                <div>
                  <small class="am-text-danger am-align-left" id="message18"></small>
                </div>
                <div class="am-left">
                    <p>plus：Please check the supplier information in detail</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="submit_edit_supplier" name="submit_edit_supplier" value="Update" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancel_submit_edit_supplier" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- edit supplier end -->
    
  <!-- delete supplier-->
  <div class="am-modal am-modal-alert" tabindex="-1" id="delete_supplier_modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"><b>Delete Supplier</b>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            Are you sure to delete supplier[<span id="delete_supplier_id_index"></span>]？
        </div>
        <div>
            <small class="am-text-danger am-align-left" id="message19"></small>
        </div>
        <div class="am-modal-footer">
            <div >
                <input style="width: 49%;" type="button" name="delete_this_supplier" id="delete_this_supplier"  value="Delete" class="am-btn  am-btn-danger am-btn-sm">

                <input style="width: 49%;" type="button" name="cancel_delete_this_supplier" id="cancel_delete_this_supplier" value="Cancel" class=" am-btn am-btn-primary  am-btn-sm">
            </div>
        </div>
    </div>
</div>
 <!-- delete supplier end-->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>



<?php 
  
  require_once "footer.php";
  $conn=null;
?>

