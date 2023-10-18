<!-- Right-side Bar -->

<!-- Se logado mostrar o username e a foto -->
<div class="row mx-4 mt-4 text-start">
    <a href="/backend"><h3 class="mt-3 fw-bold">Home</h3></a>
    <a href="/backend/ratings"><h3 class="mt-3 fw-bold">Reviews</h3></a>
    <h3 class="mt-3 fw-bold">"Username"</h3>
    <ul class="list-group-dark list-group-flush">
        <li class="list-group-item border-0 mt-2">Wishlist</li>
        <li class="list-group-item border-0">My Library</li>
    </ul>
</div>
<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">New Releases</h3>
    <ul class="list-group-dark list-group-flush">
        <li class="list-group-item border-0 mt-2">Latest (2018)</li>
        <li class="list-group-item border-0 mt-2">Previous Years</li>
    </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Top</h3>
    <ul class="list-group-dark list-group-flush">
        <li class="list-group-item border-0 mt-2">Best of 2018</li>
        <li class="list-group-item border-0 mt-2">Best of Previous Years</li>
    </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">All Games</h3>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Browse</h3>
    <ul class="list-group-dark list-group-flush">
        <li class="list-group-item border-0 mt-2">Platforms</li>
        <li class="list-group-item border-0 mt-2">Genres</li>
        <li class="list-group-item border-0 mt-2">Reviews</li>
    </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Platforms</h3>
        <ul class="list-group-dark list-group-flush">
            <?php foreach ($platforms as $platform) : ?>
                <li class="list-group-item border-0 mt-2"><?= $platform['platform_name'] ?></li>
            <?php endforeach; ?>
        </ul>
</div>

<div class="row mx-4 mt-4 text-start">
    <h3 class="mt-3 fw-bold">Genres</h3>
        <ul class="list-group-dark list-group-flush">

        <?php foreach ($genres as $genre) : ?>
            <li class="list-group-item border-0 mt-2"><?= $genre['genre_name'] ?></li>
        <?php endforeach; ?>
        </ul>
</div>
