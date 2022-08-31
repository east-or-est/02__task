<?php

// サブディレクトリChartで使用できるようnamespaceに追加
namespace App\Http\Controllers\Chart;
// 追加
use App\Http\Controllers\Controller;

class ToFileController extends Controller
{

    public static function outlabeledPie($titleArr, $colorArr, $countArr, $filename) {

        $chart = new \QuickChart([
            'width' => 500,
            'height' => 300
        ]);

        $chart->setConfig('{
            type: "outlabeledPie",
            data: {
                labels: [ "' . implode( '","',$titleArr ) . '" ],
                datasets: [{
                    backgroundColor: [ "' . implode( '","',$colorArr ) . '" ],
                    data: [' . implode( ",",$countArr ) . ']
                }]
            },
            options: {
                plugins: {
                    legend: false,
                    outlabels: {
                        text: "%l %p",
                        color: "white",
                        stretch: 35,
                        font: {
                            resizable: true,
                            minSize: 12,
                            maxSize: 18
                        }
                    }
                }
            }
        }');


        return $chart->toFile(base_path('public/asset/img/graph/chart-' . htmlspecialchars($filename, ENT_QUOTES | ENT_HTML5, 'UTF-8', false) . '.png'));
    }

}
