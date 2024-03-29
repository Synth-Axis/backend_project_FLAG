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
                                        <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                        <p class="text-white-50 mb-5">Create an Account!</p>
                                        <?= showMessage($message) ?>
                                        <form method="POST" action="register">
                                            <div class="form-outline form-white mb-4">
                                                <input class="form-control form-control-lg" type="text" id="username" name="username" value="<?= $username ?>" minlength="3" maxlength="20"/>
                                                <label class="form-label" for="username">Please enter your Username</label>
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                                <input class="form-control form-control-lg" type="email" id="email" name="email" value="<?= $email ?>" />
                                                <label class="form-label" for="email">Please enter your Email</label>
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                                <input class="form-control form-control-lg" type="password" id="password" name="password" minlength="8" maxlength="255"/>
                                                <label class="form-label" for="password">Please enter your Password</label>
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                                <input class="form-control form-control-lg" type="password" id="passwordCheck" name="passwordCheck" minlength="8" maxlength="255"/>
                                                <label class="form-label" for="passwordCheck">Please repeat your Password</label>
                                            </div>
                                            <div>
                                                <label>
                                                    <input type="checkbox" id="terms" name="terms" />
                                                    Do you agree to all the terms and conditions?
                                                </label>
                                            </div>
                                            <div class="form-outline form-white mt-4">
                                                <img src="<?= $captcha ?>" alt="CAPTCHA Image">
                                                <input class="form-control form-control-lg mt-3" type="text" id="captchaText" name="captchaText" minlength="6" maxlength="6"/>
                                                <label class="form-label" for="captchaText">Enter the Captcha code displayed above</label>
                                            </div>
                                            <input type="hidden" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
                                            <button class="btn btn-outline-light btn-lg px-5 mb-5 mt-4" type="submit" name="send">Register</button>
                                        </form>
                                    <div>
                                    <p class="mb-0">Already have an account? <a href="login" class="text-white-50 fw-bold">Login</a>
                                    </p>
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