<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Website</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script>

    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>

    <?php include("components/navbar.php") ?>


    <div class="profile">
<!-- Check if User have profile Picture ot not -->
<?php if (file_exists("media/uploaded_media/profile_photos/" . $_SESSION['user_id'] . ".jpg")) : ?>
            <!-- If true, print his photo -->
            <div class="profile-photo" style="background-image: url(media/uploaded_media/profile_photos/<?php echo $_SESSION['user_id'] ?>.jpg);">

<?php else : ?>
                <!-- If false, print default photo -->
                <div class="profile-photo" style="background-image: url(media/default/profile.jpg);">

<?php endif; ?>
                <form method="post">
                    <label for="upload_image">
                        <input type="file" name="image" class="image" id="upload_image" style="display:none" />

                        <div class="change-profile-photo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" />
                            </svg>
                        </div>
                    </label>
                </form>
                </div>
                <div class="profile-details">
                    <h2><?php echo $_SESSION['user_name'] ?></h2>
                    <h6>Any thing</h6>
                </div>
            </div>

            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">


                    <div class="modal-content border">
                        <div class="modal-header">
                            <h5 class="modal-title">Crop Image Before Upload</h5>
                            <button type="button" class="btn-close" onclick="closeModal()"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="" id="sample_image" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="crop" class="btn btn-primary">Crop</button>
                            <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="line" style="margin: 60px 100px 60px 100px;"></div>

            <div class="travel-history">
                <h1>Travels History</h1>

                <div class="travel-table">

<!-- TODO Handel Travels History -->
<?php if (false) : ?>
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <!-- TODO print travel history -->
                                <!-- <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr> -->
                            </thead>
                            <tbody>
                                <?php ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>

                                </tr>
                            </tbody>
                        </table>

<?php else : ?>
                        <h1> No Previous Travels</h1>

<?php endif; ?>
                </div>
            </div>

            <script src="js/profile.js"></script>

            <?php include("components/footer.php") ?>