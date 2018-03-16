<br>
<div class="page-wrapper">
  <div class="container-fluid">
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>producto/registrarproducto"><button type="button" class="btn btn-warning">Agregar Producto</button></a>
      </li>
    </ul>
  </div>
 

  <div class="container">
    <table id="myTable" class="table">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Marca</th>
          <th scope="col">Stock</th>
          <th scope="col">Precio A</th>
          <th scope="col">Precio B</th>
          <th scope="col">Precio C</th>
          <th scope="col">Tipo</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
       <?php  
        foreach ($productos as $key) {
      ?>
      <tr>
          <th scope="col"><?php echo $key->nombre; ?></th>
          <th scope="col"><?php echo $key->nombre_marca; ?></th>
          <th scope="col"><?php echo $key->stock; ?></th>
          <th scope="col"><?php echo $key->precio_a; ?></th>
          <th scope="col"><?php echo $key->precio_b; ?></th>
          <th scope="col"><?php echo $key->precio_c; ?></th>
          <th scope="col"><?php echo $key->nombre_tipoproducto ?></th>
          <th scope="col">
            <a href="<?php echo base_url(); ?>producto/editarproducto/<?php echo $key->id; ?>"><button type="button" class="btn btn-success">Editar</button></a>
            <a href="<?php echo base_url(); ?>producto/eliminarproducto/<?php echo $key->id; ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
          </th>
        </tr>
      <?php  
        }
      ?>
      </tbody>
    </table>
  </div>
</div>
