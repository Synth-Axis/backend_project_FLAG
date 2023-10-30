<?php require('views/partials/head.php') ?>

<body class="text-light bg-dark">
    <div class="container text-center">
        <div class="row mt-3">
            <?php require('views/partials/nav.php') ?>
        </div>   
        <div class="col-12 mt-5">
            <div class="row d-flex justify-content-center">
            <?php foreach ($users as $user) : ?>
                <div class="card mx-2 my-2 bg-dark bg-gradient text-white" style="width: 19rem">
                    <img class="rounded-circle" src=<?= $user['user_photo'] ?> alt="user profile picture">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['username'] ?></h5>           
                        <p class="card-text">
                        <h5 class="card-title"><?= $user['email'] ?></h5>           
                        <a href="/userdetail/<?= ($user['user_id']) ?>">
                            <input type="button" class="btn btn-primary" value="User Details">
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</body>
</html>