<?php

// サブディレクトリChartで使用できるようnamespaceに追加
namespace App\Http\Controllers\Chart;
// 追加
use App\Http\Controllers\Controller;

use App\Http\Controllers\Chart\RequestController;
use App\Http\Controllers\Chart\ToFileController;

class TaskController extends Controller
{

    public static function data($filename) {
        $countArr = [];
        $nameArr = [];
        $colorArr = [];
        $request_cont = new RequestController;


        // カテゴリー側
        $type_results = app()->call( [$request_cont,'type'] );
        foreach ($type_results['items'] as $res) {
            array_push($nameArr, $res['title']);
            $tag_color = $res['color-tag'] !== '' ? $res['color-tag'] : '#666666';
            array_push($colorArr, $tag_color);
        }


        // 記事側
        $results = app()->call( [$request_cont, 'graph_' . $filename] );
        foreach ($results['items'] as $res) {
            foreach ($res['task-type'] as $cat) {
                array_push($countArr, $cat['title']);
            }
        }


        // QuickChart用の配列準備
        $countArr = array_count_values($countArr);
        $ListArr = [];

        for ($i = 0; $i < count($nameArr); $i++) {
            if(isset($countArr[$nameArr[$i]])) {
                array_push($ListArr, [ 'title' => $nameArr[$i], 'color' => $colorArr[$i], 'count' => $countArr[$nameArr[$i]] ]);
            }
        }
        $dataTitle = array_column($ListArr, 'title');
        $dataColor = array_column($ListArr, 'color');
        $dataCount = array_column($ListArr, 'count');


        // QuickChart実行
        $toFile_results = ToFileController::graphBuild($dataTitle,$dataColor,$dataCount,$filename);

        return $toFile_results;

    }

}
