
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
                    <div class="card mx-2 my-2 bg-dark bg-gradient text-white" style="width: 19rem">
                        <img src=<?= $game['game_photo'] ?> class="card-img-top" alt="game cover">
                        <div class="card-body">
                            <h5 class="card-title"><?= $game['game_name'] ?></h5>           
                            <p class="card-text">
                                Brevemente será adicionada descrição do jogo.
                            </p>
                            <form class="mb-2" method="POST" action="/gamedetail/<?= $game["game_id"] ?>">
                                <div>
                                    <input type="hidden" name="game_id" value="<?= $game["game_id"] ?>">
                                    <button type="submit" class="btn btn-primary" name="send">Add to your Games</button>
                                </div>
                            </form>
                            <p><?= showMessage($message) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

<?php require('views/partials/footer.php') ?>