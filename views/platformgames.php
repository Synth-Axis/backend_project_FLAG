<?php require('views/partials/head.php') ?>

<body class="text-light bg-dark">
    <div class="container text-center">
        <div class="row mt-3 d-flex align-items-center">
            <?php require('views/partials/nav.php') ?>
        </div>
        
        <div class="row mt-5">
            <div class="col-3">
                <?php require("views/partials/aside.php") ?>
            </div>
            
            <div class="col-9">
                <p><?= showMessage($message) ?></p>
                <div class="row d-flex justify-content-center">
                <?php foreach ($platforms[$id]["games"] as $game) : ?>
                    <?php require("views/partials/gamecards.php") ?>
                <?php endforeach ?>
                </div>
            </div>
            
        </div>
    </div>

<?php require('views/partials/footer.php') ?>