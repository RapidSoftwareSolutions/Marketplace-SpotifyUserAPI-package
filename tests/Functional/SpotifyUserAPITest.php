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

}