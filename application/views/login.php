<?php $this->load->view('partial/head'); ?>
<style>
.form-signin-wrapper {
  background: url('./assets/images/background.jpg') no-repeat  center  center fixed;
  min-height: 100%;
  height:100%;
  background-size: cover;
}

.form-signin {
  margin-top:50px;
}
</style>
    <body id="mimin" class="dashboard form-signin-wrapper">

      <div class="container">
        <form class="form-signin" method="POST" action="<?php echo base_url('login/proses');?>">
          <div class="panel periodic-login">
              <div class="panel-body text-center">
<!--                     <img src="<?php echo base_url();?>assets/images/logo.png" style="height:100px;">
 -->
                  <h4> Login DSS Mosque Repair </h4>
              <div>
              <?php echo @$this->session->flashdata('item'); ?>
              </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" name="username" required="required">
                    <span class="bar"></span>
                    <label>Username</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" class="form-text" name="password" required = "required">
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
                  <!--   <label class="pull-left">
                  <input type="checkbox" class="icheck pull-left" name="checkbox1"/> Remember me
                  </label> -->
                  <input type="submit" class="btn col-md-12" value="Login"/>
              </div>
               <!--  <div class="text-center" style="padding:5px;">
                    <a href="forgotpass.html">Forgot Password </a>
                </div> -->
          </div>
        </form>

      </div>

      <!-- end: Content -->
      <!-- start: Javascript -->
      <?php $this->load->view('partial/js_under'); ?>
     <!-- end: Javascript -->
   </body>
   </html>