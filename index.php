<?php

include("includes/includedFiles.php");
include("includes/queries/browsequery.php");


?>

<script>
    albumnavitem();
    $(".lds-facebook").hide();
    $("#mainContent").show();
</script>

<!-- <button onclick="notifyMe()">Notify me!</button> -->
<div class="pagesection">


    <div class="promotionspace" style="display: none">
        <div class="promotionbanner" onclick="openPage('album?id=m_al61c1e19ec14ce961')">
            <img src="ads/zappernew.png" alt="">
        </div>
    </div>

    <div class="sectioncontainer">
        <div class="hs__wrapper">
            <div class="hs__header">
                <div class="sectionheadingroup">
                    <h5><span class="hs__item__subtitle">Featured</span></h5>

                    <h2 class="hs__headline">Trending Artists
                    </h2>
                </div>

                <div class="hs__arrows"><a class="arrow disabled arrow-prev"></a><a class="arrow arrow-next"></a></div>
            </div>

                <ul class="hs">
                    <?php if ($dataArrays['featuredartists']) : ?>

                    <?php
                    foreach ($dataArrays['featuredartists'] as $row) :

                    ?>

                        <?php
                        $artist = new Artist($con, $row['id']);
                        ?>


                        <li class="hs__item" role='link' tabindex='0' onclick="openPage('artist?id=<?= $row['id'] ?>')">
                            <div class="hs__item__image__wrapper artistprofile">
                                <img class="hs__item__image" src="<?= $artist->getProfilePath() ?>" alt="" />
                            </div>
                            <div class="hs__item__description artistprofiledesc"><span class="hs__item__title"><?= $artist->getName() ?></span><span class="hs__item__subtitle"><?= $artist->getGenrename() ?></span></div>
                        </li>


                    <?php endforeach ?>








            <?php else :  ?>
                Working on Getting Featured Music Artists Curated for You
            <?php endif ?>
                </ul>



        </div>

    </div>




    <div class="sectioncontainer">
        <div class="hs__wrapper">
            <div class="hs__header">
                <div class="sectionheadingroup">
                    <h5><span class="hs__item__subtitle">Curated</span></h5>
                    <h2 class="hs__headline">Featured Playlists</h2>
                </div>
                <div class="hs__arrows"><a class="arrow disabled arrow-prev"></a><a class="arrow arrow-next"></a></div>
            </div>

                <ul class="hs">
                    <?php if ($dataArrays['publicplaylistsarray']) : ?>

                    <?php
                    foreach ($dataArrays['publicplaylistsarray'] as $row) :

                    ?>

                        <?php $playlist = new Playlist($con, $row) ?>

                        <li class="hs__item" role='link' tabindex='0' onclick='openPage("playlist?id=<?= $playlist->getId() ?>")'>
                            <div class="hs__item__image__wrapper">
                                <img class="hs__item__image" src="<?= $playlist->getCoverimage() ?>" alt="" />
                            </div>
                            <div class="hs__item__description"><span class="hs__item__title"><?= $playlist->getName() ?></span><span class="hs__item__subtitle">Mwonyaa Stream</span></div>
                        </li>


                    <?php endforeach ?>








            <?php else :  ?>
                Working on Playlist Curated for You
            <?php endif ?>
                </ul>


        </div>

    </div>



    <div class="sectioncontainer">
        <div class="hs__wrapper">
            <div class="hs__header">
                <div class="sectionheadingroup">
                    <h5><span class="hs__item__subtitle">Featured</span></h5>
                    <h2 class="hs__headline">Hotest Albums</h2>
                </div>
                <div class="hs__arrows"><a class="arrow disabled arrow-prev"></a><a class="arrow arrow-next"></a></div>
            </div>

                <ul class="hs">
                    <?php if ($dataArrays['albumsarray']) : ?>

                    <?php
                    foreach ($dataArrays['albumsarray'] as $row) :

                    ?>

                        <?php
                        $album = new Album($con, $row['id']);
                        $artist = $album->getArtist();
                        ?>


                        <li class="hs__item" role='link' tabindex='0' onclick="openPage('album?id=<?= $row['id'] ?>')">
                            <div class="hs__item__image__wrapper">
                                <img class="hs__item__image" src="<?= $row['artworkPath'] ?>" alt="" />
                            </div>
                            <div class="hs__item__description"><span class="hs__item__title"><?= $row['title'] ?></span><span class="hs__item__subtitle"><?= $artist->getName() ?></span></div>
                        </li>


                    <?php endforeach ?>








            <?php else :  ?>
                Working on Getting Music Albums Curated for You
            <?php endif ?>
                </ul>


        </div>

    </div>



    <div class="sectioncontainer">

        <div class="hs__wrapper">
            <div class="hs__header">
                <div class="sectionheadingroup">
                    <h5><span class="hs__item__subtitle">Featured</span></h5>
                    <h2 class="hs__headline">Mwonyaa Podcasts</h2>
                </div>
                <div class="hs__arrows"><a class="arrow disabled arrow-prev"></a><a class="arrow arrow-next"></a></div>
            </div>
            <ul class="hs">

            <?php if ($dataArrays['podcastsarray']) : ?>


                    <?php
                    foreach ($dataArrays['podcastsarray'] as $row) :

                    ?>

                        <?php
                        $album = new Album($con, $row['id']);
                        $artist = $album->getArtist();
                        ?>


                        <li class="hs__item" role='link' tabindex='0' onclick="openPage('mediacollection?id=<?= $row['id'] ?>')">
                            <div class="hs__item__image__wrapper">
                                <img class="hs__item__image" src="<?= $row['artworkPath'] ?>" alt="" />
                            </div>
                            <div class="hs__item__description"><span class="hs__item__title"><?= $row['title'] ?></span><span class="hs__item__subtitle"><?= $artist->getName() ?></span></div>
                        </li>


                    <?php endforeach ?>








            <?php else :  ?>
                Working on Getting Podcasts Curated for You
            <?php endif ?>
            </ul>

        </div>
    </div>

    <div class="sectioncontainer">
        <div class="hs__wrapper">
            <div class="hs__header">
                <div class="sectionheadingroup">
                    <h5><span class="hs__item__subtitle">Recently Updated</span></h5>
                    <h2 class="hs__headline">DJ Mixes</h2>
                </div>
                <div class="hs__arrows"><a class="arrow disabled arrow-prev"></a><a class="arrow arrow-next"></a></div>
            </div>

            <ul class="hs">

            <?php if ($dataArrays['djmixesarray']) : ?>


                    <?php
                    foreach ($dataArrays['djmixesarray'] as $row) :

                    ?>

                        <?php
                        $album = new Album($con, $row['id']);
                        $artist = $album->getArtist();
                        ?>


                        <li class="hs__item" role='link' tabindex='0' onclick="openPage('mediacollection?id=<?= $row['id'] ?>')">
                            <div class="hs__item__image__wrapper">
                                <img class="hs__item__image" src="<?= $row['artworkPath'] ?>" alt="" />
                            </div>
                            <div class="hs__item__description"><span class="hs__item__title"><?= $row['title'] ?></span><span class="hs__item__subtitle"><?= $artist->getName() ?></span></div>
                        </li>


                    <?php endforeach ?>







            <?php else :  ?>
                Working on Getting Dj Mixes Curated for You
            <?php endif ?>
            </ul>

        </div>
    </div>
    <div class="sectioncontainer">
        <div class="hs__wrapper">
            <div class="hs__header">
                <div class="sectionheadingroup">
                    <h5><span class="hs__item__subtitle">Recently Updated</span></h5>
                    <h2 class="hs__headline">Mwonyaa Poems</h2>
                </div>
                <div class="hs__arrows"><a class="arrow disabled arrow-prev"></a><a class="arrow arrow-next"></a></div>
            </div>

            <ul class="hs">

            <?php if ($dataArrays['poemsarray']) : ?>


                    <?php
                    foreach ($dataArrays['poemsarray'] as $row) :

                    ?>

                        <?php
                        $album = new Album($con, $row['id']);
                        $artist = $album->getArtist();
                        ?>


                        <li class="hs__item" role='link' tabindex='0' onclick="openPage('mediacollection?id=<?= $row['id'] ?>')">
                            <div class="hs__item__image__wrapper">
                                <img class="hs__item__image" src="<?= $row['artworkPath'] ?>" alt="" />
                            </div>
                            <div class="hs__item__description"><span class="hs__item__title"><?= $row['title'] ?></span><span class="hs__item__subtitle"><?= $artist->getName() ?></span></div>
                        </li>


                    <?php endforeach ?>







            <?php else :  ?>
                Working on Getting Poems Curated for You
            <?php endif ?>

            </ul>

        </div>
    </div>

    <script>
        $(function() {
            const mainContent = document.getElementById("mainContent");
            mainContent.scrollTop = 0;
            const instances = $(".hs__wrapper");

            instances.each((_, instance) => {
                const arrows = $(instance).find(".arrow");
                const prevArrow = arrows.filter(".arrow-prev");
                const nextArrow = arrows.filter(".arrow-next");
                const box = $(instance).find(".hs");
                let x = 0;
                let mx = 0;
                const maxScrollWidth = box[0].scrollWidth - (box[0].clientWidth / 2) - (box.width() / 2);

                arrows.on("click", function() {
                    if ($(this).hasClass("arrow-next")) {
                        x = box.width() / 2 + box.scrollLeft() - 10;
                        box.animate({
                            scrollLeft: x,
                        });
                    } else {
                        x = box.width() / 2 - box.scrollLeft() - 10;
                        box.animate({
                            scrollLeft: -x,
                        });
                    }
                });

                box.on({
                    mousemove(e) {
                        const mx2 = e.pageX - this.offsetLeft;
                        if (mx) this.scrollLeft = this.sx + mx - mx2;
                    },
                    mousedown(e) {
                        this.sx = this.scrollLeft;
                        mx = e.pageX - this.offsetLeft;
                    },
                    scroll() {
                        toggleArrows();
                    },
                });

                $(document).on("mouseup", () => {
                    mx = 0;
                });

                function toggleArrows() {
                    if (box.scrollLeft() > maxScrollWidth - 10) {
                        nextArrow.addClass("disabled");
                    } else if (box.scrollLeft() < 10) {
                        prevArrow.addClass("disabled");
                    } else {
                        nextArrow.removeClass("disabled");
                        prevArrow.removeClass("disabled");
                    }
                }
            });
        });
    </script>



</div>