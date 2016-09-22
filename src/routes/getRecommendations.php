<?php

$app->post('/api/SpotifyUserAPI/getRecommendations', function ($request, $response, $args) {
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
    if(empty($post_data['args']['seed_artists'])) {
        $error[] = 'seed_artists cannot be empty';
    }
    if(empty($post_data['args']['seed_genres'])) {
        $error[] = 'seed_genres cannot be empty';
    }
    if(empty($post_data['args']['seed_tracks'])) {
        $error[] = 'seed_tracks cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    
    $query['seed_artists'] = $post_data['args']['seed_artists'];
    $query['seed_genres'] = $post_data['args']['seed_genres'];
    $query['seed_tracks'] = $post_data['args']['seed_tracks'];
    if(!empty($post_data['args']['market'])) {
        $query['market'] = $post_data['args']['market'];
    }
    if(!empty($post_data['args']['limit'])) {
        $query['limit'] = $post_data['args']['limit'];
    }
    $arr_args = ['acousticness', 'danceability', 'duration_ms', 'energy',
        'instrumentalness', 'key', 'liveness', 'loudness', 'mode',
       'popularity', 'speechless', 'tempo', 'time_signature', 'valence' 
        ];
    foreach($arr_args as $key) {
        if(!empty($post_data['args'][$key.'_min'])) {
            $query['min_'.$key] = $post_data['args'][$key.'_min'];
        }
        if(!empty($post_data['args'][$key.'_max'])) {
            $query['max_'.$key] = $post_data['args'][$key.'_max'];
        }
        if(!empty($post_data['args'][$key.'_target'])) {
            $query['target_'.$key] = $post_data['args'][$key.'_target'];
        }
    }
    
    
    
    $headers['Authorization'] = 'Bearer ' . $post_data['args']['access_token'];
    $query_str = 'https://api.spotify.com/v1/recommendations';
    
    $client = $this->httpClient;

    try {

        $resp = $client->get( $query_str, 
            [
                'headers' => $headers,
                'query' => $query
            ]);
        $responseBody = $resp->getBody()->getContents();
        $code = $resp->getStatusCode();
        if(!empty($responseBody) && $code == '200') {
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

