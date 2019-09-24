
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

if($_GET['action']=="store_search"){
  global $conn;
  $search_store_index=$_GET['search_store_index'];

  $sql="select * from stores where store_id='$search_store_index' or store_boss='$search_store_index' or store_address='$search_store_index' or store_city='$search_store_index' or store_state='$search_store_index' or store_zipcode='$search_store_index' ";
  $res=mysqli_query($conn,$sql);
  
    
}else{
  $sql = "select * from stores";  
  $res = mysqli_query($conn,$sql);
  
}

?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Stores</strong></div>
      </div>

      <hr>
      
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button id="add_store" name="add_store" type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span>Add New Store</button>
              
            </div>
          </div>
        </div>
        
        <form class="am-form" method="post" name="store_search" id="store_search">
          <div class="am-u-sm-12 am-u-md-6">
            <div class="am-input-group am-input-group-sm">
              <input type="text" class="am-form-field" id="search_store_index" name="search_store_index" placeholder="input id,boss name,address,city,state or zipcode to find stores">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-default" name="search_store" id="search_store" type="button">Search</button>
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
                <th class="table-title">Boss Name</th>
                <th class="table-type">Address</th>
                <th class="table-author am-hide-sm-only">City</th>
                <th class="table-author am-hide-sm-only">State</th>
                <th class="table-author am-hide-sm-only">Zipcode</th>
                <th class="table-set"></th>
              </tr>
              </thead>
              <tbody>
              
              <?php
                while($row=mysqli_fetch_array($res)){
              ?>



              <tr>
                
                <td class="store_id"><?php echo $row['store_id'] ?></td>
                <td class="store_boss"><?php echo $row['store_boss'] ?></td>
                <td class="store_address"><?php echo $row['store_address'] ?></td>
                <td class="store_city"><?php echo $row['store_city'] ?></td>
                <td class="store_state"><?php echo $row['store_state'] ?></td>
                <td class="store_zipcode"><?php echo $row['store_zipcode'] ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="edit_store am-btn  am-btn-default am-btn-xs am-text-secondary" store_id_click="<?php echo $row['store_id'] ?>" ><span class="am-icon-pencil-square-o"></span>Edit</button>
                      <button class="delete_store am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" del_store_id="<?php echo $row['store_id'] ?>"><span class="am-icon-trash-o"></span>Delete</button>
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
      
  <!-- add store -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="add_store_modal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>Add Stores</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="store_modal_add" name="store_modal_add" action="manager.php?action=store_modal_add" >

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="store_id" id="store_id" placeholder='store id'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="store_boss" id="store_boss" placeholder='store boss'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="store_address" id="store_address" placeholder='store address'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="store_city" id="store_city" placeholder='store city'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="store_state" id="store_state" placeholder='store state'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="store_zipcode" id="store_zipcode" placeholder='store zipcode'>
                </div><br>

                <div>
                  <small class="am-text-danger am-align-left" id="message14"></small>
                </div>

                <div class="am-left">
                  <p>plus：Please check the stores information in detail</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="submit_add_store" value="Add Store" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancel_submit_add_store" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- add store end -->

  <!-- edit store -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="edit_store_modal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>Edit Store</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="store_update" name="store_update" action="manager.php?action=store_update">
                
                <div class="am-input-group am-input-group-warning">
                    <input type="hidden" class="index_store_id" name="index_store_id" id=index_store_id>
                </div><br>

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="store_id" id="store_id" placeholder='store id'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="store_boss" id="store_boss" placeholder='store boss'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="store_address" id="store_address" placeholder='store address'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="store_city" id="store_city" placeholder='store city'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="store_state" id="store_state" placeholder='store state'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="store_zipcode" id="store_zipcode" placeholder='store zipcode'>
                </div><br>

                <div>
                  <small class="am-text-danger am-align-left" id="message15"></small>
                </div>
                <div class="am-left">
                    <p>plus：Please check the store information in detail</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="submit_edit_store" name="submit_edit_store" value="Update" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancel_submit_edit_store" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- edit stores end -->
    
  <!-- delete stores-->
  <div class="am-modal am-modal-alert" tabindex="-1" id="delete_store_modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"><b>Delete Store</b>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            Are you sure to delete store[<span id="delete_store_id_index"></span>]？
        </div>
        <div>
            <small class="am-text-danger am-align-left" id="message16"></small>
        </div>
        <div class="am-modal-footer">
            <div >
                <input style="width: 49%;" type="button" name="delete_this_store" id="delete_this_store"  value="Delete" class="am-btn  am-btn-danger am-btn-sm">

                <input style="width: 49%;" type="button" name="cancel_delete_this_store" id="cancel_delete_this_store" value="Cancel" class=" am-btn am-btn-primary  am-btn-sm">
            </div>
        </div>
    </div>
</div>
 <!-- delete stores end-->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>



<?php 
  
  require_once "footer.php";
  $conn=null;
?>

