
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

if($_GET['action']=="salesman_search"){
  global $conn;
  $search_salesman_index=$_GET['search_salesman_index'];

  $sql="select * from salesman where salesman_id='$search_salesman_index' or salesman_firstname='$search_salesman_index' or salesman_lastname='$search_salesman_index' or salesman_Cityid='$search_salesman_index' or salesman_address='$search_salesman_index' ";
  $res=mysqli_query($conn,$sql);
  
    
}else{
  $sql = "select * from salesman";  
  $res = mysqli_query($conn,$sql);

  $sql1 = "select count(*) as salesman_total_numbers from salesman";  
  $res1 = mysqli_query($conn,$sql1);
  $row1=mysqli_fetch_array($res1);
  
}

?>
  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"> Employee</strong></div>
      </div>

      <hr>
      
      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button id="add_salesman" name="add_salesman" type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span>Add New Salesman</button><br>
              <p>the total number of salesman is: <?php echo $row1['salesman_total_numbers'] ?></p>
            </div>
          </div>
        </div>
        
        <form class="am-form" method="post" name="salesman_search" id="salesman_search">
          <div class="am-u-sm-12 am-u-md-6">
            <div class="am-input-group am-input-group-sm">
              <input type="text" class="am-form-field" id="search_salesman_index" name="search_salesman_index" placeholder="input id,first name,last name,address to find salesman">
            <span class="am-input-group-btn">
              <button class="am-btn am-btn-default" name="search_salesman" id="search_salesman" type="button">Search</button>
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
                <th class="table-title">Firstname</th>
                <th class="table-type">Lastname</th>
                <th class="table-author am-hide-sm-only">City id</th>
                <th class="table-author am-hide-sm-only">Address</th>
                <th class="table-set"></th>
              </tr>
              </thead>
              <tbody>
              
              <?php
                while($row=mysqli_fetch_array($res)){
              ?>



              <tr>
                
                <td class="salesman_id"><?php echo $row['salesman_id'] ?></td>
                <td class="salesman_firstname"><?php echo $row['salesman_firstname'] ?></td>
                <td class="salesman_lastname"><?php echo $row['salesman_lastname'] ?></td>
                <td class="salesman_Cityid"><?php echo $row['salesman_Cityid'] ?></td>
                <td class="salesman_address"><?php echo $row['salesman_address'] ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="edit_salesman am-btn  am-btn-default am-btn-xs am-text-secondary" salesman_id_click="<?php echo $row['salesman_id'] ?>" ><span class="am-icon-pencil-square-o"></span>Edit</button>
                      <button class="delete_salesman am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" del_salesman_id="<?php echo $row['salesman_id'] ?>"><span class="am-icon-trash-o"></span>Delete</button>
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
      
  <!-- add salesman -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="add_salesman_modal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>Add Salesman</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="salesman_modal_add" name="salesman_modal_add" action="manager.php?action=salesman_modal_add" >

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="salesman_id" id="salesman_id" placeholder='salesman id'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="salesman_firstname" id="salesman_firstname" placeholder='salesman firstname'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="salesman_lastname" id="salesman_lastname" placeholder='salesman lastname'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="salesman_Cityid" id="salesman_Cityid" placeholder='salesman City id'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="salesman_address" id="salesman_address" placeholder='salesman Address'>
                </div><br>

                <div>
                  <small class="am-text-danger am-align-left" id="message11"></small>
                </div>

                <div class="am-left">
                  <p>plus：Please check the salesman information in detail</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="submit_add_salesman" value="Add Salesman" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancel_submit_add_salesman" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- add salesman end -->

  <!-- edit salesman -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="edit_salesman_modal">
    <div class="am-modal-dialog" >
        <div class="am-modal-hd">
            <h1>Edit Salesman</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <form method="post" class="am-form" id="salesman_update" name="salesman_update" action="manager.php?action=salesman_update">
                
                <div class="am-input-group am-input-group-warning">
                    <input type="hidden" class="index_salesman_id" name="index_salesman_id" id=index_salesman_id>
                </div><br>

                <div class="am-input-group am-input-group-warning">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                    <input type="text" class="am-form-field" name="salesman_id" id="salesman_id" placeholder='salesman id'>
                </div><br>

                <div class="am-input-group am-input-group-secondary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                    <input type="text" class="am-form-field" name="salesman_firstname" id="salesman_firstname" placeholder='salesman firstname'>
                </div><br>

                <div class="am-input-group am-input-group-primary">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-calculator"></i></span>
                    <input type="text" class="am-form-field" name="salesman_lastname" id="salesman_lastname" placeholder='salesman lastname'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="salesman_Cityid" id="salesman_Cityid" placeholder='salesman City id'>
                </div><br>

                <div class="am-input-group am-input-group-success">
                    <span class="am-input-group-label"><i class="am-icon-user am-icon-hourglass"></i></span>
                    <input type="text" class="am-form-field" name="salesman_address" id="salesman_address" placeholder='salesman Address'>
                </div><br>

                <div>
                  <small class="am-text-danger am-align-left" id="message12"></small>
                </div>
                <div class="am-left">
                    <p>plus：Please check the salesman information in detail</p>
                </div>

                <div class="am-cf">
                    <div >
                        <input style="width: 49%;" type="submit" id="submit_edit_salesman" name="submit_edit_salesman" value="Update" class="am-btn  am-btn-primary am-btn-sm">

                        <input style="width: 49%;" type="reset" id="cancel_submit_edit_salesman" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                    </div>

                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- edit salesman end -->
    
  <!-- delete salesman-->
  <div class="am-modal am-modal-alert" tabindex="-1" id="delete_salesman_modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"><b>Delete Salesman</b>
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            Are you sure to delete salesman[<span id="delete_salesman_id_index"></span>]？
        </div>
        <div>
            <small class="am-text-danger am-align-left" id="message13"></small>
        </div>
        <div class="am-modal-footer">
            <div >
                <input style="width: 49%;" type="button" name="delete_this_salesman" id="delete_this_salesman"  value="Delete" class="am-btn  am-btn-danger am-btn-sm">

                <input style="width: 49%;" type="button" name="cancel_delete_this_salesman" id="cancel_delete_this_salesman" value="Cancel" class=" am-btn am-btn-primary  am-btn-sm">
            </div>
        </div>
    </div>
</div>
 <!-- delete salesman end-->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>



<?php 
  
  require_once "footer.php";
  $conn=null;
?>

