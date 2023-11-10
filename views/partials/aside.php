<div class="row mx-4 mt-4 text-start">
    <a href="/"><h3 class="mt-3 fw-bold">Home</h3></a>

<?php
    if( isset($_SESSION["user_id"]) )
    {
?>

    <h3 class="mt-3 fw-bold"><?= $currentUser["username"] ?></h3>
    <ul class="list-group-dark list-group-flush">
        <a href="/userlibrary">
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
        <a href="/latest">
            <li class="list-group-item border-0 mt-2">Latest (2018)</li>
        </a>
        <a href="/oldergames">
            <li class="list-group-item border-0 mt-2">Previous Years</li>
        </a>
    </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Top</h3>
    <ul class="list-group-dark list-group-flush">
        <a href="/topgames">
            <li class="list-group-item border-0 mt-2">Best of 2018</li>
        </a>
        <a href="/previoustopgames">
            <li class="list-group-item border-0 mt-2">Best of Previous Years</li>
        </a>
    </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Browse</h3>
    <ul class="list-group-dark list-group-flush">
        <a href="/platforms">
            <li class="list-group-item border-0 mt-2">Platforms</li>
        </a>
        <a href="/genres">
            <li class="list-group-item border-0 mt-2">Genres</li>
        </a>
    </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Platforms</h3>
        <ul class="list-group-dark list-group-flush">
            <?php foreach ($platforms as $platform) : ?>
                <a href="/platformgames/<?= $platform["platform_id"] ?>">
                    <li class="list-group-item border-0 mt-2"><?= $platform['platform_name'] ?></li>
                </a>
            <?php endforeach ?>
        </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Genres</h3>
        <ul class="list-group-dark list-group-flush">

        <?php foreach ($genres as $genre) : ?>
            <a href="/genregames/<?= $genre["genre_id"] ?>">
                <li class="list-group-item border-0 mt-2"><?= $genre['genre_name'] ?></li>
            </a>
        <?php endforeach; ?>
        </ul>
</div>

