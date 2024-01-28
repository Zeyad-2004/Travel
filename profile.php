<?php include("components/header.php")?>
<?php include("components/navbar.php")?>


    <div class="profile">
        <!-- Check if User have profile Picture ot not -->
        <?php if(file_exists("media/uploaded_media/profile_photos/".$_SESSION['user_id'].".jpg")): ?>
            <!-- If true, print his photo -->
            <div class="profile-photo" style="background-image: url(media/uploaded_media/profile_photos/<?php echo $_SESSION['user_id']?>.jpg);">
        
        <?php else: ?>
            <!-- If false, print default photo --> 
            <div class="profile-photo" style="background-image: url(media/default/profile.jpg);">
        
        <?php endif; ?>
            <div class="change-profile-photo" >

                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                    <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0"/>
                </svg>
            </div>
        </div>
        <div class="profile-details">
            <h2><?php echo $_SESSION['user_name']?></h2>
            <h6>Any thing</h6>
        </div>
    </div>

    <div class="line" style="margin: 60px 100px 60px 100px;"></div>

    <div class="travel-history">
        <h1>Travels History</h1>

        <div class="travel-table">

            <!-- TODO Handel Travels History -->
            <?php if(false):?>
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

            <?php else :?>
                <h1> No Previous Travels</h1>
            <?php endif;?>
        </div>
    </div>


<?php include("components/footer.php")?>