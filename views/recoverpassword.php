<?php require('views/partials/head.php') ?>

<body class="text-light bg-dark">
    <main>
        <div class="container text-center">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">
                                    <div class="mb-md-5 mt-md-4 pb-5">
                                        <h2 class="fw-bold mb-2 text-uppercase">Reset Password</h2>
                                        <p class="text-white-50 mb-5">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                                        <form method="POST" action="recoverpassword">
                                            <div class="form-outline form-white mb-4">
                                                <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
                                                <input class="form-control form-control-lg" type="email" id="user_email" name ="user_email" />
                                                <label class="form-label" for="user_email">Enter your email</label>
                                            </div>
                                            <button class="btn btn-outline-light btn-lg px-5" type="submit" name="recover">Reset Password</button>
                                            <div class="d-flex justify-content-between mt-4">
                                                <a class="text-white-50 fw-bold" href="login">Login</a>
                                                <a class="text-white-50 fw-bold" href="register">Register</a>
                                            </div>
                                            <?= showMessage($message) ?>
                                        </form>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main> 

<?php require('views/partials/footer.php') ?>