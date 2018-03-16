<br>
<div class="page-wrapper">
  <center>
    <h3>Registrar Producto</h3>
    
    <div class="container">
    	 <?php
        $atributos = array('method' => 'POST'); 
        echo form_open_multipart('producto/guardarproducto',$atributos); 
        ?>

        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label><br>
            <?php 
            $atributos = array('type' => 'text', 
                               'name' => 'nombre',
                               'class' => 'w-50 p-0',
                               'placeholder' => ' Ingrese el nombre del producto',
                               'required' => 'true'
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
                               'class' => 'w-50 p-0',
                               'placeholder' => ' Ingrese el stock',
                               'required' => 'true'
                              );
            echo form_input($atributos); 
            ?>
            <br>
            <?php echo form_error('stock','<span class="error">','</span>'); ?>
            
            <span><?php echo $this->session->flashdata('item') ?></span>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Precio A</label><br>
            <?php 
            $atributos = array('type' => 'text', 
                               'name' => 'precioa',
                               'class' => 'w-50 p-0',
                               'placeholder' => ' Ingrese el precio A',
                               'required' => 'true'
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
                               'class' => 'w-50 p-0',
                               'placeholder' => ' Ingrese el precio B',
                               'required' => 'true'
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
                               'class' => 'w-50 p-0',
                               'placeholder' => ' Ingrese el precio C',
                               'required' => 'true'
                              );
            echo form_input($atributos); 
            ?>
            <br>
            <?php echo form_error('precioc','<span class="error">','</span>'); ?>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Marca</label><br>
            <select name="marca" class="w-50 p-0">
              <?php foreach ($marca as $key ) {?>
                
              <option value="<?php echo $key->id_marca ?>" ><?php echo $key->nombre_marca; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Tipo de Producto</label><br>
            <select name="tipoproducto" class="w-50 p-0">
            	<?php foreach ($tipoproducto as $key ) {?>
                
              <option value="<?php echo $key->id_tipoproducto ?>" ><?php echo $key->nombre_tipoproducto; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Foto</label><br>
            <input type="file" name="foto_producto" value="<?php echo set_value('foto_usuario');?>" required="true"></input>
            <br>
            <?php //echo form_error('precioc','<span class="error">','</span>'); ?>
          </div>

          <?php 
            
            echo form_submit('submit', 'Registrar', 'class="btn btn-primary"'); 
            ?>
          
        <?php echo form_close(); ?>
    </div>
  </center>
</div>
