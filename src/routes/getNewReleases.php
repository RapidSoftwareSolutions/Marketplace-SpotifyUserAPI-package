<?php

$app->post('/api/SpotifyUserAPI/getNewReleases', function ($request, $response, $args) {
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
    if(empty($post_data['args']['access_token'])) {
        $error[] = 'access_token cannot be empty';
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
    if(!empty($post_data['args']['offset'])) {
        $query['offset'] = $post_data['args']['offset'];
    }
    $query['limit'] = 50;
    
    $headers['Authorization'] = 'Bearer ' . $post_data['args']['access_token'];
    $query_str = 'https://api.spotify.com/v1/browse/new-releases';
    
    $all_data = '';
    
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
        
        if(isset($rawBody->albums)) {
            if(isset($rawBody->albums->next)) { 
                if($rawBody->albums->next != '' || $rawBody->albums->next != 'null') {
                    $pagin = $this->pager;
                    $ret = $pagin->page($rawBody->albums->next, $headers, $query, 'albums');
                    
                    $all_data+=$ret;
                }
            }
        }
        
        $code = $resp->getStatusCode();
        if(!empty(json_encode($all_data)) && $code == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'success';
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

