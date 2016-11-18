<?php

$app->post('/api/SpotifyUserAPI/getRecommendations', function ($request, $response, $args) {
    $settings =  $this->settings;
    
    $data = $request->getBody();

    if($data=='') {
        $post_data = $request->getParsedBody();
    } else {
        $toJson = $this->toJson;
        $data = $toJson->normalizeJson($data); 
        $data = str_replace('\"', '"', $data);
        $post_data = json_decode($data, true);
    }
    
    if(json_last_error() != 0) {
        $error[] = json_last_error_msg() . '. Incorrect input JSON. Please, check fields with JSON input.';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
        $result['contextWrites']['to']['status_msg'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $error = [];
    if(empty($post_data['args']['access_token'])) {
        $error[] = 'access_token';
    }
    if(empty($post_data['args']['seed_artists'])) {
        $error[] = 'seed_artists';
    }
    if(empty($post_data['args']['seed_genres'])) {
        $error[] = 'seed_genres';
    }
    if(empty($post_data['args']['seed_tracks'])) {
        $error[] = 'seed_tracks';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
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
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});

