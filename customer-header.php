<html>
  <body>
    <?php
    require_once "config.php";
    ?>

    <header class="am-topbar am-topbar-inverse admin-header">
      <div class="am-topbar-brand">
        <strong>Amaze UI</strong> <small>Welcome to Keep Shopping Mall</small>
      </div>

      <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

      <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
          
          <li class="am-dropdown" data-am-dropdown>
            <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
              <span class="am-icon-users"></span> Customer <span class="am-icon-caret-down"></span>
            </a>
            <ul class="am-dropdown-content">
              <li id="customer_profile_model_open"><a href="javascript:;"><span class="customer_profile_model_open am-icon-user"></span> Profile</a></li>
              <li><a href="customer_login.php"><span class="am-icon-power-off"></span> Log Out</a></li>
            </ul>
          </li>
          
        </ul>
      </div>
    </header>


    <div class="am-modal am-modal-no-btn" tabindex="-1" id="customer_profile_modal">
      <div class="am-modal-dialog" >
          <div class="am-modal-hd">
              <h1>Profile</h1><a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
          </div>
          <div class="am-modal-bd">
              <form method="post" class="am-form" id="customer_profile_update" name="customer_profile_update" action="customer.php?action=customer_profile_update" >

                  <div class="am-input-group am-input-group-danger">
                      <span class="am-input-group-label"><i class="am-icon-user am-icon-user"></i></span>
                      <input type='text' class="am-form-field" name="customer_username" id="customer_username">
                  </div><br>

                  <div class="am-input-group am-input-group-warning">
                      <span class="am-input-group-label"><i class="am-icon-user am-icon-odnoklassniki"></i></span>
                      <input type="text" class="am-form-field" name="customer_name" id="customer_name">
                  </div><br>

                  <div class="am-input-group am-input-group-secondary">
                      <span class="am-input-group-label"><i class="am-icon-user am-icon-home"></i></span>
                      <input type="text" class="am-form-field" name="customer_address" id="customer_address">
                  </div><br>

                  <div class="am-input-group am-input-group-success">
                      <span class="am-input-group-label"><i class="am-icon-user am-icon-lock"></i></span>
                      <input type="text" class="am-form-field" name="customer_password" id="customer_password">
                  </div><br>
                  
                  <div>
                      <small class="am-text-danger am-align-left" id="message00"></small>
                  </div>
                  <div class="am-left">
                      <p>Tips:If your profile is incorrect, please update here,after you update, you have to re-login</p>
                  </div>

                  <div class="am-cf">
                      <div >
                          <input style="width: 49%;" type="submit" id="customer_profile_update_submit" value="Update" class="am-btn  am-btn-primary am-btn-sm">

                          <input style="width: 49%;" type="reset" id="cancel" value="Cancel" class="am-btn  am-btn-primary am-btn-sm">
                      </div>

                  </div>
              </form>
          </div>
      </div>
    </div>

  </body>
</html>