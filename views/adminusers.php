<?php require("views/partials/adminheader.php") ?>

        <div class="col-12 mt-5">
            <div class="row d-flex justify-content-center">
            <?php foreach ($users as $user) : ?>
                <div class="card mx-2 my-2 bg-dark bg-gradient text-white" style="width: 19rem">
                    <div>
                        <img class="rounded-circle mb-1 mt-3 object-fit-cover" src="<?= $user['user_photo'] ?>" alt="user profile picture" style="width: 200px; height: 200px">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['username'] ?></h5>           
                            <h5 class="card-title"><?= $user['email'] ?></h5>           
                            <a class="btn btn-outline-light btn-lg px-3 mx-2" href="/userdetail/<?= ($user['user_id']) ?>"> User Details </a>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<?php require("views/partials/footer.php") ?>