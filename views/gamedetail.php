
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
            
            <div class="col-9 border border-dark">
                <div class="row d-flex justify-content-center">
                <div class="card px-0 mx-2 my-2 bg-dark bg-gradient text-white border border-dark">
            </div>
            <div class="row m-0">
                <div class="col-lg-5 left-side-product-box pb-3">
                    <img class="object-fit-cover" src=<?= $game['game_photo'] ?> class="card-img-top" alt="game cover" style="height:100% ; width: 100%">
                </div>
                <div class="col-lg-7">
                    <div class="right-side-pro-detail p-3 pt-0 m-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="m-0 p-0"><?= $game['game_name'] ?></h1>
                            </div>
                            <div class="col-lg-12 pt-2">
                                <h2>Details</h2>
                                <p>Brevemente será adicionada descrição do jogo.</p>
                                <hr class="m-0 pt-2 mt-5">
                            </div>
                            <div class="col-lg-12 mt-2">
                            
                            <p class="tag-section">Platforms:
                            <?php foreach($gameData["platforms"] as $platform) : ?>
                                <a class="mx-1" href="/platformgames/<?= $platform["platform_id"] ?>"><?= $platform["platformName"] ?></a>
                            <?php endforeach ?>
                            </p>
                            </div>
                            <p class="tag-section">Rating: <?= $rating["averageScore"] ?>
                            <div class="col-lg-12 mt-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="/" class="btn btn-secondary w-100">Back</a>
                                    </div>
                                    <div class="col-lg-6 pb-2">
                                        <button data-game_id="<?= $game["game_id"] ?>" type="button" class="btn btn-success" id="addGame">Add to your Games</button>
                                        <input type="hidden" name="game_id" value="<?= $game["game_id"] ?>">
                                    </div>
                                <p><?= showMessage($message) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require('views/partials/footer.php') ?>
