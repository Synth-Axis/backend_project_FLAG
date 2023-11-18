<div class="row mx-4 mt-4 text-start">
    <a class="text-decoration-none text-light" href="/"><h3 class="mt-3 fw-bold">Home</h3></a>

<?php
    if( isset($_SESSION["user_id"]) )
    {
?>
    <div>
        <img class="rounded-circle mt-3 object-fit-cover" src="<?= $currentUser["user_photo"] ?>" alt="user photo" style="width: 60px; height: 60px">
        <p class="mt-3 fw-bold h4"><?= $currentUser["username"] ?></p>
    </div>
    <ul class="list-group-dark list-group-flush">
        <a class="text-decoration-none text-light" href="/userlibrary">
            <li class="list-group-item border-0">My Library (<span id="gameCounter"><?= $ownedGamesCount["gamesOwned"] ?></span>)</li>
        </a>
    </ul>
<?php  
    }  
?>

</div>
<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">New Releases</h3>
    <ul class="list-group-dark list-group-flush">
        <a class="text-decoration-none text-light" href="/latest">
            <li class="list-group-item border-0 mt-2">Latest (2018)</li>
        </a>
        <a class="text-decoration-none text-light" href="/oldergames">
            <li class="list-group-item border-0 mt-2">Previous Years</li>
        </a>
    </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Top</h3>
    <ul class="list-group-dark list-group-flush">
        <a class="text-decoration-none text-light" href="/topgames">
            <li class="list-group-item border-0 mt-2">Best of 2018</li>
        </a>
        <a class="text-decoration-none text-light" href="/previoustopgames">
            <li class="list-group-item border-0 mt-2">Best of Previous Years</li>
        </a>
    </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Browse</h3>
    <ul class="list-group-dark list-group-flush">
        <a class="text-decoration-none text-light" href="/platforms">
            <li class="list-group-item border-0 mt-2">Platforms</li>
        </a>
        <a class="text-decoration-none text-light" href="/genres">
            <li class="list-group-item border-0 mt-2">Genres</li>
        </a>
    </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Platforms</h3>
        <ul class="list-group-dark list-group-flush">
            <?php foreach ($platformsAsideMenu as $platformAsideMenu) : ?>
                <a class="text-decoration-none text-light" href="/platformgames/<?= $platformAsideMenu["platform_id"] ?>">
                    <li class="list-group-item border-0 mt-2"><?= $platformAsideMenu['platform_name'] ?></li>
                </a>
            <?php endforeach ?>
        </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Genres</h3>
        <ul class="list-group-dark list-group-flush">

        <?php foreach ($genresAsideMenu as $genreAsideMenu) : ?>
            <a class="text-decoration-none text-light" href="/genregames/<?= $genreAsideMenu["genre_id"] ?>">
                <li class="list-group-item border-0 mt-2"><?= $genreAsideMenu['genre_name'] ?></li>
            </a>
        <?php endforeach; ?>
        </ul>
</div>

