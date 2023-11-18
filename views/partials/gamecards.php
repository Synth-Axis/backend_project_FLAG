
<div class="card shadow-lg rounded-lg px-0 mx-2 my-2 bg-dark bg-gradient text-white border-0" style="width: 19rem">
    <img class="object-fit-cover" src=<?= $game['game_photo'] ?> class="card-img-top" alt="game cover" style="height:250px ; width: 100%">
    <div class="card-body">
        <p class="card-title h5"><?= $game['game_name'] ?></p>           
        <div>
            <a href="/gamedetail/<?= $game['game_id'] ?>" class="btn btn-secondary">Details</a>
        </div>
    </div>
</div>
