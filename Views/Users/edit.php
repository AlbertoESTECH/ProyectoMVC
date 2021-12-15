<h1>Editar Usuario</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" placeholder="Escribe un nombre" name="name" value ="<?php if (isset($users["name"])) echo $users["name"];?>">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Escribe un email" name="email" value ="<?php if (isset($users["email"])) echo $users["email"];?>">
    </div>

    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" placeholder="Escribe tu contraseña" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>