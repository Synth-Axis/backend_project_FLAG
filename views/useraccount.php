<?php require('views/partials/head.php') ?>

<body class="text-light bg-dark">
    <main>
        <div class="container text-center">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 row gutters">
                    <div class="row d-flex justify-content-center align-items-center col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100 bg-dark text-white">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img style="border-radius: 25rem;" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="User Photo" width="100%">
                                        </div>
                                        <h5 class="user-name mt-3"><?= $currentUser["username"] ?></h5>
                                        <h6 class="user-email"><?= $currentUser["email"] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
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
                                                <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="<?= $currentUser["username"] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-outline form-white mb-4">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="<?= $currentUser["email"] ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-outline form-white mb-4">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control form-control-lg" id="password" name="password"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters">
                                        <p class="text-center">HERE WILL GO THE USERS GAMES AND WISHLIST</p>
                                    </div>
                                                            
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <a href="/">
                                                    <button type="button" class="btn btn-outline-light btn-lg px-5 mb-5 mt-4 mx-3" >Cancel</button>
                                                </a>
                                                <button type="submit" id="submit" name="submit" class="btn btn-outline-light btn-lg px-5 mb-5 mt-4" mx-3>Update</button>
                                                <?= $message ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>    
        </div>
    </main> 
<?php require('views/partials/footer.php') ?>