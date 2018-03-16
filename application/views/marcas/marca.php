<br>
<div class="page-wrapper">
  <center>

    <h3>Marcas</h3>

    <div class="container">
        <?php if($this->session->flashdata("error")):?>
                  <div class="alert alert-danger">
                    <p><?php echo $this->session->flashdata("error")?></p>
                  </div>
        <?php endif; ?>
    </div>
    <br>

    <div class="container">
    	 <?php
        $atributos = array('method' => 'POST'); 
        echo form_open('marca/guardarmarca',$atributos); 
        ?>

        <div class="form-group">
          <label for="exampleInputEmail1">Nombre</label>
          <?php 
          $atributos = array('type' => 'text', 
                             'name' => 'nombre',
                             'class' => 'w-50 p-0 input-default',
                             'placeholder' => ' Ingrese el nombre de la marca',
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
  </center><br>

  <div class="container">
  <table id="myTable" class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
     <?php  
      foreach ($marca as $key) {
    ?>
    <tr>
        <th scope="col"><?php echo $key->nombre_marca; ?></th>
        <th scope="col">
          <a href="<?php echo base_url(); ?>marca/editarmarca/<?php echo $key->id_marca; ?>"><button type="button" class="btn btn-success">Editar</button></a>
          <a href="<?php echo base_url(); ?>marca/eliminarmarca/<?php echo $key->id_marca; ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
        </th>
      </tr>
    <?php  
      }
    ?>
    </tbody>
  </table>
</div>
