 <br>
<div class="page-wrapper">
 <center>
 <h3>Perfil</h3>
  </center>
 	<div>
    <?php
    $atributos = array('method' => 'POST'); 
    echo form_open('usuario/actualizarusuario',$atributos); 
    ?>
    <div class="form-group">
    <label for="inputAddress">Cèdula</label>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'cedula',
                       'class' => 'form-control',
                       'readonly' => 'true',
                       'required' => 'true',
                       'value' => $usuario->cedula
                      );
    echo form_input($atributos); 
    ?>

    <?php echo form_error('cedula','<span class="error">','</span>'); ?>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'nombre',
                       'class' => 'form-control',
                       'placeholder' => 'Ingrese su nombre',
                       'required' => 'true',
                       'value' => $usuario->nombre
                      );
    echo form_input($atributos); 
    ?>

    <?php echo form_error('nombre','<span class="error">','</span>'); ?>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellido</label>
      <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'apellido',
                       'class' => 'form-control',
                       'placeholder' => 'Ingrese su nombre',
                       'required' => 'true',
                       'value' => $usuario->apellido
                      );
    echo form_input($atributos); 
    ?>

    <?php echo form_error('apellido','<span class="error">','</span>'); ?>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Telèfono</label>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'telefono',
                       'class' => 'form-control',
                       'placeholder' => 'Ingrese su nombre',
                       'required' => 'true',
                       'value' => $usuario->telefono
                      );
    echo form_input($atributos); 
    ?>

    <?php echo form_error('telefono','<span class="error">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Fecha de Nacimiento</label>
    <?php 
    $atributos = array('type' => 'date', 
                       'name' => 'fechanacimiento',
                       'class' => 'form-control',
                       'max' => '2000-12-31',
                       'placeholder' => 'Ingrese su nombre',
                       'required' => 'true',
                       'value' => $usuario->fecha_nacimiento
                      );
    echo form_input($atributos); 
    ?>

  </div>
  <div class="form-group">
    <label for="inputAddress2">Correo</label>
    <?php 
    $atributos = array('type' => 'email', 
                       'name' => 'correo',
                       'class' => 'form-control',
                       'placeholder' => 'Ingrese su nombre',
                       'required' => 'true',
                       'value' => $usuario->correo
                      );
    echo form_input($atributos); 
    ?>

    <?php echo form_error('correo','<span class="error">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Contraseña</label>
    <?php 
    $atributos = array('type' => 'password', 
                       'name' => 'contrasena',
                       'class' => 'form-control',
                       'placeholder' => 'Ingrese su nueva contraseña',
                       'required' => 'true'
                       
                      );
    echo form_input($atributos); 
    ?>

    <?php echo form_error('contrasena','<span class="error">','</span>'); ?>
  </div>
  <center>
  <?php echo form_submit('submit', 'Actualizar', 'class="btn btn-primary"'); ?>
  </center>
  <?php echo form_close(); ?>
</form>
 	</div>

</div>

