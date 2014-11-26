<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.2
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Login page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo RESOURCES_PATH; ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo RESOURCES_PATH; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo RESOURCES_PATH; ?>css/style.css" rel="stylesheet" />
  <link href="<?php echo RESOURCES_PATH; ?>css/style_responsive.css" rel="stylesheet" />
  <link href="<?php echo RESOURCES_PATH; ?>css/style_default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
  <div class="login-header">
      <!-- BEGIN LOGO -->
      <div id="logo" class="center">
          
      </div>
      <!-- END LOGO -->
  </div>

  <!-- BEGIN LOGIN -->
  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <?php echo $content_for_layout ?>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgotform" class="form-vertical no-padding no-margin hide" action="index.html">
      <p class="center">Enter your e-mail address below to reset your password.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="text" placeholder="Email"  />
          </div>
        </div>
        <div class="space20"></div>
      </div>
      <input type="button" id="forget-btn" class="btn btn-block login-btn" value="Submit" />
    </form>
    <!-- END FORGOT PASSWORD FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
      2014 &copy; Cementerio.
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="<?php echo RESOURCES_PATH; ?>js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo RESOURCES_PATH; ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo RESOURCES_PATH; ?>js/jquery.blockui.js"></script>
  <script src="<?php echo RESOURCES_PATH; ?>js/scripts.js"></script>
  <script>
    jQuery(document).ready(function() {     
      App.initLogin();
    });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>