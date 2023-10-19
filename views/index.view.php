<?php 

require ("./controllers/genres.php"); 
require ("./controllers/platforms.php");

require('views/partials/head.php') ?>

<body class="text-light bg-dark">
    <div class="container text-center">
        <div class="row mt-3">
            <?php require('views/partials/nav.php') ?>
        </div>
        
        <div class="row mt-5">
            <div class="col-3">
                <?php require("views/partials/aside.php") ?>
            </div>
            <div class="col-9">
                <?php require("views/games.view.php") ?>
            </div>
            
        </div>
    </div>

<?php require('views/partials/footer.php') ?>