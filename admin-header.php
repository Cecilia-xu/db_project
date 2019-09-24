<html>
  <body>
    <?php
    require_once "config.php";
    ?>
    <!-- header part -->
    <header class="am-topbar am-topbar-inverse admin-header">
      <div class="am-topbar-brand">
        <strong>Amaze UI</strong> <small>Welcome to Keep Shopping Mall Management System</small>
      </div>

      <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

      <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
          
          <li class="am-dropdown" data-am-dropdown>
            <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
              <span class="am-icon-users"></span> Manager <span class="am-icon-caret-down"></span>
            </a>
            <ul class="am-dropdown-content">
              <li id="manager_profile_model_open"><a href="javascript:;"><span class="manager_profile_model_open am-icon-user"></span> Profile</a></li>
              <li><a href="manager_login.php"><span class="am-icon-power-off"></span> Log Out</a></li>
            </ul>
          </li>
          
        </ul>
      </div>
    </header>

  <!-- header part end -->

  <!-- profile model -->
  <div class="am-modal am-modal-no-btn" tabindex="-1" id="manager_profile_modal">
    <div class="am-modal-dialog" >
      <div class="am-modal-hd">
          <h1> Profile</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
      </div>
      <div class="am-modal-bd">
          <form method="post" class="am-form" id="manager_profile_update" name="manager_profile_update" action="manager.php?action=manager_profile_update">
              
              <div class="am-input-group am-input-group-success">
                <span class="am-input-group-label"><i class="am-icon-user am-icon-envelope"></i></span>
                <input type="text" class="am-form-field" name="manager_email" id="manager_email" value='<?php echo $row['manager_email']; ?>' >
              </div><br>

              <div class="am-input-group am-input-group-secondary">
                  <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                  <input type="text" class="am-form-field" name="manager_name" id="manager_name" value='<?php echo $row['manager_name']; ?> '>
              </div><br>

              <div class="am-input-group am-input-group-warning">
                  <span class="am-input-group-label"><i class="am-icon-user am-icon-lock"></i></span>
                  <input type="text" class="am-form-field" name="manager_password" id="manager_password" value='<?php echo $row['manager_password']; ?>' >
              </div><br>

              <div>
                <small class="am-text-danger am-align-left" id="message0"></small>
              </div>
              <div class="am-left">
                  <p>Tips:After your profile get changed, you have to re-login </p>
              </div>

              <div class="am-cf">
                  <div >
                      <input style="width: 49%;" type="submit" id="submit_update_profile" name="submit_update_profile" value="Update" class="am-btn  am-btn-primary am-btn-sm">

                      <input style="width: 49%;" type="reset" id="submit_update_profile_cancel" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                  </div>

              </div>
          </form>
      </div>
    </div>
  </div>
  <!-- profile model end-->

    

  </body>
</html>