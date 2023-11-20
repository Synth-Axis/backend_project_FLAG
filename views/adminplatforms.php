<?php require("views/partials/adminheader.php") ?>

                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="bg-dark text-white">
                                <table class="table table-striped table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">Platform Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($platforms as $platform): ?>
                                            <tr id="<?= $platform["platform_id"] ?>">
                                                <td><?= $platform["platform_name"] ?></td>
                                                <td>
                                                    <form>    
                                                        <button class="btn btn-outline-light btn-sm" type="button" id="deletePlatform" name="deletePlatform" aria-label="deletePlatform">X</button>
                                                        <input type="hidden" value="<?= $platform["platform_id"]?>" name="platform_id"/>
                                                    </form>
                                                </td>
                                                    
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                                <p class="h5 mt-5">Insert a Platform</p>
                                <form method="POST" action="adminplatforms">
                                    <div class="form-outline form-white mb-4">
                                        <input class="form-control form-control-lg" type="text" id="platform_name" name="platform_name" placeholder="Type a platform name">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <button class="btn btn-outline-light btn-lg px-5 mb-5 mt-4" type="submit" id="insertPlatform" name="send">Insert Platform</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

<?php require('views/partials/footer.php') ?>