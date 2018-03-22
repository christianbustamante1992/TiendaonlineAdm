 <br>
 <br>
 <br>
 <br>
 <br>
 <center>
  <div>
    <?php if($this->session->flashdata("errorlogin")):?>
              <div class="alert alert-danger">
                <p><?php echo $this->session->flashdata("errorlogin")?></p>
              </div>
            <?php endif; ?>
  </div>
 	<div>
    
 		<form action="<?php echo base_url();?>login/iniciarsesion" method="POST">
<div class="form-group">
    <label for="exampleInputPassword1" >Correo</label><br>
    <input type="email" name="email" class="w-50 p-2" placeholder="Email" required="true">
  </div>
 <div class="form-group">
    <label for="exampleInputPassword1" >Password</label><br>
    <input type="password" name="contrasena" class="w-50 p-2" placeholder="Password" required="true">
  </div>
  
  <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
</form>
 	</div><br>
  <a href="<?php echo base_url();?>usuario/registrarusuario"><button type="button" class="btn btn-success">Registrarse</button></a>


 </center>


</body>
</html>