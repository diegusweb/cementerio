
<div class="container alpha60">

      <form class="form-signin" role="form" action="<?php echo base_url() . "login/verify" ?>" id="step-login" method="POST">
          <h2 class="form-signin-heading" style="color: #FFF; text-align: center;">Login del Sistema</h2>
        <p><input type="text" class="form-control" placeholder="C.I"  id="ci" name="ci"  autofocus></p>
        
        <p><input type="password" class="form-control" placeholder="Password" id="password" name="password" ></p>
        <hr>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form>
<hr>
            <span style="color: #F00;"><?php echo $error;?></span>
    </div> <!-- /container -->