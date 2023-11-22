<?php require("views/partials/adminheader.php") ?>

                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="bg-dark text-white">
                                <table class="table table-striped table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">Game Name</th>
                                        <th scope="col">Genre Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($games as $game): ?>
                                            <tr id="<?= $game["game_id"] ?>">
                                                <td><?= $game["game_name"] ?></td>
                                                <td><?= $game["genre_name"] ?></td>
                                                <td>
                                                    <form>    
                                                        <button class="btn btn-outline-light btn-sm" type="button" id="deleteGameGenre" name="deleteGameGenre" aria-label="deleteGameGenre">X</button>
                                                        <input type="hidden" value="<?= $game["genre_id"]?>" name="genre_id"/>
                                                        <input type="hidden" value="<?= $game["game_id"]?>" name="game_id"/>
                                                    </form>
                                                </td>
                                                    
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                                <p class="h5 mt-5">Insert a Game and a Genre</p>
                                <form method="POST" action="admingamesbygenre">
                                    <div class="form-outline form-white mb-4">
                                        <input class="form-control form-control-lg mb-4" type="text" id="game_name" name="game_name" placeholder="Type a game name">
                                        <input class="form-control form-control-lg" type="text" id="genre_name" name="genre_name" placeholder="Type a genre name">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <button class="btn btn-outline-light btn-lg px-5 mb-5 mt-4" type="submit" id="insertGenre" name="send">Insert Genre</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

<?php require('views/partials/footer.php') ?>