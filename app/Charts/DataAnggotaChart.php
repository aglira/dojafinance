<?php

namespace App\Charts;

use App\Models\DataAnggota;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DataAnggotaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart{

        return $this->chart->pieChart()
        ->setTitle('Surat yang sering digunakan')
        ->setSubtitle('2023')
        ->setWidth(500)
        ->addData($data->toArray())
        ->setLabels($labels);
            

    }
}
