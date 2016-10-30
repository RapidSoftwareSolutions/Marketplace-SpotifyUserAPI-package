<?php

$app->post('/api/SpotifyUserAPI/getAccessToken', function ($request, $response, $args) {
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
    
    $error = [];
    if(empty($post_data['args']['client_id'])) {
        $error[] = 'client_id cannot be empty';
    }
    if(empty($post_data['args']['client_key'])) {
        $error[] = 'client_key cannot be empty';
    }
    if(empty($post_data['args']['code'])) {
        $error[] = 'code cannot be empty';
    }
    if(empty($post_data['args']['redirect_uri'])) {
        $error[] = 'redirect_uri cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    
    
    $query_str = 'https://accounts.spotify.com/api/token';
    
    $client = $this->httpClient;

    try {

        $resp = $client->post( $query_str, 
            [
                'form_params' => [
                    'grant_type'=> 'authorization_code',
                    'code'=> $post_data['args']['code'],
                    'redirect_uri'=> $post_data['args']['redirect_uri'],
                    'client_id'=> $post_data['args']['client_id'],
                    'client_secret'=> $post_data['args']['client_key']
                ]
            ]);
        $responseBody = $resp->getBody()->getContents();
        $code = $resp->getStatusCode();
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});

