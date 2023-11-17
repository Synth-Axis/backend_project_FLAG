<?php require('views/partials/head.php') ?>

<body class="text-light bg-dark">
    <main>
        <div class="container text-center">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="bg-dark text-white">
                                <table class="table table-striped table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Released On</th>
                                        <th scope="col">Game Cover</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($games as $game): ?>
                                            <tr id="<?= $game["game_id"] ?>">
                                                <td><?= $game["game_name"] ?></td>
                                                <td><?= $game["released_on"] ?></td>
                                                <td><?= $game["game_photo"] ?></td>
                                                <td>
                                                    <form>    
                                                        <button data-game_id="<?= $game["game_id"] ?>" type="button" id="deleteGame" name="deleteGame" aria-label="deleteGame">X</button>
                                                        <input type="hidden" value="<?= $game['game_id']?>" name="game_id"/>
                                                    </form>
                                                </td>
                                                    
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                                <p class="h5">Insert a Game</p>
                                <form method="POST" action="admin_db_games">
                                    <div class="form-outline form-white mb-4">
                                        <input class="form-control form-control-lg" type="text" id="game_name" name="game_name" placeholder="Type a game name">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input class="form-control form-control-lg" type="text" id="released_on" name="released_on" placeholder="Type a release data (yyyy-mm-dd)">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input class="form-control form-control-lg" type="text" id="game_photo" name="game_photo" placeholder="Type the link to the photo">
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