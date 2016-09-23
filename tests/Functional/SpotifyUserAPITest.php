<?php

namespace Tests\Functional;

class SpotifyUserAPITest extends BaseTestCase
{
    protected $client_id = '531231dcdd104695aca93a6fbbe001cb';
    protected $client_key = 'c5511073475f49cdb2b7e5d25977ffde';
    
    public function testGetAccessToken() {
        
        $post_data['args']['client_id'] = $this->client_id;
        $post_data['args']['client_key'] = $this->client_key;
        $post_data['args']['code'] = '1234567890';
        $post_data['args']['redirect_uri'] = 'http://spotify.local';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getAccessToken', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('Invalid authorization code', json_decode($response->getBody())->contextWrites->to->error_description);
        
    }
    
    public function testRefreshAccessToken() {
        
        $post_data['args']['client_id'] = $this->client_id;
        $post_data['args']['client_key'] = $this->client_key;
        $post_data['args']['refresh_token'] = '1234567890';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/refreshAccessToken', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('Invalid refresh token', json_decode($response->getBody())->contextWrites->to->error_description);
        
    }
    
    public function testGetTrackAudioFeatures() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '1234567890';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getTrackAudioFeatures', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetFeaturedPlaylists() {
        
        $post_data['args']['access_token'] = $this->client_id;
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getFeaturedPlaylists', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetNewReleases() {
        
        $post_data['args']['access_token'] = $this->client_id;
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getNewReleases', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetCategories() {
        
        $post_data['args']['access_token'] = $this->client_id;
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getCategories', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetCategory() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '1234567890';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getCategory', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetCategoryPlaylists() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '1234567890';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getCategoryPlaylists', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetCurrentUserProfile() {
        
        $post_data['args']['access_token'] = $this->client_id;
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getCurrentUserProfile', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetFollowedArtists() {
        
        $post_data['args']['access_token'] = $this->client_id;
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getFollowedArtists', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testFollowUser() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/followUser', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testFollowArtist() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/followArtist', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testUnfollowUser() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/unfollowUser', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testUnfollowArtist() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/unfollowArtist', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testCheckFollowUser() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/checkFollowUser', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testCheckFollowArtist() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/checkFollowArtist', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testFollowPlaylist() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['owner_id'] = '12121212';
        $post_data['args']['playlist_id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/followPlaylist', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(404, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid playlist Id', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testUnfollowPlaylist() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['owner_id'] = '12121212';
        $post_data['args']['playlist_id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/unfollowPlaylist', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(404, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid playlist Id', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testSaveTrack() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/saveTrack', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetUserSavedTracks() {
        
        $post_data['args']['access_token'] = $this->client_id;
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getUserSavedTracks', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to);
        
    }
    
    public function testRemoveSavedTracks() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/removeSavedTrack', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testCheckSavedTrack() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/checkSavedTrack', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testSaveAlbumForUser() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/saveAlbumForUser', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetUserSavedAlbums() {
        
        $post_data['args']['access_token'] = $this->client_id;
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getUserSavedAlbums', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testRemoveSavedAlbum() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/removeSavedAlbum', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testCheckSavedAlbum() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['id'] = '12121212';
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/checkSavedAlbum', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetUserTopArtists() {
        
        $post_data['args']['access_token'] = $this->client_id;
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getUserTopArtists', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetUserTopTracks() {
        
        $post_data['args']['access_token'] = $this->client_id;
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getUserTopTracks', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }
    
    public function testGetRecommendations() {
        
        $post_data['args']['access_token'] = $this->client_id;
        $post_data['args']['seed_artists'] = "#sfsdf%877";
        $post_data['args']['seed_genres'] = "#sfsdf%877";
        $post_data['args']['seed_tracks'] = "#sfsdf%877";
        
        $response = $this->runApp('POST', '/api/SpotifyUserAPI/getRecommendations', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals(401, json_decode($response->getBody())->contextWrites->to->error->status);
        $this->assertEquals('Invalid access token', json_decode($response->getBody())->contextWrites->to->error->message);
        
    }

}