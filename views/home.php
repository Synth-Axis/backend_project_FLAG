<?php require('views/partials/head.php') ?>

<body class="text-light bg-dark">
    <div class="container text-center">
        <div class="row mt-3">
            <?php require('views/partials/nav.php') ?>
        </div>
        
        <div class="row mt-5">
            <div class="col-3">
                <?php require("views/partials/aside.php") ?>
            </div>
            <div class="col-9 text-light bg-dark">
                <p><?= showMessage($message) ?></p>
                <div class="row d-flex justify-content-center">
                <?php foreach ($games as $game) : ?>
                    <div class="card px-0 mx-2 my-2 bg-dark bg-gradient text-light border-0" style="width: 19rem">
                        <img class="object-fit-cover" src=<?= $game['game_photo'] ?> class="card-img-top" alt="game cover" style="height:250px ; width: 100%">
                        <div class="card-body">
                            <p class="card-title h5"><?= $game['game_name'] ?></p>           
                            <p class="card-text">
                            <?php foreach($game["platforms"] as $platform) : ?>
                               <?= $platform["platformName"] ?>
                            <?php endforeach ?>
                            </p>
                            <div>
                                <a href="/gamedetail/<?= ($game['game_id']) ?>" class="btn btn-primary">More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

<?php require('views/partials/footer.php') ?>