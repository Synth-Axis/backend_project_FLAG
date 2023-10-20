<!-- Main Content -->

<div class="row d-flex justify-content-center">
<?php foreach ($games as $game) : ?>
    <div class="card mx-2 my-2 bg-dark bg-gradient text-white" style="width: 19rem">
        <img src=<?= $game['game_photo'] ?> class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $game['game_name'] ?></h5>
            <?php foreach ($platformsByGame($game['game_id']) as $platform) : ?>
            <p class="card-text">
                <?= $platform["platformName"] . " " ?>
            </p>
            <?php endforeach; ?>
            <a href="#" class="btn btn-primary">Add to your Games</a>
        </div>
    </div>
<?php endforeach; ?>
</div>