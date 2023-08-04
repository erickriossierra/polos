<?php
include '../diseño/diseño.php';
inicio();

?>
    
  <div class="login">
    <div class="login-screen">
      <div class="app-title">
              
        <form action="../consultas/autenticar.php" method="post">
                   
        <img src="../img/logos/no.gif" style="width:250px;height:104px;">
                   
        <h1>Sitio POLOS</h1>
      </div>

      <div class="login-form">
        <div class="control-group">
        <input type="text" name="username" class="login-field" value="" placeholder="Usuario/Correo" maxlength="100" id="login-name" required>
        <label class="login-field-icon fui-user" for="login-name"></label>
        </div>

        <div class="control-group">
        <input type="password" name="password" class="login-field" value="" placeholder="Contraseña"  id="login-pass" required>
        <label class="login-field-icon fui-lock" for="login-pass"></label>
        </div>
         
        <input type="submit" class="btn btn-primary btn-large btn-block" value="INGRESAR">
        <a class="login-link" href="password.php">Cambiar Contraseña</a>

      </div>
    </div>
  </div>
  </form>
  </div>
</div>
</div>
