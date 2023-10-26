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
                                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                        <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                        <form method="POST" action="login.php">
                                            <div class="form-outline form-white mb-4">
                                                <input class="form-control form-control-lg" type="email" id="email" name="email" required />
                                                <label class="form-label" for="email">Email</label>
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                                <input class="form-control form-control-lg" type="password" id="password" name="password" required minlength="8" maxlength="255"/>
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                            <p class="small mb-3 pb-lg-2"><a class="text-white-50" href="recoverpassword">Forgot password?</a></p>
                                            <button class="btn btn-outline-light btn-lg px-5" type="submit" name="send">Login</button>
                                        </form>
                                    </div>
                                    <p class="mb-0">Don't have an account? <a href="register" class="text-white-50 fw-bold">Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main> 

    <?php require('views/partials/footer.php') ?>