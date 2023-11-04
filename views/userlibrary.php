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
                <?php foreach ($gamesOwned as $game) : ?>
                    <div id="gameCard" class="card px-0 mx-2 my-2 bg-dark bg-gradient text-white border-0" style="width: 19rem">
                        <img class="object-fit-cover" src=<?= $game['game_photo'] ?> class="card-img-top" alt="game cover">
                        <div class="card-body">
                            <h5 class="card-title"><?= $game['game_name'] ?></h5>     
                            <form method="POST" action="userlibrary">
                                <input type="button" class="btn btn-warning" value="Remove Game" name="send" id="removeGame"/>
                                <input type="hidden" value="<?= $game['game_id']?>" name="game_id"/>
                            </form>
                            <button type="button" class="btn btn-success mt-3">Play</a>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
                                
        </div>
    </div>

<?php require('views/partials/footer.php') ?>