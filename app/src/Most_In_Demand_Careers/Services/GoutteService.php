<?php

namespace App\src\Most_In_Demand_Careers\Services;

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class GoutteService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(HttpClient::create());
    }

    public function scrape($url)
    {
        return $this->client->request('GET', $url);
    }
}