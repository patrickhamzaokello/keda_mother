<?php
include("includes/includedFiles.php");
?>
<!-- headerends -->
<script>
    $(".lds-facebook").hide();
    $("#mainContent").show();
</script>


<?php if ($userRegstatus === "registered") : ?>

    <?php include("includes/queries/recommendedquery.php"); ?>

    <div class="pagesection">

        <div class="overview__albums__head">

            <span class="section-title">Recommendations</span>

        </div>
        <?php if ($recentSongIds) : ?>

            <div class="entityInfo">
                <div class="leftSection">
                    <img src="assets/images/createdplaylist/recommended.png">
                </div>

                <div class="rightSection">
                    <h2>Recommendations</h2>

                    <p>Songs Recommended For You</p>

                    <button class="button-dark" onclick="playFirstSong()">
                        <i class="ion-ios-play"></i>
                        Play All
                    </button>

                </div>
            </div>


            <div class="album">

                <div class='album__tracks'>

                    <div class='tracks'>

                        <div class='tracks__heading'>

                            <div class='tracks__heading__number'>#</div>

                            <div class='tracks__heading__title'>Song</div>

                            <div class='tracks__heading__length'>

                                <i class='ion-ios-stopwatch-outline'></i>

                            </div>

                            <div class='tracks__heading__popularity'>

                                <i class='ion-thumbsup'></i>

                            </div>

                        </div>


                        <?php



                        $i = 1;

                        foreach ($recentSongIds as $songId) {

                            $albumSong = new Song($con, $songId);
                            $albumArtist = $albumSong->getArtist();

                            echo "
            <div class='track'>

              <div class='track__number'>$i</div>

              <div class='track__added'>

                <i class='ion-play playsong ' onclick='setTrack(\"" . $albumSong->getId() . "\",tempPlaylist, true)'></i>

              </div>

              <div class='track__added'>

                <input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
                <input type='hidden' class='artistId' value='" . $albumArtist->getId() . "'>


                <i class='ion-heart' onclick='addSongLiked(this)'></i>

              </div>

              <div class='track__title featured' >
                <span class='title' value=\"" . $albumSong->getId() . "\" onclick='setTrack(\"" . $albumSong->getId() . "\",tempPlaylist, true)'>" . $albumSong->getTitle() . "</span>
                <span class='feature' value=\"" . $albumArtist->getId() . "\">" . $albumArtist->getName() . "</span>
              </div>

              <div class='track__more'>

                 <input type='hidden' class='songId' value='" . $albumSong->getId() . "'>

                <i class='ion-more' onclick='showOptionsMenu(this)'></i>

              </div>
            
              <div class='track__length'>" . $albumSong->getDuration() . "</div>
              
              <div class='track__popularity'>
              
                <i class='ion-arrow-graph-up-right'></i>
                
              </div>

            </div> ";

                            $i = $i + 1;
                        }

                        ?>

                        <script>
                            var tempSongIds = '<?php echo json_encode($recentSongIds); ?>';
                            tempPlaylist = JSON.parse(tempSongIds);

                            $(".track__title .feature").attr("onclick",
                                "openPage('artist?id=<?php echo $albumArtist->getId() ?>')");


                            var elmnt = document.getElementById("mainContent");

                            elmnt.scrollTop = 0;



                            $("input[value=" + currentPlaylist[currentIndex] + "]")
                                .parent()
                                .parent()
                                .addClass("pkkkk");
                            $(".pkkkk").css("border-left", "none");
                            $(".pkkkk").css("background", "none");

                            if (
                                $("input[value=" + currentPlaylist[currentIndex] + "]")
                                .parent()
                                .parent()
                                .hasClass("pkkkk")
                            ) {
                                $(".track").removeClass("pkkkk");
                                $("input[value=" + currentPlaylist[currentIndex] + "]")
                                    .parent()
                                    .parent()
                                    .addClass("pkkkk");
                                $(".pkkkk").css("border-left", "2px solid yellow");
                                $(".pkkkk").css("background", "#2c093a");
                            } else {
                                $(".pkkkk").css("border-left", "none");
                                $(".pkkkk").css("background", "none");

                                $(".track").removeClass("pkkkk");
                            }
                        </script>


                    </div>

                </div>

            </div>


        <?php else :  ?>
            <div>
                <p> Listen to Music, and They will show up here. Checkout the Top Trending songs on Mwonyaa Here.
                <p>

                <div class="suggestions" onclick="openPage('weeklytopsongs')">Trending This Week</div>

            </div>
        <?php endif ?>

    </div>

    <!-- options menu -->

    <nav class="optionsMenu">
        <input type="hidden" class="songId">
        <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
    </nav>


<?php else :  ?>

    <script>
        showPreviewDialog();
    </script>

    <div class="dismissable">

        <div class="dismissablecontent">

            <div class="previewimagecontainer">
                <img src="assets/images/livethumbnails/premium.svg" alt="images">
            </div>

            <div class="dismissablecontentdesc">

                <div class="dismissablecontenttext">
                    <h4>Mwonyaa Stream <span style="font-size: 14px;color: #8e65a2;font-weight: 500;">FEATURED</span></h4>
                    <h2>Tracks Recommended</h2>

                    <p>Take the Mwonyaa Recommedation Engine for a Spin and Experience true power of music and great harmony mixed to match your moods and listening history.</p>
                </div>

                <div class="dismissablecontentbutton">
                    <button class="liveshowbtn" onclick="createAccount();">Create Account</button>
                </div>

            </div>

        </div>

    </div>


<?php endif ?>



<script>
    var elmnt = document.getElementById("mainContent");
    elmnt.scrollTop = 0
</script>