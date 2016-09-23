<?php

namespace Tests\Functional;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

/**
 * This is an example class that shows how you could set up a method that
 * runs the application. Note that it doesn't cover all use-cases and is
 * tuned to the specifics of this skeleton app, so if your needs are
 * different, you'll need to change it.
 */
class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Use middleware when running application?
     *
     * @var bool
     */
    protected $withMiddleware = true;

    /**
     * Process the application given a request method and URI
     *
     * @param string $requestMethod the request method (e.g. GET, POST, etc.)
     * @param string $requestUri the request URI
     * @param array|object|null $requestData the request data
     * @return \Slim\Http\Response
     */
    public function runApp($requestMethod, $requestUri, $requestData = null)
    {
        // Create a mock environment for testing with
        $environment = Environment::mock(
            [
                'REQUEST_METHOD' => $requestMethod,
                'REQUEST_URI' => $requestUri
            ]
        );

        // Set up a request object based on the environment
        $request = Request::createFromEnvironment($environment);

        // Add request data, if it exists
        if (isset($requestData)) {
            $request = $request->withParsedBody($requestData);
        }

        // Set up a response object
        $response = new Response();

        // Use the application settings
        $settings = require __DIR__ . '/../../src/settings.php';

        // Instantiate the application
        $app = new App($settings);

        // Set up dependencies
        require __DIR__ . '/../../src/dependencies.php';

        // Register middleware
        if ($this->withMiddleware) {
            require __DIR__ . '/../../src/middleware.php';
        }


        // Register routes
        require __DIR__ . '/../../src/routes/getAccessToken.php';
        require __DIR__ . '/../../src/routes/refreshAccessToken.php';
        require __DIR__ . '/../../src/routes/getTrackAudioFeatures.php';
        require __DIR__ . '/../../src/routes/getFeaturedPlaylists.php';
        require __DIR__ . '/../../src/routes/getNewReleases.php';
        require __DIR__ . '/../../src/routes/getCategories.php';
        require __DIR__ . '/../../src/routes/getCategory.php';
        require __DIR__ . '/../../src/routes/getCategoryPlaylists.php';
        require __DIR__ . '/../../src/routes/getCurrentUserProfile.php';
        require __DIR__ . '/../../src/routes/getFollowedArtists.php';
        require __DIR__ . '/../../src/routes/followUser.php';
        require __DIR__ . '/../../src/routes/followArtist.php';
        require __DIR__ . '/../../src/routes/unfollowUser.php';
        require __DIR__ . '/../../src/routes/unfollowArtist.php';
        require __DIR__ . '/../../src/routes/checkFollowUser.php';
        require __DIR__ . '/../../src/routes/checkFollowArtist.php';
        require __DIR__ . '/../../src/routes/followPlaylist.php';
        require __DIR__ . '/../../src/routes/unfollowPlaylist.php';
        require __DIR__ . '/../../src/routes/saveTrack.php';
        require __DIR__ . '/../../src/routes/getUserSavedTracks.php';
        require __DIR__ . '/../../src/routes/removeSavedTrack.php';
        require __DIR__ . '/../../src/routes/checkSavedTrack.php';
        require __DIR__ . '/../../src/routes/saveAlbumForUser.php';
        require __DIR__ . '/../../src/routes/getUserSavedAlbums.php';
        require __DIR__ . '/../../src/routes/removeSavedAlbum.php';
        require __DIR__ . '/../../src/routes/checkSavedAlbum.php';
        require __DIR__ . '/../../src/routes/getUserTopArtists.php';
        require __DIR__ . '/../../src/routes/getUserTopTracks.php';
        require __DIR__ . '/../../src/routes/getRecommendations.php';

        // Process the application
        $response = $app->process($request, $response);

        // Return the response
        return $response;
    }
}
