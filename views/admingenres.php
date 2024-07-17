<?php require("views/partials/adminheader.php") ?>

                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="bg-dark text-white">
                                <table class="table table-striped table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">Genre Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($genres as $genre): ?>
                                            <tr id="<?= $genre["genre_id"] ?>">
                                                <td><?= $genre["genre_name"] ?></td>
                                                <td>
                                                    <form>    
                                                        <button class="btn btn-outline-light btn-sm" type="button" id="deleteGenre" name="deleteGenre" aria-label="deleteGenre">X</button>
                                                        <input type="hidden" value="<?= $genre["genre_id"]?>" name="genre_id"/>
                                                    </form>
                                                </td>
                                                    
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                                <p class="h5 mt-5">Insert a Genre</p>
                                <form method="POST" action="admingenres">
                                    <div class="form-outline form-white mb-4">
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