<?php

$app->post('/api/SpotifyUserAPI/refreshAccessToken', function ($request, $response, $args) {
    $settings =  $this->settings;
    
    $data = $request->getBody();
    $post_data = json_decode($data, true);
    if(!isset($post_data['args'])) {
        $data = $request->getParsedBody();
        $post_data = $data;
    }
    
    $error = [];
    if(empty($post_data['args']['client_id'])) {
        $error[] = 'client_id cannot be empty';
    }
    if(empty($post_data['args']['client_key'])) {
        $error[] = 'client_key cannot be empty';
    }
    if(empty($post_data['args']['refresh_token'])) {
        $error[] = 'refresh_token cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    
    $headers['Authorization'] = 'Basic ' . base64_encode($post_data['args']['client_id'].':'.$post_data['args']['client_key']);
    $query_str = 'https://accounts.spotify.com/api/token';
    
    $client = $this->httpClient;

    try {

        $resp = $client->post( $query_str, 
            [
                'form_params' => [
                    'grant_type'=> 'refresh_token',
                    'refresh_token'=> $post_data['args']['refresh_token']
                ],
                'headers' => $headers
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

