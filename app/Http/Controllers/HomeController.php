<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        try {
            $client = new Client();

            $response = $client->get('127.0.0.1:9000/ap/data');
            $body     = json_decode($response->getBody()->getContents());

            $data['penduduk'] = $body;
        } catch (Exception $e) {
            $data['error'] = $e->getMessage();
        }

        return view('welcome', $data);
    }

    public function delete()
    {
    }
}
