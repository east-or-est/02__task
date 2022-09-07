<?php

// サブディレクトリChartで使用できるようnamespaceに追加
namespace App\Http\Controllers\Chart;
// 追加
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;

class RequestController extends Controller
{

    public function type() {
        $client = new Client();

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

        return $type_results;
    }



    public function graph_work() {
        $client = new Client();

        $response = $client->request( 'GET', config('services.newt.domain') . '/post-work', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => config('services.newt.key')
            ],
            'query' => [
                'limit' => 30,
                'status[nin]' => '6318696fd3ddb37e523b9703,6305fd083fa39c1e28ab13ff',
                '_sys.raw.publishedAt[gt]' => 0
            ],
        ]);
        $results = json_decode($response -> getBody() -> getContents(), true);

        return $results;
    }

    

    public function graph_myself() {
        $client = new Client();

        $response = $client->request( 'GET', config('services.newt.domain') . '/post-myself', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => config('services.newt.key')
            ],
            'query' => [
                'limit' => 30,
                'status[nin]' => '6318696fd3ddb37e523b9703,6305fd083fa39c1e28ab13ff',
                '_sys.raw.publishedAt[gt]' => 0
            ],
        ]);
        $results = json_decode($response -> getBody() -> getContents(), true);

        return $results;
    }

}
