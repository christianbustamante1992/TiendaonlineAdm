<br>
<center>

<div><h3>Editar Marca</h3></div>


<div>
	 <?php
    $atributos = array('method' => 'POST'); 
    echo form_open('marca/actualizarmarca/',$atributos); 
    ?>
    <?php 
    $atributos = array('type' => 'hidden', 
                       'name' => 'id',
                       'value' => $marca->id_marca
                       
                      );
    echo form_input($atributos); 
    ?>
    <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'nombre',
                       'class' => 'w-50 p-0',
                       'placeholder' => 'Ingrese el nombre de la marca',
                       'required' => 'true',
                       'value' => $marca->nombre_marca
                      );
    echo form_input($atributos); 
    ?>
    <br>
    <?php echo form_error('nombre','<span class="error">','</span>'); ?>
        
  </div><br>
  
  <?php 
    
    echo form_submit('submit', 'Actualizar', 'class="btn btn-primary"'); 
    ?>
  
<?php echo form_close(); ?>
</div>
</center>
