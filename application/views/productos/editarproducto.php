<center>
<br>
<div><h3>Editar Producto</h3></div>
<br>

<div>
	 <?php
    $atributos = array('method' => 'POST'); 
    echo form_open_multipart('producto/updateproducto',$atributos); 
    ?>
   
    <div class="form-group">
      <?php 
    $atributos = array('type' => 'hidden', 
                       'name' => 'id',
                       'value' => $producto->id
                      );
    echo form_input($atributos); 
    ?>
    <label for="exampleInputEmail1">Nombre</label><br>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'nombre',
                       'class' => 'w-50 p-2',
                       'placeholder' => 'Ingrese el nombre del producto',
                       'required' => 'true',
                       'value' => $producto->nombre
                      );
    echo form_input($atributos); 
    ?>
    <br>
    <?php echo form_error('nombre','<span class="error">','</span>'); ?>
        
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Stock</label><br>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'stock',
                       'class' => 'w-50 p-2',
                       'placeholder' => 'Ingrese el stock',
                       'required' => 'true',
                       'value' => $producto->stock
                      );
    echo form_input($atributos); 
    ?>
    <br>
    <?php echo form_error('stock','<span class="error">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Precio A</label><br>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'precioa',
                       'class' => 'w-50 p-2',
                       'placeholder' => 'Ingrese el precio A',
                       'required' => 'true',
                       'value' => $producto->precio_a
                      );
    echo form_input($atributos); 
    ?>
    <br>
    <?php echo form_error('precioa','<span class="error">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Precio B</label><br>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'preciob',
                       'class' => 'w-50 p-2',
                       'placeholder' => 'Ingrese el precio B',
                       'required' => 'true',
                       'value' => $producto->precio_b
                      );
    echo form_input($atributos); 
    ?>
    <br>
    <?php echo form_error('preciob','<span class="error">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Precio C</label><br>
    <?php 
    $atributos = array('type' => 'text', 
                       'name' => 'precioc',
                       'class' => 'w-50 p-2',
                       'placeholder' => 'Ingrese el precio C',
                       'required' => 'true',
                       'value' => $producto->precio_c
                      );
    echo form_input($atributos); 
    ?>
    <br>
    <?php echo form_error('precioc','<span class="error">','</span>'); ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Marca</label><br>
    <select name="marca" class="w-50 p-2">
      <?php foreach($marca as $key):?>
      <?php if($key->id_marca == $producto->id_marcaproducto):?>
      <option value="<?php echo $key->id_marca; ?>" selected><?php echo $key->nombre_marca;?></option>
      <?php else:?>
      <option value="<?php echo $key->id_marca;?>"><?php echo $key->nombre_marca;?></option>
      <?php endif;?>
      <?php endforeach;?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tipo de Producto</label><br>
    <select name="tipoproducto" class="w-50 p-2">
    	<?php foreach($tipoproducto as $key):?>
      <?php if($key->id_tipoproducto == $producto->id_tipoproducto):?>
      <option value="<?php echo $key->id_tipoproducto; ?>" selected><?php echo $key->nombre_tipoproducto;?></option>
      <?php else:?>
      <option value="<?php echo $key->id_tipoproducto;?>"><?php echo $key->nombre_tipoproducto;?></option>
      <?php endif;?>
      <?php endforeach;?>
    </select>
  </div>

   <div class="form-group">
    <label for="exampleInputPassword1">Foto</label><br>
    <input type="file" name="foto_producto" value="<?php echo set_value('foto_usuario');?>" required = "true"></input>
    <br>
    <?php //echo form_error('precioc','<span class="error">','</span>'); ?>
  
  </div>
 
  <?php 
    
    echo form_submit('submit', 'Actualizar', 'class="btn btn-primary"'); 
    ?>
  
<?php echo form_close(); ?>
</div>
</center>

