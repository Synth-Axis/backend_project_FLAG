<?php

//Passar o user_type para validar se é admin para evitar aceder atraves da barra -> 403 Forbidden & die

require("models/users.php");

$model = new Users();

$users = $model->getAllUsers();

require("views/admin.php");