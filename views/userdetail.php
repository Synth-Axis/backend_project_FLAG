<?php require('views/partials/head.php') ?>

<body class="text-light bg-dark">
    <div class="container text-center">
        <div class="row mt-3">
            <?php require('views/partials/nav.php') ?>
        </div>
        <div class="col-12 mt-5">
            <div class="row d-flex justify-content-center">
                <div class="card mx-2 my-2 bg-dark bg-gradient text-white" style="width: 19rem">
                    <form method="POST" action="/userdetail/<?= $user["user_id"] ?>">
                        <img src=<?= $user['user_photo'] ?> class="card-img-top" alt="user profile photo">
                        <div class="card-body">
                            <div>
                                <label for="username">Username</label>
                                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="<?= $user["username"] ?>" />
                                <div class="mt-2">    
                                    <button type="submit" name="sendUser">Change</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="/userdetail/<?= $user["user_id"] ?>">
                        <div class="card-body">
                            <div>
                                <label for="username">Email</label>
                                <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="<?= $user["email"] ?>" />
                                <div class="mt-2">    
                                    <button type="submit" name="sendEmail">Change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
