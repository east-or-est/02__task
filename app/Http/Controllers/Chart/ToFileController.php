<?php

// サブディレクトリChartで使用できるようnamespaceに追加
namespace App\Http\Controllers\Chart;
// 追加
use App\Http\Controllers\Controller;

class ToFileController extends Controller
{

    public static function graphBuild($titleArr, $colorArr, $countArr, $filename) {

        $chart = new \QuickChart([
            'width' => 700,
            'height' => 400,
            'version' => '2',
        ]);

        $chart->setConfig('{
            type: "pie",
            data: {
                labels: [ "' . implode( '","',$titleArr ) . '" ],
                datasets: [
                    {
                        backgroundColor: [ "' . implode( '","',$colorArr ) . '" ],
                        data: [' . implode( ",",$countArr ) . '],
                        borderWidth: 2,
                    },
                ]
            },
            options: {
                legend: {
                    position: "right",
                    labels: {
                        fontSize: 20,
                        fontFamily: "Hiragino Kaku Gothic ProN",
                        fontColor: "black",
                        padding: 20
                    }
                },
                plugins: {
                    datalabels: {
                        display: true,
                        font: {
                            style: "bold",
                            size: 20,
                            family: "Hiragino Kaku Gothic ProN",
                        },
                        color: "white"
                    }
                }
            }
        }');



        $chart_sp = new \QuickChart([
            'width' => 800,
            'height' => 450,
            'version' => '2',
        ]);

        $chart_sp->setConfig('{
            type: "pie",
            data: {
                labels: [ "' . implode( '","',$titleArr ) . '" ],
                datasets: [
                    {
                        backgroundColor: [ "' . implode( '","',$colorArr ) . '" ],
                        data: [' . implode( ",",$countArr ) . '],
                        borderWidth: 2,
                    },
                ]
            },
            options: {
                legend: {
                    position: "bottom",
                    labels: {
                        fontSize: 30,
                        fontFamily: "Hiragino Kaku Gothic ProN",
                        fontColor: "black",
                        padding: 20
                    }
                },
                plugins: {
                    datalabels: {
                        display: true,
                        font: {
                            style: "bold",
                            size: 30,
                            family: "Hiragino Kaku Gothic ProN",
                        },
                        color: "white"
                    }
                }
            }
        }');



        $build = [
            $chart->toFile(base_path('public/asset/img/graph/chart-' . htmlspecialchars($filename, ENT_QUOTES | ENT_HTML5, 'UTF-8', false) . '.png')),
            $chart_sp->toFile(base_path('public/asset/img/graph/chart-' . htmlspecialchars($filename, ENT_QUOTES | ENT_HTML5, 'UTF-8', false) . '-sp.png'))
        ];


        return $build;
    }

}
