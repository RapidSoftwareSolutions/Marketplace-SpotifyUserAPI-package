<?php

$app->post('/api/SpotifyUserAPI/getCategory', function ($request, $response, $args) {
    $settings =  $this->settings;
    
    $data = $request->getBody();
    $post_data = json_decode($data, true);
    if(!isset($post_data['args'])) {
        $data = $request->getParsedBody();
        $post_data = $data;
    }
    
    $error = [];
    if(empty($post_data['args']['access_token'])) {
        $error[] = 'access_token cannot be empty';
    }
    if(empty($post_data['args']['id'])) {
        $error[] = 'id cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query = [];
    if(!empty($post_data['args']['country'])) {
        $query['country'] = $post_data['args']['country'];
    }
    if(!empty($post_data['args']['locale'])) {
        $query['locale'] = $post_data['args']['locale'];
    }
    
    $headers['Authorization'] = 'Bearer ' . $post_data['args']['access_token'];
    $query_str = 'https://api.spotify.com/v1/browse/categories/' . $post_data['args']['id'];
    
    $client = $this->httpClient;

    try {

        $resp = $client->get( $query_str, 
            [
                'headers' => $headers,
                'query' => $query
            ]);
        $responseBody = $resp->getBody()->getContents();
        $code = $resp->getStatusCode();
        if(!empty(json_decode($responseBody)) && $code == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = $responseBody;
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to'] = $responseBody;
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }
    
    

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
