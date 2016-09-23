<?php

$app->post('/api/SpotifyUserAPI/getFollowedArtists', function ($request, $response, $args) {
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
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query['limit'] = 50;
    $query['type'] = 'artist';
    $headers['Authorization'] = 'Bearer ' . $post_data['args']['access_token'];
    $query_str = 'https://api.spotify.com/v1/me/following?type=artist';
    
    $client = $this->httpClient;

    try {

        $resp = $client->get( $query_str, 
            [
                'headers' => $headers,
                'query' => $query
            ]);
        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());
        
        $all_data[] = $rawBody;
        
        if($rawBody->artists->next != '' || $rawBody->artists->next != 'null') {
            $pagin = $this->pager;
            $ret = $pagin->page($rawBody->artists->next, $headers, $query, 'artists');
        }
        
        $all_data+=$ret;
        $code = $resp->getStatusCode();
        if(!empty(json_decode($all_data)) && $code == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = json_decode($all_data);
        } elseif($code != '200') {
            $result['callback'] = 'error';
            $result['contextWrites']['to'] = $responseBody;
        } else {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = $responseBody;
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }
    
    

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});

