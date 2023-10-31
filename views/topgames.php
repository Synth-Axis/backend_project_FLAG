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
            
            <div class="col-9">
                <div class="row d-flex justify-content-center">
                <?php foreach ($games as $game) : ?>
                    <div class="card mx-2 my-2 bg-dark bg-gradient text-white" style="width: 19rem">
                        <img src=<?= $game['game_photo'] ?> class="card-img-top" alt="game cover">
                        <div class="card-body">
                            <p class="card-title h5"><?= $game['game_name'] ?></p>           
                            <p class="card-text">
                            <?php foreach($game["platforms"] as $platform) : ?>
                               <?= $platform["platformName"] ?>
                            <?php endforeach ?>
                            </p>
                            <form class="mb-2" method="POST" action="topgames">
                                <div>
                                    <input type="hidden" name="game_id" value="<?= $game["game_id"] ?>">
                                    <button type="submit" class="btn btn-primary" name="send">Add to your Games</button>
                                </div>
                            </form>
                            <a href="/gamedetail/<?= $game['game_id'] ?>" class="btn btn-primary">More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
                                
        </div>
    </div>

<?php require('views/partials/footer.php') ?>