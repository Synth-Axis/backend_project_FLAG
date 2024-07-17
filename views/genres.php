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
                <div class="row d-flex justify-content-center">
                <?php foreach ($genres as $genre) : ?>
                    <div class="card px-0 mx-2 my-2 bg-dark bg-gradient text-white" style="width: 19rem">
                        <div class="card-body">
                            <h5 class="card-title"><?= $genre['genre_name'] ?></h5>           
                            <p class="card-text">
                            </p>
                            <a href="/genregames/<?= $genre['genre_id'] ?>" class="btn btn-primary">
                                Check Games
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
            
        </div>
    </div>

<?php require('views/partials/footer.php') ?>