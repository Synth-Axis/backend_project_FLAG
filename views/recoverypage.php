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
                                        <h2 class="fw-bold mb-2 text-uppercase mb-5">Set New Password</h2>
                                        <form method="POST" action="recoverypage">
                                        <div class="form-outline form-white mb-4">
                                                <input class="form-control form-control-lg" type="password" id="password" name="password" minlength="8" maxlength="255"/>
                                                <label class="form-label" for="password">Please enter your Password</label>
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                                <input class="form-control form-control-lg" type="password" id="passwordCheck" name="passwordCheck" minlength="8" maxlength="255"/>
                                                <label class="form-label" for="passwordCheck">Please repeat your Password</label>
                                            </div>
                                            <button class="btn btn-outline-light btn-lg px-5" type="submit" name="recoverPass">Continue</button>
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