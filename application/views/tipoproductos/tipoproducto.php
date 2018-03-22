<br>
  <div class="page-wrapper">
      <center>

    <h3>Tipos de Producto</h3><br>

    <div class="container">
        <?php if($this->session->flashdata("error")):?>
                  <div class="alert alert-danger">
                    <p><?php echo $this->session->flashdata("error")?></p>
                  </div>
                <?php endif; ?>
      </div>

    <div class="container">
    	 <?php
        $atributos = array('method' => 'POST'); 
        echo form_open('tipoproducto/guardartipoproducto',$atributos); 
        ?>

        <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <?php 
        $atributos = array('type' => 'text', 
                           'name' => 'nombre',
                           'autofocus' => 'true',
                           'class' => 'w-50 p-0 input-default',
                           'placeholder' => ' Ingrese el nombre del tipo de producto',
                           'required' => 'true'
                          );
        echo form_input($atributos); 
        ?>
        <br>
        <?php echo form_error('nombre','<span class="error">','</span>'); ?>

            
      </div>
      
      <?php 
        
        echo form_submit('submit', 'Registrar', 'class="btn btn-primary"'); 
        ?>
      
    <?php echo form_close(); ?>
    </div>
    </center>

    <div class="container">
    <table id = "myTable" class="table">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
       <?php  
        foreach ($tipoproducto as $key) {
      ?>
      <tr>
          <th scope="col"><?php echo $key->nombre_tipoproducto; ?></th>
          <th scope="col">
            <a href="<?php echo base_url(); ?>tipoproducto/editartipoproducto/<?php echo $key->id_tipoproducto; ?>"><button type="button" class="btn btn-success">Editar</button></a>
            <a href="<?php echo base_url(); ?>tipoproducto/eliminartipoproducto/<?php echo $key->id_tipoproducto; ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
          </th>
        </tr>
      <?php  
        }
      ?>
      </tbody>
    </table>
  </div>
