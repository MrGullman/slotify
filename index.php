<?php
    include "includes/config.php";

    if(isset($_SESSION['userLoggedIn'])){
        $userLoggedIn = $_SESSION['userLoggedIn'];
    }else{
        header("Location: register.php");
    }

 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>

        <div id="nowPlayingBarContainer">
            <div id="nowPlayingBar">

    			<div id="nowPlayingLeft">
                    <div class="content">
                        <span class="albumLink">
                            <img class="albumArtwork" src="https://i.ytimg.com/vi/rb8Y38eilRM/maxresdefault.jpg" alt="">
                        </span>

                        <div class="trackInfo">
                            <span class="trackName">
                                <span>Paradise City</span>
                            </span>
                            <span class="artistName">
                                <span>Guns N Roses</span>
                            </span>

                        </div>

                    </div>

                </div> <!-- / NowPlaying Left end -->

                <div id="nowPlayingCenter">

    				<div class="content playerControls">

    					<div class="buttons">

    						<button class="controlButton shuffle" title="Shuffle button">
    							<img src="assets/images/icons/shuffle.png" alt="Shuffle">
    						</button>

    						<button class="controlButton previous" title="Previous button">
    							<img src="assets/images/icons/previous.png" alt="Previous">
    						</button>

    						<button class="controlButton play" title="Play button">
    							<img src="assets/images/icons/play.png" alt="Play">
    						</button>

    						<button class="controlButton pause" title="Pause button" style="display: none;">
    							<img src="assets/images/icons/pause.png" alt="Pause">
    						</button>

    						<button class="controlButton next" title="Next button">
    							<img src="assets/images/icons/next.png" alt="Next">
    						</button>

    						<button class="controlButton repeat" title="Repeat button">
    							<img src="assets/images/icons/repeat.png" alt="Repeat">
    						</button>
                        </div> <!-- / Buttons end -->

                        <div class="playbackBar">

    						<span class="progressTime current">0.00</span>

    						<div class="progressBar">
    							<div class="progressBarBg">
    								<div class="progress"></div>
    							</div>
    						</div>

    						<span class="progressTime remaining">0.00</span>


    					</div>

                    </div> <!-- / Content Player Controls end -->
                </div> <!-- / NowPlaying Center end -->

                <div id="nowPlayingRight">
                    <div class="volumeBar">
                        <button class="controlButton volume" title="Volume button">
                            <img src="assets/images/icons/volume.png" alt="Volume">
                        </button>

                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- / NowPlayingBar end -->
        </div> <!-- / NowPlayingBarContainer end -->

    </body>
</html>
