<h1>Comentarios</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="<?php echo WEBROOT;?>comments/create/" class="btn btn-primary btn-md pull-right"><b>+</b> Añadir comentario</a>
        <tr>
            <th>ID</th>
            <th>ID Usuario</th>
            <th>ID Post</th>
            <th>Comentario</th>
            <th class="text-center">Accion</th>
        </tr>
        </thead>
        <?php
        foreach ($comments as $comment)
        {
            echo '<tr>';
            echo "<td>" . $comment['id'] . "</td>";
            echo "<td>" . $comment['user_id'] . "</td>";
            echo "<td>" . $comment['post_id'] . "</td>";
            echo "<td>" . $comment['body'] . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-md' href='". WEBROOT."comments/edit/" . $comment["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Editar</a> <a href='". WEBROOT."comments/delete/" . $comment["id"] . "' class='btn btn-danger btn-md'><span class='glyphicon glyphicon-remove'></span> Borrar</a><a class='btn btn-dark btn-md' href='". WEBROOT."comments/detail/" . $comment["id"] . "' > Detalles</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>