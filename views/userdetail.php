<?php require('views/partials/head.php') ?>

<body class="text-light bg-dark">
    <div class="container text-center">
        <div class="row mt-3 d-flex align-items-center">
            <?php require('views/partials/nav.php') ?>
        </div>
        <div class="col-12 mt-5">
            <div class="row d-flex justify-content-center">
                <div class="card mx-2 my-2 bg-dark bg-gradient text-white" style="width: 19rem">
                    <form method="POST" action="/userdetail/<?= $user["user_id"] ?>">
                        <img src=<?= ROOT . $user["user_photo"] ?> class="rounded-circle mb-1 mt-3 object-fit-cover" alt="user profile photo" style="width: 200px; height: 200px">
                        <div class="card-body">
                            <div>
                                <label for="username">Username</label>
                                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="<?= $user["username"] ?>" value="<?= $user["username"] ?>"/>
                                <div class="mt-2">    
                                    <button class="btn btn-outline-light btn-lg px-3 mx-2" type="submit" name="sendUser">Change</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="/userdetail/<?= $user["user_id"] ?>">
                        <div class="card-body">
                            <div>
                                <label for="email">Email</label>
                                <input type="text" class="form-control form-control-lg" id="email" name="email"  placeholder="<?= $user["email"] ?>" value="<?= $user["email"] ?>" />
                                <div class="mt-2">    
                                    <button class="btn btn-outline-light btn-lg px-3 mx-2" type="submit" name="sendEmail">Change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="POST" action="/userdetail/<?= $user["user_id"] ?>">
                        <div class="card-body">
                            <div>
                                <div class="mt-2">    
                                    <input type="hidden" name="user_id" value=<?= $user["user_id"] ?>>
                                    <button class="btn btn-outline-light btn-lg px-3 mx-2" type="submit" name="deleteAccount">Delete Account</button>
                                    
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
