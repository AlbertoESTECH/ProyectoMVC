<h1>Posts</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <tr>
            <th>ID</th>
            <th>ID Usuario</th>
            <th>Titulo</th>
            <th class="text-center">Accion</th>
        </tr>
        </thead>
        <?php
        foreach ($posts as $post)
        {
            echo '<tr>';
            echo "<td>" . $post['id'] . "</td>";
            echo "<td>" . $post['user_id'] . "</td>";
            echo "<td>" . $post['title'] . "</td>";
            echo "<td class='text-center'><a href='". WEBROOT."posts/delete/" . $post["id"] . "' class='btn btn-danger btn-md'><span class='glyphicon glyphicon-remove'></span> Borrar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>