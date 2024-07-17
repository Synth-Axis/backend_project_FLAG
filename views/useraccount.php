<?php require('views/partials/head.php') ?>

<body class="text-light bg-dark">
    <main>
        <div class="container text-center">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 row gutters">
                    <div class="row d-flex justify-content-center align-items-center col-4">
                        <div class="card h-100 bg-dark text-white">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img class="rounded-circle mb-1 object-fit-cover" src="<?= $currentUser["user_photo"] ?>" alt="User Photo" style="width: 200px; height: 200px">
                                            <form method="POST" action="useraccount" enctype="multipart/form-data">
                                                <input type="file" name="avatar" accept="<?= implode(",", $allowed_formats) ?>">
                                                <button data-user_id="<?= $currentUser["user_id"] ?>" type="submit" name="sendImage" id="sendImage" class="btn btn-outline-light btn-lg px-5 mb-5 mt-4 mx-3">Change Avatar</button>
                                            </form>
                                        </div>
                                        <h5 class="user-name mt-3"><?= $currentUser["username"] ?></h5>
                                        <h6 class="user-email"><?= $currentUser["email"] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card h-100 bg-dark text-white">
                            <div class="card-body">
                                <form method="POST" action="useraccount">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mb-2 bg-dark text-white text-bold">User Details</h6>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-outline form-white mb-4">
                                                <label for="username">Username</label>
                                                <input type="hidden" id="username" name="username" value="<?= $currentUser["username"] ?>">
                                                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="<?= $currentUser["username"] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-outline form-white mb-4">
                                                <label for="email">Email</label>
                                                <input type="hidden" id="email" name="email" value="<?= $currentUser["email"] ?>">
                                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="<?= $currentUser["email"] ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-outline form-white mb-4">
                                                <label for="password">Password</label>
                                                <input type="hidden" id="password" name="password" value="<?= $currentUser["password"] ?>">
                                                <input type="password" class="form-control form-control-lg" id="password" name="password"/>
                                            </div>
                                        </div>
                                    </div>
                                                            
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <a class="btn btn-outline-light btn-lg px-5 mb-5 mt-4 mx-3" href="/">Back</a>
                                                <button type="submit" id="submit" name="send" class="btn btn-outline-light btn-lg px-5 mb-5 mt-4 mx-3" >Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?= showMessage($message) ?>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>    
        </div>
    </main> 
<?php require('views/partials/footer.php') ?>