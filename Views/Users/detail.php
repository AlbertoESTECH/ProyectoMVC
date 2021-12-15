<div class="card">
  <div class="card-header">
    Detalles del usuario <?php echo $user["id"]?>
  </div>
  <div class="card-body">
    <h5 class="card-title font-weight-bold"><?php echo $user["name"]?></h5>
    <p class="card-text"><?php echo $user["email"]?></p>
    <a href="<?php echo WEBROOT?>" class="btn btn-primary">Volver al listado</a>
  </div>
</div>