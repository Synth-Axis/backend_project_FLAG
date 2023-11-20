<?php

require("models/users.php");

$modelUsers = new Users();

$users = $modelUsers->getAllUsers();

require("views/adminusers.php");