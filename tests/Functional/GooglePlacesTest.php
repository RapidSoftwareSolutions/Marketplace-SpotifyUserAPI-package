<?php

namespace Tests\Functional;

class GooglePlacesTest extends BaseTestCase
{
    protected $api_key = 'AIzaSyByjKV-D8YjrjAc_8aC_6h0R7AKvSyyJis';
    
    public function testGetNearbyPlaces() {
        
        $post_data['args']['api_key'] = $this->api_key;
        $post_data['args']['latitude'] = '-33.8670522';
        $post_data['args']['longitude'] = '151.19573622';
        $post_data['args']['radius'] = 10;
        
        $response = $this->runApp('POST', '/api/GooglePlaces/getNearbyPlaces', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testSearchPlacesByText() {
        
        $post_data['args']['api_key'] = $this->api_key;
        $post_data['args']['query'] = 'pizza';
        $post_data['args']['latitude'] = '-33.8670522';
        $post_data['args']['longitude'] = '151.19573622';
        $post_data['args']['radius'] = 100;
        
        $response = $this->runApp('POST', '/api/GooglePlaces/searchPlacesByText', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetNearbyPlacesRadar() {
        
        $post_data['args']['api_key'] = $this->api_key;
        $post_data['args']['latitude'] = '-33.8670522';
        $post_data['args']['longitude'] = '151.19573622';
        $post_data['args']['radius'] = 100;
        $post_data['args']['keyword'] = 'museum';
        
        $response = $this->runApp('POST', '/api/GooglePlaces/getNearbyPlacesRadar', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetPlaceDetails() {
        
        $post_data['args']['api_key'] = $this->api_key;
        $post_data['args']['place_id'] = 'ChIJAWLZAzSuEmsRkMcyFmh9AQU';
        
        $response = $this->runApp('POST', '/api/GooglePlaces/getPlaceDetails', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testGetImageURL() {
        
        $post_data['args']['api_key'] = $this->api_key;
        $post_data['args']['image_id'] = 'CoQBdwAAAMI0mesGjb8QOUwu6JppTH9-JNioNvK-ZDazyqyL4b6EOz1V5mQn08KMl0apo9BNEpFaKnVZ-_h21GMMxAi3x7y6V0o4s1oqNOhJegzhw40wsJ0M_TWtFGPiTxHN2_P6yhJVBTyTnd7XdmR3XQWV7JcT_YJ-cNCuMIGs98PKzTOvEhDspZ1-Lm-PWpqaU9qFrWKwGhT6EQXggGKGKt29gu1ArKY8zClxDA';
        $post_data['args']['max_width'] = 100;
        $post_data['args']['max_height'] = 100;
        
        $response = $this->runApp('POST', '/api/GooglePlaces/getImageURL', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }
    
    public function testAddPlace() {
        
        $post_data['args']['api_key'] = $this->api_key;
        $post_data['args']['accuracy'] = 50;
        $post_data['args']['language'] = 'en-Au';
        $post_data['args']['latitude'] = '-33.8670522';
        $post_data['args']['longitude'] = '151.19573622';
        $post_data['args']['name'] = 'Google Shoes!';
        $post_data['args']['types'] = 'shoe_store';
        $post_data['args']['address'] = '48 Pirrama Road, Pyrmont, NSW 2009, Australia';
        
        $response = $this->runApp('POST', '/api/GooglePlaces/addPlace', $post_data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
        
    }

}