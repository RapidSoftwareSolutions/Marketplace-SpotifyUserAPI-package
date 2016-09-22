<?php
use GuzzleHttp\Client;

namespace Models;
require __DIR__ . '/../../src/dependencies.php';


Class Next {
    protected $all_data = [];
    
    public function page($url, $headers='', $query='') {
        
        if($url) {
            $params = explode('?',$url);
            $args = explode('&',$params[1]);
            foreach($args as $item) {
               $item = explode('=', $item);
               $query[$item[0]] = $item[1];
            }
            
            $client = new \GuzzleHttp\Client();

            $resp = $client->get( $params[0], 
                [
                    'headers' => $headers,
                    'query' => $query
                ]);

            $rawBody = json_decode($resp->getBody());
            $this->all_data[] = $rawBody;
            if($rawBody->albums->next) {
                $this->page($rawBody->albums->next, $headers, $query);
            }
        }
        return $this->all_data;
    }    
    
}

