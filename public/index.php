<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Register models
require __DIR__ . '/../src/Models/paginationClass.php';
require __DIR__ . '/../src/Models/normalizeJson.php';

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';


// Register routes
require __DIR__ . '/../src/routes/getAccessToken.php';
require __DIR__ . '/../src/routes/refreshAccessToken.php';
require __DIR__ . '/../src/routes/getTrackAudioFeatures.php';
require __DIR__ . '/../src/routes/getFeaturedPlaylists.php';
require __DIR__ . '/../src/routes/getNewReleases.php';
require __DIR__ . '/../src/routes/getCategories.php';
require __DIR__ . '/../src/routes/getCategory.php';
require __DIR__ . '/../src/routes/getCategoryPlaylists.php';
require __DIR__ . '/../src/routes/getCurrentUserProfile.php';
require __DIR__ . '/../src/routes/getFollowedArtists.php';
require __DIR__ . '/../src/routes/followUser.php';
require __DIR__ . '/../src/routes/followArtist.php';
require __DIR__ . '/../src/routes/unfollowUser.php';
require __DIR__ . '/../src/routes/unfollowArtist.php';
require __DIR__ . '/../src/routes/checkFollowUser.php';
require __DIR__ . '/../src/routes/checkFollowArtist.php';
require __DIR__ . '/../src/routes/followPlaylist.php';
require __DIR__ . '/../src/routes/unfollowPlaylist.php';
require __DIR__ . '/../src/routes/saveTrack.php';
require __DIR__ . '/../src/routes/getUserSavedTracks.php';
require __DIR__ . '/../src/routes/removeSavedTrack.php';
require __DIR__ . '/../src/routes/checkSavedTrack.php';
require __DIR__ . '/../src/routes/saveAlbumForUser.php';
require __DIR__ . '/../src/routes/getUserSavedAlbums.php';
require __DIR__ . '/../src/routes/removeSavedAlbum.php';
require __DIR__ . '/../src/routes/checkSavedAlbum.php';
require __DIR__ . '/../src/routes/getUserTopArtists.php';
require __DIR__ . '/../src/routes/getUserTopTracks.php';
require __DIR__ . '/../src/routes/getRecommendations.php';
require __DIR__ . '/../src/routes/metadata.php';

// Run app
$app->run();
