<h1>Editar Comentario</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="user">Seleccione su usuario</label>
        <select class="form-control" name="user" id="user">
            <?php 
                foreach($users as $user) {
                    if($user["id"] == $comment["user_id"]) {
                        echo '<option selected value="'.$user["id"].'">'.$user["email"].'</option>';
                    } else {
                        echo '<option value="'.$user["id"].'">'.$user["email"].'</option>';
                    }
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post">Seleccione el post</label>
        <select class="form-control" name="post" id="post">
            <?php 
                foreach($posts as $post) {
                    if($post["id"] == $comment["post_id"]) {
                        echo '<option selected value="'.$post["id"].'">'.$post["title"].'</option>';
                    } else {
                        echo '<option value="'.$post["id"].'">'.$post["title"].'</option>';
                    }
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="body">Escribe tu comentario</label>
        <textarea class="form-control" id="body" name="body" rows="3"><?php if (isset($comment["body"])) echo $comment["body"];?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>