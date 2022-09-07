<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class HeadlessController extends Controller
{

    public function index(Request $request) {
        $client = new Client();

        $response = $client->request( 'GET', config('services.newt.domain') . '/post-work', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => config('services.newt.key')
            ],
            'query' => [
                'limit' => 30,
                'order' => '-date',
                '_sys.raw.publishedAt[gt]' => 0
            ],
        ]);
        $results = json_decode($response -> getBody() -> getContents(), true);

        return view('index', compact('results'));
    }



    protected function myself(Request $request) {
        $client = new Client();

        $response = $client->request( 'GET', config('services.newt.domain') . '/post-myself', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => config('services.newt.key')
            ],
            'query' => [
                'limit' => 30,
                'order' => '-date',
                '_sys.raw.publishedAt[gt]' => 0,
            ],
        ]);
        $results = json_decode($response -> getBody() -> getContents(), true);

        return view('myself', compact('results'));
    }



    protected function graph_work(Request $request) {
        $client = new Client();

        $response = $client->request( 'GET', config('services.newt.domain') . '/post-work', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => config('services.newt.key')
            ]
        ]);
        $results = json_decode($response -> getBody() -> getContents(), true);

        $type_response = $client->request( 'GET', config('services.newt.domain') . '/task-type', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => config('services.newt.key')
            ],
            'query' => [
                'order' => 'sort',
            ],
        ]);
        $type_results = json_decode($type_response -> getBody() -> getContents(), true);

        return view('graph', compact('results','type_results'));
    }



    protected function graph_myself(Request $request) {
        $client = new Client();

        $response = $client->request( 'GET', config('services.newt.domain') . '/post-myself', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => config('services.newt.key')
            ]
        ]);
        $results = json_decode($response -> getBody() -> getContents(), true);

        $type_response = $client->request( 'GET', config('services.newt.domain') . '/task-type', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => config('services.newt.key')
            ],
            'query' => [
                'order' => 'sort',
            ],
        ]);
        $type_results = json_decode($type_response -> getBody() -> getContents(), true);

        return view('graph-myself', compact('results','type_results'));
    }

}
