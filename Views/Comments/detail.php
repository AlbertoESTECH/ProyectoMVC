<div class="card">
  <div class="card-header">
    Detalles de comentario <?php echo $comment["id"]?>
  </div>
  <div class="card-body">
    <h5 class="card-title font-weight-bold"><?php echo $comment["body"]?></h5>
    <p class="card-text">Post de: <?php echo $user2["name"]?></p>
    <p class="card-text">Comentario de: <?php echo $user["name"]?></p>
    <a href="<?php echo WEBROOT."comments/index";?>" class="btn btn-primary">Volver al listado</a>
  </div>
</div>