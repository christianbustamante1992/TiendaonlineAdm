 <center>
 <h3>Registrarse</h3>
  
 	<div>
    <?php
    $atributos = array('method' => 'POST'); 
    echo form_open('usuario/crearusuario',$atributos); 
    ?>
 		
  <div class="form-group">
    <label for="exampleInputEmail1">Cédula</label><br>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'cedula',
                       'class' => 'w-50 p-0',
                       'placeholder' => 'Ingrese su cedula',
                       'required' => 'true'
                      );
    echo form_input($atributos); 
    ?>
    <?php echo form_error('cedula','<span class="error">','</span>'); ?>
        
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nombre</label><br>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'nombre',
                       'class' => 'w-50 p-0',
                       'placeholder' => 'Ingrese su nombre',
                       'required' => 'true'
                      );
    echo form_input($atributos); 
    ?>

    <?php echo form_error('nombre','<span class="error">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Apellido</label><br>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'apellido',
                       'class' => 'w-50 p-0',
                       'placeholder' => 'Ingrese su apellido',
                       'required' => 'true'
                      );
    echo form_input($atributos); 
    ?>
   
    <?php echo form_error('apellido','<span class="error">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Correo</label><br>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'correo',
                       'class' => 'w-50 p-0',
                       'placeholder' => 'Ingrese su correo',
                       'required' => 'true'
                      );
    echo form_input($atributos); 
    ?>
    
    <?php echo form_error('correo','<span class="error">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Telefono</label><br>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'telefono',
                       'class' => 'w-50 p-0',
                       'placeholder' => 'Ingrese su telefono',
                       'required' => 'true'
                      );
    echo form_input($atributos); 
    ?>

    <?php echo form_error('telefono','<span class="error">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Fecha de Nacimiento</label><br>
    <?php 
    $atributos = array('type' => 'date', 
                       'name' => 'fechanacimiento',
                       'class' => 'w-50 p-0',
                       'required' => 'true',
                       'max' => '2000-12-31'                       
                      );
    echo form_input($atributos); 
    ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tipo de Usuario</label><br>
    <select name="tipousuario" class="w-50 p-0">
    	<option value="1" >Administrador</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label><br>
    <?php 
    $atributos = array('type' => 'password', 
                       'name' => 'contrasena',
                       'class' => 'w-50 p-0',
                       'placeholder' => 'Ingrese su contraseña',
                       'required' => 'true'
                      );
    echo form_input($atributos); 
    ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Repita su Contraseña</label><br>
    <?php 
    $atributos = array('type' => 'password', 
                       'name' => 'contrasena2',
                       'class' => 'w-50 p-0',
                       'placeholder' => 'Repita su nombre',
                       'required' => 'true'
                      );
    echo form_input($atributos); 
    ?>
    
    <?php echo form_error('contrasena2','<span class="error">','</span>'); ?>
  </div>
  <?php 
    
    echo form_submit('submit', 'Registrarse', 'class="btn btn-primary"'); 
    ?>
  
<?php echo form_close(); ?>
 	</div>
 </center>

</body>
</html>