<?php

namespace Wedevsw\Php;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class GoogleSearch
{
    protected $client;
    protected $q;
    protected $key;
    protected $cx;

    public function __construct($q='')
    {
        $this->q = $q;
        $this->key = 'AIzaSyDaVtchJXHs-HCbD2aE7NHW0k-yTQVpCCk';
        $this->cx = 'b6965e8555cca4384';
        $this->client = new Client();
    }
    public function getResult()
    {
        try {
            $response = $this->client->request('GET', 'https://www.googleapis.com/customsearch/v1', [
                'query' => [
                    'key' => $this->key,
                    'cx' => $this->cx,
                    'q' => $this->q,
                    ]
            ]);

            $result= json_decode($response->getBody(), JSON_OBJECT_AS_ARRAY);

            if (isset($result['items'])) {
                return $result['items'];
            } else {
                return [];
            }
        } catch (ClientException $e) {
            return  $e->getResponse();
        }
    }
}
