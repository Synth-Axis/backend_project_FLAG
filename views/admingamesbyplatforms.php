<?php require("views/partials/adminheader.php") ?>

                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="bg-dark text-white">
                                <table class="table table-striped table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">Game Name</th>
                                        <th scope="col">Platform Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($games as $game): ?>
                                            <tr id="<?= $game["game_id"] ?>">
                                                <td><?= $game["game_name"] ?></td>
                                                <td><?= $game["platform_name"] ?></td>
                                                <td>
                                                    <form>    
                                                        <button class="btn btn-outline-light btn-sm" type="button" id="deleteGamePlatform" name="deleteGamePlatform" aria-label="deleteGamePlatform">X</button>
                                                        <input type="hidden" value="<?= $game["platform_id"]?>" name="platform_id"/>
                                                        <input type="hidden" value="<?= $game["game_id"]?>" name="game_id"/>
                                                    </form>
                                                </td>
                                                    
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                                <p class="h5 mt-5">Insert a Game and a Platformgit</p>
                                <form method="POST" action="admingamesbyplatform">
                                    <div class="form-outline form-white mb-4">
                                        <input class="form-control form-control-lg" type="text" id="game_name" name="game_name" placeholder="Type a game name">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input class="form-control form-control-lg" type="text" id="platform_name" name="platform_name" placeholder="Type a platform name">
                                    </div>
                                   <div class="form-outline form-white mb-4">
                                        <button class="btn btn-outline-light btn-lg px-5 mb-5 mt-4" type="submit" id="insertGenre" name="send">Insert Game / Platform</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

<?php require('views/partials/footer.php') ?>